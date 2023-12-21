<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small id="faculty-title">Faculty Load</small>
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
    <?php include 'fetch_faculty_load.php'; ?> 
    <h2 class="page-header aheader">
        <div class="row">
                <div class="col-lg-6">
                    <small>Faculty Information</small>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="../schedule/instructor_schedule_redirect.php?instructor=<?php echo $fid; ?>" class="btn btn-primary"> <i class="fa fa-fw fa-calendar"></i> View Schedule</a>
                    <a href="faculty_load_update.php?faculty=<?php echo $fid; ?>" class="btn btn-success"> <i class="fa fa-fw fa-edit"></i> Edit</a>
                    <a href="../../report/faculty_load.php?faculty=<?php echo $fid; ?>" class="btn btn-danger"> <i class="fa fa-fw fa-print"></i> Print</a>
                </div>
            </div>
    </h2>
              <table class="table">
                  <tr>
                    <td><b>First Name:</b></td> <td><?php echo $fname; ?></td>
                    <td><b>Middle Name: </b></td> <td><?php echo $mname; ?></td>
                    <td><b>Last Name: </b></td> <td><?php echo $lname; ?></td>
                  </tr>
                  <tr>
                    <td><b>Civil Status:</b> </td> <td><?php echo $cstatus; ?></td>
                    <td><b>Birth Date: </b></td> <td> <?php echo $birthdate2; ?></td>
                    <td><b>Status of Appointment:</b> </td> <td><?php echo $apstatus; ?></td>
                  </tr>
                  <tr>
                    <td ><b>Salary/Month:</b> </td> <td>₱<?php echo number_format($salary); ?>.00</td>
                    <td ><b>ID No.:</b> </td><td> <?php echo $idno; ?></td>
                    <td><b>Plantilla/Position:</b></td><td><?php echo $pos; ?></td>
                  </tr>
                  <tr>
                    
                    <td><b>Faculty Rank(NBC):</b></td><td><?php echo $rank; ?></td>
                  </tr>
              </table>


    <h2 class="page-header aheader">
        <small>Degree/s:</small>
    </h2>
              <table class="table">
                <tr>
                    <td width="20%"><b>Undergraduate: </b></td><td width="30%"><?php echo $bachdeg; ?></td>
                    <td><b>Major: </b></td><td><?php echo $bachma; ?></td>
                    <td><b>Minor: </b></td><td><?php echo $bachmi; ?></td>
                </tr>
                <tr>
                    <td><b>Vocational/Technical:</b></td><td><?php echo $voctech; ?></td>
                </tr>
              </table> 
  
                      
    <h2 class="page-header aheader">
        <small>Graduate:</small>
    </h2>
               <table class="table">
                  <tr>
                    <td width="20%"><b>Masteral: </b></td><td width="55%"><?php echo $masdeg; ?></td>
                    <td><b>Major:</b></td><td><?php echo $masma; ?></td>
                  </tr>
                  <tr>
                    <td><b>Doctoral: </b></td><td><?php echo $docdeg; ?></td>
                    <td><b>Major:</b></td><td><?php echo $docma; ?></td>
                  </tr>  
               </table>
                        
       <hr>              
      
              <table class="table">
                  <tr>
                    <td width="30%"><b>Department/Unit: </b></td><td><?php echo $fdept; ?></td>
                    <td width="33%"><b>Designations/Assignments:</b></td><td><?php echo $fdesg; ?></td>
                  </tr>
                  <tr>
                    <td><b>CS Eligibility/ies:</b></td><td><?php echo $cse; ?></td>
                  </tr>
                  <tr>
                    <td><b>Yrs. of Experience in Public:</b></td><td><?php echo $pub; ?></td>
                    <td><b>In Private:</b></td><td colspan="2"><?php echo $pri; ?></td>
                  </tr>  
               </table>
            
    <br>
                <!-- end faculty info --> 
<!-- *********************************************************RESEARCH*********************************************************************** -->
<h2 class="page-header aheader">
    <small>Research</small>
</h2>    

            <table class="table table-bordered">
              <tr>
                <td width="5%"></td>
                <td width="35%"><b>Title</b></td>
                <td width="15%"><b>From</b></td>
                <td width="15%"><b>To</b></td>
                <td width="20%"><b>Role</b></td>
                <td width="10%"><b>EQL</b></td>
              </tr>

              <?php
                  require_once '../../conn.php';
                  if (isset($_GET['faculty'])) {

                    $facultyid = $_GET['faculty'];
                    $r_query = "SELECT * FROM research WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                    $r_result = $conn->query($r_query);
                    while($r_row = $r_result->fetch_array(MYSQLI_ASSOC)){
                      $rcnt = $r_row['rcnt'];
                      $rtitle = $r_row['research_title'];
                      $rfrom = $r_row['from'];
                      $rto = $r_row['to'];
                      $rrole =$r_row['role'];
                      $reql =$r_row['eql'];
              ?>
              <tr>
                <td><b><?php echo $rcnt; ?>.</b></td> 
                <td><?php echo $rtitle; ?></td>
                <td><?php echo $rfrom; ?></td>
                <td><?php echo $rto; ?></td>
                <td><?php echo $rrole; ?></td>
                <td><?php echo $reql; ?></td>
              </tr>
              <?php 
                  }
               } 
              ?>
            </table>   
            <br>     
<!--*********************************************************EXTENSION******************************************************************* -->
<h2 class="page-header aheader">
    <small>Extension/Production</small>
</h2>    

            <table class="table table-bordered">
              <tr>
                <td width="5%"></td>
                <td width="35%"><b>Project</b></td>
                <td width="15%"><b>From</b></td>
                <td width="15%"><b>To</b></td>
                <td width="20%"><b>Role</b></td>
                <td width="10%"><b>EQL</b></td>
              </tr>
              <?php
                    require_once '../../conn.php';
                    if (isset($_GET['faculty'])) {

                      $facultyid = $_GET['faculty'];
                      $e_query = "SELECT * FROM extension WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                      $e_result = $conn->query($e_query);
                      $i = 1;
                      while($e_row = $e_result->fetch_array(MYSQLI_ASSOC)){
                        $ext = $e_row['ext_project'];
                        $ecnt = $e_row['ecnt'];
                        $efrom = $e_row['from'];
                        $eto = $e_row['to'];
                        $erole =$e_row['role'];
                        $eeql =$e_row['eql_point'];
                  ?>
              <tr>
                <td><b><?php echo $ecnt; ?>.</b></td> 
                <td><?php echo $ext; ?></td>
                <td><?php echo $efrom; ?></td>
                <td><?php echo $eto; ?></td>
                <td><?php echo $erole; ?></td>
                <td><?php echo $eeql; ?></td>
              </tr>
              <?php 
                  }
               } 
              ?>
            </table>   
           <br>         
<!--*********************************************************ADMINISTRATION********************************************************************* -->   
<h2 class="page-header aheader">
    <small>Administration</small>
</h2>    

            <table class="table table-bordered">
              <tr>
                <td width="5%"></td>
                <td width="85%"><b>Project</b></td>
                <td width="10%"><b>EQL</b></td>
              </tr>
              <?php
                    require_once '../../conn.php';
                    if (isset($_GET['faculty'])) {

                      $facultyid = $_GET['faculty'];
                      $ad_query = "SELECT * FROM administration WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                      $ad_result = $conn->query($ad_query);
                      $i = 1;
                      while($ad_row = $ad_result->fetch_array(MYSQLI_ASSOC)){
                        $adproject = $ad_row['admin_project'];
                        $adcnt = $ad_row['adcnt'];
                        $adeql =$ad_row['eql_point'];
                  ?>
              <tr>
                <td><b><?php echo $adcnt; ?>.</b></td>
                <td><?php echo $adproject; ?></td>
                <td><?php echo $adeql; ?></td>
              </tr>  
                <?php 
                  }
               } 
              ?>
            </table>
              <br>     
<!-- *********************************************************ASSIGNMENT**************************************************************************** -->
<h2 class="page-header aheader">
    <small>Other Assignments</small>
</h2>    

            <table class="table table-bordered">
              <tr>
                <td width="5%"></td>
                <td width="85%"><b>Assignments</b></td>
                <td width="10%"><b>EQL</b></td>
              </tr>
                  <?php
                    require_once '../../conn.php';
                    if (isset($_GET['faculty'])) {

                      $facultyid = $_GET['faculty'];
                      $as_query = "SELECT * FROM assignment WHERE faculty_id = '$facultyid' AND setting_id = '$currentsettings'";
                      $as_result = $conn->query($as_query);
                      $i = 1;
                      while($as_row = $as_result->fetch_array(MYSQLI_ASSOC)){
                        $assign = $as_row['assignment'];
                        $ascnt = $as_row['ascnt'];
                        $aseql =$as_row['eql_point'];
                  ?>
              <tr>
                <td><b><?php echo $ascnt; ?>.</b></td>
                <td><?php echo $assign; ?></td>
                <td><?php echo $aseql; ?></td>
              </tr>  
                <?php 
                  }
               } 
              ?>
              </table>               
   </div> <!-- body -->         

    </div>
    <!-- /.container-fluid -->
<?php include('../include/footer.php'); ?>