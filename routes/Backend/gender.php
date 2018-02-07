<?php
/**
 * Created by PhpStorm.
 * User: Sreylam
 * Date: 1/27/2018
 * Time: 11:05 PM
 */
Route::get('/gender', 'GenderController@getList_gender')->name('gender');
Route::get('/add_gender', 'GenderController@getGender');
Route::post('/add-gender', 'GenderController@storeGender');
Route::get('/delete_gender','GenderController@getDelete');
Route::get('/edit_gender/{id}','GenderController@getEdit_gender');
Route::put('/post_editgender/{id}','GenderController@postStore_gender');