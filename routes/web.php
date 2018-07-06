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
Route::get('login','UserController@getlogin');
Route::post('login','UserController@postlogin');
Route::get('logout','UserController@logout');

Route::group(['middleware' =>'login'], function () {

	Route::get('/','PagesController@index')->name('index');
	Route::get('trangchu','PagesController@index');

	Route::get('datban/{maban}','PagesController@datban');
	Route::get('suaban/{maban}','PagesController@suaban')->name('suaban');
	Route::get('suaban/xoa/{id}','PagesController@suabanxoahh');
	Route::post('insertdatmon/{mahh}','PagesController@insertdatmon');
	Route::get('thanhtoan/{id_datmon}','PagesController@thanhtoan');

	Route::get('hanghoa','PagesController@hanghoa')->name('hanghoaindex');
	Route::post('inserthanghoa','PagesController@inserthanghoa');
	Route::get('hanghoa/sua/{mahh}','PagesController@getsuahanghoa');
	Route::post('hanghoa/sua/{mahh}','PagesController@postsuahanghoa');

	Route::get('nhomhanghoa','PagesController@nhomhanghoa')->name('nhomhanghoaindex');
	Route::post('insertnhomhanghoa','PagesController@insertnhomhanghoa');
	Route::get('nhomhanghoa/sua/{manhomhh}','PagesController@getsuanhomhanghoa');
	Route::post('nhomhanghoa/sua/{manhomhh}','PagesController@postsuanhomhanghoa');

	Route::get('dinhluong','PagesController@dinhluong');
	Route::get('dinhluong/sua/{mahh_tp}','PagesController@suadinhluong')->name('dinhluongsua');
	Route::post('insertdinhluong/{mahh}','PagesController@insertdinhluong');
	Route::get('dinhluong/xoa/{id}','PagesController@xoadinhluong');
	Route::get('dinhluong/them/{mahh_tp}','PagesController@themdinhluong');

	Route::get('kho','PagesController@kho');

	Route::get('nhapkho','PagesController@nhapkho');
});

