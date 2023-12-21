<?php
    include('../include/header_sched.php');
    include('../include/sidebar.php');
?>
<?php require_once 'fetch_functions.php'; ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Create Schedule</small>
                </h1>
                <hr>
            </div>

             <div class="century">
                    <a href = "#" id="back" class="btn btn-default btn-lg page-header smcreate" data-toggle = "tooltip" data-placement = "left" title = "Go Back"><i class="fa fa-chevron-left fa-lg"></i></a> 
            </div>
        </div>
        <div class="breadcrumb sub">
                   <?php include('../include/breadcrumb.php'); ?>
                </div>
  <div class="body">
        <!-- <h2 class="page-header aheader">
                    <small>Create Schedule</small>
                </h2>  --> 
                  <form method="POST" id = "sched_form" class="clear" data-toggle = "validator" role = "form">
                    <!-- row 1 -->
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" list="subject" name ="schedsubject" class="form-control" id="sched_subject" placeholder="Cours No./Descriptive Title" required>
                                <datalist id="subject">
                                     <?php call_user_func('subject'); ?>
                                </datalist>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="col-sm-2 text">
                        <div class="form-group">
                            <label for="sched_type">Lec/Lab</label>
                            <select class="form-control" name="schedtype" id="sched_type">
                                <!-- <option value="" selected disabled></option> -->
                                <option value="LEC">LEC</option>
                                <option value="LAB">LAB</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="room">Room</label>
                              <input type="text" list="room" name ="schedroom" class="form-control" id="sched_room" placeholder="Room No." required>
                                  <datalist id="room">
                                       <?php call_user_func('room'); ?>
                                  </datalist>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div> <!-- row 1 end --> 

                    <!-- row 2 -->
                    <div class="row">
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="timein">Time Start</label>
                            <input type="text" list="timein" name ="timestart" class="form-control" id="time_start" pattern = "(((0[1-9])|(1[0-2])):([0-5])(0|5)\s(A|P)M)" placeholder="HH:MM AM/PM" autocomplete="off" required>
                               <datalist id="timein">
                                    <?php call_user_func('time_start'); ?>                            
                             </datalist>   
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-3"> 
                        <div class="form-group">
                            <label for="timeout">Time End</label>
                            <input type="text" list="timeout" name ="timeend" class="form-control" id="time_end" pattern = "(((0[1-9])|(1[0-2])):([0-5])(0|5)\s(A|P)M)" placeholder="HH:MM AM/PM" autocomplete="off" required>
                               <datalist id="timeout">
                                    <?php call_user_func('time_end'); ?>                            
                                </datalist>   
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    <div class="form-group">
                      <div class="col-lg-6">
                        <div class="row">
                          <div class="col-lg-1">
                              <label class="text-center">Day</label>
                           </div>
                        </div>
                        <div class="row text-center">
                              <div class="col-lg-2">
                                  <input type="checkbox" id="M" class="day" name="day[]" value="M"> M
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="T" class="day" name="day[]" value="T"> T
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="W" class="day" name="day[]" value="W"> W
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="Th" class="day" name="day[]" value="Th"> Th
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="F"  class="day" name="day[]" value="F"> F
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="S"  class="day" name="day[]" value="S"> S
                              </div>
                            </div>  
                          <div class="row text-center">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                      </div>
                      
                      </div> <!-- row 2 end --> 

                      <!-- row 3 -->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="instr">Instructor</label>
                            <input type="text" list="instr" name ="schedinstr" class="form-control" id="sched_instr" placeholder="First name/Last name" autocomplete="off" required>
                                <datalist id="instr">
                                     <?php call_user_func('instructor'); ?>
                                </datalist>
                              <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="sched_class">Class</label>
                            <!--   <div class="input-group">
                                <span class="input-group-addon" data-toggle = "tooltip" data-placement = "bottom" title = "Add class">
                                <a href="#" data-toggle = "modal" data-target = "#add_class_Modal" ><i class="fa fa-plus"></i></a>
                                </span> -->
                                <input type="text" list="class" name ="schedclass" class="form-control" id="sched_class" placeholder="Course, Year & Section (Major)" autocomplete="off" required>
                                  <datalist id="class">
                                       <?php call_user_func('clasz'); ?>
                                  </datalist>
                              <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div> <!-- row 3 end --> 
                    <hr>
                    <div class="row">
                        <div class="col-md-8 conflict">
                            <i>Note: Please input time first before selecting the day.</i>
                        </div> 
                        <div class="col-md-2 colsave">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_accountupdate">Save</button>
                             </div>
                        </div> 
                    </form>    
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="sched_clear">Clear</button>
                        </div>
                    </div>            
  </div>
    </div>
    <!-- /.container-fluid -->
<?php include('../include/class_modal.php');?>     
<?php include('../include/footer.php');?> 