<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
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
        return view('pages.dashboard.user.index');
    })->name('dashboard');

    Route::get('/product', function () {
        return view('pages.dashboard.user.product');
    })->name('dashboard-product');

    Route::get('/product/details/{id}', function () {
        return view('pages.dashboard.user.product-detail');
    })->name('dashboard-product-detail');

    Route::get('/product/create', function () {
        return view('pages.dashboard.user.product-create');
    })->name('dashboard-product-create');

    Route::get('/transaction', function () {
        return view('pages.dashboard.user.transaction');
    })->name('dashboard-transaction');

    Route::get('/transaction/details/{id}', function () {
        return view('pages.dashboard.user.transaction-detail');
    })->name('dashboard-transaction-detail');

    Route::get('/account', function () {
        return view('pages.dashboard.user.account');
    })->name('dashboard-account');

    Route::get('/setting', function () {
        return view('pages.dashboard.user.setting');
    })->name('dashboard-setting');
});

Route::prefix('admin/dashboard')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class);
});

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//lihat disini jika ingin tau apa saja yang diperlukan untuk role dan permission
//jika ingin lebih cepat gunakan jetstream
//https://www.youtube.com/watch?v=kZOgH3-0Bko&ab_channel=LaravelDaily
