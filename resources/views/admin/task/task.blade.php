@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tasks <small>Manage task</small>
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
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledatas">
                                    <thead>
                                        <tr>
                                         <th>SN:</th>

                                             <th>Client Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Purpose</th>
                                            <th>Reason</th>
                                            <th>Follow up</th>

                                            <th>Task To</th>
                                            <th>Status</th>


                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($tasks as $task)
                                        <tr class="odd gradeX">
                                        <td> {{$loop->iteration}}</td>

                                         <td>{{$task->client->fullname}}</td>
                                            <td>{{$task->client->address}}</td>
                                            <td>{{$task->client->phone}}</td>
                                            <td class="center">


{!! !empty($task->purpose) ? $task->purpose->name : '<span class="text-danger text-sm">No purpose</span> ' !!}



                                            </td>


                                             <td class="center">


{!! !empty($task->reason) ? $task->reason : '<span class="text-danger text-sm">No reason</span>' !!}



                                            </td>

                                             <td class="center text-sm">


{!! !empty($task->task_reason)?$task->task_reason :' ' !!}


                                            </td>


@if(!empty($task->user_id))


@foreach($users as $user)
 
@if($user->id===$task->user_id)
 <td class="center">{{$user->name}}</td>
 @endif
@endforeach

@else



                                             <td class="center text-sm  text-danger"style="font-size:15px;color: red;font-weight: bold;">Invalid user</td>


@endif



                                             <td class="center text-sm">


{!! !empty($task->status) ? $task->status : 'Plz Assign task' !!}


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