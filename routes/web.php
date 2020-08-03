<?php

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

Route::get('home', 'HomeController@index')->name('artikel');

Route::group(['middleware' => 'admin'], function()
{
    //artikel
    Route::get('/artikel','AdminArtikelController@index');
    Route::get('/tambahArtikel','AdminArtikelController@tambah');
    Route::resource('artikeltbh', 'AdminArtikelController');


    //manage artikel
    Route::get('artikel/add','AdminArtikelController@store');
    Route::post('artikel/add','AdminArtikelController@store');
    Route::delete('artikel/delete/{id}', 'AdminArtikelController@delete');
});

// //buat multiple
// Route::middleware(['admin', 'user'])->group(function () {
//     Route::get('/news','UserArtikelController@index');
// });


//tampilan user tanpa middleware
Route::get('/news','UserArtikelController@index');

//logout
Route::get('/logout', 'HomeController@logout');
