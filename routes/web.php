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

    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});
Route::resource('customers', 'CustomersController');
Route::resource('suppliers', 'SuppliersController');
Route::get('country-state-city','CountryStateCityController@index');
Route::post('get-states-by-country','CountryStateCityController@getState');
Route::post('get-cities-by-state','CountryStateCityController@getCity');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
