@extends('admin.master')

@section('child_content')


   <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Edit Client <small></small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>
        
  <div class="modal-body Department-update">
<script type="text/javascript">toastr.info('Are you the 6 fingered man?')
</script>

@include('layouts.message')

    

      <form  id="targets" action="{{route('client.update',['id'=>$client->id])}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">FullName:</label>
            <input type="text" class="form-control" id="recipient-name"value="{{$client->fullname}}" name="fullname" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Email:</label>
            <input type="email" class="form-control" id="email" value="{{$client->c_email}}" name="email">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="text" class="form-control" id="message-text" value="{{$client->address}}" name="address" required>
          </div>


           <div class="form-group">
            <label for="message-text" class="control-label">Date of Birth</label>
            <input type="date" class="form-control" id="message-text"value="{{$client->c_dob}}"name="dob">
          </div>

      
           <div class="form-group">
            <label for="message-text" class="control-label">Phone:</label>
            <input type="text" class="form-control" id="message-text"value="{{$client->phone}}"name="phone" required>
          </div>



<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Purpose</label>


<select class="custom-select form-control" name="department">
@foreach($departs as $depart)



<option  value="{{$depart->id}}"

{{($client->department_id==$depart->id)?"selected":''}}


  >{{$depart->department}}</option>
@endforeach
</select>
</div>

           <div class="modal-footer">
       <a href="{{route('client.close')}}"class="btn btn-default">Close </a>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>




      </div>
  </div>










    
  
@endsection