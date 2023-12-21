<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Search Schedules</small>
                </h1>
                <hr>
            </div>
            <div class="century">
                    <a href = "../schedule" class="btn btn-danger btn-lg page-header smcreate" data-toggle = "tooltip" data-placement = "left" title = "Create New Schedule"><i class="fa fa-calendar-plus-o fa-lg"></i></a> 
            </div>
                
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
              <input type="text" class="form-control" placeholder="Course No./Desc. Title/Time/Day/Room/Class/Instructor    " aria-describedby="search" id="searchbox">
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
</div>
    </div><!-- /.container-fluid -->
<?php include('../include/footer.php'); ?>