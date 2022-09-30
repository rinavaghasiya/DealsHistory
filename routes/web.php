<?php

use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('userregister', function () {
    return view('admin.createuser');
});

Route::get('login', function () {
    return view('admin.login');
});

route::post('addregister', [LoginController::class, 'register']);
route::post('userlogin', [LoginController::class, 'login']);


Route::group(['middleware' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.home');
    });


    route::get('adminlogout', [LoginController::class, 'adminlogout']);
    route::get('userlogout', [LoginController::class, 'userlogout']);

    route::get('/index', [DealController::class, 'index']);
    route::post('/import', [DealController::class, 'importData']);
    route::get('/export', [DealController::class, 'exportData']);
});
