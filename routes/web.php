<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // Added DB facade
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;

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
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Optional: Add logout route if needed
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Checkout Route
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');

// MongoDB Test Route for Inserting Data
Route::get('/test-insert', function () {
    try {
        // Get MongoDB Database instance
        $database = DB::connection('mongodb')->getMongoClient()->selectDatabase('walkingwdb'); // Replace 'walkingwdb' with your actual database name
        
        // Select the collection
        $collection = $database->selectCollection('testing'); // Replace '1' with your actual collection name
        
        // Insert a document into the collection
        $document = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'created_at' => now(),
        ];
        $insertResult = $collection->insertOne($document);

        // Retrieve all documents
        $allDocuments = $collection->find()->toArray();

        return response()->json([
            'status' => 'success',
            'inserted_id' => $insertResult->getInsertedId(),
            'data' => $allDocuments,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ]);
    }
});