<?php
/**
 * Created by PhpStorm.
 * User: Sreylam
 * Date: 1/27/2018
 * Time: 11:05 PM
 */
Route::get('/type', 'TypeController@getList_type')->name('type');
Route::get('/add_type', 'TypeController@getType');
Route::post('/add-type', 'TypeController@storeType');
Route::get('/delete_type','TypeController@getDelete');
Route::get('/edit_type/{id}','TypeController@getEdit_type');
Route::put('/post_edittype/{id}','TypeController@postStore_type');