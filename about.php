<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <style>

	body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;} {}
	
	.fa-institution,.fa-laptop {font-size:200px}
	.fa-user
</style>
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
            <h1>About Us</h1>
            <br><br>
             <img id="logo" src="css/ispsc_logo.png">
             <br><br>
             <br>
         </div>  
      </div>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1 style="color: maroon; font-weight: bolder; font-size: 38px;">VISION, MISSION, GOALS AND OBJECTIVE</h1><br>
      <h3>Vision</h3>
      <p class="w3-padding-">A vibrant and nurturing Polytechnic Service College for transforming lives and communities.</p>
      
      <h3>Mission</h3>
      <p class="w3-padding-">To improve the lives of people and communities through quality instruction, innovations, productivity initiatives, environment and industry-feasible technologies, resource mobilization and transformation outreach programs and services.</p>

      <h3>Goals and Objectives</h3>
      <p >1. To make the college responsive and relevant to the individual and social needs for optimum human development.</p>
      <p >2. To offer priority programs in tourism, teacher education, agriculture fishery, agro-forestry, trades, business industry and Information technology which will generate knowledge base to educate the people and communities.</p>
      <p>3. To conduct a wide-range of research and extension programs to provide quality training and technologies for inclusive growth.</p>
      <p>4. To implement government programs and thrusts in the context of regional and national development for poverty alleviation.</p>
      <p>5. To prepare and develop highly productive and employable professionals, “glocal” (global and local) technopreneurs who are morally-crafted and environmentally-oriented for coping globalization standards.</p>

       <h3>Core Values</h3>

      <p> <span class="glyphicon glyphicon-asterisk"></span> Productivity - The delivery of quality programs in instruction, research, extension, production and development of responsive, proactive professionals and graduates and professing determination and hard work in the system.</p>

	  <p> <span class="glyphicon glyphicon-asterisk"></span> Resiliency - Refers to the renewal and motivational strategies, looking at the bright side of academic life and cultivating positive attitudes amidst failures and adversities.</p>

	  <p> <span class="glyphicon glyphicon-asterisk"></span> Accountability - Means the responsibility, answerability, transparency, impartially, decisiveness and delegation of work roles and streamlining of functions.</p>

	  <p> <span class="glyphicon glyphicon-asterisk"></span> Ingenuity - Refers to prudent use of resources, prudence in spending, cost cutting measure and deciding the best possible action considering circumstances.</p>

	  <p> <span class="glyphicon glyphicon-asterisk"></span> Synergy - Pertains to the teamwork, collaboration, orchestration, subordination and of all partner agencies, sponsors and stakeholders, parents, alumni and communities.</p>

	  <p> <span class="glyphicon glyphicon-asterisk"></span> Excellence - Refers to global orientation, borderless perspective, equal opportunities, empowerment, and transformation, multi-tasking and leading by example. </p>
	  <br>


    </div>


    <div class="w3-third w3-center">
      <i class="fa fa-institution w3-padding-64 w3-text-red"></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-laptop w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1>Scope of the System</h1> 
      <p style="font-size: 18px;">The Web-based Class Scheduling System for ISPSC – Tagudin Campus will be designed to easily create and manage the class schedule. It is intended to help the department heads in preparing the class schedules.   Monitoring conflicts between the faculties, time and classrooms will be detected by the system to avoid redundancy and inconsistency and therefore preventing any delay of classes. 
      The students can also view all of the existing class schedules and print it as they will. </p>

      <p style="font-size: 18px;">The system will be managed and maintained  by the admin, whom has full control of the system,  and will be used by the department heads in creating, editing and deleting the schedules. This will greatly facilitate their responsibilities of scheduling every beginning of the semester.</p>

      <p style="font-size: 18px;">The system will also provide optimal resources allocation; faculty, time and classrooms allotments will be based particularly on their availability, to such degree that the probability of occurrence of conflicts in the schedules is non-existent.</p>

      
    </div>
  </div>
</div>


<hr>
<!-- Footer -->
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
