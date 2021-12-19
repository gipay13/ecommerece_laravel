<?php

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
    return view('pages.home');
})->name('home');

Route::get('/categories', function () {
    return view('pages.category');
})->name('category');

Route::get('/product/{id}', function () {
    return view('pages.product');
})->name('product');

Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');

Route::get('/checkout/success', function () {
    return view('pages.checkout-success');
})->name('checkout-sucess');

Route::get('/register/success', function () {
    return view('auth.register-success');
})->name('register-success');

Route::get('/dashboard', function () {
    return view('pages.dashboard.dashboard');
})->name('dashboard');

Route::get('/dashboard/product', function () {
    return view('pages.dashboard.dashboard-product');
})->name('dashboard-product');

Route::get('/dashboard/product/details/{id}', function () {
    return view('pages.dashboard.dashboard-product-detail');
})->name('dashboard-product-detail');

Route::get('/dashboard/product/create', function () {
    return view('pages.dashboard.dashboard-product-create');
})->name('dashboard-product-create');

Route::get('/dashboard/transaction', function () {
    return view('pages.dashboard.dashboard-transaction');
})->name('dashboard-transaction');

Route::get('/dashboard/transaction/details/{id}', function () {
    return view('pages.dashboard.dashboard-transaction-detail');
})->name('dashboard-transaction-detail');

Route::get('/dashboard/account', function () {
    return view('pages.dashboard.dashboard-account');
})->name('dashboard-account');

Route::get('/dashboard/setting', function () {
    return view('pages.dashboard.dashboard-setting');
})->name('dashboard-setting');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
