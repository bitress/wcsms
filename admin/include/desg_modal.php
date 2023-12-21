 <!-- modal add data  -->
	 <div id="add_desg_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-desg" class="modal-title">Add Designation</h3>  
                                 
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_desg" class = "clear">  
                                <div class="form-group">
                            			<label for="desg">Designation</label>
                            			<input type="text" class="form-control" id="desg" name="desg" placeholder="Specify Designation" required="true">
                          		  </div>
                                <div class="form-group">
                                  <label for="desg">Equivalent Points</label>
                                  <input type="number" class="form-control" id="eql_desg" name="eql_desg" placeholder="Designation Equivalent Point" required="true">
                                </div>
			                        <input type="hidden" name="hid_desg" id="hid_desg" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" id="bt_desg" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end