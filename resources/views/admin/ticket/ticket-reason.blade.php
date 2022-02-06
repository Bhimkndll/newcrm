<div class="modal fade" id="ticketreason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content"style="height:243px">
      <div class="modal-header">
        <a type="button" class="close" data-dismiss="modal" aria-label="Close"href="{{route('ticket')}}"><span aria-hidden="true">&times;</span></a>
        <h4 class="modal-title" id="exampleModalLabel">Do you have remarks?</h4>
      </div>
      <div class="modal-body">



      <form  id="targets" action="{{route('ticket.reason.status')}}" method = "post">
                {{ csrf_field() }}

          <div class="form-group">
          <label for="recipient-name" class="control-label" >Reason to <small id="task"></small></label>


    <textarea class="form-control" rows="2" id="pro" name="ticket_reason" value=""></textarea>


            <input type="text"  id="ticket_id" name="ticket_id" value=""required hidden >




          </div>
                     <input type="submit"  class="btn btn-primary pull-right" value="submit">

        </form>
      </div>
     
    </div>
  </div>
</div>
<script type="text/javascript">
  
  



/*upper modal value are being fefined from here*/
  function myFunction($id,$rea) {
var div = document.getElementById('task');

document.getElementById("pro").value = $rea;
document.getElementById("ticket_id").value = $id;
}
</script>