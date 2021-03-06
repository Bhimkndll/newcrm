  
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

   <?php                                            
     
$curr = explode (",",$attend->entry_time); 

if(empty($attend->exit_time)) { 
echo "currently working";

}
else{
       echo gmdate('H:i:s', \Carbon\Carbon::parse(current($curr))->diffInSeconds(\Carbon\Carbon::parse($attend->exit_time))); 
    }
?>

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