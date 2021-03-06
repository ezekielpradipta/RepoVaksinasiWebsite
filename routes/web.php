<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\PesertaController@index')->name('depan');
Route::get('/cekstatus', 'App\Http\Controllers\PesertaController@cekstatus')->name('cekstatus');
Route::get('/isihalaman', 'App\Http\Controllers\PesertaController@isiHalaman')->name('isiHalaman');
Route::post('/tambahpeserta', 'App\Http\Controllers\PesertaController@store')->name('tambahpeserta');
Route::get('/tambahpeserta/{nik}', 'App\Http\Controllers\PesertaController@aftertambah')->name('aftertambah');
Route::get('/tambahpeserta/cekstatus/{nik}', 'App\Http\Controllers\PesertaController@cekstatus')->name('cekstatus');

Route::get('/cetak/{id}','App\Http\Controllers\PesertaController@cetak')->name('cetak');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/website', 'App\Http\Controllers\WebsiteController@index')->name('website');
Route::put('/website/update/{id}', 'App\Http\Controllers\WebsiteController@update')->name('website.update');

Route::group(['namespace' => 'App\Http\Controllers\Profile'], function (){ 
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile/update/profile/{id}', 'ProfileController@updateProfile')->name('profile.update.profile');
	Route::put('/profile/update/password/{id}', 'ProfileController@updatePassword')->name('profile.update.password');
	Route::put('/profile/update/avatar/{id}', 'ProfileController@updateAvatar')->name('profile.update.avatar');
});
Route::group(['namespace' => 'App\Http\Controllers\Vaksin'], function (){ 
	Route::get('/vaksin', 'VaksinController@index')->name('vaksin');
	Route::post('vaksin/tambah','VaksinController@store')->name('vaksin.tambah');
	Route::get('vaksin/{id}/edit','VaksinController@edit')->name('vaksin.edit');
	Route::delete('vaksin/tambah/{id}','VaksinController@destroy')->name('vaksin.destroy');
});


Route::resource('pasien','App\Http\Controllers\Pasien\PasienController');
Route::group(['namespace' => 'App\Http\Controllers\Error'], function (){ 
	Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
});

Route::group(['namespace' => 'App\Http\Controllers\User'], function (){ 
	//Users
	Route::get('/user', 'UserController@index')->name('user');
	Route::get('/user/create', 'UserController@create')->name('user.create');
	Route::post('/user/store', 'UserController@store')->name('user.store');
	Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
	Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
	Route::get('/user/edit/password/{id}', 'UserController@editPassword')->name('user.edit.password');
	Route::put('/user/update/password/{id}', 'UserController@updatePassword')->name('user.update.password');
	Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
	Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
	// Roles
	Route::get('/role', 'RoleController@index')->name('role');
	Route::get('/role/create', 'RoleController@create')->name('role.create');
	Route::post('/role/store', 'RoleController@store')->name('role.store');
	Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
	Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
	Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
	Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
});