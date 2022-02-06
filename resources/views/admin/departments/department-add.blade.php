<div class="modal fade" id="department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Department</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('department.add')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
<label for="recipient-name" class="control-label">Department:</label>
            <input type="text" class="form-control" id="recipient-name" name="department" required>
          </div>
         <input type="submit" class="btn btn-primary">
        </form>
      </div>
     
    </div>
  </div>
</div>
