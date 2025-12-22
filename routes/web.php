<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurHealersController;
use App\Http\Controllers\OurStoryController;
use App\Http\Controllers\PainReliefController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/treatments', 'pages.treatments')->name('treatment.programs');

Route::view('/contact', 'pages.get-started')->name('Get Started');

Route::get('/pain-relief', [App\Http\Controllers\PainReliefController::class, 'index']);

Route::get('/pain-techniques/{slug}', [PainReliefController::class, 'show'])
    ->name('pain-techniques.show');

Route::get('/OurHealers', [OurHealersController::class, 'index']);
Route::get('/OurHealers/{slug}', [OurHealersController::class, 'show'])->name('healers.show');

Route::get('/our-story', [OurStoryController::class, 'index'])->name('our-story');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/treatments', [TreatmentController::class, 'index'])->name('treatment.programs');

Route::get('/treatments/{slug}', [TreatmentController::class, 'show'])->name('treatment.show');

Route::post('/appointments', [AppointmentController::class, 'store'])
    ->name('appointments.store');
