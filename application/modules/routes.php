<?php 

// Routes are defined here
Route::set('','homepage@loginPage');
Route::post('', 'homepage@formHandler');


Route::set('dashboard','homepage@dashboard');
Route::set('dashboard/logout','homepage@logout');

Route::post('api/createTask', 'api@createTask');