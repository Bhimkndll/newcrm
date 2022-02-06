@extends('admin.master')

@section('child_content')



            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Edit User <small></small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>
        
  <div class="modal-body user-update">
<script type="text/javascript">toastr.info('Are you the 6 fingered man?')
</script>

@include('layouts.message')

      <form  id="targets" action="{{route('user.update',['id'=>$user->id])}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">FullName:</label>
            <input type="text" class="form-control" id="recipient-name" name="name" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">email</label>
            <input type="text" class="form-control" id="message-text" name="email" value="{{$user->email}}" required>
          </div>
           <div class="form-group">
            <label for="message-text" class="control-label">Address</label>
            <input type="text" class="form-control" id="message-text"name="address" value={{$user->email}} required>
          </div>

<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Role</label>
  <select class="custom-select form-control" name="role">
    <option selected value="level1">level1</option>
    <option  value="level2">level2</option>
    <option  value="level3">level3</option>
  </select>
</div>

            <div class="form-group">
            <label for="message-text" class="control-label">Updatepassword</label>
            <input type="password" class="form-control" id="message-text"name="password">
          </div>


            

           <div class="form-group">
            <label for="message-text" class="control-label">Phone</label>
            <input type="text" class="form-control" id="message-text"name="phone" value="{{$user->phone}}"required>
          </div>
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
  </div>
@endsection