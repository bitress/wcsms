 <!-- modal add data  -->
	 <div id="add_user_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 class="modal-title" id="title-user" >Set Account Details</h3>  
                                 
                          </div>  
                          <div class="modal-body">
                            <form method="post" id="set_user_account" class = "clear">  
                            <div class="form-group">
                              <label for="instr">Instructor</label>
                              <input type="text" list="instr" name ="facultyname" class="form-control" id="faculty_name" placeholder="First name/Last name" required>
                                  <datalist id="instr">
                                       <?php call_user_func('instructor'); ?>
                                  </datalist>
                                <div class="help-block with-errors"></div>
                            </div>
                          		  <div class="form-group">
                                  <label for="user_level">User Level</label>
                                    <select class="form-control" id="user_level" name="userlevel" required>
                                      <option value="" selected disabled>Select User Level</option>
                                      <option value="admin">Administrator</option>
                                      <option value="user">User</option>
                                    </select>
                                </div>    
                                   <div class="form-group">
                                      <label for="user_name">Username</label>
                                      <input type="text" class="form-control" id="user_name" name="username" placeholder="Enter username" required="true">
                                   </div> 
                                   <div class="form-group">
                                      <label for="pass_word">Password</label>
                                      <input type="password" class="form-control" id="pass_word" name="password" placeholder="Enter password" required="true">
                                   </div> 
			                        <input type="hidden" name="hid_user" id="hid_user" />
                              <input type="hidden" name="hid_fac" id="hid_fac" />                         
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" id="bt_user" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end