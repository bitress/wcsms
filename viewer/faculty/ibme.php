<?php 
    session_start();    
    require_once '../../conn.php';
    $query2 = "SELECT settings_id, settings_sy, settings_sem FROM settings WHERE settings_status = 'active'";
    $result2 = $conn->query($query2);
    $active = $result2->fetch_array(MYSQLI_ASSOC);
    $_SESSION['current_settings'] = $active['settings_id'];
    $_SESSION['current_sy'] = $active['settings_sy'];
    $_SESSION['current_sem'] = $active['settings_sem'];
?>
<?php include('../include/header.php'); ?>
    <div class="sidebar-menu">
                    <header class="logo1">
                        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
                    </header>
                        <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
                               <ul id="menu" >
                                    <li><a href="cas.php"><i class="fa fa-fw fa-minus"></i><span>CAS</span></a></li>
                                    <li><a href="cte.php"><i class="fa fa-fw fa-minus"></i><span>CTE</span></a></li>
                                    <li><a href="ibme.php"><i class="fa fa-fw fa-minus"></i><span>IBME</span></a></li>
                                    <li><a href="ics.php"><i class="fa fa-fw fa-minus"></i><span>ICS</span></a></li>
                                    <li><a href="gs.php"><i class="fa fa-fw fa-minus"></i><span>GS</span></a></li>
                                </ul>
                            </div>
                </div> <!-- end side-bar -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>IBME Faculty Schedules</small>
                </h1>
                <hr>
            </div>
            <!-- <div class="century">
                <span data-toggle="modal" data-target="#add_class_Modal">
                    <button class="btn btn-primary btn-lg page-header float" data-toggle = "tooltip" data-placement = "left" title = "Add New Class" id="add_class" >
                        <i class="fa fa-plus"></i> 
                    </button>
                </span>    
            </div> -->
                
        </div>
        <div class="breadcrumb sub">
               <?php include('../include/breadcrumb.php'); ?>
        </div>
  <?php include 'ibme_faculty_get.php'; ?>
  <?php
   $rows = $result->num_rows;
  if ($rows > 0) {  
  while($row = $result->fetch_array(MYSQLI_ASSOC))
  {
    $mi = '';   
    if (!empty($row['faculty_mname'])) {
        $mi = substr($row['faculty_mname'], 0, 1).'.';
    }

    $dletter = '';
    if (!empty($row['faculty_dletter'])) {
        $dletter = ', '.$row['faculty_dletter'];
    }
    
    $instr_id = $row['faculty_id'];
    $instr = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;
  ?>
  <div class="body">
       <h2 class="page-header aheader">
            <div class="row">
                <div class="col-lg-6">
                    <small><?php echo $instr; ?></small>
                </div>
                <div class="col-lg-6">
                    <a href="../../report/viewer/instructor_schedule.php?instructor=<?php echo $instr_id; ?>" class="btn btn-danger pull-right"> <i class="fa fa-fw fa-print"></i> Print</a>
                </div>
            </div>
        </h2>
        <!--/.row -->  
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id = "" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Course No.</th>
                                <th>Descriptive Title</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Room</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'faculty_get.php'; ?>
                        </tbody>
                    

                    </table>
                </div>
            </div>
        </div>
</div>
<br>
<?php 
    } //while
  }
  else 
  {
?>    
    <div class="body">
                <!--/.row -->  
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id = "" class="table" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>No Schedule Available</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php } ?>
    </div>
    <!-- /.container-fluid -->
<?php include('../include/class_modal.php') ?>
<?php include('../include/footer.php'); ?>