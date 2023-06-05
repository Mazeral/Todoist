<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

/*Created the UserContorller funciton instead of the Profile
 *
 *
 * */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate!:
        $validatedData = $request->validate(
            [
            'name' => 'requried',
            'email' => 'requried|email|unique:users,email',
            'password' => 'requried|min:8',
            ]
        );
        $validatedData['password'] = bcrypt($validatedData['password']);
        //the create function is provided by default under the hood
        User::create($validatedData);
        return redirect("HomePage");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //creating a new function for sign in
    public function signin(Request $req)
    {
        $credentials = $req->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect("HomePage");
        }
    }
}
