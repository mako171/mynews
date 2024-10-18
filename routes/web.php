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

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('admin/profile/create', 'add');
    Route::get('admin/prefile/edit','edit');
});


/*
|
|課題3.
|http://XXXXXX.jp/XXX というアクセスが来たときに、
|AAAControllerのbbbというAction に渡すRoutingの設定
|
|Route::controller(AAA::class)->group(function(){
|    Route::get('XXX','bbb');
|})
|
*/