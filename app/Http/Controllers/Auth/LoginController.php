<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\RedirectResponse;
/*Controller used for login*/
class LoginController extends Controller
{
    /**
     * Function to authenticate the user
     */
    public function store(Request $request)
    {
        $credentials = $request->validate(
            [
            'email' => ['required', 'email'],
            'password' => ['required'],
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors(
            [
            'email' => 'The provided credentials do not match our records.',
            ]
        )->onlyInput('email');
    }
    //Function to render the view of login
    public function create()
    {
        return Inertia::render('');
    }
}
