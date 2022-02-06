<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Airline;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use App\Models\Ticket;

class AirlineController extends Controller
{
public function airline_create(Request $request){
if (! Gate::allows('super-admin')) {
            abort(403);
        }
$validated = request()->validate([
  'type' => 'required',
    'airline' => 'required',

 
  
]);
$add=Airline::create([
  'airline' => $validated['airline'],
    'type' => $validated['type']

  
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
    $airlines=Airline::all('airline','id','type');
    return view('admin.airline.airline-show')->with('airlines',$airlines);
}
 
 public function airline_edit($id){

   if (! Gate::allows('super-admin')) {
            abort(403);
        }
    $airlines=Airline::findorfail($id);
    if($airlines!= null){

    return view('admin.airline.airline-edit')->with('airline',$airlines);
    }
 }
 public function airline_update(Request $request ,$id){
    
if (! Gate::allows('super-admin')) {
            abort(403);
        }
$airline=Airline::find($id);
if($airline){
$validated = request()->validate([
   'airline' => ['required', 'string', 'max:255'],
      'type' => ['required', 'string', 'max:255'],

           
]);

$airline->airline = $validated['airline'];
$airline->type = $validated['type'];


$airline->save();
Session::flash('success', 'Airline is updated successfully'); 

 return redirect()->route('airline.show');
}
else{
    Session::flash('warning', 'Airline is not updated '); 
 return redirect()->route('airline.show');

}
}


public function airline_delete($id){
if (! Gate::allows('super-admin')) {
            abort(403);
        }





$airline = Airline:: find($id);

if($airline->ticket()->count()>0){
return redirect()->back()->with(['warning'=> 'Sorry you cannot delete the parent node']);
}



if($airline != null)
{
$airline->delete();
Session::flash('info', 'Airline is deleted successfully'); 

return redirect()->back()->with(['message'=> 'Successfully deleted!']);
}
}

public function domestic_all(){
$tickets =Ticket::whereHas('airline', function ($query) {
        $query->where('type','=','Domestic');
    })
    ->with('user','airline')
    ->get();


    return view('admin.ticket.ticket-confirm')->with('tickets',$tickets);

}
public function international_all(){
 
$tickets =Ticket::whereHas('airline', function ($query) {
        $query->where('type','=','International');
    })
    ->with('user','airline')
    ->get();


    return view('admin.ticket.ticket-confirm')->with('tickets',$tickets);

}


}