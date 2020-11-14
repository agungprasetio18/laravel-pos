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
    return redirect('/login');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');

    Route::prefix('barang')->name('barang.')->group(function(){
        Route::get('/', 'Admin\BarangController@index')->name('index');
        Route::get('/create', 'Admin\BarangController@create')->name('create');
        Route::post('/', 'Admin\BarangController@store')->name('store');
        Route::get('/{id}', 'Admin\BarangController@edit')->name('edit');
        Route::patch('/{id}', 'Admin\BarangController@update')->name('update');
        Route::delete('/{id}', 'Admin\BarangController@destroy')->name('destroy');
    });

    Route::prefix('distributor')->name('distributor.')->group(function(){
        Route::get('/', 'Admin\DistributorController@index')->name('index');
        Route::post('/', 'Admin\DistributorController@store')->name('store');
        Route::patch('/', 'Admin\DistributorController@update')->name('update');
        Route::delete('/{id}', 'Admin\DistributorController@destroy')->name('destroy');
        
    });

    Route::prefix('merek')->name('merek.')->group(function(){
        Route::get('/', 'Admin\MerekController@index')->name('index');
        Route::post('/', 'Admin\MerekController@store')->name('store');
        Route::patch('/', 'Admin\MerekController@update')->name('update');
        Route::delete('/{id}', 'Admin\MerekController@destroy')->name('destroy');
        
    });
    
});

Route::prefix('manager')->name('manager.')->middleware('role:manager')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');

     Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/', 'Manager\AdminController@index')->name('index');
        Route::get('/create', 'Manager\AdminController@create')->name('create');
        Route::post('/', 'Manager\AdminController@store')->name('store');
        Route::delete('/{id}', 'Manager\AdminController@destroy')->name('destroy');
    });

    Route::prefix('kasir')->name('kasir.')->group(function(){
        Route::get('/', 'Manager\KasirController@index')->name('index');
        Route::get('/create', 'Manager\KasirController@create')->name('create');
        Route::post('/', 'Manager\KasirController@store')->name('store');
        Route::delete('/{id}', 'Manager\KasirController@destroy')->name('destroy');
    });

    Route::prefix('laporan')->name('laporan.')->group(function(){
        Route::get('/', 'Manager\KasirController@index')->name('index');
        Route::post('/', 'Manager\KasirController@store')->name('store');
        Route::patch('/', 'Manager\KasirController@update')->name('update');
        Route::delete('/{id}', 'Manager\KasirController@destroy')->name('destroy');
    });
    
});

Route::prefix('kasir')->name('kasir.')->middleware('role:kasir')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/home', 'HomeController@home')->name('home');

    Route::prefix('transaksi')->name('transaksi.')->group(function(){
        Route::get('/', 'Kasir\TransaksiController@index')->name('index');
        Route::get('/create', 'Kasir\TransaksiController@create')->name('create');
        Route::post('/', 'Kasir\TransaksiController@store')->name('store');
        Route::get('/detail/{id_transaksi}','Kasir\TransaksiController@detail')->name('detail');
        Route::get('/add/{id_transaksi}', 'Kasir\TransaksiController@add')->name('add');
        Route::post('/addstore/{id_transaksi}', 'Kasir\TransaksiController@addstore')->name('addstore');
    });
});
