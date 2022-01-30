
@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Purpose <small>Manage purpose</small>
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
                        <div class="panel-heading text-right">
                             <a class="btn btn-primary"  data-toggle="modal" data-target="#departs">
                                <i class="fa fa-plus fa-1x text-white"></i> Add purpose 
                        </a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledata">
                                    <thead>
                                        <tr>
                                        <th>SN:</th>

                                            <th>Departments</th>
                                          
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purposes as $purpose)
                                        <tr class="odd gradeX">
                                            <td>{{$loop->iteration}}</td>

                                         <td>{{$purpose->name}}</td>
                                           
                                            <td class="center">
                                                <a class="btn btn-sm btn-primary" href="{{route('purpose.edit',['id'=>$purpose->id])}}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-sm btn-danger" href="{{route('purpose.delete',['id'=>$purpose->id])}}"><i class="fa fa-trash-o"></i></a>
                                                
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


<div class="modal fade" id="departs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Purpose</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('purpose.add')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">purpose:</label>
            <input type="text" class="form-control" id="recipient-name3" name="name">
          </div>
     

     
    </div>
  </div>
</div>
</div>
<!-- rroo -->




<!-- Modal -->

<!-- end for create form -->
    <script src="{{asset('asset/front/js/jquery-1.10.2.js')}}"></script>

        <script src="{{asset('/asset/front/js/dataTables/jquery.dataTables.js')}}"></script>


 <script>
            $(document).ready(function () {
                $('#tabledata').dataTable();
            });
    </script>

<!-- end for  add customer -->
@endsection