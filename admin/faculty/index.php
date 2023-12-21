<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Faculty</small>
                </h1>
                <hr>
            </div>
            <div class="century">
                <span data-toggle="modal" data-target="#add_faculty_Modal">
                    <button class="btn btn-primary btn-lg page-header float" data-toggle = "tooltip" data-placement = "left" title = "Add New Faculty" id="add_faculty" >
                        <i class="fa fa-plus"></i> 
                    </button>
                </span>    
            </div>
                
        </div>
        <div class="breadcrumb sub">
                  <?php include('../include/breadcrumb.php'); ?>
                </div>
  <div class="body">
        <!--/.row -->  
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id = "facultylist" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="30%">Name</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    

                    </table>
                </div>
            </div>
        </div>
   </div> <!-- body -->         

    </div>
    <!-- /.container-fluid -->
<?php include('../include/faculty_modal.php'); ?>
<?php include('../include/set_modal.php'); ?>    
<?php include('../include/footer.php'); ?>