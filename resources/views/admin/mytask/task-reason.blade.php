<div class="modal fade" id="taskreason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content"style="height:243px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Do you have reason?</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('task.reason.status')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
          <label for="recipient-name" class="control-label" >Reason to <small id="task"></small></label>


    <textarea class="form-control" rows="2" id="pro" name="task_reason" value=""></textarea>


            <input type="text"  id="task_id" name="task_id" value=""required hidden>
                        <input type="text"  id="status" name="status" value=""required hidden>




          </div>
                     <input type="submit"  class="btn btn-primary pull-right" value="submit">

        </form>
      </div>
     
    </div>
  </div>
</div>
<script type="text/javascript">
  
  
  function bhim($id){
console.log($id);

  }



/*upper modal value are being fefined from here*/
  function myFunction($id,$rea,$name) {
var div = document.getElementById('task');
div.innerHTML = $name;
/*document.getElementById("task_rea").value = $name;
*/
document.getElementById("pro").value = $rea;
document.getElementById("task_id").value = $id;
document.getElementById("status").value = $name;
}
</script>