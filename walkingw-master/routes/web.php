<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Page Route
Route::get('/product', [ProductController::class, 'index'])->name('product');

// Services Page Route
Route::get('/services', [ServiceController::class, 'index'])->name('services');

// About Page Route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Cart Page Route
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Optional: Add logout route if needed
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
