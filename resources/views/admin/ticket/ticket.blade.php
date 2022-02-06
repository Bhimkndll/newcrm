@extends('admin.airline.airline-type')

@section('airline')


    <div class="modal-content">
      <div class="modal-header">
        <a type="button" class="close" data-dismiss="modal" aria-label="Close"href="{{route('ticket')}}"><span aria-hidden="true">&times;</span></a>
        <h4 class="modal-title" id="exampleModalLabel">Ticket Booking </h4>
      
<!-- ticket booking confirm blade -->
      </div>
      <div class="modal-body">
@include('layouts.message')



      <form  id="targets" action="{{route('ticket.add')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group ticket">
<label for="recipient-name" class="control-label">ClientName:</label>
            <input type="text" class="form-control" id="recipient-name"value="" name="clientname"disabled required>
            <a href="{{route('client.ticket.show')}}">
            <button type ="button"class="btn btn-primary data">Select from data</button>
</a>
          </div>


  <div class="form-group ticket">
            <label for="message-text" class="control-label">Date:</label>
  <input type="date"class="form-control" id="birthdaytime"value="{{ old('date') }}" name="date">
 
          </div>

 <div class="form-group ticket">
            <label for="message-text" class="control-label">Time:</label>
            <input type="time" class="form-control" id="message-text"value="{{ old('time') }}"name="time" required>
          </div>
 
<!--  <div class="form-check"style="padding-bottom:10px;">
  <input type="radio" class="form-check-input" id="radio1" name="ticket-nature" value="option1" checked>
  <label class="form-check-label" for="radio1"style="cursor: pointer;margin-right: 18px">Domestic ticket</label>
  <input type="radio" class="form-check-input" id="radio2" name="ticket-nature" value="option2">
  <label class="form-check-label" for="radio2"style="cursor: pointer;">International ticket</label>
</div> -->

      
           <div class="form-group ticket">
            <label for="message-text" class="control-label">Ticket no:</label>
            <input type="text" class="form-control" id="message-text"value="{{ old('ticketno') }}"name="ticketno" required>
          </div>


 <div class="form-group ticket">
    <label class="input-group-text" for="inputGroupSelect01">Airlines</label>
  <select class="custom-select form-control" name="airline">
      <option disabled selected value> select an Airline </option>

@foreach($airlines as $airline)
    <option  value="{{$airline->airline}}">{{$airline->airline}}</option>
  
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

    <textarea class="form-control" id="exampleFormControlTextarea2" rows="4"value="{{ old('description') }}" name="description"></textarea>
 
          </div>



           <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal"href="{{route('ticket')}}">Close</a>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  
@endsection