<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('dash','DashboardController@dash')->name('dash');
Route::get('supervised_students/{id}','DashboardController@supervised_students')->name('supervised_students');
Route::get('print_report/{id}','DashboardController@print_report');


