@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header"style="text-transform: capitalize;">

                            {{(request()->is('airline*')) ?substr(request()->path(), 8):'Confirm Ticket'}}
                <small> Flights Tickets</small>
                        </h1>
          
                    </div>
                </div>
        
        
                <!-- /. ROW  -->

                <div class="row">
                    @include('layouts.message')

                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading text-right">
                             <a href="{{route('domestic.all')}}" class=
"{{(request()->is('ticket/airline/domestic')) ? 'btn btn-primary active-task-menu' : 'btn btn-primary' }} "style="background:#7e41a5f2;color:white">
                                <i class="fa fa-plane fa-1x text-white"></i> Domestic Flights
                        </a>
                          <a href="{{route('international.all')}}"class="{{(request()->is('ticket/airline/international')) ? 'btn btn-primary active-task-menu' : 'btn btn-secondary' }}"style="background:#409c7e;color:white">
                                <i class="fa fa-plane fa-1x "></i> International Flights
                        </a>

                        
           
                       
                        </div>
                        <div class="panel-body">




                            <!-- table for all data which has children -->
                                      @yield('airline')



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