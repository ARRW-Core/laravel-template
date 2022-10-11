<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tag;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{

    public function index() {
        return view('pages.dashboard.article-overview', [
            'articles' => Article::latest()->get(),
        ]);
    }

    public function create() {
        return view('pages.dashboard.create-article', ['categories' => Category::orderBy('id')->pluck('name'), 'tags' => Tag::orderBy('id')->pluck('name')]);
    }


    public function preview(Request $request) {
        /*
         * This function is used to preview the image that is being uploaded to the article.
         * The image is stored in the storage/app/public/temp folder.
         * First the image url is retrieved from the request.
         * Then the image url is fetched from session and decoded.
         * Then both the arrays are merged.
         * Then the merged array is encoded and stored in session.
         * Then the merged array is returned with view
         */
        return view('pages.dashboard.create-article', ['images' => $request->session()->get('image'), 'categories' => Category::orderBy('id')->pluck('name'), 'tags' => Tag::orderBy('id')->pluck('name')]);
    }

    public function store_media(Request $request) {
        /*
         * First the request is validated. If the validation is false then old values will be returned to the view with the errors.
         * Then request is checked if it contains a file or a url.
         * If it contains a url, then $imageUri is set to the url.
         * If it contains a file, then the file is stored in the storage/app/public/temp folder and imageUri is returned.
         * The imageUri is then put into an object: $imageObject with the caption, alt text and is_cover.
         * The imageObject is then encoded and put into the url
         *
         *
         */

        $request->validate([
            'media_upload' => 'required_without:media_url|image|max:2048|mimes:jpeg,png,jpg,gif,svg,webp',
            'caption' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'media_url' => 'required_without:media_upload|string|max:255|url',
        ]);

        if ($request->hasFile('media_upload')) {
            $imageUri = $this->uploadImage($request->media_upload);
        }
        else if (isset($request->media_url)) {
            $imageUri = $request->media_url;
        }
        else {
            $imageUri = '';
        }
        $imageObject = [
            'uri' => $imageUri,
            'caption' => $request->caption,
            'alt' => $request->alt,
            'is_cover' => $request->is_cover,
        ];


        $image1 = [$imageObject] ?? [];

//        dd($image1);
        $image2 = $request->session()->pull('image') ?? [];
//        dd($image1, $image2);
        $merged_images = array_merge($image1, $image2);
//        dd($merged_images);
//        dd(array_merge($image1, $image2));
        $request->session()->put('image', $merged_images);

//        dd($imageUri);
        return redirect()->route('add-media-to-article');
    }

    public function store_article(Request $request) {

        $request->validate([
            'title' => 'required|string|max:255|unique:articles',
            'body' => 'required|string',
            'categories' => 'required',
            'tags' => 'nullable',
        ]);
        if(isset($request->images_count)) {
            for ($i = 0; $i < $request->images_count; $i++) {
                $request->validate([
                    'caption' . $i => 'required|string|max:255',
                ]);
            }
        }
        $category_array = [];
        $tags_array = [];
        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = Auth::id();
        $article->save();
        if (isset($request->categories)) {
            foreach (json_decode($request->categories) as $category) {
                if (!Category::where('name', $category->value)->exists()) {
                    Category::create(['name' => $category->value]);
                }
                $article->categories()->attach(['category_id' => Category::where('name', $category->value)->first()->id]);
            }
        }

        if (isset($request->tags)) {
            foreach (json_decode($request->tags) as $tag) {
                if (!Tag::where('name', $tag->value)->exists()) {
                    //Add new tag to the database
                    Tag::create(['name' => $tag->value]);
                }
                $article->tags()->attach(['tag_id' => Tag::where('name', $tag->value)->first()->id]);
            }
        }

        $images = [];
        if(isset($request->images_count)) {
            for($i = 0; $i < $request->images_count; $i++) {
                if (str_contains($request->input('image_uri' . $i), 'temp/')) {
                    $real_image_uri = str_replace('temp/', 'public/', $request->input('image_uri' . $i));
                    $temp_image_uri = str_replace('temp/', 'public/temp/', $request->input('image_uri' . $i));
                    echo Storage::move($temp_image_uri, $real_image_uri);
                }
                else {
                    $real_image_uri = $request->input('image_uri' . $i);
                }
                $image = new Image();
                $image->uri = $real_image_uri;
                $image->caption = $request->input('caption' . $i);
                $image->alt = $request->input('alt' . $i);
                $image->is_cover = $request->input('is_cover' . $i) == 'true';
                $article->images()->save($image);

            }
        }
//        Storage::deleteDirectory('public/temp');
        $request->session()->forget('image');
        redirect()->route('dashboard');
//        dd($request->all());

//
//        Storage::move('public/temp/images/2022/10/0f32c7c2-86ff-4e8a-9c07-88d1532f848c.png', 'public/images/2022/10/0f32c7c2-86ff-4e8a-9c07-88d1532f848c.png');
//


//        return dd(Storage::allFiles());

    }

    private function uploadImage($media_upload) {
        $imageName = uuid_create(UUID_TYPE_RANDOM) . '.' . $media_upload->extension();
        $imagePath = $media_upload->storeAs('temp/images/'.Auth::id().'/'.now()->format('Y/m').'', $imageName, 'public');
        return $imagePath;
    }

}
