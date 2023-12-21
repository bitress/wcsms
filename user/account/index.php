<?php
    include('../include/header.php');
    include('../include/sidebar.php');
    include 'fetch_account.php';
?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Update Account Details</small>
                </h1>
                <hr>
            </div>
        </div>
        <div class="breadcrumb sub">
            <?php include('../include/breadcrumb.php'); ?>
        </div>
  <div class="body">
        <h2 class="page-header aheader">
                    <small><?php echo $user; ?></small>
                </h2>  
                  <form method="POST" id = "account_form" class="clear" data-toggle = "validator" role = "form">
                    <div class="form-group">
                        <label for="account_uname">Username</label>
                        <input type = "text" class="form-control" id="account_uname" name="accountuname" placeholder="Enter username" value="<?php echo $uname; ?>" required = "true">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">  
                        <div class="form-group">
                            <label for="account_pword">Change Password</label>
                            <input type = "password"  class="form-control" id="account_pword" name="accountpword" data-minlength="5" placeholder="Enter new password" required = "true">
                            <div class="help-block with-errors">Minimum of 5 characters</div>
                        </div>
                      </div> 
                      <div class="col-lg-6"> 
                        <div class="form-group">
                            <label for="account_cpword">Confirm Password</label>
                            <input type = "password" class="form-control" id="account_cpword" name="accountcpword" data-match="#account_pword" data-match-error="Passwords did not match" placeholder="Confirm new password" required = "true">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                        </div> 
                        <div class="col-md-2 colsave">
                            <br class="brheight">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_accountupdate">Save</button>
                             </div>
                        </div> 
                    </form>    
                        <div class="col-md-2">
                            <br class="brheight">
                            <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                        </div>
                    </div>            
  </div>
    </div>
    <!-- /.container-fluid -->
<?php include('../include/class_modal.php') ?>
<?php include('../include/footer.php'); ?>