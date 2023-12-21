<?php
session_start();
if (isset($_SESSION['current_user_level'])) {
    header('location:'.$_SESSION['current_user_level'].'/');
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Web-based Class Schedule Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="alertify/css/themes/bootstrap.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top border" role="navigation">
      <div class="border">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" id="color" href="index.php">Home</a>
          <a class="navbar-brand" id="color" href="about.php">About</a>
          </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            <li class="dropdown">
                <a class="btn btn-danger dropdown-toggle" id="lin" href="#" data-toggle="dropdown"><i class="fa fa-sign-in"></i> LOG IN <strong class="caret"></strong></a>
                <div class="dropdown-menu" style="width: 250px;">
                    <form class = "navbar-form"> 
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" ></i></span>
                          <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" id="uname"/> 
                        </div>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon2"><i class="fa fa-unlock-alt" ></i></span>
                          <input type="Password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" id="pword" /> 
                        </div>
                        <br>
                        <input type="button" class="btn btn-danger btn-block" value="Submit" id="login" /> 
                    </form> 
                </div>
              </li>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    </div> 
  

    <div class="jumbotron">
      <div class="container">
            <h1>Web-based Class Schedule Management System</h1>
            <p>ILOCOS SUR POLYTECHNIC STATE COLLEGE</p>
            <img id="logo" src="css/ispsc_logo.png">
         </div>  
      </div>

    <div class="container">
      <div class="row text-center">
         <div class="col-md-3">
          <h2 class="center"><i class="fa fa-search fa-5x facolor"></i></h2>
          <p><strong>Search Schedule</strong></p>
          <p><a class="btn btn-default" href="viewer/search" role="button">SEARCH &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <h2 class="center"><i class="fa fa-users fa-5x facolor"></i></h2>
          <p><strong>Class Schedule</strong></p>
          <p><a class="btn btn-default" href="viewer/class/cas.php" role="button">VIEW &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <h2 class="center"><i class="fa fa-table fa-5x facolor" ></i></h2>
          <p><strong>Room Schedule</strong></p>
          <p><a class="btn btn-default" href="viewer/room/cas.php" role="button">VIEW &raquo;</a></p>
       </div>
        <div class="col-md-3">
          <h2 class="center"><i class="fa fa-tasks fa-5x facolor"></i></h2>
          	<p><strong>Faculty Schedule</strong></p>
          	<p><a class="btn btn-default" href="viewer/faculty/cas.php" role="button">VIEW &raquo;</a></p>
        </div>
      </div>

      <hr>

      <div class="container">
      <footer>
        <p>&copy; Ilocos Sur Polytechnic State College - Institute of Computing Studies - Tagudin Campus 2018</p>
      </footer>
  </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/myscript.js"></script>
    <script src="alertify/alertify.js"></script>
    <script type="text/javascript">
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
    </script>
  </body>
</html>

<?php } ?>