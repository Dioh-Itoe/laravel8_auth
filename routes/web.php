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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ProductsController::class)->name('dashboard');

// return view('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'ProductsController@index')->name('dashboard');
    Route::get('/dashboard/create', 'ProductsController@create')->name('create');
    Route::post('/dashboard/save-product', 'ProductsController@store')->name('save-product');
    Route::get('/dashboard/edit-product/{id}', 'ProductsController@edit')->name('edit-product');
    Route::post('/dashboard/update-product/{id}', 'ProductsController@update')->name('update-product');
    Route::get('/dashboard/delete-product/{id}', 'ProductsController@destroy')->name('delete-product');


});
