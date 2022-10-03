<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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
        return view('pages.dashboard.create-article', []);
    }

    public function preview(Request $request) {
        return view('pages.dashboard.create-article', []);
    }

    public function store_media(Request $request) {
        return $this->uploadImage($request->media_upload);
    }

    public function store_article(Request $request) {
        dd(uuid_create(UUID_TYPE_RANDOM));
    }

    private function uploadImage(UploadedFile $media_upload) {
        dd($media_upload);
    }

}
