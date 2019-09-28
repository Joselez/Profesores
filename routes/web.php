<?php

Route::resource('/', 'ProfesorController',array('names' => array('index' => 'profesor')));

Route::post('store', 'ProfesorController@store')->name('storeprof');

Route::patch('updateprof', 'ProfesorController@update')->name('updateprof');

Route::get('crearprofesor', 'ProfesorController@create')->name('crearprofesor');

Route::get('{id}/edit', 'ProfesorController@edit')->name('editprof');

Route::get('localidades', 'ProfesorController@autocompletar')->name('localidades');

