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

Route::get('/', function () {
    return Inertia::render('Guest/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('home', function () {
    return Inertia::render('Guest/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('about-us', function () {
    return Inertia::render('Guest/AboutUs');
})->name('about-us');

Route::get('adopt', function () {
    $cats = Cat::all();
    return Inertia::render('Guest/Adopt', [
        'cats' => $cats->map(function ($cat) {
            return [
                'id' => $cat->id,
                'name' => $cat->name,
                'gender' => $cat->gender,
                'age_category' => $cat->age_category,
                'tags' => $cat->tags,
                'color' => $cat->color,
                'image_path' => asset('storage/' . $cat->image_path),
            ];
        })
    ]);
})->name('adopt');

Route::get('volunteer', function () {
    return Inertia::render('Guest/Volunteer');
})->name('volunteer');

Route::get('ways-to-help', function () {
    return Inertia::render('Guest/WaysToHelp');
})->name('ways-to-help');

Route::get('contact-us', function () {
    return Inertia::render('Guest/ContactUs');
})->name('contact-us');

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
