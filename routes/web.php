<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function(){
    return "<h1>All contacts</h1>";
})->name('contacts.index');

Route::get('/contacts/create', function(){
    return "<h1>Add new contact</h1>";
})->name('contacts.create');


Route::get('/contacts/{id}', function($id){
    return App\Models\Contact::find($id);
})->name('contacts.show');