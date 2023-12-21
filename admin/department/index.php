<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Departments</small>
                </h1>
                <hr>
            </div>
            <div class="century">
                <span data-toggle="modal" data-target="#add_dept_Modal">
                    <button class="btn btn-primary btn-lg page-header float" data-toggle = "tooltip" data-placement = "left" title = "Add New Department" id="add_dept" >
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
                    <table id = "deptlist" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department Code</th>
                                <th>Department Name</th>
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
<?php include('../include/dept_modal.php') ?>
<?php include('../include/footer.php'); ?>