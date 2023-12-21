<?php 
session_start(); 
if ($_SESSION['current_user_level'] == 'admin') {
    $user = $_SESSION['current_user'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Web-based Class Schedule Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="../css/new_style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../css/style.css" />

<!-- Font-awesome CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 

<!-- Alertify Core CSS -->
<link rel="stylesheet" type="text/css" href="../alertify/css/alertify.css">
 <link rel="stylesheet" type="text/css" href="../alertify/css/themes/bootstrap.css">
 <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

</head> 

<body>
    <?php include 'include/print_modal.php' ?>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
						<div class="top_bg">
							<div class="container-fluid">
								<div class="row">
									<div class="navbar-header col-lg-5">
                                        <a class="navbar-brand" id="color" href="index.php">Admin Panel - WCSMS</a>
									</div>
									<div class="navbar-header col-lg-7">
                                          <div class="navbar-form dropdown pull-right">
                                            <a class="btn btn-danger dropdown-toggle"  href="#" data-toggle="dropdown">
                                               
                                               <i class="fa fa-user-circle"></i> <?php echo $user; ?>  
                                                <strong class="caret"></strong> 
                                            </a>
                                            <div class="dropdown-menu"> 
                                                <li><a href="account/"><i class="fa fa-gear"></i> Account Settings</a></li>
                                                <li><a href="#" id="logout" ><i class="fa fa-sign-out"></i> Logout</a></li>
                                            </div>
                                          </div>      
									</div>
										<div class="clearfix"> </div>
								</div>
							</div>
						</div>
					<div class="clearfix"></div>
				<!-- /top_bg -->
		      </div>
        </div>
                <div class="sidebar-menu">
                    <header class="logo1">
                        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
                    </header>
                    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                        <div class="menu">
                            <ul id="menu" >
                                <li><a href="index.php"><i class="fa fa-fw fa-tachometer"></i><span>Dashboard</span></a></li>
                                <li><a href="schedule/"><i class="fa fa-fw fa-calendar-plus-o"></i><span>Create New Schedule</span</li>
                                <li><a href="schedule/search_schedule.php"><i class="fa fa-fw fa-search"></i><span>Search Schedules</span</li>	
                                <li><a href="#"><i class="fa fa-fw fa-calendar"></i><span>Schedules</span><span class="fa fa-fw fa-angle-right pull-right"></span></a>
                                    <ul>
                                        <li><a href="schedule/class.php"><i class="fa fa-fw fa-users"></i><span> Class Schedules</span></a></li>
                                        <li><a href="schedule/room.php"><i class="fa fa-fw fa-table"></i><span> Room Schedules</span></a></li>
                                        <li><a href="schedule/instructor.php"><i class="fa fa-fw fa-tasks"></i><span> Faculty Schedules</span></a></li>
                                    </ul>
                                </li>    
                                <li><a href="#"><i class="fa fa-fw fa-info-circle"></i><span>Manage Info</span><span class="fa fa-fw fa-angle-right pull-right"></span></a>
                                     <ul>
                                          <li><a href="course/"><i class="fa fa-fw fa-id-card"></i> <span>Course</span></a></li>
                                          <li><a href="class/"><i class="fa fa-fw fa-users"></i> <span>Class</span></a></li>
                                          <li><a href="department/"><i class="fa fa-fw fa-institution"></i> <span>Departments</span></a></li>
                                          <li><a href="designation/"><i class="fa fa-fw fa-tasks"></i> <span>Designation</span></a></li>
                                          <li><a href="faculty/"><i class="fa fa-fw fa-user-circle"></i> <span>Faculty</span></a></li>
                                          <li><a href="rank/"><i class="fa fa-fw fa-level-up"></i> <span>Rank</span></a></li>
                                          <li><a href="room/"><i class="fa fa-fw fa-table"></i><span> Room</span></a></li>
                                          <li><a href="subject/"><i class="fa fa-fw fa-book"></i><span> Subject</span></a></li>
                                    </ul>
                                </li> 
                                <li><a href="user/"><i class="fa fa-fw fa-user-plus"></i><span>Manage Users</span></a></li>
                                <li><a href="settings/"><i class="fa fa-fw fa-gears"></i><span>Settings</span></a></li>                   
                            </ul>   
                        </div>
                </div> <!-- end side-bar -->
                <div class="clearfix"></div>

	<!-- <div class="page-wrapper"> -->
		<div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Overview</small>
                </h1>
                <div class="breadcrumb main">
                     <?php include('include/breadcrumb.php'); ?>
                </div>
            </div>
             <div class="century">
                    <a href = "schedule/" class="btn btn-danger btn-lg page-header btncreate" data-toggle = "tooltip" data-placement = "left" title = "Create New Schedule"><i class="fa fa-calendar-plus-o fa-lg"></i></a>
                  <span data-toggle = "modal" data-target = "#print_Modal" > 
                    <a href = "#" class="btn btn-default btn-lg page-header btnprint" data-toggle = "tooltip" data-placement = "left" title = "Print Schedule"><i class="fa fa-print fa-lg"></i></a>
                  </span>   
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div><b>Class Schedules</b></div>
                            </div>
                        </div>
                    </div>
                    <a href="schedule/class.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div><b>Faculty Schedules</b></div>
                            </div>
                        </div>
                    </div>
                    <a href="schedule/instructor.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div> <!-- end row -->
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-table fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div><b>Room Schedules</b></div>
                            </div>
                        </div>
                    </div>
                    <a href="schedule/room.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-plus fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div><b>Users</b></div>
                            </div>
                        </div>
                    </div>
                    <a href="user/">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div> <!-- /.container-fluid -->

    </div>   <!-- left-content -->       
</div> <!-- end page--container -->
<!-- </div> page-wrapper 						 -->
<!--js -->
<script src="../js/jquery.js"></script>
<!-- <script src="../js/new/jquery.nicescroll.js"></script> -->
<script src="../js/new/scripts.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/myscript.js"></script>
<!-- Alertify Core JavaScript -->
<script type="text/javascript" src="../alertify/alertify.js"></script>
<script type="text/javascript">
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
</script>
<script>
	var toggle = true;
										
		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$(".page-wrapper").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				$(".page-wrapper").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back")
					setTimeout(function() {
				$("#menu span").css({"position":"relative"});
					}, 400);
			}
											
			toggle = !toggle;
		});
</script>
</body>
</html>
<?php 
} 
else
{
    header('location: ../redirect_page.php');
}

 ?>