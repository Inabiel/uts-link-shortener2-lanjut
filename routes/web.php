<?php


use App\Http\Controllers\Shortener;
use App\Http\Controllers\Auth;
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

Route::get('/', 'Shortener@index')->name('home');
Route::post('/generate', 'Shortener@short_id_guest');
Route::get('/{hash}', 'Shortener@get_id');
Route::prefix('auth')->group(function () {
    Route::get('/register','Auth@registerIndex');
    Route::get('/login','Auth@loginIndex');
    Route::post('/register', 'Auth@register');
    Route::post('/login', 'Auth@login');
});
Route::get('/error/404','Auth@error_404')->name('error_404');

Route::group(['prefix' => 'user',  'middleware' => 'cekAuth'], function()
{
    Route::get('/dashboard','Auth@getCurrentUser')->name('user');
    Route::get('/logout', 'Auth@logout')->name('logout');
});
