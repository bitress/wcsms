<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small id="faculty-title">Update Faculty Load</small>
                </h1>
                <hr>
            </div>
            <!-- <div class="century">
                <span data-toggle="modal" data-target="#add_faculty_Modal">
                    <button class="btn btn-primary btn-lg page-header float" data-toggle = "tooltip" data-placement = "left" title = "Add New Faculty" id="add_faculty" >
                        <i class="fa fa-plus"></i> 
                    </button>
                </span>    
            </div> -->
            <div class="century">
                    <a href = "#" id="back" class="btn btn-default btn-lg page-header smcreate" data-toggle = "tooltip" data-placement = "left" title = "Go Back"><i class="fa fa-chevron-left fa-lg"></i></a> 
            </div>
                
        </div>
        <div class="breadcrumb sub">
                  <?php include('../include/breadcrumb.php'); ?>
                </div>
  <div class="body">
    <h2 class="page-header aheader">
        <small>Faculty Information</small>
    </h2>
         <ul class="nav nav-tabs">
            <li class="active"><a class="tabs" data-toggle="tab" href="#background"><i class="fa fa-fw fa-user-circle-o"></i> Background</a></li>
            <li><a class="tabs" data-toggle="tab" href="#research"><i class="fa fa-fw fa-book"></i> Research</a></li>
            <li><a class="tabs" data-toggle="tab" href="#extprod"><i class="fa fa-fw fa-external-link"></i> Extension/Production</a></li>
            <li><a class="tabs" data-toggle="tab" href="#admin"><i class="fa fa-fw fa-university"></i> Administration</a></li>
            <li><a class="tabs" data-toggle="tab" href="#assignment"><i class="fa fa-fw fa-tasks"></i> Other Assignments</a></li>
          </ul>
        <!-- faculty info -->
        <?php include 'fetch_faculty_load.php'; ?>
        <div class="tab-content">
            <div id="background" class="tab-pane fade in active">
            <br>
            <form method="POST" id = "bg_form" class="clear" data-toggle = "validator" role = "form">
              <input type="hidden" name="loadid" value="<?php echo $fid; ?>">
                <div class="row">
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_fname">First Name</label>
                            <input type = "text"  class="form-control" id="faculty_fname" name="facultyfname" placeholder="Enter first name" required = "true" value="<?php echo $fname; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_mname">Middle Name</label>
                            <input type = "text"  class="form-control" id="faculty_mname" name="facultymname" placeholder="Enter middle name" value="<?php echo $mname; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="faculty_lname">Last Name</label>
                            <input type = "text" class="form-control" id="faculty_lname" name="facultylname" placeholder="Enter last name" required = "true" value="<?php echo $lname; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div>
                <div class="row">
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="civil_status">Civil Status</label>
                            <select class="form-control" name="civilstatus" id="civil_status" required>
                                <option value="" selected disabled>Select</option>
                                <option value="Single" <?php if($cstatus == 'Single') echo 'selected'; ?>>Single</option>
                                <option value="Married" <?php if($cstatus == 'Married') echo 'selected'; ?>>Married</option>
                                <option value="Divorced" <?php if($cstatus == 'Divorced') echo 'selected'; ?>>Divorced</option>
                                <option value="Seperated" <?php if($cstatus == 'Seperated') echo 'selected'; ?>>Seperated</option>
                                <option value="Widowed" <?php if($cstatus == 'Widowed') echo 'selected'; ?>>Widowed</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="faculty_bdate">Birth Date</label>
                            <input type = "date"  class="form-control" id="faculty_bdate" name="facultybdate" value="<?php echo $birthdate; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="status_appointment">Status of Appointment</label>
                            <select class="form-control" name="statusappointment" id="status_appointment" required>
                                <option value="" selected disabled>Select</option>
                                <option value="Contractual" <?php if($apstatus == 'Contractual') echo 'selected'; ?>>Contractual</option>
                                <option value="Permanent" <?php if($apstatus == 'Permanent') echo 'selected'; ?>>Permanent</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="monthly_salary">Salary/Month</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="peso">₱</span>
                              <input type="number" name="monthlysalary" class="form-control" id="monthly_salary" aria-describedby="peso" value="<?php echo $salary; ?>"> 
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                </div>
                 <div class="row">
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_idno">ID No.</label>
                            <input type = "text"  class="form-control" id="faculty_idno" name="facultyidno" placeholder="Enter faculty ID No." value="<?php echo $idno; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_position">Plantilla/Position</label>
                            <input type = "text"  class="form-control" id="faculty_position" name="facultyposition" placeholder="Enter Plantilla/Position" value="<?php echo $pos; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="rank">Faculty Rank(NBC)</label>
                            <input list="rank" name ="facultyrank" class="form-control" id="faculty_rank" placeholder="Enter Faculty Rank" value="<?php echo $rank; ?>">
                                <datalist id="rank">
                                    <?php include 'fetch_rank.php'; ?>
                                </datalist>
                        </div>
                      </div>  
                </div>
    <h2 class="page-header aheader">
        <small>Degree/s:</small>
    </h2>
                <div class="row">
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="undergrad">Undergraduate</label>
                            <input type = "text"  class="form-control" id="undergrad" name="undergrad" placeholder="Enter Bachelor Degree" value="<?php echo $bachdeg; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="u_major">Major</label>
                            <input type = "text"  class="form-control" id="u_major" name="umajor" placeholder="Enter Bachelor Degree Major" value="<?php echo $bachma; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="u_minor">Minor</label>
                            <input type = "text"  class="form-control" id="u_minor" name="uminor" placeholder="Enter Bachelor Degree Minor" value="<?php echo $bachmi; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div> 
                <div class="form-group" style="width: 50%">
                    <label for="voc_tech">Vocational/Technical</label>
                    <input type = "text"  class="form-control" id="voc_tech" name="voctech" placeholder="Enter Voc/Tech Degree" value="<?php echo $voctech; ?>">
                    <div class="help-block with-errors"></div>
                </div>

                      
    <h2 class="page-header aheader">
        <small>Graduate:</small>
    </h2>
                <div class="row">
                      <div class="col-sm-6">  
                        <div class="form-group">
                            <label for="masteral_degree">Masteral</label>
                            <input type = "text"  class="form-control" id="masteral_degree" name="masteraldegree" placeholder="Enter Masteral Degree/s (Seperated with comma)" value="<?php echo $masdeg; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-2">  
                        <div class="form-group">
                            <label for="faculty_dletter_M">Desg. Letters</label>
                            <input type = "text"  class="form-control" id="faculty_dletter_M" name="facultydletterM" placeholder="i.e. MIT, MBA" value="<?php echo $masdletter; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-4">  
                        <div class="form-group">
                            <label for="m_major">Major</label>
                            <input type = "text"  class="form-control" id="m_major" name="mmajor" placeholder="Enter Masteral Degree Major" value="<?php echo $masma; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div> 
                <div class="row">
                      <div class="col-sm-6">  
                        <div class="form-group">
                            <label for="doctoral_degree">Doctoral</label>
                            <input type = "text"  class="form-control" id="doctoral_degree" name="doctoraldegree" placeholder="Enter Doctoral Degree/s (Seperated with comma)" value="<?php echo $docdeg; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-2">  
                        <div class="form-group">
                            <label for="faculty_dletter_D">Desg. Letters</label>
                            <input type = "text"  class="form-control" id="faculty_dletter_D" name="facultydletterD" placeholder="i.e. DIT, Ph.D." value="<?php echo $docdletter; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-4">  
                        <div class="form-group">
                            <label for="d_major">Major</label>
                            <input type = "text"  class="form-control" id="d_major" name="dmajor" placeholder="Enter Doctoral Degree Major" value="<?php echo $docma; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div>
    <hr>
                <div class="row">
                      <div class="col-lg-6">  
                        <div class="form-group">
                            <label for="department">Department/Unit</label>
                            <input list="department" name ="facultydept" class="form-control" id="faculty_dept" placeholder="Enter Department/Unit" required value="<?php echo $fdept; ?>">
                                <datalist id="department">
                                    <?php include 'fetch_department.php'; ?>
                                </datalist>
                        </div>
                      </div>
                      <div class="col-lg-6">  
                        <div class="form-group">
                            <label for="designation">Designations/Assignments</label>
                            <input list="designation" name ="facultydesg" class="form-control" id="faculty_desg" placeholder="Enter Designation/Assignment" value="<?php echo $fdesg; ?>">
                                <datalist id="designation">
                                    <?php include 'fetch_designation.php'; ?>
                                </datalist>
                        </div>
                      </div>  
                </div>
                <div class="row">
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="CS_E">CS Eligibility/ies</label>
                            <input type = "text"  class="form-control" id="CS_E" name="CSE" placeholder="Enter CS Eligibility" value="<?php echo $cse; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="ex_public">Years of Experience</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="public">Public</span>
                              <input type="text" name="expublic" class="form-control" id="ex_public" aria-describedby="public" placeholder="Enter Years of Experience" value="<?php echo $pub; ?>"> 
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="ex_private" style="visibility: hidden;"> sakfj  </label>
                            <div class="input-group">
                              <span class="input-group-addon" id="private">Private</span>
                              <input type="text" name="exprivate" class="form-control" id="ex_private" aria-describedby="private" placeholder="Enter Years of Experience" value="<?php echo $pri; ?>"> 
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div>
                <hr>
                    <div class="row">
                        <div class="col-md-8">
                        </div> 
                        <div class="col-md-2 colsave">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_bginfo">Save</button>
                             </div>
                        </div>    
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                        </div>
                    </div> 
               </form>     
                <!-- end faculty info --> 
              </div> <!-- end tab background -->
<!-- *********************************************************RESEARCH************************************************************************ -->
              <div id="research" class="tab-pane fade"> <!-- research -->
                <br>
                <form method="POST" id = "research_form" class="clear" data-toggle = "validator" role = "form">
                  <?php
                    require_once '../../conn.php';
                    if (isset($_GET['faculty'])) {

                      $facultyid = $_GET['faculty'];
                      $r_query = "SELECT * FROM research WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                      $r_result = $conn->query($r_query);
                      $i = 1;
                      while($r_row = $r_result->fetch_array(MYSQLI_ASSOC)){
                        $rtitle = $r_row['research_title'];
                        $rfrom = $r_row['from'];
                        $rto = $r_row['to'];
                        $rrole =$r_row['role'];
                        $reql =$r_row['eql'];
                        $rfid = $r_row['faculty_id'];
                  ?>
                  <input type="hidden" name="rfid" value="<?php echo $rfid; ?>">
                  <div class="row"> <!-- 1 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label for="research<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>Specify the Title:  </label>
                            <div class="input-group">
                              <span class="input-group-addon" id="<?php echo $i; ?>"><?php echo $i; ?>.</span>
                              <input type="text" name="r<?php echo $i; ?>" class="form-control" id="research<?php echo $i; ?>" aria-describedby="<?php echo $i; ?>" placeholder="Research Title" value ="<?php echo $rtitle; ?>"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_year_from<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>From</label>
                            <input type="number" name="r_yearfrom<?php echo $i; ?>" class="form-control" id="r_year_from<?php echo $i; ?>" placeholder="Year" maxlength="4" value="<?php echo $rfrom; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_year_to<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>To</label>
                            <input type="number" name="r_yearto<?php echo $i; ?>" class="form-control" id="r_year_to<?php echo $i; ?>" placeholder="Year" maxlength="4" value="<?php echo $rto; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_role_<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>Role</label>
                            <input type="text" name="r_role<?php echo $i; ?>" class="form-control" id="r_role_<?php echo $i; ?>" placeholder="Enter Role" value="<?php echo $rrole; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_eql_<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>EQL</label>
                            <input type="number" name="r_eql<?php echo $i; ?>" class="form-control" id="r_eql_<?php echo $i; ?>" placeholder="Pts." value="<?php echo $reql; ?>">
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <?php 
                      $i++;
                      }
                    }  
                  ?>
                  
                  <hr>
                  <div class="row">
                        <div class="col-md-8">
                        </div> 
                        <div class="col-md-2 colsave">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_research">Save</button>
                             </div>
                        </div>    
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                        </div>
                    </div>
                </form>      
              </div> <!-- end research -->
<!--*********************************************************EXTENSION************************************************************************************ -->
              <div id="extprod" class="tab-pane fade"> <!-- extension -->
                  <br>
                  <form method="POST" id = "ext_form" class="clear" data-toggle = "validator" role = "form">
                    <?php
                    require_once '../../conn.php';
                    if (isset($_GET['faculty'])) {

                      $facultyid = $_GET['faculty'];
                      $e_query = "SELECT * FROM extension WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                      $e_result = $conn->query($e_query);
                      $i = 1;
                      while($e_row = $e_result->fetch_array(MYSQLI_ASSOC)){
                        $ext = $e_row['ext_project'];
                        $efrom = $e_row['from'];
                        $eto = $e_row['to'];
                        $erole =$e_row['role'];
                        $eeql =$e_row['eql_point'];
                        $efid = $e_row['faculty_id'];
                  ?>
                  <input type="hidden" name="efid" value="<?php echo $efid; ?>">
                  <div class="row"> <!-- 1 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label for="ext<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>Specify the Project:  </label>
                            <div class="input-group">
                              <span class="input-group-addon" id="<?php echo $i; ?>"><?php echo $i; ?>.</span>
                              <input type="text" name="e<?php echo $i; ?>" class="form-control" id="ext<?php echo $i; ?>" aria-describedby="<?php echo $i; ?>" placeholder="Project Title" value ="<?php echo $ext; ?>"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>

                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_year_from<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>From</label>
                            <input type="number" name="e_yearfrom<?php echo $i; ?>" class="form-control" id="e_year_from<?php echo $i; ?>" placeholder="Year" maxlength="4" value ="<?php echo $efrom; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_year_to<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>To</label>
                            <input type="number" name="e_yearto<?php echo $i; ?>" class="form-control" id="e_year_to<?php echo $i; ?>" placeholder="Year" maxlength="4" value ="<?php echo $eto; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_role_<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>Role</label>
                            <input type="text" name="e_role<?php echo $i; ?>" class="form-control" id="e_role_<?php echo $i; ?>" placeholder="Enter Role" value ="<?php echo $erole; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_eql_<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>EQL</label>
                            <input type="number" name="e_eql<?php echo $i; ?>" class="form-control" id="e_eql_<?php echo $i; ?>" placeholder="Pts." value ="<?php echo $eeql; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <?php 
                      $i++;
                      }
                    }  
                  ?>
                  <hr>
                  <div class="row">
                        <div class="col-md-8">
                        </div> 
                        <div class="col-md-2 colsave">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_research">Save</button>
                             </div>
                        </div>    
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                        </div>
                    </div>
               </form>      
              </div>
<!-- *********************************************************ADMINISTRATION************************************************************************************ -->   
              <div id="admin" class="tab-pane fade">
               <br>
               <form method="POST" id = "admin_form" class="clear" data-toggle = "validator" role = "form">
                <?php
                    require_once '../../conn.php';
                    if (isset($_GET['faculty'])) {

                      $facultyid = $_GET['faculty'];
                      $ad_query = "SELECT * FROM administration WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                      $ad_result = $conn->query($ad_query);
                      $i = 1;
                      while($ad_row = $ad_result->fetch_array(MYSQLI_ASSOC)){
                        $adproject = $ad_row['admin_project'];
                        $adeql =$ad_row['eql_point'];
                        $adfid = $ad_row['faculty_id'];
                  ?>
                   <input type="hidden" name="adfid" value="<?php echo $adfid; ?>">
                    <div class="row">
                        <div class="col-sm-10">
                          <label for="admin<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>Specify the Project:  </label>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="<?php echo $i; ?>"><?php echo $i; ?>.</span>
                              <input type="text" name="admin<?php echo $i; ?>" class="form-control" id="admin<?php echo $i; ?>" aria-describedby="<?php echo $i; ?>" placeholder="Administration Project Title" value ="<?php echo $adproject; ?>"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label for="ad_eql_<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>EQL</label>
                            <input type="number" name="ad_eql<?php echo $i; ?>" class="form-control" id="ad_eql_<?php echo $i; ?>" placeholder="Pts." value ="<?php echo $adeql; ?>"> 
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                    </div>
                    <?php 
                      $i++;
                      }
                    }  
                  ?>
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                        </div> 
                        <div class="col-md-2 colsave">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_admin">Save</button>
                             </div>
                        </div>    
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                        </div>
                    </div>
               </form>   
              </div>
<!-- *********************************************************ASSIGNMENT************************************************************************************ -->
              <div id="assignment" class="tab-pane fade">
                  <br>
                   <form method="POST" id = "assign_form" class="clear" data-toggle = "validator" role = "form">
                    <?php
                    require_once '../../conn.php';
                    if (isset($_GET['faculty'])) {

                      $facultyid = $_GET['faculty'];
                      $as_query = "SELECT * FROM assignment WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                      $as_result = $conn->query($as_query);
                      $i = 1;
                      while($as_row = $as_result->fetch_array(MYSQLI_ASSOC)){
                        $assign = $as_row['assignment'];
                        $aseql =$as_row['eql_point'];
                        $asfid = $as_row['faculty_id'];
                  ?>
                   <input type="hidden" name="asfid" value="<?php echo $asfid; ?>">
                        <div class="row">
                            <div class="col-sm-10">
                              <label for="assign<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>Faculty Assignments</label>
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon" id="<?php echo $i; ?>"><?php echo $i; ?>.</span>
                                  <input type="text" name="assign<?php echo $i; ?>" class="form-control" id="assign<?php echo $i; ?>" aria-describedby="<?php echo $i; ?>" placeholder="Specify Assignment" value ="<?php echo $assign; ?>"> 
                                </div>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <label for="as_eql_<?php echo $i; ?>" <?php if($i>1)echo 'hidden'; ?>>EQL</label>
                                <input type="number" name="as_eql<?php echo $i; ?>" class="form-control" id="as_eql_<?php echo $i; ?>" placeholder="Pts." value ="<?php echo $aseql; ?>"> 
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                        </div>
                       <?php 
                          $i++;
                          }
                        }  
                      ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                            </div> 
                            <div class="col-md-2 colsave">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" id="bt_assign">Save</button>
                                 </div>
                            </div>    
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                            </div>
                        </div>
                   </form>
              </div>
        </div> <!-- end tab-content -->           
   </div> <!-- body -->         

    </div>
    <!-- /.container-fluid -->
<?php include('../include/footer.php'); ?>