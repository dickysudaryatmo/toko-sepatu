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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@homeView')->name('home.view');
Route::get('/admin', 'AdminController@index')->name('admin.view');
Route::post('/produk', 'AdminController@getProduk')->name('post.produk');
Route::get('/add-produk', 'AdminController@addProdukView')->name('get.produk.view');
Route::post('/post-produk', 'AdminController@submitAddProduk')->name('post.produk.add');
Route::get('/edit-produk/{id}', 'AdminController@getEditProduk')->name('get.produk.edit');
Route::post('/post-edit-produk', 'AdminController@submitEditProduk')->name('post.produk.edit');

