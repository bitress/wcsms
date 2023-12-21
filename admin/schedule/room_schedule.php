<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?> 
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Room Schedule</small>
                </h1>
                <hr>
            </div>
             <div class="century">
                    <a href = "../schedule" class="btn btn-danger btn-lg page-header smcreate" data-toggle = "tooltip" data-placement = "left" title = "Create New Schedule"><i class="fa fa-calendar-plus-o fa-lg"></i></a> 

                    <a href = "#" id="back" class="btn btn-default btn-lg page-header smprint" data-toggle = "tooltip" data-placement = "left" title = "Go Back"><i class="fa fa-chevron-left fa-lg"></i></a>
            </div>
                
        </div>
        <div class="breadcrumb sub">
                    <?php include('../include/breadcrumb.php'); ?>
                </div>
  <div class="body">
     <h2 class="page-header aheader">
          <div class="row">
                <div class="col-lg-6">
                    <small>
                     <?php echo $_SESSION['room']; ?>
                    </small>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="../../report/room_schedule.php?room=<?php echo$_SESSION['room']; ?>" class="btn btn-danger"> <i class="fa fa-fw fa-print"></i> Print</a>
                </div>
            </div>
     </h2> 
        <!--/.row -->  
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="room_get" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Course No.</th>
                                <th>Descriptive Title</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Class</th>
                                <th>Instructor</th>
                                <th class="text-center">Action</th>
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