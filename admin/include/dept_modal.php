 <!-- modal add data  -->
	 <div id="add_dept_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-dept" class="modal-title">Add Department</h3>  
                                 
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_dept" class = "clear">  
                                  <div class="form-group">
                            			<label for="dept_code">Department Code</label>
                            			<input type="text" class="form-control" id="dept_code" name="deptcode" placeholder="Enter department code (i.e Acronym) " required="true">
                          		  </div>
                          		  <div class="form-group">
                                  <label for="dept_name">Department Name</label>
                                  <input type = "text" class="form-control" id="dept_name" name="deptname" placeholder="Enter department name" required = "true">
                                </div>   
			                        <input type="hidden" name="hid_dept" id="hid_dept" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" id="bt_dept" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end