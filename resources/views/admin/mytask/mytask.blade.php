@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            My Tasks <small>{{substr(request()->path(), 5)}} tasks</small>
                        </h1>
          
                    </div>
                </div>
        
        
                <!-- /. ROW  -->

                <div class="row">
                    @include('layouts.message')

                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading text-left">
                             <a href="{{route('task.all',['id'=>'All'])}}" class=
"{{(request()->is('task/All')) ? 'btn btn-primary active-task-menu' : 'btn btn-primary' }} ">
                                <i class="fa fa-tasks fa-1x text-white"></i> All
                        </a>
                          <a href="{{route('task.all',['id'=>'Pending'])}}"class="{{(request()->is('task/Pending')) ? 'btn btn-primary active-task-menu' : 'btn btn-primary' }}">
                                <i class="fa fa-minus-circle fa-1x text-white"></i> Pending
                        </a>

                        <a href="{{route('task.all',['id'=>'Processing'])}}" class="{{(request()->is('task/Processing')) ? 'btn btn-primary active-task-menu' : 'btn btn-primary' }} ">
                                <i class="fa fa-minus-circle fa-1x text-white"></i> Processing
                        </a>
           
                        <a href="{{route('task.all',['id'=>'Completed'])}}" class="{{(request()->is('task/Completed')) ? 'btn btn-primary active-task-menu' : 'btn btn-primary' }} ">
                                <i class="fa fa-check fa-1x text-white"></i> <small>Completed</small> 
                        </a>
                        <a href="{{route('task.all',['id'=>'Cancelled'])}}"class="{{(request()->is('task/Cancelled')) ? 'btn btn-primary active-task-menu' : 'btn btn-primary' }} ">
                                <i class="fa fa-ban fa-1x text-white"></i> </i><!-- <i class="fa fa-times-circle"></i> -->
Cancelled
                        </a>
                        </div>
                        <div class="panel-body">




                            <!-- table for all data which has children -->
                                      @yield('table_content')



                            <!-- end of  children table  -->
                            
                        </div>





                    </div>
                    <!--End Advanced Tables -->
                </div>

                </div>
        
        
                
                <!-- /. ROW  -->
                <!-- start for add customer -->

<!-- for user create form -->

</div>



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