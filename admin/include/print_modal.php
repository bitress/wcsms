<!-- Modal -->
  <div class="modal fade" id="print_Modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print Schedule</h4>
        </div>
        <div class="modal-body">
              <div class="form-group">
                <form method="POST" id="quick_print" role = "form">
                  <label for="sched">Schedule</label>
                  <select class="form-control" id="sched" name="sched" onchange = "z_sched()" required>
                      <option value="" selected disabled>Select Schedule</option>
                      <option value="class">Class</option>
                      <option value="room">Room</option>
                      <option value="instructor">Instructor</option>
                  </select>
              </div> 
               <div class="form-group">
                  <select class="form-control" id="x_sched" name="x_sched" required>
                      <option value="" selected disabled>Select to Print</option>
                  </select>
              </div>   
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="bt_print">Submit</button>
        </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>