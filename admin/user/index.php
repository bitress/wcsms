<?php
    include('../include/header.php');
    include('../include/sidebar.php');
?>
<?php include 'fetch_functions.php' ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small> Users</small>
                </h1>
                <hr>
            </div>
            <div class="century">
                <span data-toggle="modal" data-target="#add_user_Modal">
                    <button class="btn btn-primary btn-lg page-header float" data-toggle = "tooltip" data-placement = "left" title = "Set New User" id="add_user" >
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
                    <table id = "user_list" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="25%">Name</th>
                                <th width="20%">Username</th>
                                <th width="20%">Password</th>
                                <th width="15%">User-level</th>
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
<script type="text/javascript">
    function show(id){
        var id = document.getElementById(id).id; 
        var x = document.getElementsByClassName("pw")[id];
         if (x.type === "password") {
              x.type = "text";
          } else {
             x.type = "password";
          }
    } //edit
</script>

    <!-- /.container-fluid -->
<?php include('../include/user_modal.php'); ?>    
<?php include('../include/footer.php'); ?>