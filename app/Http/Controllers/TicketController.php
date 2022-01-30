<?php
namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Auth;

class TicketController extends Controller
{
    public function index(){

        return view('admin.ticket.ticket');
    }
public function client_show(){
     $departs=Department::all('id','department');
   $clients=Client::with('department')->get();
    return view('admin.ticket.ticket-client')->with(compact('clients','departs'));
   }

    public function ticket_select($id){
       if (! Gate::allows('admin')) {
            abort(403);
        }


$client=Client::findorfail($id);

$client->ticket=1;
$client->save();

return view('admin.ticket.ticket-booking')->with('client',$client);
}

    public function ticket_booking(Request $request ,$id){


 if (! Gate::allows('admin')) {
            abort(403);
        }

$projectExists =  Client::where('id', $id)->exists();/*for exception handling*/
abort_unless($projectExists, 404, ' Client not found');

$validated = request()->validate([
  'date' => 'required',
  'departure'=>'required',
  'time' => 'required',
    'description' => 'sometimes',
'destination'=>'required',
/*  'department'=>'required'
*/]);
$ticket=Ticket::create([
  'user_id'=>Auth::id(),
  'date' => $validated['date'],
  'departure' => $validated['departure'],
    'destination' => $validated['destination'],
    'description' => $validated['description'],
    'time' =>Carbon::parse($validated['time'])->format('h:i:s'),



    'client_id' =>$id,

]);
    return redirect()->route('ticket')->with('success','Ticket has been booked Successfully');
}








public function ticket_confirm(){
   /*if (! Gate::allows('admin')) {
            abort(403);
        }*/
    $tickets=Ticket::with('user')->get();
    return view('admin.ticket.ticket-confirm')->with('tickets',$tickets);
}
public function ticket_confirm_today(){

/*ticket user role*/
    $tickets=Ticket::whereDate('date', date('Y-m-d'))->get();

    return view('admin.ticket.ticket-confirm')->with('tickets',$tickets);
}
public function ticket_delete($id){
   if (! Gate::allows('super-admin')) {
            abort(403);
        }

$ticket=Ticket::findorfail($id);

return view('admin.ticket.ticket_update')->with('ticket',$ticket);

}
public function ticket_update($id){
   if (! Gate::allows('admin')) {
            abort(403);
        }


$ticket=Ticket::findorfail($id);

return view('admin.ticket.ticket-update')->with('ticket',$ticket);


}

public function ticket_save(Request $request,$id){

 if (! Gate::allows('admin')) {
            abort(403);
        }


$validated = request()->validate([
  'date' => 'required',
  'departure'=>'required',
  'time' => 'required',
    'description' => 'sometimes',
'destination'=>'required',
/*  'department'=>'required'
*/]);

$ticket=Ticket::findorfail($id);
  $ticket->user_id=Auth::id();
  $ticket->date = $validated['date'];
  $ticket->departure = $validated['departure'];
    $ticket->destination = $validated['destination'];
    $ticket->description = $validated['description'];
    $ticket->time=Carbon::parse($validated['time'])->format('h:i:s');
$ticket->client_id=$id;

$ticket->save();
return redirect()->route('ticket')->with('success','Ticket has been updated successfully');

}
public function booked_delete($id){
   if (! Gate::allows('super-admin')) {
            abort(403);
        }

$ticket=Ticket::findorfail($id);

if($ticket != null)
{
$ticket->delete();
return redirect()->back()->with('info','Successfully deleted!');
}

}
}