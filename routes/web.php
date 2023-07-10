<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.home');
Route::get('/logout',[App\Http\Controllers\Frontend\FrontendController::class, 'logout'])->name('frontend.logout');

Route::get('categories/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::get('/post/{id}',[App\Http\Controllers\Frontend\FrontendController::class, 'show']);

Route::get('categories/{category_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('category',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.category');
    Route::get('add-category',[\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin.add-category');
    Route::post('add-category',[\App\Http\Controllers\Admin\CategoryController::class,'store'])->name('admin.store-category');
    Route::get('edit-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin.edit-category');
    Route::put('update-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin.update-category');
    Route::get('delete-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('admin.delete-category');

    Route::get('/posts',[\App\Http\Controllers\Admin\PostController::class,'index'])->name('admin.posts');
    Route::get('add-post',[\App\Http\Controllers\Admin\PostController::class,'create'])->name('admin.add-post');
    Route::post('add-post',[\App\Http\Controllers\Admin\PostController::class,'store'])->name('admin.store-post');
    Route::get('edit-post/{post_id}',[\App\Http\Controllers\Admin\PostController::class,'edit'])->name('admin.edit-post');
    Route::put('update-post/{post_id}',[\App\Http\Controllers\Admin\PostController::class,'update'])->name('admin.update-post');
    Route::get('delete-post/{post_id}',[\App\Http\Controllers\Admin\PostController::class,'delete'])->name('admin.delete-post');

    Route::get('users',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.users.index');
    Route::get('users/edit/{user_id}',[\App\Http\Controllers\Admin\UserController::class,'edit'])->name('admin.edit-users');
    Route::put('update-user/{user_id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.update-user');

});