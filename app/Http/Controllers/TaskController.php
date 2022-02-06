<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taskassign;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function show(){
/*if (! Gate::allows('admin')) {
            abort(403);
        }*/

$users=User::all('id','name');

$tasks=Taskassign::with('client','department','purpose')->get();
/*$clients=Client::with('taskassign','department')->get();
*/
return view('admin.task.task')->with(compact('tasks','users'));
}

    /*for specific client task*/
    public function mytask(){
    if (! Gate::allows('admin')) {
            abort(403);
        }
      $tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id(),'status'=>"Pending"])->get();
      return view('admin.mytask.mytask')->with('tasks',$tasks);  
}




public function alltask($id){

    if (! Gate::allows('admin')) {
            abort(403);
        }
if($id=="Completed"){
$tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id(),'status'=>$id])->get();
return view('admin.mytask.alltask')->with('tasks',$tasks);    
}
else {
    abort(404);

}

}
public function all($id){

    if (! Gate::allows('admin')) {
            abort(403);
        }
if($id=="All"){

$tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id()])->get();
return view('admin.mytask.alltask',compact('tasks'));    
}
elseif(in_array($id,array('Pending','Completed','Cancelled','Processing')))
{ 
 $tasks=Taskassign::with('user','department','client')->where(['user_id'=>Auth::id(),'status'=>$id])->get();
return view('admin.mytask.alltask',compact('tasks'));       
}
else{
abort(404);
}
}
public function complete($id){
    if (! Gate::allows('admin')) {
            abort(403);
        }
$task=Taskassign::findorfail($id);
$task->status = "Completed";
$task->save();
return redirect()->back()->with('success','Task marked as completed');
}
public function cancel($id){
if (! Gate::allows('admin')) {
            abort(403);
        }

$task=Taskassign::findorfail($id);
$task->status = "Cancelled";
$task->save();
return redirect()->back()->with('success','Task marked as cancel');

}
public function processing($id){

if (! Gate::allows('admin')) {
            abort(403);
        }
$task=Taskassign::findorfail($id);
$task->status = "processing";
$task->save();
return redirect()->back()->with('success','Task marked as Processing');

}

public function pending($id){
if (! Gate::allows('admin')) {
abort(403);
        }
$task=Taskassign::findorfail($id);
$task->status = "Pending";
$task->save();
return redirect()->back()->with('success','Task marked as Pending');
}


public function task_reason_status(Request $request){

if (! Gate::allows('admin')) {
            abort(403);
        }
$validated = request()->validate([
  'task_id' => 'required',
  'task_reason'=>'nullable|string|min:4',
  'status'=>'required'
 ]);

$task=Taskassign::findorfail($validated['task_id']);
$task->task_reason = $validated['task_reason'];
$task->status = $validated['status'];
$task->save();
return redirect()->back()->with('success','Task marked as ' .$validated['status']);


}
public function pending_reason(){

dd("sldkjflsd");

}
public function cancel_reason(){

dd("sldkjflsd");

}public function processing_reason(){

dd("sldkjflsd");

}
}