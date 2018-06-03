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

Route::get('/', function() {
  if (Auth::check()) {
    if (Entrust::hasRole('root')) {
      return redirect()->route('cloud_index');
    } else {
      return redirect()->route('ekstrakurikuler_index');
    }
  } else {
    return redirect()->route('get_login');
  }
});

Route::group(['namespace' => 'Auth'], function() {
  Route::get('/login', 'LoginController@get_login')->name('get_login');
  Route::post('/login', 'LoginController@post_login')->name('post_login');
  Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function() {
  Route::group(['middleware' => 'role:root'], function() {
    Route::group(['prefix' => 'cloud'], function() {
      Route::get('/', 'CloudController@index')->name('cloud_index');
      Route::get('/create', 'CloudController@create')->name('cloud_create');
      Route::post('/store', 'CloudController@store')->name('cloud_store');
      Route::get('/edit/{id}', 'CloudController@edit')->name('cloud_edit');
      Route::post('/update', 'CloudController@update')->name('cloud_update');
      Route::get('/delete/{id}', 'CloudController@delete')->name('cloud_delete');
    });

    Route::group(['prefix' => 'admin'], function() {
      Route::get('/', 'AdminController@index')->name('admin_index');
      Route::get('/create', 'AdminController@create')->name('admin_create');
      Route::post('/store', 'AdminController@store')->name('admin_store');
      Route::get('/edit/{id}', 'AdminController@edit')->name('admin_edit');
      Route::post('/update', 'AdminController@update')->name('admin_update');
      Route::get('/delete/{id}', 'AdminController@delete')->name('admin_delete');
    });
  });

  Route::group(['middleware' => ['role:admin', 'set_database']], function() {
    Route::group(['prefix' => 'ekstrakurikuler'], function() {
      Route::get('/', 'EkstrakurikulerController@index')->name('ekstrakurikuler_index');
      Route::get('/create', 'EkstrakurikulerController@create')->name('ekstrakurikuler_create');
      Route::post('/store', 'EkstrakurikulerController@store')->name('ekstrakurikuler_store');
      Route::get('/edit/{id}', 'EkstrakurikulerController@edit')->name('ekstrakurikuler_edit');
      Route::post('/update', 'EkstrakurikulerController@update')->name('ekstrakurikuler_update');
      Route::get('/delete/{id}', 'EkstrakurikulerController@delete')->name('ekstrakurikuler_delete');
    });

    Route::group(['prefix' => 'siswa'], function() {
      Route::get('/', 'SiswaController@index')->name('siswa_index');
      Route::get('/create', 'SiswaController@create')->name('siswa_create');
      Route::post('/store', 'SiswaController@store')->name('siswa_store');
      Route::get('/edit/{id}', 'SiswaController@edit')->name('siswa_edit');
      Route::post('/update', 'SiswaController@update')->name('siswa_update');
      Route::get('/delete/{id}', 'SiswaController@delete')->name('siswa_delete');
    });
  });
});
