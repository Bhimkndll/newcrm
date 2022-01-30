@extends('admin.master')

@section('child_content')




            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Summary of your Company</small>
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

                    <div class="col-md-3 col-sm-12 col-xs-12">
    

                        <a  data-toggle="modal" href="#exampleModal">
                        <div class="panel panel-primary text-center no-boder client bg-color-teal teal">
                            <div class="teal">
                                <i class="fa fa-plus fa-5x"></i> 
                            </div>
                            
                                <h4>Add Client</h4>
                            
                        </div>
                        </a> 

                    </div>



@can('super-admin')
 <div class="col-md-3 col-sm-12 col-xs-12">

   <a data-toggle="modal" data-target="#department">
                        <div class="panel panel-primary text-center no-boder depart bg-color-heart heart">
                            <div class="heart">
                                <i class="fa fa-plus fa-5x"></i> 
                            </div>
                            
                                <h4>Add Department</h4>
                            
                        </div>
                        </a>

                    </div>



@endcan

                </div>
        
    
    <div class="row ">
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>TaskPending</h4>
            <div class="easypiechart" id="easypiechart-blue" data-percent={{$pending}} ><span class="percent">{{number_format((float)$pending, 2, '.', '')}}%</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>TaskProcessing</h4>
            <div class="easypiechart" id="easypiechart-orange" data-percent={{$process}} ><span class="percent">{{number_format((float)$process, 2, '.', '')}}%</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>TaskComplete</h4>
            <div class="easypiechart" id="easypiechart-teal" data-percent={{$complete}} ><span class="percent">{{number_format((float)$complete, 2, '.', '')}}%</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>TaskCancelled</h4>
            <div class="easypiechart" id="easypiechart-red" data-percent={{$cancel}} ><span class="percent">{{number_format((float)$cancel, 2, '.', '')}}%</span>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
        
        <!-- 
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Bar Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Donut Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
        <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Area Chart
            </div>
            <div class="panel-body">
              <div id="morris-area-chart"></div>
            </div>
          </div>  
          </div>    
        </div>   -->
                <!-- /. ROW  -->

     
        
        
        
                
                <!-- /. ROW  -->
                <!-- start for add customer -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Customer</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('client.register')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">FullName:</label>
            <input type="text" class="form-control" id="recipient-name" name="fullname" required>
          </div>

 <div class="form-group">
            <label for="message-text" class="control-label">Email:</label>
            <input type="text" class="form-control" id="message-text" name="email">
          </div>



          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="text" class="form-control" id="message-text" name="address">
          </div>




  <div class="form-group ticket">
            <label for="message-text" class="control-label">Date:</label>
  <input type="date"class="form-control" id="birthdaydate" name="dob">
 
          </div>


      
           <div class="form-group">
            <label for="message-text" class="control-label">Phone:</label>
            <input type="text" class="form-control" id="message-text"name="phone" required>
          </div>



           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

<!-- end for  add customer -->
<!-- modal for department -->


@include('admin.departments.department-add')

<!--  -->


        <footer><p>All right reserved. &copy; {{ now()->year }} Powered By: <a href="https://www.bitmapitsolution.com">Bitmap I.T. Solution Pvt. Ltd.</a></p></footer>
            </div>

       

@endsection