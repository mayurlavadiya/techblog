<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('category',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.category');
    Route::get('add-category',[\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin.add-category');
    Route::post('add-category',[\App\Http\Controllers\Admin\CategoryController::class,'store'])->name('admin.store-category');
    Route::get('edit-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin.edit-category');
    Route::put('update-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin.update-category');
    Route::get('delete-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('admin.delete-category');


});