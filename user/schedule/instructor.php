<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Instructor List</small>
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
        <!--/.row -->  
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id = "instr_sched_list" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="53%">Instructor Name</th>
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