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

use App\NewTours;
Route::get('/', function () {
	$newTours = NewTours::where('tinh_trang', '=', 'Chưa có HDV')
		->latest($column = 'created_at')
		->take(10)
		->get();
	return view('welcome', compact('newTours'));
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('HdvProfile', 'HdvProfileController@getData');
Route::get('HdvProfile/update', 'HdvProfileController@getDataUpdate');
Route::post('HdvProfile/update', array('before' => 'csrf', 'uses' => 'HdvProfileController@updateData'));
Route::get('HdvAdvancedSearch', 'HdvSearchController@hdvGetFormSearch');
Route::get('HdvAdvancedSearch/result', 'HdvSearchController@advancedSearch');
Route::get('notUser','HdvSearchController@notUser');
Route::get('Cty/{id}','HdvSearchController@getCty');
Route::get('Tour/{id}','HdvSearchController@getTour');

Route::get('CtyProfile', 'CtyProfileController@getData');
Route::post('CtyProfile/update', array('before' => 'csrf', 'uses' => 'CtyProfileController@updateData'));