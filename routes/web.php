<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/news', function () {
    return view('pages.news');
})->name('news');

Route::get('/politics', function () {
    return view('pages.politics');
})->name('politics');

Route::get('/world-news', function () {
    return view('pages.world-news');
})->name('world-news');

Route::get('/business', function () {
    return view('pages.business');
})->name('business');

Route::get('/sports', function () {
    return view('pages.sports');
})->name('sports');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.dashboard');
    })->name('dashboard');

    Route::get('/article-overview', [ArticleController::class, 'index'])->name('article-overview');

    Route::get('/create-article', [ArticleController::class, 'create'])->name('create-article');
    Route::post('/store-media', [ArticleController::class, 'store_media'])->name('store-media');
    Route::post('/store-article', [ArticleController::class, 'store_article'])->name('store-article');



});

require __DIR__.'/auth.php';
