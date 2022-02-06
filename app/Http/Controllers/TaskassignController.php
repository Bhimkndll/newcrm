<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Purpose;
use App\Models\Client;
use App\Models\Taskassign;

use App\Models\Department;
use Illuminate\Http\Request;

class TaskassignController extends Controller
{
    public function show($id){
        dd('sdfsdf');
      $client=Client::findorfail($id);


        $users=User::all('id','name');
        $departs=Department::all('id','department');
        $purposes=Purpose::all('id','name');
        return view('admin.taskassign.task-add')->with(compact('users','departs','purposes','client'));
    }



public function add(Request $request,$id){
/*user role*/
$client=Client::findorfail($id);
$validated = request()->validate([
    'department'=>'required',
        'user'=>'required',
         'purpose' => 'required',
          'reason'=>'nullable|string|min:4'
  ]);
Taskassign::create([
    'department_id'=> $validated['department'],
    'user_id'=> $validated['user'],
    'client_id'=> $client->id,
    'purpose_id' => $validated['purpose'],
    'status'=>"pending",
    'reason'=>$validated['reason'],
]);
$user=User::findorfail($validated['user']);
    return redirect()->route('client.show')->with('success','Task assign successfully to  '.$user->name);

}





}
