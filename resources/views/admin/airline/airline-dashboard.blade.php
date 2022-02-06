<div class="modal fade" id="airline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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