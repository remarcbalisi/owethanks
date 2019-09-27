<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/apply-loan', function () {
    return view('apply-loan');
});

Route::get('/borrowers', function () {
   return view('borrowers');
});

Route::get('/borrower/schedules', function () {
    $schedules = [];
    $date = now()->addMonth();

    while ($date <= now()->addMonth(6)) {
        $schedules[] = $date->format('M d, Y');

        $date->addMonth();
    }

    return view('schedules', compact('schedules'));
});