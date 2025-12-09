<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::view('/treatments', 'pages.treatments')->name('treatment.programs');