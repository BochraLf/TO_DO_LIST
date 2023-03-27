<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    function getTask(){
        $tasks= Task::all() ;
        return $tasks ;

    }
    function addTask(Request $request){
        $task = new Task() ;
        $task->name =  $request->new_name ; 
        $task->done = false;
        $task->save();
    } 
    function destroy($id){
        $task=Task::find($id);
        if ($task){
            $task->delete(); 
            return response()->json([
                'status'=>200,
                'message'=>'task deleted',
            ],200);
        }
        else 
        { 
            return response()->json([
                'status'=>404,
                'message'=>'No task found',
            ],404);
        }    
    } 
}

