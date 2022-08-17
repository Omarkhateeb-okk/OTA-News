<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/',[FrontendController::class,'index']);


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController::class, 'destroy']);
    // tags Routs
    Route::get('tag', [TagController::class, 'index']);
    Route::get('add-tag', [TagController::class, 'create']);
    Route::post('add-tag', [TagController::class, 'store']);
    Route::get('edit-tag/{tag_id}', [TagController::class, 'edit']);
    Route::put('update-tag/{tag_id}', [TagController::class, 'update']);
    Route::get('delete-tag/{tag_id}', [TagController::class, 'destroy']);

//    posts Routes

    Route::get('get-post-by-tags/{tag_id}', [PostController::class, 'getPostByTag']);
    Route::get('posts', [PostController::class, 'index']);
    Route::get('add-post', [PostController::class, 'create']);
    Route::post('add-post', [PostController::class, 'store']);
    Route::get('post/{post_id}', [PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [PostController::class, 'update']);
    Route::get('delete-post/{post_id}', [PostController::class, 'destroy']);


});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

