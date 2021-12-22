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

Route::prefix('user/dashboard')->namespace('user')->name('user.')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.user.dashboard');
    })->name('dashboard');

    Route::get('/product', function () {
        return view('pages.dashboard.user.dashboard-product');
    })->name('dashboard-product');

    Route::get('/product/details/{id}', function () {
        return view('pages.dashboard.user.dashboard-product-detail');
    })->name('dashboard-product-detail');

    Route::get('/product/create', function () {
        return view('pages.dashboard.user.dashboard-product-create');
    })->name('dashboard-product-create');

    Route::get('/transaction', function () {
        return view('pages.dashboard.user.dashboard-transaction');
    })->name('dashboard-transaction');

    Route::get('/transaction/details/{id}', function () {
        return view('pages.dashboard.user.dashboard-transaction-detail');
    })->name('dashboard-transaction-detail');

    Route::get('/account', function () {
        return view('pages.dashboard.user.dashboard-account');
    })->name('dashboard-account');

    Route::get('/setting', function () {
        return view('pages.dashboard.user.dashboard-setting');
    })->name('dashboard-setting');
});

Route::prefix('admin/dashboard')->namespace('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.admin.dashboard');
    })->name('dashboard');
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//lihat disini jika ingin tau apa saja yang diperlukan untuk role dan permission
//jika ingin lebih cepat gunakan jetstream
//https://www.youtube.com/watch?v=kZOgH3-0Bko&ab_channel=LaravelDaily
