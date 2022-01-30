<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Purpose;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class PurposeController extends Controller
{
      public function add(Request $request){
        if (! Gate::allows('super-admin')) {
            abort(403);
        }

$validated = request()->validate([
  'name' => 'required',
 
  
]);
$add=Purpose::create([
  'name' => $validated['name'],
  
]);

if($add){
    Session::flash('success','Successfully inserted');
    return redirect()->back();
}
else{
    
        Session::flash('error','error occurred');
    }}

public function show(){
    if (! Gate::allows('super-admin')) {
            abort(403);
        }
    $purposes=Purpose::all('name','id');
    return view('admin.purpose.Purpose')->with('purposes',$purposes);
}

public function purpose_delete($id){
    if (! Gate::allows('super-admin')) {
            abort(403);
        }
 $pur = Purpose:: findorfail($id);
 

if($pur->taskassign()->count()>0){
return redirect()->back()->with(['warning'=> 'Sorry you cannot delete this you should remove task first ']);
}

if($pur != null)
{
$pur->delete();

return redirect()->back()->with(['info'=> 'Purpose Successfully deleted!']);
}
 }


 public function purpose_edit($id){
    if (! Gate::allows('super-admin')) {
            abort(403);
        }
    $purpose=Purpose::findorfail($id);
    if($purpose!= null){

    return view('admin.purpose.purpose-edit')->with('purpose',$purpose);
    }
 }

public function purpose_update(Request $request ,$id){
$Purpose=Purpose::find($id);
if($Purpose){
$validated = request()->validate([
   'name' => ['required', 'string', 'max:255'],
           
]);

$Purpose->name = $validated['name'];

$Purpose->save();
Session::flash('success', 'Purpose is updated successfully'); 

 return redirect()->route('purpose.show');
}
else{
    Session::flash('warning', 'Purpose is not updated '); 
 return redirect()->route('Purpose.show');

}
}











}
