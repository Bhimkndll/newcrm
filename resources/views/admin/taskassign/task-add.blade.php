@extends('admin.master')

@section('child_content')



            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                         Assign Task <small>{{$client->fullname}}</small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>
        
  <div class="modal-body Assign Task-update">
<script type="text/javascript">toastr.info('Are you the 6 fingered man?')
</script>

@include('layouts.message')

      <form  id="targets" action="{{route('task.add',['id'=>$client->id])}}" method = "post">
                {{ csrf_field() }}



     <div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Department</label>


  <select class="custom-select form-control" name="department">

@foreach($departs as $depart)

    <option selected value="{{$depart->id}}">{{$depart->department}}</option>
   
@endforeach

  </select>
</div>


<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">User</label>


  <select class="custom-select form-control" name="user">

@foreach($users as $user)

    <option selected value="{{$user->id}}">{{$user->name}}</option>
   
@endforeach

  </select>
</div>

<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Purpose</label>


  <select class="custom-select form-control" name="purpose">

@foreach($purposes as $purpose)

    <option selected value="{{$purpose->id}}">{{$purpose->name}}</option>
   
@endforeach

  </select>
</div>



<div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="reason"></textarea>
  </div>
<!-- 
      <div class="form-group">
    <label for="exampleFormControlTextarea1">Reason</label>
    <textarea class="form-control" id="exampleFormControlTextarea2" rows="2" name="reason"></textarea>
  </div> -->

        
          
           <div class="modal-footer">
        <a href="{{route('client.show')}}"class="btn btn-default">Back</a>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
  </div>
@endsection