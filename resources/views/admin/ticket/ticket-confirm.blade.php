@extends('admin.airline.airline-type')

@section('airline')




            <div id="page-inner" style="background:#8190977a;border-radius:18px">


              <!--   <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Ticket <small>Booked Ticket dsfd</small>
                        </h1>
           
                    </div>
                </div>
         -->
        
                <!-- /. ROW  -->

                <div class="row">
                    @include('layouts.message')

                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                       
                       <div class="panel-heading text-right">
                             <a class="btn btn-primary" href="{{route('ticket.fill')}}">
                                <i class="fa fa-plus fa-1x text-white"></i> Add tickets
                        </a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledatas">
                                    <thead>
                                        <tr>
                                         <th>SN:</th>

                                             <th>Name</th>
                                            <th>phone</th>
                                            <th>address</th>

                                                                                        <th>Airline</th>
                                                                                        <th>Airline PNR</th>
                                                                                        <th>Ticket NO</th>

                                            <th>Date</th>

                                            <th>Departure</th>




                                            <th>Time</th>

                                            <th>Destination</th>

                                            <th>Description</th>
                                        <th>Issued_By</th>

                                        <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($tickets as $ticket)
                                        <tr class="odd gradeX">
                                        <td> {{$loop->iteration}}</td>

                                         <td>{{$ticket->client->fullname}}</td>
                                            <td>{{$ticket->client->phone}}</td>
                                            <td>{{$ticket->client->address}}</td>
                                            <th>{{$ticket->airline->airline}}</th>
                                            <th>{{$ticket->pnr}}</th>
                                            <th>{{$ticket->ticket_no}}</th>

                                            <td>{{$ticket->date}}</td>
                                            <td>{{$ticket->departure}}</td>

                                            <td>{{$ticket->time}}</td>

                                            <td>{{$ticket->destination}}</td>
                                            <td>{{$ticket->description}}</td>
                                            <td>{{$ticket->user->name}}</td>


                                            <td class="center">
                                                <a class="btn btn-sm btn-primary" href="{{route('ticket.confirm.update',['id'=>$ticket->id])}}"><i class="fa fa-pencil"></i></a>
                                              
                                                <a class="btn btn-sm btn-danger" href="{{route('ticket.confirm.delete',['id'=>$ticket->id])}}"><i class="fa fa-trash-o"></i></a>

                                                
                                                 
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
        
        </div>
                
                <!-- /. ROW  -->
                <!-- start for add customer -->


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