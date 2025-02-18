<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;


Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/category', [MyCommerceController::class, 'category'])->name('category');
Route::get('/detail', [MyCommerceController::class, 'detail'])->name('detail');
