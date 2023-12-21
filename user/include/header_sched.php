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
<link rel="stylesheet" type="text/css" href="../../alertify/css/alertify_copy.css">
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
                                      <a class="navbar-brand" id="color" href="../">User Panel - WCSMS</a>
                                  </div>
                                   <div class="navbar-header col-lg-7">
                                    <div class="navbar-form dropdown pull-right">
                                          <a class="btn btn-danger dropdown-toggle"  href="#" data-toggle="dropdown">                           
                                             <i class="fa fa-user-circle"></i>
                                             <?php 
                                                session_start(); 
                                                if ($_SESSION['current_user_level'] == 'user') {
                                                     $user = $_SESSION['current_user'];
                                                    echo $user;
                                                   
                                                }
                                                else
                                                {
                                                  header('location: ../../redirect_page.php');
                                                }    
                                              ?>  
                                             <strong class="caret"></strong> 
                                          </a>
                                          <div class="dropdown-menu"> 
                                              <li><a href="../account"><i class="fa fa-gear"></i> Account Settings</a></li>
                                              <li><a href="#" id="logout" ><i class="fa fa-sign-out"></i> Logout</a></li>
                                          </div>
                                      </div>
                                  </div> <!-- col -->
                                      <div class="clearfix"> </div>
                                </div> <!-- row -->
                            </div>
                        </div>
                    <div class="clearfix"></div>
                <!-- /top_bg -->
              </div>
        </div>
       <!--//content-inner--> 