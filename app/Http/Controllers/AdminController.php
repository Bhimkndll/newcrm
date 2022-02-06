<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
 use Illuminate\Session\Store;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Taskassign;
use App\Models\Attendence;
use Carbon\Carbon;


class AdminController extends Controller
{
public function index(){
    $total=Taskassign::count();
    if($total>0){
    $pending=$this->pending_status($total);
    $complete=$this->complete_status($total);
    $cancel=$this->cancel_status($total);
        $process=$this->process_status($total);

    $departs=Department::all();
   return view('child.dashboard')->with(compact('pending','complete','cancel','process','departs','total'));
    }
    else{
           return view('child.dashboard')->with(compact('total'));

    }

}

/*function to be called during first load of app*/

 function pending_status($total){
$count=Taskassign::where('status','Pending')->count();

 return ($count/$total)*100;

}
 function process_status($total){
$count=Taskassign::where('status','Processing')->count();

 return ($count/$total)*100;

}
 function complete_status($total){
$count=Taskassign::where('status','Completed')->count();

 return ($count/$total)*100;

}
function cancel_status($total){
$count=Taskassign::where('status','Cancelled')->count();

 return ($count/$total)*100;

}
/*end of function to be called during first load*/




public function add(Request $request){
if (! Gate::allows('user')) {
            abort(403);
        }
$validated = request()->validate([
  'fullname' => 'required',
  'address'=>'required',
  'phone' => 'required',
  
]);
$add=Client::create([
  'fullname' => $validated['fullname'],
  'address' => $validated['address'],
    'phone' => $validated['phone'],

]);

if($add){
    return redirect()->back();
}
else{
    return "error";
}


    }




public function users(){


if (! Gate::allows('super-admin')) {
            abort(403);
        }


    $users=User::all('id','name','email','phone','role','address','status')->where('id','!=',Auth::id());
    return view('admin.users.user')->with('users',$users);
 }




public function user_delete($id){
if (! Gate::allows('super-admin')) {
            abort(403);
        }

 $users = User:: find($id);

if($users->taskassign()->count()>0){
return redirect()->back()->with(['warning'=> 'Sorry you cannot delete this user you first delete task done by this user']);
}
if($users != null)
{
$users->delete();
Session::flash('info', 'User is deleted successfully'); 

return redirect()->back()->with(['message'=> 'Successfully deleted!']);
}
 }


 public function user_edit($id){
    
if (! Gate::allows('super-admin')) {
            abort(403);
        }
    $user=User::findorfail($id);
    if($user!= null){

    return view('admin.users.user-edit')->with('user',$user);
    }
 }
public function user_update(Request $request ,$id){
    
if (! Gate::allows('super-admin')) {
            abort(403);
        }
$user=User::find($id);
if($user){
$validated = request()->validate([
   'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'password' => $request->input('password') != null?['required', 'string', 'min:8']:'',
            'address'=>['required','string','max:25','min:2'],
            'phone'=>['required','string','min:10','max:10'],
            'role'=>['required']

]);

$user->name = $validated['name'];
$user->email = $validated['email'];
$user->address= $validated['address'];

$user->phone = $validated['phone'];
$user->role =  $validated['role'];
$request->input('password') != null?$user->password= Hash::make($validated['password'])
:'';
$user->save();
Session::flash('success', 'User is updated successfully'); 

 return redirect()->route('users.show');
}
else{
    Session::flash('warning', 'User is not updated '); 
 return redirect()->route('users.show');

}
}





public function status($id){

    $user=User::findorfail($id);

    if($user->role=='level3'){
        return redirect()->back()->with('error','You are super admin you cannot perform this');
    }

    $user->status=!$user->status;
    $user->save();
    return redirect()->back();
}




public function tabs(){
        return view('child.tabs');
    }


    public function need_revive(){
        
if (! Gate::allows('super-admin')) {
            abort(403);
        }
    $dusers=Attendence::with('user')->whereDate('exit_time', Carbon::today())->get();
    if(Attendence::whereDate('exit_time', Carbon::today())->exists()){
return view('admin.revive.reviveuser')->with(compact('dusers'));
    }else{
        Session::flash('warning','Every user are alive and can work');
        return redirect()->back();
    }

    }
public function revive($id){


if (! Gate::allows('super-admin')) {
            abort(403);
        }

    $rev=Attendence::findorfail($id);
    $rev->exit_time=Null;
    $rev->save();
    
    return redirect()->route('dashboard')->with('success','User is revive successfully, Now he can work');
    }







}
