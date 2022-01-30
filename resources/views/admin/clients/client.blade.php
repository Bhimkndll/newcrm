@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Client <small>Manage Client</small>
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
                             <a class="btn btn-primary"  data-toggle="modal" data-target="#client">
                                <i class="fa fa-plus fa-1x text-white"></i> Add Client 
                        </a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledatas">
                                    <thead>
                                        <tr>
                                         <th>SN:</th>

                                             <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                                                                        <th>Added By</th>

                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($clients as $client)
                                        <tr class="odd gradeX">
                                        <td> {{$loop->iteration}}</td>

                                         <td>{{$client->fullname}}</td>
                                            <td>{{$client->address}}</td>
                                            <td>{{$client->phone}}</td>
                                            <td>{{$client->user->name}}</td>
<td class="center">
                                                <a class="btn btn-sm btn-primary" href="{{route('client.edit',['id'=>$client->id])}}"><i class="fa fa-pencil"></i></a>
                                               @can('admin')
                                                <a class="btn btn-sm btn-danger" href="{{route('client.delete',['id'=>$client->id])}}"><i class="fa fa-trash-o"></i></a>
                                                  
                                                  @endcan<a class="btn btn-sm btn-info" href="{{route('task.assign',['id'=>$client->id])}}"><i class="fa fa-tasks"></i></a>
                                                    <a class="btn btn-sm btn-info" href="{{route('client.detail',['id'=>$client->id])}}"><i class="fa fa-eye"></i></a>
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

<div class="modal fade" id="client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Customer</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('client.register')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">FullName:</label>
            <input type="text" class="form-control" id="recipient-name" name="fullname" required>
          </div>

<div class="form-group">
            <label for="message-text" class="control-label">Email:</label>
            <input type="text" class="form-control" id="message-text" name="email">
          </div>


          
          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="text" class="form-control" id="message-text" name="address" required>
          </div>



  <div class="form-group ticket">
            <label for="message-text" class="control-label">Date:</label>
  <input type="date"class="form-control" id="birthdaydate" name="dob">
 
          </div>



      
           <div class="form-group">
            <label for="message-text" class="control-label">Phone:</label>
            <input type="text" class="form-control" id="message-text"name="phone" required>
          </div>


<!-- 
<div class="form-group">
    <label class="input-group-text" for="inputGroupSelect01">Purpose</label>


  <select class="custom-select form-control" name="department">

@foreach($departs as $depart)

    <option selected value="{{$depart->id}}">{{$depart->department}}</option>
   
@endforeach

  </select>
</div> -->

           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
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