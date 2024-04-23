<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;

class taskController extends Controller
{
   public function tasks(){
      $tasks = project::latest()->paginate(4);
    return view ('taskView',compact('tasks'));
   }
// add task..
public function addTask(Request $req){
   $req->validate(
      [
   'title'=>'required |unique:projects',
   'description'=>'required',
      ],
      [
         'title.required'=>'Title is Required',
         'title.unique'=>'Task Already Exists',
         'description.required'=>'Description is Requierd',       

      ]
      );

      $task = new project;

      $task->title = $req->title;
      $task->description = $req->description;
      $task->save();
      return response()->json([
       'status'=>'success',
      ]);

}
// update_task/////
public function updateTask(Request $req){
   $req->validate(
      [
   'up_title'=>'required |unique:projects,title,'.$req->up_id,
   'up_description'=>'required',
      ],
      [
         'up_title.required'=>'Title is Required',
         'up_title.unique'=>'Task Already Exists',
         'up_description.required'=>'Description is Requierd',       

      ]
      );
project::where('id',$req->up_id)->update([
  'title'=>$req->up_title,
  'description'=>$req->up_,

]);
      return response()->json([
       'status'=>'success',
      ]);
}


public function deleteProduct(Request $req){
   project::find($req->delete_id)->delete();
   return response()->json([
      'status'=>'success',
     ]);

}
public function pagination(Request $req){
   $tasks = project::latest()->paginate(4);
    return view ('pagination_tasks',compact('tasks'))->render();
   }

   // search_task

public function searchTask(Request $req){
  $task = project::where('title','like','%'.$req->search_string.'%')->orderBy('id','desc')->paginate(4);

  if($tasks->count()>=1){
   return view ('pagination_tasks',compact('tasks'))->render();
  }else{
   return \response()->json([
      'status'=>'Nothing_Found'
   ]);
  }
}


}



