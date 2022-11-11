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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// admin routes
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // admin login
    Route::match(['get', 'post'], 'login', 'AdminController@login');

    Route::group(['middleware' => ['admin']], function () {
        // dashboard
        Route::get('dashboard', 'AdminController@dashboard');
        // logout
        Route::get('logout', 'AdminController@logout');
        // update password
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword');
        // cek password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');
        // update profil
        Route::match(['get', 'post'], 'update-admin-profile', 'AdminController@updateAdminProfile');
    });
});
