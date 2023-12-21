  
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
                    <small>Update Schedule</small>
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
       <?php
           require_once '../../conn.php';

            if (isset($_GET['schedule'])) {
                $sched_id = $_GET['schedule'];

                $query = "SELECT
                          class_schedule.sched_id,
                          class_schedule.course_no,
                          class_schedule.sched_type,
                          class_schedule.time_in,
                          class_schedule.time_out,
                          class_schedule.day,
                          class_schedule.room,
                          class_schedule.class_id,
                          class_schedule.faculty_id,
                          faculty.faculty_fname,
                          faculty.faculty_mname,
                          faculty.faculty_lname,
                          faculty.faculty_dletter
                          FROM
                          class_schedule
                          Inner Join faculty ON faculty.faculty_id = class_schedule.faculty_id
                          WHERE sched_id = '$sched_id'";
                $result = $conn->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $schedid = $row['sched_id'];
                $subject = $row['course_no'];
                $schedtype = $row['sched_type'];
                $room = $row['room'];
                $start = date("h:i A",strtotime($row['time_in']));
                $end = date("h:i A",strtotime($row['time_out']));
                
                $mi = ''; 
                if (!empty($row['faculty_mname'])) {
                  $mi = substr($row['faculty_mname'], 0, 1).'.';
                }

                $dletter = '';
                if (!empty($row['faculty_dletter'])) {
                  $dletter = ', '.$row['faculty_dletter'];
                }

                $instr = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;
                $class_id = $row['class_id'];
                $day = $row['day'];
                $facultyid = $row['faculty_id'];

                $classquery = "SELECT concat(class_course, ' ', class_year, ' ', class_section, ' ', class_major) AS class FROM class WHERE class_id = '$class_id'";
                $classresult = $conn->query($classquery);
                $classrow = $classresult->fetch_array(MYSQLI_ASSOC);
                $class = $classrow['class'];

            }
        ?>
                  <form method="POST" id = "sched_edit_form" class="clear" data-toggle = "validator" role = "form">
                    <!-- row 1 -->
                    <div class="row">
                      <input type="hidden" name="schedid" id="sched_id" value="<?php echo $schedid; ?>">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" list="subject" name ="schedsubject" class="form-control" id="sched_subject" placeholder="Cours No./Descriptive Title" value="<?php echo $subject; ?>" required>
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
                                <option value="LEC" <?php if($schedtype == 'LEC') echo 'selected'; ?>>LEC</option>
                                <option value="LAB" <?php if($schedtype == 'LAB') echo 'selected'; ?>>LAB</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="room">Room</label>
                              <input type="text" list="room" name ="schedroom" class="form-control" id="sched_room" placeholder="Room No." value="<?php echo $room; ?>" required>
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
                            <input type="text" list="timein" name ="timestart" class="form-control" id="time_start" pattern = "(((0[1-9])|(1[0-2])):([0-5])(0|5)\s(A|P)M)" placeholder="HH:MM AM/PM" autocomplete="off" value="<?php echo $start; ?>" required>
                               <datalist id="timein">
                                    <?php call_user_func('time_start'); ?>                            
                                </datalist>   
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-3"> 
                        <div class="form-group">
                            <label for="timeout">Time End</label>
                            <input type="text" list="timeout" name ="timeend" class="form-control" id="time_end" pattern = "(((0[1-9])|(1[0-2])):([0-5])(0|5)\s(A|P)M)" placeholder="HH:MM AM/PM" autocomplete="off" value="<?php echo $end; ?>" required>
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
                                  <input type="checkbox" id="M" class="day" name="day[]" value="M"
                                  <?php if($day == 'M') {echo 'checked';} ?> > M
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="T" class="day" name="day[]" value="T"
                                  <?php if($day == 'T') {echo 'checked';} ?> > T
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="W" class="day" name="day[]" value="W"
                                 <?php if($day == 'W') {echo 'checked';} ?> > W
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="Th" class="day" name="day[]" value="Th"
                                 <?php if($day == 'Th') {echo 'checked';} ?> > Th
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="F"  class="day" name="day[]" value="F"
                                 <?php if($day == 'F') {echo 'checked';} ?> > F
                              </div>
                              <div class="col-lg-2">
                                  <input type="checkbox" id="S"  class="day" name="day[]" value="S"
                                 <?php if($day == 'S') {echo 'checked';} ?> > S
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
                            <input type="text" list="instr" name ="schedinstr" class="form-control" id="sched_instr" placeholder="First name/Last name" autocomplete="off" value="<?php echo $instr; ?>" required>
                                <datalist id="instr">
                                     <?php call_user_func('instructor'); ?>
                                </datalist>
                              <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                              <label for="class">Class</label>
                              <input type="text" list="class" name ="schedclass" class="form-control" id="sched_class" placeholder="Course, Year & Section (Major)" autocomplete="off" value="<?php echo $class; ?>" required>
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
                                <button type="submit" class="btn btn-primary btn-block" id="bt_schedupdate">Update</button>
                             </div>
                        </div> 
                    </form>    
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="sched_edit_clear">Clear</button>
                        </div>
                    </div>            
  </div>
    </div>
    <!-- /.container-fluid -->
<?php include('../include/footer.php');?> 