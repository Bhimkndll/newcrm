  
@extends('admin.master')

@section('child_content')


            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            User <small>Attendence</small>
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

                                             <th>User</th>
                                            <th>Entry time</th>
                                            <th>Entry Counts</th>

                                            <th>Rest Time</th>

                                            <th>working Time</th>

                                            <th>Exit time</th>

                                         
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

@foreach($attends as $attend)
                                        <tr class="odd gradeX">
                                        <td> {{$loop->iteration}}</td>

                                         <td>{{$attend->user->name}}</td>
                                            <td>


 @foreach(explode(',', $attend->entry_time) as $info) 
    {{$info}}</br>
  @endforeach






                                            </td>
                                        <td>{{$attend->entry_counts}}</td>

                                            <td>
                        <?php
$entry = explode (",",$attend->entry_time); 

$rest = explode (",",$attend->break_info); 
$c=0;
for ($x = 0; $x <= count($rest)-2; $x++) {

    $y=$x+1;


      $b= \Carbon\Carbon::parse($entry[$y])->diffInSeconds(\Carbon\Carbon::parse($rest[$x]));
      $c+=$b;
 echo gmdate('H:i:s', $b);

      echo"</br>";
    
}

?>
<p style="display: block; background: green; border-top:solid 2px red;padding: 0px;">
    Total = <?php  echo gmdate('H:i:s', $c); ?>
</p>


<!-- echo gmdate('H:i:s', $f);
 -->


                                            </td>




<td>

                                                <!-- working time -->
                                         
  
              <?php

$w=0;
$f=0;

$curr = explode (",",$attend->entry_time); 
      $w= \Carbon\Carbon::parse(current($curr))->diffInSeconds(\Carbon\Carbon::parse(end($curr)));
      $now=date('Y-m-d H:i:s');
      echo "$now";
     $tz = \Carbon\Carbon::now();
      $local='2017-04-11 12:39:50';
    $emitted = \Carbon\Carbon::parse(end($curr));
     $diff = $tz->diffInSeconds($emitted); 

            $wl= \Carbon\Carbon::parse(end($curr))->diffInSeconds(\Carbon\Carbon::parse(end($curr)));



$w=$w-$c;
?>       
<p style="display: block; background: green;border-top:solid 2px red;padding: 0px;">
    Total = 


    <?php 

if($attend->switch){
 echo gmdate('H:i:s', $w+$diff); 

}else{
     echo gmdate('H:i:s', $w); 
}

?> {{$attend->switch?"":'inactive'}}

</p>
</td>
<td>{{$attend->exit_time}}</td>
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
<script src="{{asset('asset/front/js/jquery-1.10.2.js')}}"></script>

        <script src="{{asset('/asset/front/js/dataTables/jquery.dataTables.js')}}"></script>


 <script>
            $(document).ready(function () {
                $('#tabledatas').dataTable();
            });
    </script>

@endsection