 <!-- modal add data  -->
	 <div id="add_room_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-room" class="modal-title">Add Room</h3>  
                                 
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_room" class = "clear">  
                                  <div class="form-group">
                            			<label for="room_no">Room No.</label>
                            			<input type="text" class="form-control" id="room_no" name="roomno" placeholder="Enter Room No." required="true">
                          		  </div>
                          		  <div class="form-group">
                                  <label for="room_type">Room Type</label>
                                    <select class="form-control" id="room_type" name="rtype" required>
                                      <option value="">Select Type</option>
                                      <option value="Lecture">Lecture</option>
                                      <option value="Laboratory">Laboratory</option>
                                    </select>
                                </div>   
                                <div class="form-group">
                                  <label for="dept">Department</label>
                                  <input type="text" list="dept" name ="roomdept" class="form-control" id="room_dept" placeholder="Enter regulating department" required>
                                      <datalist id="dept">
                                           <?php include 'fetch_department.php'; ?>
                                      </datalist>
                                    <div class="help-block with-errors"></div>
                                </div> 
			                        <input type="hidden" name="hid_room" id="hid_room" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" id="bt_room" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end