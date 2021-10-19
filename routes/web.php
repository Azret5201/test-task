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
    return view('shorten');
});
Route::get('ajax/getUrl', [\App\Http\Controllers\UrlController::class, 'getUrl'])->name('getUrl');

Route::get('/short_url/{code}', [\App\Http\Controllers\UrlController::class, 'show'])->name('show');
Route::get('/test', function (\Illuminate\Http\Request $request){
    dd($_SERVER['HTTP_USER_AGENT']);
});
Route::get('/statistics', [\App\Http\Controllers\UrlController::class, 'statistics'])->name('statistics');


