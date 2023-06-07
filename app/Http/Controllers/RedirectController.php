<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    //
    public function checkAndRedirect()
    {
        if(Auth::check()) {
            echo(Auth::check());
            return redirect()->route('tasks');
        }
        return Inertia::render('HomePage');
    }
}
