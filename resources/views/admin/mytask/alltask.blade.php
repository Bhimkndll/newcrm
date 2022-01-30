  
@extends('admin.mytask.mytask')

@section('table_content')




  <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledatas">
                                    <thead>
                                        <tr>
                                         <th>SN:</th>

                                             <th>ClientName</th>
                                            <th>Department</th>
                                            <th>Purpose</th>
                                                                                        <th>Reason</th>

                                            <th>User</th>

                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                 @foreach($tasks as $task)
                                        <tr class="odd gradeX">
                                        <td>{{$loop->iteration}}</td>

                                         <td>{{$task->client->fullname}}</td>
                                            <td>{{$task->department->department}}</td>
                                            <td>{{$task->purpose}}</td>
                                                                                        <td>{{$task->reason}}</td>

                                            <td>{{$task->user->name}}</td>

                                            <td class="center">

                                              @can('admin')  

                                                
                                                <a class="btn btn-sm btn-danger"data-toggle="modal" data-target="#taskreason" onclick="myFunction({{$task->id}},'{{$task->task_reason}}','Pending')"><i class="fa fa-gear fa-spin "></i></a>
                                                  
                                                       <a class="btn btn-sm btn-danger"data-toggle="modal" data-target="#taskreason" onclick="myFunction({{$task->id}},'{{$task->task_reason}}','Processing')"><i class="fa fa-refresh fa-spin "></i></a>
                                                  

                                                 <a class="btn btn-sm btn-primary"data-toggle="modal" data-target="#taskreason" onclick="myFunction({{$task->id}},'{{$task->task_reason}}','Complete')"><i class="fa fa-check "></i></a>
                                                
                                                  
                                                     
                                                     <a class="btn btn-sm btn-danger"data-toggle="modal" data-target="#taskreason"onclick="myFunction({{$task->id}},'{{$task->task_reason}}','Cancelled')"><i class="fa fa-times "></i> </a>


@endcan

                                            </td>

 
                                        </tr>

@endforeach

                                    </tbody>
                                </table>
                            </div>



@include('admin.mytask.task-reason')




@endsection