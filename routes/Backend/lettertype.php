<?php
/**
 * Created by PhpStorm.
 * User: Sreylam
 * Date: 1/27/2018
 * Time: 11:06 PM
 */
Route::get('/lettertype', 'LetterTypeController@getList_lettertype')->name('lettertype');
Route::get('/add_lettertype', 'LetterTypeController@getLettertype');
Route::post('/add-lettertype', 'LetterTypeController@storeLettertype');
Route::get('/delete_lettertype','LetterTypeController@getDelete');
Route::get('/edit_lettertype/{id}','LetterTypeController@getEdit_lettertype');
Route::put('/post_editlettertype/{id}','LetterTypeController@postStore_lettertype');