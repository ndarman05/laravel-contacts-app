<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', 'ContactController@index')->name('contacts.index');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');


Route::get('/contacts/{id}', 'ContactController@show')->name('contacts.show');