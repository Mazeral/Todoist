<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\UserController;
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
    "HomePage", function () {
        sleep(2);
        return inertia("HomePage");
    }
);

//Route for the register page
Route::get(
    'RegisterPage', function () {
        return inertia("RegisterPage");
    }
);


//Route for the POST request of the sign in
Route::post(
    "signin", [UserController::class,"signin"]
);

//Route for creating a new user:
Route::post('register', [UserController::class,"store"]);

require __DIR__.'/auth.php';
