  
@extends('admin.master')

@section('child_content')


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Revive Users<small></small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>

  <div class="table-responsive">
                                 
                        
                                <table class="table table-striped table-bordered table-hover" id="tabledata">
                            

                                    <thead>
                                        <tr>
                                         <th>SN:</th>

                                             <th>User Name</th>
                                            <th>Expired at </th>
                                            <th>Action</th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                 @foreach($dusers as $duser)
                                        <tr class="odd gradeX">
                                        <td>{{$loop->iteration}}</td>

                                         <td>{{$duser->user->name}}</td>
                                            <td>{{$duser->exit_time}}</td>
                                            


                                            <td class="center">

                                              @can('admin')  

                                                
                                                <a class="btn btn-xs btn-danger" href="{{route('user.revive',['id'=>$duser->id])}}"><i class="fa fa-heart "></i></a>
                                                   
                                                       

@endcan

                                            </td>

 
                                        </tr>

@endforeach

                                    </tbody>
                                </table>
                            </div>

<script src="{{asset('asset/front/js/jquery-1.10.2.js')}}"></script>

        <script src="{{asset('/asset/front/js/dataTables/jquery.dataTables.js')}}"></script>


 <script>
            $(document).ready(function () {
                $('#tabledata').dataTable();
            });
    </script>



@endsection