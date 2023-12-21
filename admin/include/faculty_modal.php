 <!-- modal add data  -->
	 <div id="add_faculty_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-faculty" class="modal-title">Add Faculty</h3>   
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_faculty" class ="clear">  
                          		  <div class="form-group">
                                  <label for="faculty_fname">First Name</label>
                                  <input type = "text" class="form-control" id="faculty_fname" name="facultyfname" placeholder="Enter first name" required = "true">
                                </div>
                                <div class="form-group">
                                  <label for="faculty_fname">Middle Name</label>
                                  <input type = "text" class="form-control" id="faculty_mname" name="facultymname" placeholder="Enter midlle name">
                                </div>
                                <div class="form-group">
                                  <label for="faculty_lname">Last Name</label>
                                  <input type = "text" class="form-control" id="faculty_lname" name="facultylname" placeholder="Enter last name" required = "true">
                                </div>
                                <!-- <div class="form-group">
                                  <label for="faculty_dletter">Designatory Letter</label>
                                  <input type = "text" class="form-control" id="faculty_dletter" name="facultydletter" placeholder="Enter designatory letter - i.e. Ph.D., MBA (Optional)">
                                </div> -->
                                 <div class="form-group">
                                    <label for="department">Department</label>
                                    <input list="department" name ="facultydept" class="form-control" id="faculty_dept" placeholder="Enter department" required>
                                      <datalist id="department">
                                          <?php include 'fetch_department.php'; ?>
                                      </datalist>
                                  </div>

			                        <input type="hidden" name="hid_faculty" id="hid_faculty" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer"> 
                              <a href="faculty_load.php" class="btn btn-danger pull-left" id="fload"> <i class="fa fa-fw fa-clipboard"></i>More Details</a> 
                             	<input type="submit" id="bt_faculty" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id ="clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end