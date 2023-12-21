 <!-- modal add data  -->
	 <div id="add_class_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-class" class="modal-title">Add Class</h3>   
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_class" class = "clear">  
                                  <div class="form-group">
                              			<label for="course">Course</label>
                                      <input list="course" name ="classcourse" class="form-control" id="class_course" placeholder="Enter class course" required>
                                        <datalist id="course">
                                          <?php include '../class/fetch_course.php'; ?>
                                        </datalist>
                          		    </div>
                          		  <div class="form-group">
                                  <label for="class_year">Year</label>
                                  <input type = "text" class="form-control" id="class_year" name="classyear" placeholder="Enter year level" required = "true">
                                </div>
                                <div class="form-group">
                                  <label for="class_section">Section</label>
                                  <input type = "text" class="form-control" id="class_section" name="classsection" placeholder="Enter class section" required = "true">
                                </div>
                                <div class="form-group">
                                  <label for="class_major">Major</label>
                                  <input type = "text" class="form-control" id="class_major" name="classmajor" placeholder="Enter class major" required = "true">
                                </div>  
			                        <input type="hidden" name="hid_class" id="hid_class" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" id="bt_class" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end