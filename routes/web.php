<?php

use App\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminPostsController;
use \App\Http\Controllers\AdminProductsController;
use \App\Http\Controllers\AdminProductsCategoryController;

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

//Controllers for displaying parts of website to users
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [\App\Http\Controllers\PostsController::class, 'show'])->name('show.single');

//Needs to get finished
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');

//Controllers for users profile management
Route::get('/profile/user/{id}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('user.show.profile');
Route::put('/profile/update/user/{id}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('user.profile.update');

//Controllers for authentication
Auth::routes();
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Grouped controllers for admin and admin panel
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

//    Admin controllers
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

//    Posts controllers
    Route::get('/post/trash/{id}', [AdminPostsController::class, 'trash_post'])->name('trash.post');
    Route::get('/post/trashed-posts', [AdminPostsController::class, 'trashed_posts'])->name('trashed.posts');
    Route::get('/post/restore/{id}', [AdminPostsController::class, 'restore_post'])->name('restore.post');
    Route::delete('/post/destroy/{id}', [AdminPostsController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/publish-post/{post}', [AdminPostsController::class, 'publish_post'])->name('publish.post');
    Route::get('/post/remove-published-post/{post}', [AdminPostsController::class, 'remove_published_post'])->name('rm.published.post');
    Route::resource('/post', AdminPostsController::class)->except('destroy');

//    Categories controllers
    Route::delete('/category/destroy/{id}', [App\Http\Controllers\AdminCategoriesController::class, 'destroy'])->name('category.destroy');
    Route::resource('/category', \App\Http\Controllers\AdminCategoriesController::class)->except('destroy');

//    Products controllers
    Route::get('/product/publish/{product}', [AdminProductsController::class, 'publish'])->name('product.publish');
    Route::get('/product/rm-publish/{product}', [AdminProductsController::class, 'rm_publish'])->name('product.rm.publish');
    Route::post('/product/trash/{id}', [AdminProductsController::class, 'trash'])->name('product.trash');
    Route::post('/product/restore/{id}', [AdminProductsController::class, 'restore'])->name('product.restore');
    Route::get('/product/trashed', [AdminProductsController::class, 'trashed'])->name('product.trashed');
    Route::delete('/product/destroy/{id}', [AdminProductsController::class, 'destroy'])->name('product.destroy');
    Route::resource('/product', AdminProductsController::class)->except('destroy');

//    Products categories controllers
    Route::delete('/product-category/destroy/{id}', [AdminProductsCategoryController::class, 'destroy'])->name('product-category.destroy');
    Route::resource('/product-category', AdminProductsCategoryController::class)->except('destroy');

//    Users controllers
    Route::resource('/user', AdminUsersController::class);
});
