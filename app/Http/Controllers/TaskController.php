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
    //Update the data of the task
    public function taskUpdate(Request $req)
    {

        //if the name is not empty, change the name
        if($req->newName != "") {
            Task::findOrFail($req->id)->update(['name'=>$req->newName]);
        }

        //if the text is not empty, change the text
        if($req->newText!= "") {
            Task::findOrFail($req->id)>update(['name'=>$req->newText]);
        }
    }

    //Create a task that belongs to the User
    public function taskCreate(Request $req)
    {
        //Adding a new task to the authenticated user!
        User::findOrFail(Auth::user()->id)->tasks()->create(['name'=>$req->name,'text'=>$req->text,'status'=>'Pending']);
    }
}
