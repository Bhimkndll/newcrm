@extends('admin.master')

@section('child_content')


    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="exampleModalLabel">Client Details</h4>
      </div>
      <div class="modal-body">
@include('layouts.message')

<!-- <table class="table table-dark">
  <thead>
   
  </thead>
  <tbody>
   
    <tr>
      <th scope="row">name</th>
      <td>Bhim</td>
     
    </tr>
   

    <tr>
      <th scope="row">name</th>
      <td>Bhim</td>
     
    </tr>
   
    <tr>
      <th scope="row">name</th>
      <td>Bhim</td>
     
    </tr>
   
  </tbody>
</table> -->
<button class="btn btn-info printer"style="margin-bottom:10px;" value="click"
                    onclick="printDiv()"> <i class="fa fa-print"></i></button>
<div class="list-group" id="detail">
  <div  class="list-group-item list-group-item-action flex-column align-items-start">
      
    <div class="d-flex w-100 justify-content-between ">
      <h3 class="mb-1 detail-heading"style="font-weight:bold;"> <small>ClientName:</small>    {{$client->fullname}}</h3>
    </div>
    
  </div>
<div  class="list-group-item list-group-item-action flex-column align-items-start">
      
    <div class="d-flex w-100 justify-content-between ">
      <h3 class="mb-1 detail-heading"style="font-weight:bold;"> <small>Address</small>   {{$client->address}}</h3>
    </div> 
    
  </div>
  <div  class="list-group-item list-group-item-action flex-column align-items-start">
      
    <div class="d-flex w-100 justify-content-between ">
      <h3 class="mb-1 detail-heading"style="font-weight:bold;"> <small>Phone:</small>   {{$client->phone}}</h3>
    </div>
    
  </div>











 <div  class="list-group-item list-group-item-action flex-column align-items-start">
      
    <div class="d-flex w-100 justify-content-between ">
      <h3 class="mb-1 detail-heading"style="font-weight:bold;"> <small>No of visit:</small> {{$visit}}</h3>
    </div>
    
  </div>
 <div  class="list-group-item list-group-item-action flex-column align-items-start">
      
    <div class="d-flex w-100 justify-content-between ">
      <h3 class="mb-1 detail-heading"style="font-weight:bold;"> <small>No of ticket issued:</small> {{$ticket}}</h3>
    </div>
    
  </div>



</div>
 <script>
        function printDiv() {
            var divContents = document.getElementById("detail").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1>Client Details <br></h1>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection