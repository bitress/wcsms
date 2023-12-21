<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>   
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Class Schedule</small>
                </h1>
                <hr>
            </div>
             <div class="century">
                    <a href = "../schedule" class="btn btn-danger btn-lg page-header smcreate" data-toggle = "tooltip" data-placement = "left" title = "Create New Schedule"><i class="fa fa-calendar-plus-o fa-lg"></i></a> 

                     <a href = "#" id="back" class="btn btn-default btn-lg page-header smprint" data-toggle = "tooltip" data-placement = "left" title = "Go Back"><i class="fa fa-chevron-left fa-lg"></i></a>
                
        </div>
        <div class="breadcrumb sub">
                     <?php include('../include/breadcrumb.php'); ?>
                </div>
  <div class="body">
     <h2 class="page-header aheader">
         <div class="row">
                <div class="col-lg-6">
                    <small>
                      <?php
                            if (isset($_SESSION['class_id'])) {
                                require_once '../../conn.php';
                                $class_id = $_SESSION['class_id'];
                                $classquery = "SELECT concat(class_course, ' ', class_year, ' ', class_section, ' ', class_major) AS class FROM class WHERE class_id = '$class_id'";
                                $classresult = $conn->query($classquery);
                                $classrow = $classresult->fetch_array(MYSQLI_ASSOC);
                                $class = $classrow['class'];
                                echo $class;
                            }
                    ?>
                       
                    </small>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="../../report/class_schedule.php?class=<?php echo $_SESSION['class_id']; ?>" class="btn btn-danger"> <i class="fa fa-fw fa-print"></i> Print</a>
                </div>
            </div>
     </h2> 
        <!--/.row -->  
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="class_get" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Course No.</th>
                                <th>Descriptive Title</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Room</th>
                                <th>Instructor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    

                    </table>
                </div>
            </div>
        </div>
</div>
    </div>
    <!-- /.container-fluid -->
<?php include('../include/footer.php'); ?>