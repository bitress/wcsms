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

          <ul class="nav nav-tabs">
            <li class="active"><a class="tabs" data-toggle="tab" href="#profile"><i class="fa fa-fw fa-user-circle-o"></i> Profile</a></li>
            <li><a class="tabs" data-toggle="tab" href="#logindetails"><i class="fa fa-fw fa-lock"></i> Log in Details</a></li>
          </ul>

          <div class="tab-content">
            <div id="profile" class="tab-pane fade in active">
              <br>
              <form method="POST" id = "profile_form" class="clear" data-toggle = "validator" role = "form">
                <div class="row">
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_fname">First Name</label>
                            <input type = "text"  class="form-control" id="faculty_fname" name="facultyfname" placeholder="Enter first name" required = "true" value="<?php echo $fname; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">  
                        <div class="form-group">
                            <label for="faculty_mname">Middle Name</label>
                            <input type = "text"  class="form-control" id="faculty_mname" name="facultymname" placeholder="Enter middle name" value="<?php echo $mname; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                      <div class="col-lg-4"> 
                        <div class="form-group">
                            <label for="faculty_lname">Last Name</label>
                            <input type = "text" class="form-control" id="faculty_lname" name="facultylname" placeholder="Enter last name" required = "true" value="<?php echo $lname; ?>">
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>  
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="faculty_dletter">Designatory Letter</label>
                            <input type = "text" class="form-control" id="faculty_dletter" name="facultydletter" placeholder="Enter designatory letter - i.e. Ph.D. (Optional)" value="<?php echo $dletter; ?>">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input list="department" name ="facultydept" class="form-control" id="faculty_dept" placeholder="Enter department" required value="<?php echo $dept; ?>">
                                <datalist id="department">
                                    <?php include 'fetch_department.php'; ?>
                                </datalist>
                         <div class="help-block with-errors"></div>       
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                    </div> 
                    <div class="col-md-2 colsave">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_profileupdate">Update</button>
                        </div>
                    </div> 
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                        </div>
                    </div>  
              </form>    
            </div>
            <div id="logindetails" class="tab-pane fade">
                <br>
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="bt_accountupdate">Save</button>
                             </div>
                        </div> 
                    </form>    
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block" id="cancel">Cancel</button>
                        </div>
                    </div>            
            </div>
        </div>        
                  
         </div>
    </div>
    <!-- /.container-fluid -->
<?php include('../include/class_modal.php') ?>
<?php include('../include/footer.php'); ?>