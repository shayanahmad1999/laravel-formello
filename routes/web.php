<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data['categories'] = Category::all();
    $data['products'] = Product::with('category')->get();
    return view('welcome', $data);
})->name('home');

Route::resource('/categories', CategoryController::class);
Route::resource('/products', ProductController::class);
