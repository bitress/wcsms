    </div>   <!-- left-content -->       
</div> <!-- end page--container -->

<!-- jQuery core JS -->
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery.numeric.js"></script>
<script src="../../js/myscript.js"></script>

<!-- Bootstrap Core JS -->
<script src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/validator.js"></script>
<!-- <script src="../js/new/jquery.nicescroll.js"></script> -->

<!-- Datatable Core Javascript -->
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../js/dataTables.bootstrap4.min.js"></script>

<!-- Alertify Core JavaScript -->
<script type="text/javascript" src="../../alertify/alertify.js"></script>
<script type="text/javascript">
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
</script>

<!-- Custom JS -->
<script src="../../js/new/scripts.js"></script>
<script>
    var toggle = true;
                                        
        $(".sidebar-icon").click(function() {                
            if (toggle)
            {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $(".page-wrapper").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
            }
            else
            {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                $(".page-wrapper").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back")
                    setTimeout(function() {
                $("#menu span").css({"position":"relative"});
                    }, 400);
            }
                                            
            toggle = !toggle;
        });
</script>

</body>
</html>