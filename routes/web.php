<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/guest/home', function () {
    return Inertia::render('Guest/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/guest/about-us', function () {
    return Inertia::render('Guest/AboutUs')->name('about-us');
});
Route::get('/guest/adopt', function () {
    return Inertia::render('Guest/Adopt');
});
Route::get('/guest/volunteer', function () {
    return Inertia::render('Guest/Volunteer');
});
Route::get('/guest/ways-to-help', function () {
    return Inertia::render('Guest/WaysToHelp');
});
Route::get('/guest/contact-us', function () {
    return Inertia::render('Guest/ContactUs');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
