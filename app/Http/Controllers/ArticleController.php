<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    private String $preview = '';
    private bool $add_media_modal = false;
    public array $images = [];

    public function index() {
        return view('pages.dashboard.article-overview', [
            'articles' => Article::latest()->get(),
        ]);
    }

    public function create() {
        Debugbar::info(Auth::id());
        return view('pages.dashboard.create-article', ['images' => $this->images]);
    }


    public function preview(Request $request) {
        Debugbar::info(Auth::user()->getAuthIdentifier());
        return view('pages.dashboard.create-article', ['images' => json_decode($request->image_uri)]);
    }

    public function store_media(Request $request) {
        if ($request->hasFile('media_upload')) {
            $imageUri = $this->uploadImage($request->media_upload);
        }
        else if (isset($request->media_url)) {
            $imageUri = $request->media_url;
        }
        else {
            $imageUri = '';
        }
//        dd($imageUri);
        //add curly braces to the imageuri
        $encodedJson = json_encode([$imageUri, 'a']);

//        dd($imageUri);
        return redirect()->route('add-media-to-article', ['image_uri' => $encodedJson]);
    }

    public function store_article(Request $request) {
//
//        Storage::move('public/temp/images/2022/10/0f32c7c2-86ff-4e8a-9c07-88d1532f848c.png', 'public/images/2022/10/0f32c7c2-86ff-4e8a-9c07-88d1532f848c.png');
//        return unlink('storage/images/2022/10/271af950-7890-43bb-a9f7-68075f759630.png');

//        return Storage::deleteDirectory('public/temp');
//        return dd(Storage::allFiles());

    }

    private function uploadImage(UploadedFile $media_upload) {
        $imageName = uuid_create(UUID_TYPE_RANDOM) . '.' . $media_upload->extension();
        $imagePath = $media_upload->storeAs('temp/images/'.now()->format('Y/m').'/'.Auth::id(), $imageName, 'public');
        return $imagePath;
    }

}
