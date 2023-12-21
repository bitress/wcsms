<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small id="faculty-title">Add Faculty Load</small>
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
        <div class="tab-content">
            <div id="background" class="tab-pane fade in active">
            <br>
            <form method="POST" id = "bg_form" class="clear" data-toggle = "validator" role = "form">
              <input type="hidden" name="loadid">
                <div class="row">
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_fname">First Name</label>
                            <input type = "text"  class="form-control" id="faculty_fname" name="facultyfname" placeholder="Enter first name" required = "true">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_mname">Middle Name</label>
                            <input type = "text"  class="form-control" id="faculty_mname" name="facultymname" placeholder="Enter middle name">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="faculty_lname">Last Name</label>
                            <input type = "text" class="form-control" id="faculty_lname" name="facultylname" placeholder="Enter last name" required = "true">
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
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Seperated">Seperated</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="faculty_bdate">Birth Date</label>
                            <input type = "date"  class="form-control" id="faculty_bdate" name="facultybdate">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="status_appointment">Status of Appointment</label>
                            <select class="form-control" name="statusappointment" id="status_appointment" required>
                                <option value="" selected disabled>Select</option>
                                <option value="Contractual">Contractual</option>
                                <option value="Permanent">Permanent</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-3">  
                        <div class="form-group">
                            <label for="monthly_salary">Salary/Month</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="peso">₱</span>
                              <input type="number" name="monthlysalary" class="form-control" id="monthly_salary" aria-describedby="peso"> 
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                </div>
                 <div class="row">
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_idno">ID No.</label>
                            <input type = "text"  class="form-control" id="faculty_idno" name="facultyidno" placeholder="Enter faculty ID No.">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_position">Plantilla/Position</label>
                            <input type = "text"  class="form-control" id="faculty_position" name="facultyposition" placeholder="Enter Plantilla/Position">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="rank">Faculty Rank(NBC)</label>
                            <input list="rank" name ="facultyrank" class="form-control" id="faculty_rank" placeholder="Enter Faculty Rank">
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
                            <input type = "text"  class="form-control" id="undergrad" name="undergrad" placeholder="Enter Bachelor Degree">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="u_major">Major</label>
                            <input type = "text"  class="form-control" id="u_major" name="umajor" placeholder="Enter Bachelor Degree Major">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="u_minor">Minor</label>
                            <input type = "text"  class="form-control" id="u_minor" name="uminor" placeholder="Enter Bachelor Degree Minor">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div> 
                <div class="form-group" style="width: 50%">
                    <label for="voc_tech">Vocational/Technical</label>
                    <input type = "text"  class="form-control" id="voc_tech" name="voctech" placeholder="Enter Voc/Tech Degree" width="">
                    <div class="help-block with-errors"></div>
                </div>

                      
    <h2 class="page-header aheader">
        <small>Graduate:</small>
    </h2>
                <div class="row">
                      <div class="col-sm-6">  
                        <div class="form-group">
                            <label for="masteral_degree">Masteral</label>
                            <input type = "text"  class="form-control" id="masteral_degree" name="masteraldegree" placeholder="Enter Masteral Degree/s (Seperated with comma)">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-2">  
                        <div class="form-group">
                            <label for="faculty_dletter_M">Desg. Letters</label>
                            <input type = "text"  class="form-control" id="faculty_dletter_M" name="facultydletterM" placeholder="i.e. MIT, MBA">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-4">  
                        <div class="form-group">
                            <label for="m_major">Major</label>
                            <input type = "text"  class="form-control" id="m_major" name="mmajor" placeholder="Enter Masteral Degree Major">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div> 
                <div class="row">
                      <div class="col-sm-6">  
                        <div class="form-group">
                            <label for="doctoral_degree">Doctoral</label>
                            <input type = "text"  class="form-control" id="doctoral_degree" name="doctoraldegree" placeholder="Enter Doctoral Degree/s (Seperated with comma)">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-2">  
                        <div class="form-group">
                            <label for="faculty_dletter_D">Desg. Letters</label>
                            <input type = "text"  class="form-control" id="faculty_dletter_D" name="facultydletterD" placeholder="i.e. DIT, Ph.D.">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-sm-4">  
                        <div class="form-group">
                            <label for="d_major">Major</label>
                            <input type = "text"  class="form-control" id="d_major" name="dmajor" placeholder="Enter Doctoral Degree Major">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div>
    <hr>
                <div class="row">
                      <div class="col-lg-6">  
                        <div class="form-group">
                            <label for="department">Department/Unit</label>
                            <input list="department" name ="facultydept" class="form-control" id="faculty_dept" placeholder="Enter Department/Unit" required>
                                <datalist id="department">
                                    <?php include 'fetch_department.php'; ?>
                                </datalist>
                        </div>
                      </div>
                      <div class="col-lg-6">  
                        <div class="form-group">
                            <label for="designation">Designations/Assignments</label>
                            <input list="designation" name ="facultydesg" class="form-control" id="faculty_desg" placeholder="Enter Designation/Assignment" required>
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
                            <input type = "text"  class="form-control" id="CS_E" name="CSE" placeholder="Enter CS Eligibility">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="ex_public">Years of Experience</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="public">Public</span>
                              <input type="text" name="expublic" class="form-control" id="ex_public" aria-describedby="public" placeholder="Enter Years of Experience"> 
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="ex_private" style="visibility: hidden;"> sakfj  </label>
                            <div class="input-group">
                              <span class="input-group-addon" id="private">Private</span>
                              <input type="text" name="exprivate" class="form-control" id="ex_private" aria-describedby="private" placeholder="Enter Years of Experience"> 
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
<!-- *********************************************************RESEARCH*********************************************************************** -->
              <div id="research" class="tab-pane fade"> <!-- research -->
                <br>
                <form method="POST" id = "research_form" class="clear" data-toggle = "validator" role = "form">
                  <input type="hidden" name="rfid">
                  <div class="row"> <!-- 1 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label for="research1">Specify the Title:  </label>
                            <div class="input-group">
                              <span class="input-group-addon" id="1">1.</span>
                              <input type="text" name="r1" class="form-control" id="research1" aria-describedby="1" placeholder="Research Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>

                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_year_from1">From</label>
                            <input type="number" name="r_yearfrom1" class="form-control" id="r_year_from1" placeholder="Year" maxlength="4"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_year_to1">To</label>
                            <input type="number" name="r_yearto1" class="form-control" id="r_year_to1" placeholder="Year" maxlength="4"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_role_1">Role</label>
                            <input type="text" name="r_role1" class="form-control" id="r_role_1" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="r_eql_1">EQL</label>
                            <input type="number" name="r_eql1" class="form-control" id="r_eql_1" placeholder="Pts."> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row"> <!-- 2 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="2">2.</span>
                              <input type="text" name="r2" class="form-control" id="research2" aria-describedby="2" placeholder="Research Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_yearfrom2" class="form-control" id="r_year_from2" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_yearto2" class="form-control" id="r_year_to2" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" name="r_role2" class="form-control" id="r_role_2" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                     <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_eql2" class="form-control" id="r_eql_2" placeholder="Pts."> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row"> <!-- 3 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="3">3.</span>
                              <input type="text" name="r3" class="form-control" id="research3" aria-describedby="3" placeholder="Research Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_yearfrom3" class="form-control" id="r_year_from3" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_yearto3" class="form-control" id="r_year_to3" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" name="r_role3" class="form-control" id="r_role_3" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_eql3" class="form-control" id="r_eql_3" placeholder="Pts."> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row"> <!-- 4 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="2">4.</span>
                              <input type="text" name="r4" class="form-control" id="research4" aria-describedby="4" placeholder="Research Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_yearfrom4" class="form-control" id="r_year_from4" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                           <div class="form-group">
                            <input type="number" name="r_yearto4" class="form-control" id="r_year_to4" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" name="r_role4" class="form-control" id="r_role_4" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="r_eql4" class="form-control" id="r_eql_4" placeholder="Pts."> 
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
                    <input type="hidden" name="efid">
                  <div class="row"> <!-- 1 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label for="ext1">Specify the Project:  </label>
                            <div class="input-group">
                              <span class="input-group-addon" id="1">1.</span>
                              <input type="text" name="e1" class="form-control" id="ext1" aria-describedby="1" placeholder="Project Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>

                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_year_from1">From</label>
                            <input type="number" name="e_yearfrom1" class="form-control" id="e_year_from1" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_year_to1">To</label>
                            <input type="number" name="e_yearto1" class="form-control" id="e_year_to1" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_role_1">Role</label>
                            <input type="text" name="e_role1" class="form-control" id="e_role_1" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="e_eql_1">EQL</label>
                            <input type="number" name="e_eql1" class="form-control" id="e_eql_1" placeholder="Pts."> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row"> <!-- 2 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="2">2.</span>
                              <input type="text" name="e2" class="form-control" id="ext2" aria-describedby="2" placeholder="Project Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_yearfrom2" class="form-control" id="e_year_from2" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_yearto2" class="form-control" id="e_year_to2" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" name="e_role2" class="form-control" id="e_role_2" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                     <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_eql2" class="form-control" id="e_eql_2" placeholder="Pts."> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row"> <!-- 3 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="3">3.</span>
                              <input type="text" name="e3" class="form-control" id="ext3" aria-describedby="3" placeholder="Project Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_yearfrom3" class="form-control" id="e_year_from3" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_yearto3" class="form-control" id="e_year_to3" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" name="e_role3" class="form-control" id="e_role_3" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_eql3" class="form-control" id="e_eql_3" placeholder="Pts."> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row"> <!-- 4 -->
                      <div class="col-sm-4">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="2">4.</span>
                              <input type="text" name="e4" class="form-control" id="ext4" aria-describedby="4" placeholder="Project Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_yearfrom4" class="form-control" id="e_year_from4" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                           <div class="form-group">
                            <input type="number" name="e_yearto4" class="form-control" id="e_year_to4" placeholder="Year"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" name="e_role4" class="form-control" id="e_role_4" placeholder="Enter Role"> 
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="e_eql4" class="form-control" id="e_eql_4" placeholder="Pts."> 
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
                    <div class="row">
                        <div class="col-sm-10">
                          <label for="admin1">Specify the Project:  </label>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="1">1.</span>
                              <input type="text" name="admin1" class="form-control" id="admin1" aria-describedby="1" placeholder="Administration Project Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label for="ad_eql_1">EQL</label>
                            <input type="number" name="ad_eql1" class="form-control" id="ad_eql_1" placeholder="Pts."> 
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="2">2.</span>
                              <input type="text" name="admin2" class="form-control" id="admin2" aria-describedby="2" placeholder="Administration Project Title"> 
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="number" name="ad_eql2" class="form-control" id="ad_eql_2" placeholder="Pts."> 
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
                        <div class="row">
                            <div class="col-sm-10">
                              <label for="assign1">Faculty Assignments</label>
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon" id="1">1.</span>
                                  <input type="text" name="assign1" class="form-control" id="assign1" aria-describedby="1" placeholder="Specify Assignment"> 
                                </div>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <label for="as_eql_1">EQL</label>
                                <input type="number" name="ad_eql1" class="form-control" id="as_eql_1" placeholder="Pts."> 
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon" id="2">2.</span>
                                  <input type="text" name="assign2" class="form-control" id="assign2" aria-describedby="2" placeholder="Specify Assignment"> 
                                </div>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <input type="number" name="ad_eql2" class="form-control" id="as_eql_2" placeholder="Pts."> 
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