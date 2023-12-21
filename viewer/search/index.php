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
<?php include '../include/header2.php'; ?>
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
								<ul id="menu" >
                                    <li><a href="../search"><i class="fa fa-fw fa-search"></i><span>Search Schedule</span></a></li>
                                    <li><a href="../class/cas.php"><i class="fa fa-fw fa-users"></i><span>Class Schedules</span></a></li>
                                    <li><a href="../room/cas.php"><i class="fa fa-fw fa-table"></i><span>Room Schedules</span></a></li>
                                    <li><a href="../facuty/cas.php"><i class="fa fa-fw fa-tasks"></i><span>Faculty Schedules</span></a></li>
                                </ul>   
							</div>
				</div> <!-- end side-bar -->
				<div class="clearfix"></div>

	<!-- <div class="page-wrapper"> -->
	<div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Search Schedules</small>
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
    <div class="body">
        <div class="row">
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon" id="dept">Department</span>
              <select class="form-control" id="dept" aria-describedby="dept">
                  <option value="" selected disabled>Select</option>
                  <option value="CAS">CAS</option>
                  <option value="CTE">CTE</option>
                  <option value="IBME">IBME</option>
                  <option value="ICS">ICS</option>
              </select> 
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon" id="search">Search</span>
              <input type="text" class="form-control" placeholder="Course No./Desc. Title/Time/Day/Room/Class/Instructor" aria-describedby="search" id="searchbox">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <br>
        <!--/.row -->  
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id = "sched_master_list" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Course No.</th>
                                <th>Descriptive Title</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Room</th>
                                <th>Class</th>
                                <th>Instructor</th>
                                <th>Dept</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--  body -->
      </div> <!-- /.container-fluid -->
<?php include '../include/footer.php' ?>