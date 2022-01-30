@extends('admin.master')

@section('child_content')


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Update Ticket</h4>
      </div>
      <div class="modal-body">
@include('layouts.message')



      <form  id="targets" action="{{route('ticket.booking.save',['id'=>$ticket->id])}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group ticket">
<label for="recipient-name" class="control-label">ClientName:</label>
            <input type="text" class="form-control" id="recipient-name"value="{{$ticket->client->fullname}}" name="clientname" disabled required>
            <a href="{{route('client.ticket.show')}}">
            <button type ="button"class="btn btn-primary data">Select from data</button>
</a>
          </div>


  <div class="form-group ticket">
            <label for="message-text" class="control-label">Date:</label>
  <input type="date"class="form-control" id="birthdaytime" name="date"value={{$ticket->date}}>
 
          </div>



          <div class="form-group ticket">
            <label for="message-text" class="control-label">Departure:</label>
            <input type="text" class="form-control" id="message-text" value="{{$ticket->departure}}" name="departure" required>
          </div>


      
           <div class="form-group ticket">
            <label for="message-text" class="control-label">Time:</label>
            <input type="time" class="form-control" id="message-text"value="{{$ticket->time}}"name="time" required>
          </div>


      
           <div class="form-group ticket">
            <label for="message-text" class="control-label">Destination:</label>
            <input type="text" class="form-control" id="message-text"value="{{$ticket->destination}}"name="destination" required>
          </div>




           <div class="form-group ticket">
            <label for="message-text" class="control-label">Description:</label>

    <textarea class="form-control" id="exampleFormControlTextarea2" rows="2" name="description"value="{{$ticket->description}}"></textarea>
 
          </div>



           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  
@endsection