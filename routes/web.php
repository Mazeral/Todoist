<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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
//route for the main page, mind the status of the user
Route::get(
    '/', function () {
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
//Route for redering the sign in page:
Route::get('login', [LoginController::class,'create'])->name('login');

//Route for signing in
Route::post('login', [LoginController::class,'store']);
//Route for signing up
Route::post('register', [RegisterController::class,'create']);
//Route for the task lists
Route::get('tasks', [TaskController::class,'getTasks']);
//Post request for adding a task, another for editing edit, last one for deleting
Route::post('tasks', [TaskController::class,'setTask']);
//The filtering will be handled on the front end

Route::get(
    '/dashboard', function () {
        return Inertia::render('Dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');
//Protecting these unction with the authenticated checker
Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    }
);
//A route to return the profile page?
Route::get(
    '/profile', function () {
        /*If the user is authenticated, show the profile page, else redirect*/
    }
);
//The fallback route is the route that catches all the e404 and returns a certain routj
Route::fallback(
    function () {
        return redirect('/home');
    }
);
//Routes for testing the pages!
Route::get(
    '/HomePage', function () {
        return inertia('HomePage');
    }
);
//Route for the register card!!
Route::get(
    '/RegisterTest', function () {
        return inertia('RegisterTest');
    }
);
Route::get(
    '/Tasktest', function () {
        return inertia('Task');
    }
);
Route::get(
    '/profiletest', function () {
        return inertia('Profile');
    }
);
Route::get(
    '/footertest', function () {
        return inertia('Footer');
    }
);
require __DIR__.'/auth.php';
