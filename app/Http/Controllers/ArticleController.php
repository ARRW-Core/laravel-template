<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {


        return view('pages.dashboard.article-overview', [
            'articles' => Article::latest()->get(),
        ]);
    }

    public function create() {
        return view('pages.dashboard.create-article', [
            'categories' => Category::all(),
        ]);
    }


}
