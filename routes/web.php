<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

Route::controller(ProductController::class)->name('product.')->group(function () {
   Route::get('/', 'index')->name('index');
   Route::get('/product/{id}', 'viewDetail')->name('view');
   Route::get('/search-result', 'search')->name('search');
   Route::get('/category/{category}', 'searchByCategory')->name('category');
});

Route::middleware('guest')->group(function () {
   Route::get('/login', [LoginController::class, 'index'])->name('login');
   Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

   Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
   Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

   Route::prefix('/profile')->controller(ProfileController::class)->name('profile.')->group(function () {
      Route::get('/', 'edit')->name('edit');
      Route::patch('/{user}', 'update')->name('update');
   });

   Route::controller(CartController::class)->group(function () {
      Route::get('/customer/cart', 'cartPage')->name('cartPage');
      Route::post('/customer/addcart/{product}', 'addToCart')->name('addToCart');
      Route::get('/checkout', 'checkout')->name('checkout');
      Route::delete('/delete-cart/{product}', 'deleteCart')->name('deleteCart');
   });

   Route::middleware('role:admin')->controller(AdminProductController::class)->prefix('admin')->name('admin.product.')->group(function () {
      Route::get('/', 'index')->name('index');
      Route::get('/create', 'create')->name('create');
      Route::post('/store', 'store')->name('store');
      Route::delete('/destroy', 'destroy')->name('destroy');
      Route::put('/update/{product}', 'update')->name('update');
      Route::get('/edit/{product}', 'edit')->name('edit');
   });
});

Route::fallback(function () {
   return redirect('/');
});
