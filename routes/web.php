<?php

use App\Http\Controllers\AdoptController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VolunteerController;
use App\Models\Adopt;
use App\Models\Cat;
use App\Models\Schedule;
use App\Models\Volunteer;
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
    return Inertia::render('Guest/AboutUs');
})->name('about-us');
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

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('dashboard', function () {
        return Inertia::render('Dashboard', [
            'catCount' => Cat::all()->count(),
            'adoptionCount' => Adopt::all()->count(),
            'scheduleCount' => Schedule::all()->count(),
            'volunteerCount' => Volunteer::all()->count()
        ]);
    })->name('dashboard');


    Route::resource('adopts', AdoptController::class);
    Route::resource('cats', CatController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('volunteers', VolunteerController::class);
});
