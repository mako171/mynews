<?php

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
});

use App\Http\Controllers\Admin\NewsController;

Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news/delete', 'delete')->name('news.delete');
    Route::get('news/{id}', 'detail')->name('news.detail');
});

use App\Http\Controllers\Admin\ProfileController;

Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile', 'index')->name('profile.index');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
    Route::get('profile/delete', 'delete')->name('profile.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController;

Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');

// パスパラメータ形式
Route::get('/news/{id}', [PublicNewsController::class, 'detail'])->name('news.detail');
Route::get('/news/{id}/comment', [PublicNewsController::class, 'comment'])->name('news.comment');
Route::post('/news/{id}/comment', [PublicNewsController::class, 'createComment'])->name('news.comment.create');

use App\Http\Controllers\ProfileController as PublicProfileController;

Route::get('/profile', [PublicProfileController::class, 'index'])->name('profile.index');
