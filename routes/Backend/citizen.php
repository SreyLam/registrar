<?php
/**
 * Created by PhpStorm.
 * User: Sreylam
 * Date: 2/5/2018
 * Time: 11:57 PM
 */
Route::get('/citizen', 'CitizenController@getList_citizen')->name('citizen');
Route::get('/add_citizen', 'CitizenController@getCitizen');
Route::post('/add-citizen', 'CitizenController@storeCitizen');
Route::get('/delete_citizen','CitizenController@getDelete');
//Route::get('/edit_comm/{id}','CitizenController@getEdit_comm')->name('commune.datatable');
//Route::put('/post_editcomm/{id}','CitizenController@postStore_comm');
Route::post('/get_citizen_datatable','CitizenController@getCitizenDatatable')->name('citizen.datatable');
