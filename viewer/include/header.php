<!DOCTYPE HTML>
<html>
<head>
<title>Web-based Class Schedule Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Bootstrap Core CSS -->
<link href="../../css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="../../css/new_style.css" rel='stylesheet' type='text/css' />
<link href="../../css/style.css" rel='stylesheet' type='text/css' />

<!-- Font-awesome CSS -->
<link href="../../css/font-awesome.css" rel="stylesheet" />

<!-- DataTable Core CSS -->
<link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap4.min.css">

<!-- Alertify Core CSS -->
<link rel="stylesheet" type="text/css" href="../../alertify/css/alertify.css">
 <link rel="stylesheet" type="text/css" href="../../alertify/css/themes/bootstrap.css">
 <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />


</head> 

<body>

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
                                     <a class="navbar-brand" id="color" href="../../">Home</a>
                                     <a class="navbar-brand" id="color" href="../../about.php">About</a>
                                  </div>
                                   <div class="navbar-header col-lg-7">
                                    <div class="navbar-form dropdown pull-right">
                                          <a class="btn btn-danger dropdown-toggle" id="lin" href="#" data-toggle="dropdown"><i class="fa fa-user-circle"></i> LOG IN <strong class="caret"></strong> 
                                          </a>
                                          <div class="dropdown-menu" style="width: 250px;">
                                            <form class = "navbar-form"> 
                                                <div class="input-group">
                                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" ></i></span>
                                                  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" id="uname2"/> 
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                  <span class="input-group-addon" id="basic-addon2"><i class="fa fa-unlock-alt" ></i></span>
                                                  <input type="Password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" id="pword2" /> 
                                                </div>
                                                <br>
                                                <input type="button" class="btn btn-danger btn-block" value="Submit" id="login2" /> 
                                            </form> 
                                        </div>
                                      </div>
                                      <div class="navbar-form pull-right">
                                          <a class="btn btn-success" href="../faculty/cas.php" data-toggle = "tooltip" data-placement = "bottom" title = "Faculty Schedule"> 
                                           <i class="fa fa-tasks"></i></a>
                                       </div>
                                       <div class="navbar-form pull-right">
                                          <a class="btn btn-warning" href="../room/cas.php" data-toggle = "tooltip" data-placement = "bottom" title = "Room Schedule"> 
                                           <i class="fa fa-table"></i></a>
                                       </div>
                                       <div class="navbar-form pull-right">
                                         <a class="btn btn-primary" href="../class/cas.php" data-toggle = "tooltip" data-placement = "bottom" title = "Class Schedule"> 
                                           <i class="fa fa-users"></i></a>
                                       </div>
                                       <div class="navbar-form pull-right">
                                         <a class="btn btn-default" href="../search" data-toggle = "tooltip" data-placement = "bottom" title = "Search Schedule"> 
                                           <i class="fa fa-search"></i></a>
                                       </div> 
                                  </div> <!-- col -->
                                      <div class="clearfix"> </div>
                                </div><!--  row -->
                            </div>
                        </div>
                    <div class="clearfix"></div>
                <!-- /top_bg -->
              </div>
        </div>
       <!--//content-inner-->   