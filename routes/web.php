<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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

//Route for the home page of the app
Route::get(
    "HomePage", [RedirectController::class,"checkAndRedirect"]
)->name('HomePage');

//Route for the register page
Route::get(
    'RegisterPage', function () {
        return inertia("RegisterPage");
    }
)->name('RegisterPage');


//Route for the POST request of the sign in
Route::post(
    "signin", [UserController::class,"signin"]
)->name('signin');

//Route for creating a new user:
Route::post('register', [UserController::class,"store"])->name('register');

//Route for previewing the tasks of a user
Route::get('tasks', [UserController::class,"getTasks"])->name('tasks');

//Route to signout
Route::post('signout', [AuthController::class,'signout'])->name('signout');

//Route to filter the tasks
require __DIR__.'/auth.php';
