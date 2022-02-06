@extends('admin.master')

@section('child_content')




           
        

            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header"style="text-transform: capitalize;">
Today Flights

                        </h1>
          
                    </div>
                </div>


                <div class="panel-heading text-right">
                             <a href="{{route('domestic.all.today')}}" class=
"{{(request()->is('today/ticket/airline/domestic')) ? 'btn btn-primary active-task-menu' : 'btn btn-primary' }} "style="background:#7e41a5f2;color:white">
                                <i class="fa fa-plane fa-1x text-white"></i> Today Domestic Flights
                        </a>
                          <a href="{{route('international.all.today')}}"class="{{(request()->is('today/ticket/airline/international')) ? 'btn btn-primary active-task-menu' : 'btn btn-secondary' }}"style="background:#409c7e;color:white">
                                <i class="fa fa-plane fa-1x "></i> Today International Flights
                        </a>

                        
           
                       
                        </div>
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

<!-- 
 <div class="form-inline" style="width:30%;position: relative;left:75%;padding-top: 10px;">
    <label class="input-group-text" for="inputGroupSelect01">Sort By:</label>
  <select class="custom-select form-control"  onclick="ram()"id ="hero"name="airline">
  

    <option  value="All">All</option>
        <option  value="International">International</option>
                <option  value="Domestic">Domestic</option>


  
  
  </select>
</div>
 -->
                       
                     <!--   <div class="panel-heading text-right">
                             <a class="btn btn-primary" href="{{route('ticket.fill')}}">
                                <i class="fa fa-plus fa-1x text-white"></i> Add ticket
                        </a>
                        </div> -->
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
                                                                                <th>Type</th>

                                        <th>Remarks</th>


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
                                                                                        <th>{{$ticket->airline->type}}</th>

                                                                                        <th>{{$ticket->remarks}}</th>



                                            <td class="center">
                                                <a class="btn btn-sm btn-primary" href="{{route('ticket.confirm.update',['id'=>$ticket->id])}}" title="edit"><i class="fa fa-pencil"></i></a>
                                              
                                                <a class="btn btn-sm btn-danger" href="{{route('ticket.confirm.delete',['id'=>$ticket->id])}}" title="delete"><i class="fa fa-trash-o"></i></a>

                                                  <a class="btn btn-xs btn-primary"style="margin-top:3px;"data-toggle="modal" title="remarks"data-target="#ticketreason"onclick="myFunction({{$ticket->id}},'{{$ticket->remarks}}')"><i class="fa fa-comments "></i> </a>

                                                 
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

@include('admin.ticket.ticket-reason')

<!-- rroo -->




<!-- Modal -->

<!-- end for create form -->
    <script src="{{asset('asset/front/js/jquery-1.10.2.js')}}"></script>

        <script src="{{asset('/asset/front/js/dataTables/jquery.dataTables.js')}}"></script>


 <script>
            $(document).ready(function () {
                $('#tabledatas').dataTable();
            });

function ram(){
            var e = document.getElementById("hero").value;
            console.log(e);
          document.getElementById("ticket").value ="international";


}
    </script>

<!-- end for  add customer -->
@endsection