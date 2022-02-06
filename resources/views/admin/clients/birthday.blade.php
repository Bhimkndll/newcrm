@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                              Birthday Info<small> clients</small>
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
                                            <th>Years old</th>

                                            <th>Comming After in</th>
                                          <th>Birthday</th>



                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($clients as $client)
                                        <tr class="odd gradeX">
                                        <td> {{$loop->iteration}}</td>

                                         <td>{{$client->fullname}}</td>
                                            <td>{{$client->address}}</td>
                                            <td>{{$client->phone}}</td>
                                            <td>{{\Carbon\Carbon::parse($client->c_dob)->diff(\Carbon\Carbon::now())->y}} years old</td>
<td class="center">{{$remaining=\Carbon\Carbon::now()->diffInDays($client->c_dob, false);
}} days</td>
<th class="center">

@foreach($todays as $today)
@if($today->id==$client->id)
Today is his/her birthday.!🎂🌹🎂🌹🍔🎂🌹🎁🎁🎁🌹🌹 Wish him/her today 

@endif

@endforeach


@foreach($tomorrows as $tom)
@if($tom->id==$client->id)
Tomorrow is his/her birthday.!🎂🌹🎂🎁🎁 Wish him/her tomorrow 

@endif
@endforeach



                                         







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