<?php
/**
 * Created by PhpStorm.
 * User: Sreylam
 * Date: 1/22/2018
 * Time: 9:29 PM
 */
Route::get('/commune', 'CommuneController@getList_comm')->name('commune');
Route::get('/add_commune', 'CommuneController@getComm');
Route::post('/add-commne', 'CommuneController@storeComm');
Route::get('{commune_id}/delete_comm','CommuneController@getDelete');
Route::get('communes/{id}/edit_commune','CommuneController@getEdit_comm')->name('commune.datatable');
Route::put('/post_editcomm/{id}','CommuneController@postStore_comm');
Route::post('/get_commune_datatable','CommuneController@getCommDatatable')->name('commune.datatable');
