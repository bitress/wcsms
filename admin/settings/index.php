<?php
    include('../include/header.php');
    include('../include/sidebar.php');
    include('fetch_settings.php');

?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="margin55">
                    <small>Settings</small>
                </h1>
                <hr>
            </div>
        </div>
      <div class="body">  
        <div class="row">
            <div class="col-md-4">
                <small><b>SET UP</b></small>
            </div>
            <div class="col-md-4 text-center">
                <small><b>CURRENT SETTINGS</b></small> 
            </div>
            <div class="col-md-4">
            </div>        
        </div>
        <br>
        <div class="table-responsive">
            <!-- sy -->
            <table class="table">
                <tr class="danger">
                    <th class="rows">School Year</th> 
                    <td class="rows text-center" id="current_sy"><?php echo $sy; ?></td> 
                    <td class="rows">
                        <a id="#" class= "edit_sy btn btn-danger btn-sm pull-right" data-toggle="collapse" data-target="#sy" title="Edit School Year" ><i class="fa fa-edit"></i> Set</a>
                    </td>
                </tr>
            </table>    
            <div id="sy" class="collapse">
               <form method="POST" id = "sy_form">
                            <div class="row"> 
                                <div class="col-lg-3"></div>
                                <div class="form-group col-lg-5">
                                  <select class="form-control" name="settingssy" id="settings_sy" required> 
                                    <option value="" selected disabled>Set School Year</option>
                                    <option value="2017-2018">2017-2018</option>
                                    <option value="2018-2019">2018-2019</option>
                                    <option value="2019-2020">2019-2020</option>
                                  </select> 
                                </div> 
                                <div class="col-lg-2">
                                   <button type="button" class="btn btn-default" id="sy_ok" data-toggle="collapse" data-target="#sy"><i class="fa fa-check"></i> </button>
                                </div>
                                <div class="col-lg-2">
                                </div>
                 
                            </div>
                        </form> 
            </div>
            <!-- end sy -->
            
            <br>

            <!-- sem -->
            <table class="table">
                <tr class="danger">
                    <th class="rows">Semester</th> 
                    <td class="rows text-center" id="current_sem"><?php echo $sem; ?></td> 
                    <td class="rows">
                        <a id="#" class= "edit_sem btn btn-danger btn-sm pull-right" data-toggle="collapse" data-target="#sem" title="Edit School Year" ><i class="fa fa-edit"></i> Set</a>
                    </td>
                </tr>
            </table>
            <div id="sem" class="collapse">
                        <form id = "sem_form">
                            <div class="row"> 
                                <div class="col-lg-3"></div>
                                <div class="form-group col-lg-5">
                                  <select class="form-control" name="settingssem" id="settings_sem" required> 
                                    <option value="" selected disabled>Set Semester</option>
                                    <option value="First Semester">First Semester</option>
                                    <option value="Second Semester">Second Semester</option>
                                    <option value="Summer">Summer</option>
                                  </select> 
                                </div> 
                                <div class="col-lg-2">
                                   <button type="button" class="btn btn-default" id="sem_ok" data-toggle="collapse" data-target="#sem"><i class="fa fa-check"></i> </button>
                                </div>
                                <div class="col-lg-2">
                                    
                                </div> 
                                  
                            </div>
                        </form> 
            </div>
            <!-- end sem -->

            <hr>
                    <div class="row">
                        <div class="col-md-8">
                            
                        </div>
                        <div class="col-md-2 colsave">
                            
                             <button type="submit" class="btn btn-primary btn-block pull-right" id="set_save"> <i class="fa fa-fw fa-gears"></i> Save</button>  
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-block pull-right" id="cancel">Cancel</button>
                              
                        </div>   
                    </div>

        </div> <!-- responsive -->
      </div> <!--  body -->



   
    </div>  <!-- /.container-fluid -->
<?php include('../include/footer.php'); ?>