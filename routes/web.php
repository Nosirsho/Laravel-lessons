<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/contact/all/{id}/delete', 'ContactController@deleteMessage')->name('contact-delete');
Route::post('/contact/all/{id}/update', 'ContactController@updateMessageSubmit')->name('contact-update-submit');
Route::get('/contact/all/{id}/update', 'ContactController@updateMessage')->name('contact-update');
Route::get('/contact/all/{id}', 'ContactController@showOneMessage')->name('contact-data-one');
Route::get('/contact/all', 'ContactController@allData')->name('contact-data');
Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');
