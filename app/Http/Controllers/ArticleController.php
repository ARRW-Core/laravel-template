<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private String $preview = '';
    private bool $add_media_modal = false;

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
        return dd($request->all());
    }

    public function store_article(Request $request) {
        dd(uuid_create(UUID_TYPE_RANDOM));
    }

    private function uploadImage(Request $request) {
        $image = $request->file('image');
        $image->store('images/'.date('yyyy/mm/', strtotime(now())), 'public');
        return $image->hashName();
    }

}
