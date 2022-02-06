<?php
namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\Airline;

class TicketController extends Controller
{
    public function index(){

$airlines=Airline::all('id','type','airline');
        return view('admin.ticket.ticket')->with('airlines',$airlines);
    }
public function client_show(){
     $departs=Department::all('id','department');
   $clients=Client::with('department')->get();
    return view('admin.ticket.ticket-client')->with(compact('clients','departs'));
   }

    public function ticket_select($id){
       $airlines=Airline::all('id','type','airline');

$client=Client::findorfail($id);

$client->ticket=1;
$client->save();

return view('admin.ticket.ticket-booking')->with(compact('client','airlines'));
}

    public function ticket_booking(Request $request ,$id){

$projectExists =  Client::where('id', $id)->exists();/*for exception handling*/
abort_unless($projectExists, 404, ' Client not found');

$validated = request()->validate([
  'dates' => 'required',
  'departure'=>'required',
  'time' => 'required',
    'description' => 'sometimes',
'destination'=>'required',
'pnr'=>'required|min:6|max:6',
'airline'=>'required',
'ticket'=>'required'
/*  'department'=>'required'
*/]);
$ticket=Ticket::create([
  'user_id'=>Auth::id(),
  'date' => $validated['dates'],
  'departure' => $validated['departure'],
    'destination' => $validated['destination'],
    'description' => $validated['description'],
    'time' =>Carbon::parse($validated['time'])->format('h:i:s'),
    'airline_id' => $validated['airline'],
    'pnr' => $validated['pnr'],
    'ticket_no' => $validated['ticket'],



  'date' => $validated['dates'],


    'client_id' =>$id,

]);
    return redirect()->route('ticket')->with('success','Ticket has been booked Successfully');
}








public function ticket_confirm(){

/*load tickets*/

   /*if (! Gate::allows('admin')) {
            abort(403);
        }*/
    $tickets=Ticket::with('user','airline','client')->get();

    return view('admin.ticket.ticket-confirm')->with('tickets',$tickets);
}
public function ticket_confirm_today(){

/*ticket user role*/
    $tickets=Ticket::whereDate('date', date('Y-m-d'))->with('user','airline','client')->get();
    return view('admin.ticket.ticket-today')->with('tickets',$tickets);
}
public function ticket_delete($id){
   if (! Gate::allows('super-admin')) {
            abort(403);
        }

$ticket=Ticket::findorfail($id);

return view('admin.ticket.ticket_update')->with('ticket',$ticket);

}
public function ticket_update($id){
 

$airlines=Airline::all('id','airline');
$ticket=Ticket::findorfail($id);

return view('admin.ticket.ticket-update')->with(compact('ticket','airlines'));


}

public function ticket_save(Request $request,$id){

 

$validated = request()->validate([
  'date' => 'required',
  'departure'=>'required',
  'time' => 'required',
    'description' => 'sometimes',
'destination'=>'required',
'pnr'=>'required|min:6|max:6',
'airline'=>'required',
'ticket'=>'required'
]);


$ticket=Ticket::findorfail($id);
  $ticket->user_id=Auth::id();
  $ticket->date = $validated['date'];
  $ticket->departure = $validated['departure'];
    $ticket->destination = $validated['destination'];
    $ticket->description = $validated['description'];
    $ticket->pnr=$validated['pnr'];
        $ticket->ticket_no=$validated['ticket'];
            $ticket->airline_id=$validated['airline'];



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


public function remarks(Request $request){

$validated = request()->validate([
  'ticket_id' => 'required',
  'ticket_reason'=>'nullable|string|min:4',
 ]);

$ticket=Ticket::findorfail($validated['ticket_id']);
$ticket->remarks = $validated['ticket_reason'];
$ticket->save();
return redirect()->back()->with('success','Ticket remarks has been set');
}
public function ticket_flash(){

    return redirect()->route('ticket');
}
public function ticket_confirm_today_domestic(){
    $tickets =Ticket::whereHas('airline', function ($query) {
        $query->where('type','=','Domestic');
    })
    ->whereDate('date', date('Y-m-d'))->with('user','airline','client')
    ->get();




    return view('admin.ticket.ticket-today')->with('tickets',$tickets);
}
public function ticket_confirm_today_international(){
    $tickets =Ticket::whereHas('airline', function ($query) {
        $query->where('type','=','International');
    }) ->whereDate('date', date('Y-m-d'))
    ->with('user','airline','client')
    ->get();




    return view('admin.ticket.ticket-today')->with('tickets',$tickets);
}
}