<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class TaskController extends Controller
{
    //There are all functions in the end, they just make the code
    //look bette when you are writing
    public function __construct(){
        $this->middleware('auth');
    }
    public function getTasks($id)
    {
        $user = User::findOrFail($id);
        return user->tasks;
    }
    /*function to update the task, depending on the data provided*/
    public function updateTasks($user_id,$task_id,$title,$text,$status)
    {
        //Finding the user and the task
        $user = User::findOrFail($user_id);
        $task = Task::findOrFail($task_id)
        //If a given request exists: change it, else don't do anything
        if(request($title)) {
            $task->title = request($title);
        }
        if(request($text)) {
            $task->text = request($text);
        }
        if(request($status)) {
            $task->status = request($status);
        }
        return {"Successfully updated the task"};
    }

    /*Function to create a task*/

    public function setTask($id,$title,$text,$status)
    {
        $user = User::findOrFail($id);
        $task = new Task(['title'=>$title,'text'=>$text,'status'=>$status]);
        $user->tasks()->save($task);
    }

    /*Function to delete a task*/

    public function deleteTask($user_id,$task_id)
    {
        $user = User::find($user_id);
        $user->tasks()->whereId($task_id)->delete();
    }

    /*Function to delete all the tasks*/
    public function deleteAllTask($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->tasks()->delete();
    }
}
