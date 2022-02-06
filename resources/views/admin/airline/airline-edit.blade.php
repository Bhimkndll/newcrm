@extends('admin.master')

@section('child_content')



            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Edit Airlines <small></small>
                        </h1>
           <!--  <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol> -->
                    </div>
                </div>
        
  <div class="modal-body Department-update">
<script type="text/javascript">
</script>
 
   @include('layouts.message')

      <form  id="targets" action="{{route('airline.update',['id'=>$airline->id])}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">Airline:</label>
            <input type="text" class="form-control" id="recipient-name" name="airline" value="{{$airline->airline}}">
          </div>
          
          <div class="form-check"style="padding-bottom:10px;">





  <input type="radio" class="form-check-input" id="radio1" name="type" value="Domestic" {{ ($airline->type == "Domestic")? 'checked' : '' }}>
  <label class="form-check-label" for="radio1"style="cursor: pointer;margin-right: 18px">Domestic ticket</label>
  <input type="radio" class="form-check-input" id="radio2" name="type" value="International"{{ ($airline->type == "International")? 'checked' : '' }}>
  <label class="form-check-label" for="radio2"style="cursor: pointer;">International ticket</label>


</div>
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"id="targets">
      </div>
        </form>
      </div>
  </div>
@endsection