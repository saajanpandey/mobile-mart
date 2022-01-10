<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
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
    return view('frontend.landing');
})->name('first.page');

Route::view('/about-us', 'frontend.about-us')->name('frontend.about-us');
Route::view('/contact-us', 'frontend.contact-us')->name('frontend.contact-us');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [LoginController::class, 'logout']);


Route::get('/comments', [commentsController::class, 'index'])->name('comments.index');
Route::get('/comments/create', [commentsController::class, 'create'])->name('comments.create');
Route::post('/comments', [commentsController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}', [commentsController::class, 'destroy'])->name('comments.destroy');
Route::get('/comments/{id}/edit', [commentsController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id}', [commentsController::class, 'update'])->name('comments.update');



Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/login', [AdminLoginController::class, 'showAdminLoginForm'])->name('admin.view');
    Route::post('/login', [AdminLoginController::class, 'adminLogin'])->name('admin.login');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::view('/dashboard', 'admin.dashBoard')->name('admin.dash');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
    });
});

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
    Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');

    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
});

Route::group(['middleware' => 'auth:web'], function () {


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/{id}/edit', [BrandController::class, 'edit'])->name('cart.edit');
    Route::get('/cart/create', [BrandController::class, 'create'])->name('cart.create');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
});
