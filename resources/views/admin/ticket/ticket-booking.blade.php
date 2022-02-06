@extends('admin.master')

@section('child_content')


    <div class="modal-content">
      <div class="modal-header">
        <a type="button"  href="{{route('ticket')}}"><span aria-hidden="true">&times;</span></a>
        <h4 class="modal-title" id="exampleModalLabel">Ticket Booking </h4>
        <!-- last of ticket store -->
      </div>
      <div class="modal-body">
@include('layouts.message')



      <form  id="targets" action="{{route('ticket.booking',['id'=>$client->id])}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group ticket">
<label for="recipient-name" class="control-label">Client Name:</label>
            <input type="text" class="form-control" id="recipient-name"value="{{$client->fullname}}" name="clientname" disabled required>
            <a href="{{route('client.ticket.show')}}">
            <button type ="button"class="btn btn-primary data">Select from data</button>
</a>
          </div>


  <div class="form-group ticket">
            <label for="message-text" class="control-label">Flight Date:</label>
  <input type="date"class="form-control" id="birthdaytime" value="{{ old('dates') }}"name="dates">
 
          </div>
          
           <div class="form-group ticket">
            <label for="message-text" class="control-label">Flight Time:</label>
            <input type="time" class="form-control" id="message-text"value="{{ old('time') }}"name="time" required>
          </div>


      

 <div class="form-group ticket">
            <label for="message-text" class="control-label">Ticket no:</label>
            <input type="text" class="form-control" id="message-text"value="{{ old('ticket') }}"name="ticket" required>
          </div>


 <div class="form-group ticket">
    <label class="input-group-text" for="inputGroupSelect01">Airlines</label>
  <select class="custom-select form-control" name="airline">
  
@foreach($airlines as $airline)
      <option disabled selected value> select an Airline </option>

    <option  value="{{$airline->id}}">{{$airline->airline}}</option>
  
  @endforeach
  </select>
</div>


           <div class="form-group ticket">
            <label for="message-text" class="control-label">Airlines PNR:</label>
            <input type="text" class="form-control" id="message-text"value="{{ old('pnr') }}"name="pnr" required>
          </div>

      

          <div class="form-group ticket">
            <label for="message-text" class="control-label">Departure:</label>
            <input type="text" class="form-control" id="message-text" value="{{ old('departure') }}" name="departure" required>
          </div>



      
           <div class="form-group ticket">
            <label for="message-text" class="control-label">Destination:</label>
            <input type="text" class="form-control" id="message-text"value="{{ old('destination') }}"name="destination" required>
          </div>




           <div class="form-group ticket">
            <label for="message-text" class="control-label">Description:</label>

    <textarea class="form-control" id="exampleFormControlTextarea2" rows="2" value="{{ old('description') }}"name="description"></textarea>
 
          </div>



           <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal"href="{{route('ticket')}}">Close</a>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  
@endsection