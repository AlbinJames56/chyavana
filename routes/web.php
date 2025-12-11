<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\OurHealersController;
use App\Http\Controllers\OurStoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::view('/treatments', 'pages.treatments')->name('treatment.programs');

Route::view('/contact', 'pages.get-started')->name('Get Started');

Route::get('/pain-relief', [App\Http\Controllers\PainReliefController::class, 'index']);
Route::get('/OurHealers', [OurHealersController::class, 'index']);

Route::get('/our-story', [OurStoryController::class, 'index'])->name('our-story');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
