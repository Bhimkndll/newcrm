@extends('admin.master')

@section('child_content')


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Ticket Booking</h4>
      </div>
      <div class="modal-body">
@include('layouts.message')



      <form  id="targets" action="{{route('ticket.add')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group ticket">
<label for="recipient-name" class="control-label">ClintName:</label>
            <input type="text" class="form-control" id="recipient-name"value="" name="clientname"disabled required>
            <a href="{{route('client.ticket.show')}}">
            <button type ="button"class="btn btn-primary data">Select from data</button>
</a>
          </div>


  <div class="form-group ticket">
            <label for="message-text" class="control-label">Date:</label>
  <input type="date"class="form-control" id="birthdaytime" name="date">
 
          </div>

 <div class="form-group ticket">
            <label for="message-text" class="control-label">Time:</label>
            <input type="time" class="form-control" id="message-text"value=""name="time" required>
          </div>


          <div class="form-group ticket">
            <label for="message-text" class="control-label">Departure:</label>
            <input type="text" class="form-control" id="message-text" value="" name="departure" required>
          </div>


      
          

      
           <div class="form-group ticket">
            <label for="message-text" class="control-label">Destination:</label>
            <input type="text" class="form-control" id="message-text"value=""name="destination" required>
          </div>




           <div class="form-group ticket">
            <label for="message-text" class="control-label">Description:</label>

    <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="description"></textarea>
 
          </div>



           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  
@endsection