<?php

use App\Http\Controllers\Auth\LoginController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [LoginController::class, 'logout']);

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm']);
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::view('/dashboard', 'admin.dashBoard');

    
});
