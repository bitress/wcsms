 <!-- modal add data  -->
	 <div id="add_rank_Modal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                          <div class="modal-header">  
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button> 
                            <h3 id = "title-rank" class="modal-title">Add Rank</h3>  
                                 
                          </div>  
                          <div class="modal-body">  
                               <form method="post" id="insert_rank" class = "clear">  
                                <div class="form-group">
                            			<label for="desg">Faculty Rank</label>
                            			<input type="text" class="form-control" id="rank" name="rank" placeholder="Specify Rank" required="true">
                          		  </div>
			                        <input type="hidden" name="hid_rank" id="hid_rank" />                          
                          </div>  <!-- modal-body -->
                          <div class="modal-footer">  
                             	<input type="submit" id="bt_rank" value="Submit" class="btn btn-primary" /> 
                        	 </form>
                     			 <button type="button" id = "clear" class="btn btn-default">Clear</button>
                          </div>  
                     </div>  
                </div>  
           </div>

           <!-- modal add data end