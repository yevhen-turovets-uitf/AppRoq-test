<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\UsersByCountryController;
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

Route::get('/users/by-country/{country}', UsersByCountryController::class);
Route::post('/upload', FileUploadController::class);
