 <!-- modal add data  -->
	 <div id="add_course_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-course" class="modal-title">Add Course</h3>  
                                 
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_course" class = "clear">  
                                  <div class="form-group">
                            			<label for="course_code">Course Code</label>
                            			<input type="text" class="form-control" id="course_code" name="coursecode" placeholder="Enter course code (i.e Acronym) " required="true">
                          		  </div>
                          		  <div class="form-group">
                                  <label for="dept_name">Course Name</label>
                                  <input type = "text" class="form-control" id="course_name" name="coursename" placeholder="Enter course name" required = "true">
                                </div>
                                <div class="form-group">
                                  <label for="dept">Department</label>
                                  <input type="text" list="dept" name ="coursedept" class="form-control" id="course_dept" placeholder="Enter offering department" required>
                                      <datalist id="dept">
                                           <?php include 'fetch_department.php'; ?>
                                      </datalist>
                                    <div class="help-block with-errors"></div>
                                </div>   
			                        <input type="hidden" name="hid_course" id="hid_course" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" id="bt_course" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end