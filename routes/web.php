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
	$newTours = NewTours::
		latest($column = 'created_at')
		->take(10)
		->get();
	return view('welcome', compact('newTours'));
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

//route mà người vào route chi có quền xem, dki neu can
Route::get('viewInforTour/{tour_id}', 'TourController@getATour');
Route::get('viewInfoCty/{cty_id}', 'CtyProfileController@getCty');
Route::get('viewHDV/{hdv_id}', 'HdvProfileController@getHDV');

//route mà người vào route có quền quản lý - chính chủ
/////hdv
Route::get('HdvProfile', 'HdvProfileController@getData');
Route::get('HdvProfile/update', 'HdvProfileController@getDataUpdate');
Route::post('HdvProfile/update', array('before' => 'csrf', 'uses' => 'HdvProfileController@updateData'));
Route::post('dkTour/insert', array('before' => 'csrf', 'uses' => 'TourController@insertHDVTour'));
Route::get('huydkTour/delete', 'TourController@deleteHDVTour');
////cty
Route::get('CtyProfile', 'CtyProfileController@getData');
Route::post('CtyProfile/update', array('before' => 'csrf', 'uses' => 'CtyProfileController@updateData'));
Route::get('makeTour', 'CtyProfileController@makeTour');
Route::get('madeTour', 'TourController@madeTour');
Route::post('makeTour/insert', array('before' => 'csrf', 'uses' => 'TourController@insertData'));
Route::get('editTour', 'TourController@getDataForUpdate');
Route::post('editTour/update', array('before' => 'csrf', 'uses' => 'TourController@updateData'));
Route::get('cancleTour', 'TourController@updateTinhTrang');
Route::get('viewTour', 'TourController@getTour');
Route::get('viewAppliedTour', 'TourController@getAppliedTour');
Route::get('respond', 'TourController@getHDVDKTour');
Route::get('respondHDV/update', 'TourController@updateHDVTour');
Route::get('thongBaoHDV', 'TourController@getThongBaoHDV');
//route tìm kiếm
/////hdv-luat da lam
Route::get('hdvBasicSearch', 'BasicSearchController@basicSearch');
////cty-hung da lam
Route::get('CtyBasicSearch', 'CtySearchController@basicSearch');
Route::get('notUser', 'CtySearchController@notUser');
///route can lam
////hung
Route::get('ctySearchTour', 'CtySearchController@getSearchTourForm');
Route::get('ctySearchHDV', 'CtySearchController@getSearchHDVForm');
Route::get('CtyTourSearch', 'CtySearchController@searchTour');
Route::get('CtyHDVSearch', 'CtySearchController@searchHDV');
Route::get('ViewTourDetail/{id}', 'TourController@viewDetail');
Route::get('InviteHDV/{id}', 'TourController@getTourtoInvite');
Route::post('SendInvitation', array('before' => 'csrf', 'uses' => 'TourController@sendInvitation'));
//Route::get('ctySearchHDV',
////luat
Route::get('hdvSearchTour', 'HdvSearchController@hdvGetFormSearchTour');
Route::get('hdvSearchCty', 'HdvSearchController@hdvGetFormSearchCty');
Route::get('hdvSearchCty/result', 'HdvSearchController@advancedSearch');
Route::get('hdvSearchTour/result', 'HdvSearchController@advancedSearch');
