<?php
/**
 * Created by PhpStorm.
 * User: Sreylam
 * Date: 2/6/2018
 * Time: 2:21 PM
 */
Route::get('/image', 'ImageController@getList_image')->name('image');
//Route::get('citizens/{id}/edit_citizen','CitizenController@getEdit_citizen')->name('citizen.datatable');