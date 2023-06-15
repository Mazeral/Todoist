<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    //There are all functions in the end, they just make the code
    //look bette when you are writing
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Change the value of the the task from pending or completed
    public function statusUpdate(Request $req)
    {
        if(Task::findOrFail($req->id)->status == "Pending") {
            Task::findOrFail($req->id)->update(["status" => "Completed"]);
        } else {
            Task::findOrFail($req->id)->update(["status" => "Pending"]);
        }
    }
}
