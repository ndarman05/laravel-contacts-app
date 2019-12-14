<?php

Route::get('/', function () {
    return view('welcome');
})->name('index.page');

Route::get('/contacts', 'ContactController@index')->name('contacts.index');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

Route::get('/contacts/{id}/edit', 'ContactController@edit')->name('contacts.edit');

Route::put('/contacts/{id}/edit', 'ContactController@update')->name('contacts.update');

Route::delete('/contacts/{id}', 'ContactController@destroy')->name('contacts.destroy');

Route::post('/contacts', 'ContactController@store')->name('contacts.store');

Route::get('/contacts/{id}', 'ContactController@show')->name('contacts.show');