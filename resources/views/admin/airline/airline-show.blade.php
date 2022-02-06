@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Airlines <small>Manage airline</small>
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
                                <i class="fa fa-plus fa-1x text-white"></i> Add Airlines 
                        </a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                 
                        
                            
                                <table class="table table-striped table-bordered table-hover" id="tabledata">
                                    <thead>
                                        <tr>
                                            <th>SN:</th>

                                            <th>Airlines</th>
                                            <th>Airline Types</th>

                                          
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($airlines as $airline)
                                        <tr class="odd gradeX">
                                        <td>{{$loop->iteration}}</td>

                                         <td>{{$airline->type}}</td>
                                        <td>{{$airline->airline}}</td>

                                            <td class="center">
                                                <a class="btn btn-sm btn-primary" href="{{route('airline.edit',['id'=>$airline->id])}}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-sm btn-danger" href="{{route('airline.delete',['id'=>$airline->id])}}"><i class="fa fa-trash-o"></i></a>
                                                
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
        <h4 class="modal-title" id="exampleModalLabel">Add Airlines</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('airline.create')}}" method = "post">
                {{ csrf_field() }}

         <div class="form-group">
<label for="recipient-name" class="control-label">Airlines:</label>
            <input type="text" class="form-control" id="recipient-name" name="airline">
          </div>
 <div class="form-check"style="padding-bottom:10px;">
  <input type="radio" class="form-check-input" id="radio1" name="type" value="Domestic" checked>
  <label class="form-check-label" for="radio1"style="cursor: pointer;margin-right: 18px">Domestic ticket</label>
  <input type="radio" class="form-check-input" id="radio2" name="type" value="International">
  <label class="form-check-label" for="radio2"style="cursor: pointer;">International ticket</label>
</div>
          
     
<div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
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