 <!-- modal add data  -->
	 <div id="add_subject_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-subject" class="modal-title">Add Subject</h3>  
                                 
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_subject" class = "clear">  
                                  <div class="form-group">
                            			<label for="course_no">Course No.</label>
                            			<input type="text" class="form-control" id="course_no" name="cno" placeholder="Course No." required="true">
                          		  </div>
                          		  <div class="form-group">
                            			<label for="desc_title">Descriptive Title</label>
                            			<input type="text" class="form-control" id="desc_title" name="dtitle"  placeholder="Descriptive Title" required="true">
                          		  </div>
                        		  <div class="form-group">
                          				<label for="unit">Units</label>
                          				<input type="number" class="form-control" id="unit" name="units"  placeholder="Number of Units"  required="true">
                       			  </div>    
			                        <input type="hidden" name="hid_subject" id="hid_subject" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" name="insert" id="bt_subject" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end