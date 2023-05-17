<?php

use App\Http\Controllers\ProfileController;
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

Route::get(
    '/', function () {
        sleep(2);
        return Inertia::render(
            'Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            ]
        );
    }
);

Route::get(
    '/dashboard', function () {
        sleep(2);
        return Inertia::render('Dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    }
);
Route::get(
    '/home', function () {
        if(/*Is authenticaten*/ Auth::check()) {
            /*Show the proper things*/
            Inertia::render('HomeView', $props);
        }
        else /*redirect to the sign in or singup page, make it global*/
        {

        }
    }
);
Route::get(
    '/profile', function () {
        /*If the user is authenticated, show the profile page, else redirect*/
    }
);
Route::fallback(
    function () {
        return redirect('/home');
    }
);
require __DIR__.'/auth.php';
