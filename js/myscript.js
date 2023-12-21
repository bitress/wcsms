var sublist, 
roomlist, 
deptlist, 
courselist, 
classlist, 
facultylist, 
class_sched_list, 
room_sched_list,
instr_sched_list, 
user_list, 
class_get,
class_ungrouped_get,
room_get,
instructor_get,
sched_master_list,
desg_list,
rank_list;
$(document).ready(function()
{    
    $(document).on('click', '#login', function(){
    	validate();
    });

    $(document).on('click', '#login2', function(){
      validate2();
    });

    $("#uname, #pword").keypress(function (event) {
      if (event.which == 13) {
        validate();
      }

    });

    $("#uname2, #pword2").keypress(function (event) {
      if (event.which == 13) {
        validate2();
      }

    });

    $("#clear").click(function(){
    	$('.clear')[0].reset();
    });

    $("#clear_sy").click(function(){
      $('#sy_form')[0].reset();
    });

    $("#clear_sem").click(function(){
      $('#sem_form')[0].reset();
    });

    $("#clear_term").click(function(){
      $('#term_form')[0].reset();
    });

    $("#logout").click(function(){
        alertify.confirm("Log out?", function(){ 
              window.location.replace('../logout.php');               
          });
    });

    $(document).on("click", "#lin" , function(){
      $('#uname').focus();
      $('#uname2').focus();
    });

    $('.modal').on('shown.bs.modal', function () {
      $('input:text:visible:first', this).select().focus();
    }); 

     $('[data-toggle="tooltip"]').tooltip();

    $('#account_uname').select().focus();  

    $(document).on("click", "#cancel", function(){
        window.history.back();
    }); 

    var form = $('form');
    var chk = $("input.day");
    

    //Change event
    chk.on('change', function (e) {
      checkboxValidator(chk,form,1);
    });

    $('#sched_form :input').each(function() {
        $(this).on('keypress', function(e){
            if ($(this).val()=='') {
              return e.which !== 13;
            }
        });
    });
    
    $('#account_form :input').each(function() {
        $(this).on('keypress', function(e){
            if ($(this).val()=='') {
              return e.which !== 13;
            }
        });
    });

    if ($('#time_start').val() == '' || $('#time_end').val() == '')
    {
      $('input[type="checkbox"]').prop('disabled', true);
    }
    $("#time_start, #time_end").change(function(){
          $('input[type="checkbox"]').prop('disabled', false);
    });
    

    // $("input:checkbox").click(function() {
    //     var start = ConvertTimeformat($("#time_start").val());
    //     var end = ConvertTimeformat($("#time_end").val());
    //     var timediff = (new Date("1970-1-1 " + end) - new Date("1970-1-1 " + start))/ 1000 / 60 / 60 ;
    //     var chbx = 3;
    //     if (timediff == 3 || timediff == 2) {
    //       chbx = 1;
    //     }
    //     else if(timediff > 1)
    //     {
    //        chbx = 2;
    //     }  

    //     var day = $("input:checkbox:checked").length >= chbx;     
    //     $("input:checkbox").not(":checked").attr("disabled",day);
    //   });

    $("#sched_form :input").click(function(){
       $(this).select().focus();
    });

    $("#sched_edit_form :input").click(function(){
       $(this).select().focus();
    });

    $("#sched_clear").click(function(){
      $("#sched_form :input[type ='text']").val('');
      $("#sched_form :input[type ='checkbox']").prop('checked', false);
      $("#sched_type").val('LEC');
      $('input[type="checkbox"]').prop('disabled', true);

    });

    $("#sched_edit_clear").click(function(){
      $("#sched_edit_form :input[type ='text']").val('');
      $("#sched_edit_form :input[type ='checkbox']").prop('checked', false);
      $("#sched_type").val('LEC');
      $('input[type="checkbox"]').prop('disabled', true);

    });

    $('#menu li a').on('click', function () {
      $(this).closest('#menu li').find('a.active').removeClass('active');
      $(this).addClass('active');
    });

    $("#faculty_name").change(function(){
             var name = $(this).val();  
                   $.ajax({  
                        url:"fetch_fac.php",  
                        method:"POST",  
                        data:{name:name},  
                        dataType:"json", 
                        success:function(data){ 
                             var uname = data.uname;        
                             $('#user_name').val(uname.split(' ').join(''));
                             $('#pass_word').val(data.faculty_lname);
                             $('#hid_fac').val(data.faculty_id);        
                        }  
                   });  
              }); //set

    $("#back").click(function(){
       window.history.back();
    });


      $('#quick_print').on("submit", function(event){  
                event.preventDefault(); 
                var sched = $('#sched').val();
                var x_sched = $('#x_sched').val();
                if (sched == 'class') {
                  window.location.href = '../report/class_schedule.php?class='+ x_sched;
                }
                else if (sched == 'room') {
                   window.location.href = '../report/room_schedule.php?room='+ x_sched;
                }
                else if (sched == 'instructor') {
                   window.location.href = '../report/instructor_schedule.php?instructor='+ x_sched;
                }
        }); // add
  //*****************************************USER************************************************//
         user_list = $("#user_list").DataTable({
          "ajax": "retrieve_users.php",
          "order": []
          });

         $('#set_user_account').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";
                var userlevel = $('#user_level').val();    
                if($("#title-user").text() == "Set Account Details"){
                  msg = "Set as " + userlevel + "?";
                } 
                else{
                  msg = "Update Account Details?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_user.php",  
                                   method:"POST",  
                                   data:$('#set_user_account').serialize(),    
                                   success:function(data){ 
                                        $('#hid_user').val('');
                                        $('#hid_fac').val('');
                                        $('#set_user_account')[0].reset();  
                                        $('#add_user_Modal').modal('hide');  
                                        user_list.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

         $(document).on("click", ".edit_user", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_user.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){ 
                             $('#faculty_name').val(data.name);
                             $('#user_level').val(data.user_level);           
                             $('#user_name').val(data.username);
                             $('#pass_word').val(data.password);       
                             $('#hid_user').val(data.user_id);  
                             $('#bt_user').val("Update"); 
                             $('#faculty_name').attr('readonly', true); 
                             $("#title-user").text("Update Account Details"); 
                             $('#add_user_Modal').modal('show');   
                        }  
                   });  
              }); //set

         $(document).on("click", ".unset_user", function(){  
                   var sid = $(this).attr("id");
                   alertify.confirm("Unset user level?", function(){ 
                              $.ajax({  
                                    url:"unset_user.php",  
                                    method:"POST",  
                                    data:{sid:sid},  
                                    success:function(data){    
                                        user_list.ajax.reload(null, false);
                                        alertify.success(data);    
                                    }  
                               });

                            });  
                     
              }); //unset
//*****************************************END USER********************************************//     

//*****************************************SCHEDULE************************************************//
         class_sched_list = $("#class_sched_list").DataTable({
          "ajax": "retrieve_class_sched.php",
          "order": []
          });

         room_sched_list = $("#room_sched_list").DataTable({
          "ajax": "retrieve_room_sched.php",
          "order": []
          });

         instr_sched_list = $("#instr_sched_list").DataTable({
          "ajax": "retrieve_instructor_sched.php",
          "order": []
          });

         class_get = $("#class_get").DataTable({
          "ajax": "class_get.php",
          "bPaginate": false,
          "bFilter": false,
          "bInfo": false,
          "order": []
          });

         class_ungrouped_get = $("#class_ungrouped_get").DataTable({
          "ajax": "class_ungrouped_get.php",
          "bPaginate": false,
          "bFilter": false,
          "bInfo": false,
          "order": []
          });

         room_get = $("#room_get").DataTable({
          "ajax": "room_get.php",
          "bPaginate": false,
          "bFilter": false,
          "bInfo": false,
          "order": []
          });
        
         instructor_get = $("#instructor_get").DataTable({
          "ajax": "instructor_get.php",
          "bPaginate": false,
          "bFilter": false,
          "bInfo": false,
          "order": []
          });

         sched_master_list = $("#sched_master_list").DataTable({
          "ajax": "search_sched.php",
          "columnDefs": [
            {
                "targets": [ 7 ],
                "visible": false,
                "searchable": true
            }],
          "order": []
          });

         $('#searchbox').on('keyup change', function () {
               sched_master_list.search(this.value).draw();
          });

          $("#sched_master_list_filter").addClass("hidden");
          $("#sched_master_list_length").addClass("hidden");

          $(document).on( 'change', '#dept', function () { 
            sched_master_list
                .columns( 7 )
                .search(  $(this).val() )
                .draw();
          });

          $('#dept').change(function(){
            var dept = $(this).val();
              $.ajax({  
                  url:"search_sched.php",  
                  method:"POST",  
                  data:{dept:dept},    
                  success:function(data){ 
                  sched_master_list.ajax.reload(null, false);
                }  
             });  
          });


        $('#sched_form').on("submit", function(event){  
                event.preventDefault(); 
                    alertify.confirm("Create Schedule?", function(){ 
                              $.ajax({  
                                   url:"create_sched.php",  
                                   method:"POST",  
                                   data:$('#sched_form').serialize(),    
                                   success:function(data){ 
                                        alertify.warning(data);
                                   }  
                              });  

                            });
              }); // add

        $('#sched_edit_form').on("submit", function(event){  
                event.preventDefault(); 
                    alertify.confirm("Update Schedule?", function(){ 
                              $.ajax({  
                                   url:"edit_sched.php",  
                                   method:"POST",  
                                   data:$('#sched_edit_form').serialize(),    
                                   success:function(data){ 
                                        alertify.warning(data);
                                   }  
                              });  

                            });
              }); // add


        $(document).on("change", "#time_start", function(){
           var startj = $(this).val();  
           var data = "start=" + startj;
                   $.ajax({  
                        method:"post",
                        url:"filter_end.php",    
                        data:data,  
                        success: function(data){  
                          $('#timeout').html(data);  
                        }  
                   }); 
       });

       //  $("#time_end").change(function(){
       //     var endj = $("#time_end").val();  
       //     var data = "end=" + endj;
       //             $.ajax({  
       //                  method:"post",
       //                  url:"filter_start.php",    
       //                  data:data,  
       //                  success: function(data){  
       //                    $('#timein').html(data);  
       //                  }  
       //             }); 
       // });

         $(document).on("click", ".del_sched", function(){  
                var sidj = $(this).attr("id");  
                var data = "sid="+ sidj;
                  alertify.confirm('Delete schedule?', function(){ 
                   $.ajax({  
                        method:"post",
                        url:"delete_sched.php",    
                        data:data,  
                        success: function(data){ 
                             class_get.ajax.reload(null, false);
                             class_ungrouped_get.ajax.reload(null, false);
                             room_get.ajax.reload(null, false);
                             instructor_get.ajax.reload(null, false);
                             alertify.success(data);
                        }  
                   });  
         
              }); 
            });  //delete


//*****************************************END SCHEDULE********************************************//


//*****************************************ADD ALTERS**********************************************//
    $('#add_subject').click(function(){  
                   $('#bt_subject').val("Submit");
                   $('#hid_subject').val('');  
                   $('#insert_subject')[0].reset();
                   $("#title-subject").text("Add Subject");
              }); //end

    $('#add_room').click(function(){  
                   $('#bt_room').val("Submit");
                   $('#hid_room').val('');  
                   $('#insert_room')[0].reset();
                   $("#title-room").text("Add Room");
              }); //end

    $('#add_dept').click(function(){  
                   $('#bt_dept').val("Submit");
                   $('#hid_dept').val('');  
                   $('#insert_dept')[0].reset();
                   $("#title-dept").text("Add Department");
              }); //end

    $('#add_course').click(function(){  
                   $('#bt_course').val("Submit");
                   $('#hid_course').val('');  
                   $('#insert_course')[0].reset();
                   $("#title-course").text("Add Course");
              }); //end

    $('#add_class').click(function(){  
                   $('#bt_class').val("Submit");
                   $('#hid_class').val('');  
                   $('#insert_class')[0].reset();
                   $("#title-class").text("Add Class");
              }); //end

    $('#add_faculty').click(function(){  
                   $('#bt_faculty').val("Submit");
                   $('#hid_faculty').val('');  
                   $('#insert_faculty')[0].reset();
                   $("#fload").show();
                   $("#title-faculty").text("Add Faculty");
              }); //end

    $('#add_user').click(function(){  
                   $('#bt_user').val("Submit");
                   $('#hid_user').val('');
                   $('#hid_fac').val('');  
                   $('#set_user_account')[0].reset();
                   $('#faculty_name').val('');
                   $("#title-user").text("Set Account Details");
                   $('#faculty_name').attr('readonly', false);
              }); //end

    $('#add_desg').click(function(){  
                   $('#bt_desg').val("Submit");
                   $('#hid_desg').val('');  
                   $('#insert_desg')[0].reset();
                   $("#title-desg").text("Add Designation");
              }); //end

    $('#add_rank').click(function(){  
                   $('#bt_rank').val("Submit");
                   $('#hid_rank').val('');  
                   $('#insert_rank')[0].reset();
                   $("#title-rank").text("Add Rank");
              }); //end
//*****************************************END ADD ALTERS******************************************//


//*****************************************Settings************************************************//

    $(document).on("click", "#set_save", function(){  
              var sy = $("#current_sy").text();
              var sem = $("#current_sem").text();
              var data = "sy=" + sy + "&sem=" + sem;
                              $.ajax({  
                                   url:"set_sy.php",  
                                   method:"POST",  
                                   data:data,
                                   beforeSend:function(data){
                                      $('#set_save').text('  Saving..');
                                      $('#set_save').prepend("<img src='../../css/loading.gif' width ='18' height = '18'>");
                                   },    
                                   success:function(data){ 
                                    
                                    setTimeout(function(){
                                       $('#set_save').html('<i class="fa fa-fw fa-gears"></i> Save');
                                       $("#set_save").prop("disabled", true);
                                       alertify.success('Setting saved!')
                                    },900);
                                    setTimeout(function(){
                                       window.location.reload();
                                    },6000);
                                    

                                   }  
                              });  
 
              }); //sy

    $("#set_save").prop("disabled", true);

    if ( $("#settings_sy").val()==null) {
      $("#sy_ok").prop("disabled", true);
    }
    $(document).on("change", "#settings_sy", function(){
         $("#sy_ok").prop("disabled", false);
    });

    if ( $("#settings_sem").val()==null) {
      $("#sem_ok").prop("disabled", true);
    }
    $(document).on("change", "#settings_sem", function(){
         $("#sem_ok").prop("disabled", false);

    });

    $(document).on("click", "#sy_ok", function(){
        var sy = $("#settings_sy").val();
        $("#current_sy").text(sy);
        $("#set_save").prop("disabled", false);
    });

    $(document).on("click", "#sem_ok", function(){
        var sem = $("#settings_sem").val();
        $("#current_sem").text(sem);
        $("#set_save").prop("disabled", false);
    });

   


//*****************************************END Settings********************************************//

//*****************************************ACCOUNT*************************************************//

    $('#account_form').on("submit", function(event){  
                event.preventDefault(); 
                          alertify.confirm("Save changes?", function(){ 
                              $.ajax({  
                                   url:"update_account.php",  
                                   method:"POST",  
                                   data:$('#account_form').serialize(),    
                                   success:function(data){ 
                                        alertify.success(data);
                                        $('#account_uname, #account_pword, #account_cpword').val('');
                                        setTimeout(function(){
                                         window.history.back();
                                        },3000);
                                   }  
                              });  

                            });
 
              }); //account

    $('#profile_form').on("submit", function(event){  
                event.preventDefault(); 
                          alertify.confirm("Save changes?", function(){ 
                              $.ajax({  
                                   url:"update_profile.php",  
                                   method:"POST",  
                                   data:$('#profile_form').serialize(),    
                                   success:function(data){ 
                                        alertify.success(data);
                                        $('#faculty_fname, #faculty_mname, #faculty_lname, #faculty_dletter, #faculty_dept, #faculty_desg').val('');
                                        setTimeout(function(){
                                         window.history.back();
                                        },3000);
                                      } 
                              });  

                            });
 
              }); //account
//*****************************************END ACCOUNT*********************************************//


//*****************************************SUBJECT*************************************************//
    sublist = $("#sublist").DataTable({
    "ajax": "retrieve_subject.php",
    "order": []
    });


    $('#insert_subject').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
               	if($("#title-subject").text() == "Add Subject"){
               		msg = "Add subject?";
               	} 
               	else{
               		msg = "Update subject?";

               	}
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_subject.php",  
                                   method:"POST",  
                                   data:$('#insert_subject').serialize(),    
                                   success:function(data){ 
                                   		$('#hid_subject').val('');
                                        $('#insert_subject')[0].reset();  
                                        $('#add_subject_Modal').modal('hide');  
                                        sublist.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

              $(document).on("click", ".edit_subject", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_subject.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#course_no').val(data.CourseNo);  
                             $('#desc_title').val(data.DescTitle);  
                             $('#unit').val(data.Units);   
                             $('#hid_subject').val(data.subject_id); 
                             $('#bt_subject').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-subject").text("Update Subject"); 
                             $('#add_subject_Modal').modal('show');  
                        }  
                   });  
              }); //edit


               $(document).on("click", ".del_subject", function(){  
                var sidj = $(this).attr("id");  
                var data = "sid="+ sidj;
                  alertify.confirm('Delete subject?', function(){ 
                   $.ajax({  
                        method:"post",
                        url:"delete_subject.php",    
                        data:data,  
                        success: function(data){  
                             sublist.ajax.reload(null, false);
                             alertify.success(data);  
                        }  
                   });  
         
              }); 
            });  //delete
//*****************************************END SUBJECT*********************************************//


//*****************************************ROOM****************************************************//
	roomlist = $("#roomlist").DataTable({
    "ajax": "retrieve_room.php",
    "order": []
    });


    $('#insert_room').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
               	if($("#title-room").text() == "Add Room"){
               		msg = "Add room?";
               	} 
               	else{
               		msg = "Update room?";

               	}
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_room.php",  
                                   method:"POST",  
                                   data:$('#insert_room').serialize(),    
                                   success:function(data){ 
                                   		$('#hid_room', ).val('');
                                        $('#insert_room')[0].reset();  
                                        $('#add_room_Modal').modal('hide');  
                                        roomlist.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $(document).on("click", ".edit_room", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_room.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#room_no').val(data.room_no);  
                             $('#room_type').val(data.room_type); 
                             $('#room_dept').val(data.room_dept);     
                             $('#hid_room').val(data.room_id); 
                             $('#bt_room').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-room").text("Update Room"); 
                             $('#add_room_Modal').modal('show');  
                        }  
                   });  
              }); //edit


    $(document).on("click", ".del_room", function(){  
                var sidj = $(this).attr("id");  
                var data = "sid="+ sidj;
                  alertify.confirm('Delete room?', function(){ 
                   $.ajax({  
                        method:"post",
                        url:"delete_room.php",    
                        data:data,  
                        success: function(data){  
                             roomlist.ajax.reload(null, false);
                             alertify.success(data);  
                        }  
                   });  
         
              }); 
            });  //delete
//*****************************************END ROOM************************************************//


//*****************************************DEPARTMENT**********************************************//
  deptlist = $("#deptlist").DataTable({
    "ajax": "retrieve_dept.php",
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false,
    "order": []
    });


    $('#insert_dept').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#title-dept").text() == "Add Department"){
                  msg = "Add department?";
                } 
                else{
                  msg = "Update department?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_dept.php",  
                                   method:"POST",  
                                   data:$('#insert_dept').serialize(),    
                                   success:function(data){ 
                                      $('#hid_dept', ).val('');
                                        $('#insert_dept')[0].reset();  
                                        $('#add_dept_Modal').modal('hide');  
                                        deptlist.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $(document).on("click", ".edit_dept", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_dept.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#dept_code').val(data.dept_code);  
                             $('#dept_name').val(data.dept_name);     
                             $('#hid_dept').val(data.dept_id); 
                             $('#bt_dept').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-dept").text("Update Department"); 
                             $('#add_dept_Modal').modal('show');  
                        }  
                   });  
              }); //edit


    $(document).on("click", ".del_dept", function(){  
                var sidj = $(this).attr("id");  
                var data = "sid="+ sidj;
                  alertify.confirm('Delete Department?', function(){ 
                   $.ajax({  
                        method:"post",
                        url:"delete_dept.php",    
                        data:data,  
                        success: function(data){  
                             deptlist.ajax.reload(null, false);
                             alertify.success(data);  
                        }  
                   });  
         
              }); 
            });  //delete
//*****************************************END DEPARTMENT******************************************//


//*****************************************COURSE**************************************************//
  courselist = $("#courselist").DataTable({
    "ajax": "retrieve_course.php",
    "order": []
    });


    $('#insert_course').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#title-course").text() == "Add Course"){
                  msg = "Add course?";
                } 
                else{
                  msg = "Update course?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_course.php",  
                                   method:"POST",  
                                   data:$('#insert_course').serialize(),    
                                   success:function(data){ 
                                      $('#hid_course', ).val('');
                                        $('#insert_course')[0].reset();  
                                        $('#add_course_Modal').modal('hide');  
                                        courselist.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $(document).on("click", ".edit_course", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_course.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#course_code').val(data.course_code);  
                             $('#course_name').val(data.course_name);
                             $('#course_dept').val(data.course_dept);     
                             $('#hid_course').val(data.course_id); 
                             $('#bt_course').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-course").text("Update Department"); 
                             $('#add_course_Modal').modal('show');  
                        }  
                   });  
              }); //edit


    // $(document).on("click", ".del_dept", function(){  
    //             var sidj = $(this).attr("id");  
    //             var data = "sid="+ sidj;
    //               alertify.confirm('Delete Department?', function(){ 
    //                $.ajax({  
    //                     method:"post",
    //                     url:"delete_dept.php",    
    //                     data:data,  
    //                     success: function(data){  
    //                          deptlist.ajax.reload(null, false);
    //                          alertify.success(data);  
    //                     }  
    //                });  
         
    //           }); 
    //         });  //delete
//*****************************************END COURSE**********************************************//


//*****************************************CLASS***************************************************//
  classlist = $("#classlist").DataTable({
    "ajax": "retrieve_class.php",
    "order": []
    });


    $('#insert_class').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#title-class").text() == "Add Class"){
                  msg = "Add class?";
                } 
                else{
                  msg = "Update class?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_class.php",  
                                   method:"POST",  
                                   data:$('#insert_class').serialize(),    
                                   success:function(data){ 
                                      $('#hid_class', ).val('');
                                        $('#insert_class')[0].reset();  
                                        $('#add_class_Modal').modal('hide');  
                                        classlist.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $(document).on("click", ".edit_class", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_class.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#class_course').val(data.class_course);  
                             $('#class_year').val(data.class_year);
                             $('#class_section').val(data.class_section);  
                             $('#class_major').val(data.class_major);     
                             $('#hid_class').val(data.class_id); 
                             $('#bt_class').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-class").text("Update Class"); 
                             $('#add_class_Modal').modal('show');  
                        }  
                   });  
              }); //edit


    $(document).on("click", ".del_class", function(){  
                var sidj = $(this).attr("id");  
                var data = "sid="+ sidj;
                  alertify.confirm('Delete Class?', function(){ 
                   $.ajax({  
                        method:"post",
                        url:"delete_class.php",    
                        data:data,  
                        success: function(data){  
                             classlist.ajax.reload(null, false);
                             alertify.success(data);  
                        }  
                   });  
         
              }); 
            });  //delete
//*****************************************END CLASS***********************************************//


//*****************************************FACULTY*************************************************//
  facultylist = $("#facultylist").DataTable({
    "ajax": "retrieve_faculty.php",
    "order": []
    });


    $('#insert_faculty').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#title-faculty").text() == "Add Faculty"){
                  msg = "Add faculty?";
                } 
                else{
                  msg = "Update faculty?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_faculty.php",  
                                   method:"POST",  
                                   data:$('#insert_faculty').serialize(),    
                                   success:function(data){ 
                                      $('#hid_faculty', ).val('');
                                        $('#insert_faculty')[0].reset();  
                                        $('#add_faculty_Modal').modal('hide');  
                                        facultylist.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $('#bg_form').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#faculty-title").text() == "Add Faculty Load"){
                  msg = "Add faculty?";
                } 
                else{
                  msg = "Update faculty?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_faculty_load.php",  
                                   method:"POST",  
                                   data:$('#bg_form').serialize(),    
                                   success:function(data){ 
                                        // $('#bg_form')[0].reset();  
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $('#research_form').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#faculty-title").text() == "Add Faculty Load"){
                  msg = "Add Research?";
                } 
                else{
                  msg = "Update Research?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_faculty_research.php",  
                                   method:"POST",  
                                   data:$('#research_form').serialize(),    
                                   success:function(data){ 
                                        // $('#research_form')[0].reset();  
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add


    $('#ext_form').on("submit", function(event){ 
                event.preventDefault(); 
                var msg = "";   
                if($("#faculty-title").text() == "Add Faculty Load"){
                  msg = "Add Extension Project?";
                } 
                else{
                  msg = "Update Extension Project?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_faculty_extproject.php",  
                                   method:"POST",  
                                   data:$('#ext_form').serialize(),    
                                   success:function(data){ 
                                        // $('#ext_form')[0].reset();  
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add 


    $('#admin_form').on("submit", function(event){ 
                event.preventDefault(); 
                var msg = "";   
                if($("#faculty-title").text() == "Add Faculty Load"){
                  msg = "Add Administration Project?";
                } 
                else{
                  msg = "Update Administration Project?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_faculty_adminproject.php",  
                                   method:"POST",  
                                   data:$('#admin_form').serialize(),    
                                   success:function(data){ 
                                        // $('#ext_form')[0].reset();  
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

     $('#assign_form').on("submit", function(event){ 
                event.preventDefault(); 
                var msg = "";   
                if($("#faculty-title").text() == "Add Faculty Load"){
                  msg = "Add Other Assignments?";
                } 
                else{
                  msg = "Update Other Assignments?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_faculty_assignments.php",  
                                   method:"POST",  
                                   data:$('#assign_form').serialize(),    
                                   success:function(data){ 
                                        // $('#ext_form')[0].reset();  
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $(document).on("click", ".edit_faculty", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_faculty.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#faculty_fname').val(data.faculty_fname);
                             $('#faculty_mname').val(data.faculty_mname);  
                             $('#faculty_lname').val(data.faculty_lname);
                             $('#faculty_dletter').val(data.faculty_dletter);  
                             $('#faculty_dept').val(data.faculty_dept);    
                             $('#hid_faculty').val(data.faculty_id); 
                             $('#bt_faculty').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-faculty").text("Update Faculty"); 
                             $("#fload").hide();
                             $('#add_faculty_Modal').modal('show');  
                        }  
                   });  
              }); //edit

    $(document).on("click", ".set_account", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"set_faculty.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){    
                             $('#user_name').val(data.username);
                             $('#pass_word').val(data.password);       
                             $('#hid_user').val(data.faculty_id);    
                        }  
                   });  
              }); //set

    $(document).on("click", ".unset", function(){  
                   var sid = $(this).attr("id");

                   alertify.confirm("Unset user level?", function(){ 
                              $.ajax({  
                                    url:"unset_user.php",  
                                    method:"POST",  
                                    data:{sid:sid},  
                                    success:function(data){    
                                        facultylist.ajax.reload(null, false);
                                        alertify.success(data);    
                                    }  
                               });

                            });  
                     
              }); //unset


    $('#set_account').on("submit", function(event){  
                event.preventDefault();
                var userlevel = $('#user_level').val(); 
                 alertify.confirm("Set as " + userlevel + "?", function(){ 
                              $.ajax({  
                                   url:"set_user.php",  
                                   method:"POST",  
                                   data:$('#set_account').serialize(),    
                                   success:function(data){ 
                                      $('#hid_user', ).val('');
                                        $('#set_account')[0].reset();  
                                        $('#set_Modal').modal('hide');  
                                        facultylist.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add


    // $(document).on("click", ".del_dept", function(){  
    //             var sidj = $(this).attr("id");  
    //             var data = "sid="+ sidj;
    //               alertify.confirm('Delete Department?', function(){ 
    //                $.ajax({  
    //                     method:"post",
    //                     url:"delete_dept.php",    
    //                     data:data,  
    //                     success: function(data){  
    //                          deptlist.ajax.reload(null, false);
    //                          alertify.success(data);  
    //                     }  
    //                });  
         
    //           }); 
    //         });  //delete
//*****************************************END FACULTY*********************************************//

//*****************************************DESIGNATION***************************************************//
  desg_list = $("#desglist").DataTable({
    "ajax": "retrieve_desg.php",
    "order": []
    });


    $('#insert_desg').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#title-desg").text() == "Add Designation"){
                  msg = "Add designation?";
                } 
                else{
                  msg = "Update designation?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_desg.php",  
                                   method:"POST",  
                                   data:$('#insert_desg').serialize(),    
                                   success:function(data){ 
                                      $('#hid_desg').val('');
                                        $('#insert_desg')[0].reset();  
                                        $('#add_desg_Modal').modal('hide');  
                                        desg_list.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $(document).on("click", ".edit_desg", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_desg.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#desg').val(data.designation);  
                             $('#eql_desg').val(data.designation_eql_point);     
                             $('#hid_desg').val(data.designation_id); 
                             $('#bt_desg').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-desg").text("Update Designation"); 
                             $('#add_desg_Modal').modal('show');  
                        }  
                   });  
              }); //edit


    $(document).on("click", ".del_desg", function(){  
                var sidj = $(this).attr("id");  
                var data = "sid="+ sidj;
                  alertify.confirm('Delete Designation?', function(){ 
                   $.ajax({  
                        method:"post",
                        url:"delete_desg.php",    
                        data:data,  
                        success: function(data){  
                             desg_list.ajax.reload(null, false);
                             alertify.success(data);  
                        }  
                   });  
         
              }); 
            });  //delete
//*****************************************END DESIGNATION***********************************************//

//*****************************************RANK***************************************************//
  rank_list = $("#ranklist").DataTable({
    "ajax": "retrieve_rank.php",
    "order": []
    });


    $('#insert_rank').on("submit", function(event){  
                event.preventDefault(); 
                var msg = "";   
                if($("#title-rank").text() == "Add Rank"){
                  msg = "Add rank?";
                } 
                else{
                  msg = "Update rank?";

                }
                    alertify.confirm(msg, function(){ 
                              $.ajax({  
                                   url:"add_rank.php",  
                                   method:"POST",  
                                   data:$('#insert_rank').serialize(),    
                                   success:function(data){ 
                                      $('#hid_rank').val('');
                                        $('#insert_rank')[0].reset();  
                                        $('#add_rank_Modal').modal('hide');  
                                        rank_list.ajax.reload(null, false);
                                        alertify.success(data);
                                   }  
                              });  

                            });
              }); // add

    $(document).on("click", ".edit_rank", function(){  
                   var sid = $(this).attr("id");  
                   $.ajax({  
                        url:"fetch_rank.php",  
                        method:"POST",  
                        data:{sid:sid},  
                        dataType:"json", 
                        success:function(data){  
                             $('#rank').val(data.rank);  
                             $('#hid_rank').val(data.rank_id); 
                             $('#bt_rank').val("Update"); 
                             // $('#tb1').attr('readonly','readonly'); 
                             $("#title-rank").text("Update Rank"); 
                             $('#add_rank_Modal').modal('show');  
                        }  
                   });  
              }); //edit


    $(document).on("click", ".del_rank", function(){  
                var sidj = $(this).attr("id");  
                var data = "sid="+ sidj;
                  alertify.confirm('Delete Rank?', function(){ 
                   $.ajax({  
                        method:"post",
                        url:"delete_rank.php",    
                        data:data,  
                        success: function(data){  
                             rank_list.ajax.reload(null, false);
                             alertify.success(data);  
                        }  
                   });  
         
              }); 
            });  //delete
//*****************************************END DESIGNATION***********************************************//


}); //end document.ready

//*****************************************FUNCTIONS***********************************************//
    function validate()
    {
        var unamej = $("#uname").val();
        var pwordj = $("#pword").val();
            
            var data = "username=" + unamej + "&password=" + pwordj;
            
            $.ajax({
                method: "post",
                url: "login.php",
                data: data,
                success: function(data){
                    if(data == 'admin')
                    {
                         alertify.alert("LOG IN SUCCESSFUL!", function(){
                         		location.replace(data + "/");
                         });
                         
                    }
                    else if(data == 'user')
                    {
                        alertify.alert("LOG IN SUCCESSFUL!", function(){
                         		location.replace(data + "/");
                         });
                    }
                    else 
                    {                  

                        alertify.error(data);
                         $("#uname").focus().select();
                         $("#pword").val('');
                        
                    }
                    
                }
                
            });  
    }

    function validate2()
    {
        var unamej = $("#uname2").val();
        var pwordj = $("#pword2").val();
            
            var data = "username=" + unamej + "&password=" + pwordj;
            
            $.ajax({
                method: "post",
                url: "../login.php",
                data: data,
                success: function(data){
                    if(data == 'admin')
                    {
                         alertify.alert("LOG IN SUCCESSFUL!", function(){
                            location.replace("../../" + data + "/");
                         });
                         
                    }
                    else if(data == 'user')
                    {
                        alertify.alert("LOG IN SUCCESSFUL!", function(){
                            location.replace("../../" + data + "/");
                         });
                    }
                    else 
                    {                  

                        alertify.error(data);
                         $("#uname").focus().select();
                         $("#pword").val('');
                        
                    }
                    
                }
                
            });  
    }


    function handleKeyPress(e){
     var key=e.keyCode || e.which;
      if (key==13){
         validate();
      }
    }
 
  
    function checkboxValidator(group, form, goal){
      var isChecked = false;
      var goal = goal; //Default at least one checkbox

      if(group.filter(':checked').length >= goal){
        isChecked = true;
      }

      group.not(':checked').prop('required', !isChecked);
      form.validator('destroy').validator();
    }

    function ConvertTimeformat(time) {
          var hours = Number(time.match(/^(\d+)/)[1]);
          var minutes = Number(time.match(/:(\d+)/)[1]);
          var AMPM = time.match(/\s(.*)$/)[1];
          if (AMPM == "PM" && hours < 12) hours = hours + 12;
          if (AMPM == "AM" && hours == 12) hours = hours - 12;
          var sHours = hours.toString();
          var sMinutes = minutes.toString();
          if (hours < 10) sHours = "0" + sHours;
          if (minutes < 10) sMinutes = "0" + sMinutes;
          var HHMM  = sHours + ":" + sMinutes;
          return HHMM;
      }

   function z_sched()
   {
        var sched = $('#sched').val();  
        $.ajax({  
               method:"POST",
               url:"schedule/print_schedule.php",    
               data:{sched:sched},  
               success: function(data){ 
               $('#x_sched').html('<option value="" selected disabled>Select to Print</option>' + data);}  
        });  
   }   
//*****************************************END FUNCTIONS*******************************************//