<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CommentController;
// use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontendController;


// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.home');
Route::get('/logout', [App\Http\Controllers\Frontend\FrontendController::class, 'logout'])->name('frontend.logout');

Route::get('categories/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::get('/post/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'show']);

Route::post('comments', [App\Http\Controllers\Frontend\CommentController::class, 'store'])->name('comments');
Route::delete('delete-comment', [App\Http\Controllers\Frontend\CommentController::class, 'destroy'])->name('delete-comment');

Route::get('/navbar_pages/articles', [FrontendController::class, 'articles'])->name('navbar_pages.articles');
Route::get('/navbar_pages/blog', [FrontendController::class, 'blog'])->name('navbar_pages.blog');
Route::get('/navbar_pages/contactus', [FrontendController::class, 'contactus'])->name('navbar_pages.contactus');
Route::get('/navbar_pages/aboutus', [FrontendController::class, 'aboutus'])->name('navbar_pages.aboutus');
Route::get('/navbar_pages/services', [FrontendController::class, 'services'])->name('navbar_pages.services');

Route::get('categories/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
    Route::get('add-category', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.add-category');
    Route::post('add-category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.store-category');
    Route::get('edit-category/{category_id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.edit-category');
    Route::put('update-category/{category_id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.update-category');
    // Route::get('delete-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('admin.delete-category');
    Route::post('delete-category', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.delete-category');

    Route::get('/posts', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts');
    Route::get('add-post', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.add-post');
    Route::post('add-post', [\App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.store-post');
    Route::get('edit-post/{post_id}', [\App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.edit-post');
    Route::put('update-post/{post_id}', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.update-post');
    Route::get('delete-post/{post_id}', [\App\Http\Controllers\Admin\PostController::class, 'delete'])->name('admin.delete-post');

    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/edit/{user_id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.edit-users');
    Route::put('update-user/{user_id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.update-user');

    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'savedata']);
});
