<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('get-hosting1', 'HomeController@getHosting1');
Route::get('get-hosting2', 'HomeController@getHosting2');
