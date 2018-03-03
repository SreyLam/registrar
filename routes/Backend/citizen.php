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
Route::get('citizens/{id}/edit_citizen','CitizenController@getEdit_citizen')->name('citizen.datatable');
Route::put('/post_editcitizen/{id}','CitizenController@postStore_citizen');
Route::post('/get_citizen_datatable','CitizenController@getCitizenDatatable')->name('citizen.datatable');

Route::get('/import_citizen', 'CitizenController@getImport_citizen');
Route::get('downloadExcel/{type}', 'CitizenController@downloadExcel');
Route::post('importExcel', 'CitizenController@importExcel');

Route::get('/', 'CitizenController@search');