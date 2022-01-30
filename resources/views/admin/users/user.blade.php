@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Users <small>Manage Users</small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>
        
        
                <!-- /. ROW  -->

                <div class="row">
                    @include('layouts.message')

                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading text-right">
                             <a class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus fa-1x text-white"></i> Add User 
                        </a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledatas">
                                    <thead>
                                        <tr>
                                <th>SN:</th>

                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr class="odd gradeX">
                                        <td>{{$loop->iteration}}</td>

                                         <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td class="center">{{$user->address}}</td>
                                            <td class="center">{{$user->phone}}</td>
                                              <td class="center">
                                                <a class="status {{($user->status)?'on':'off'}}" href="{{route('user.status',['id'=>$user->id])}}">
                                                    
{{($user->status)?'On':'Off'}}


                                                </a>
                        

                                            </td>
                                            <td class="center">
                                                <a class="btn btn-sm btn-primary" href="{{route('user.edit',['id'=>$user->id])}}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-sm btn-danger" href="{{route('user.delete',['id'=>$user->id])}}"><i class="fa fa-trash-o"></i></a>
                                            </td>


                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

                </div>
        
        
                
                <!-- /. ROW  -->
                <!-- start for add customer -->

<!-- for user create form -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add User</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('user.register')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">FullName:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">email</label>
            <input type="text" class="form-control" id="message-text" name="email" required>
          </div>
           <div class="form-group">
            <label for="message-text" class="control-label">Address</label>
            <input type="text" class="form-control" id="message-text"name="address" required>
          </div>

<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Role</label>
  <select class="custom-select form-control" name="role">
    <option selected value="level1">level1</option>
    <option value="1" value="level2">level2</option>
    <option value="2" value="level3">level3</option>
  </select>
</div>

            <div class="form-group">
            <label for="message-text" class="control-label">password</label>
            <input type="password" class="form-control" id="message-text"name="password" required>
          </div>


            <div class="form-group">
            <label for="message-text" class="control-label">ConfirmPassword</label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      
          </div>

           <div class="form-group">
            <label for="message-text" class="control-label">Phone</label>
            <input type="text" class="form-control" id="message-text"name="phone" required>
          </div>
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
</div>
<!-- rroo -->




<!-- Modal -->

<!-- end for create form -->
    <script src="{{asset('asset/front/js/jquery-1.10.2.js')}}"></script>

        <script src="{{asset('/asset/front/js/dataTables/jquery.dataTables.js')}}"></script>


 <script>
            $(document).ready(function () {
                $('#tabledatas').dataTable();
            });
    </script>

<!-- end for  add customer -->
@endsection