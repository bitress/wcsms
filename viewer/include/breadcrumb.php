<div class="row">
    <div class="active col-md-8">
        <i class="fa fa-clock-o"></i> <?php date_default_timezone_set('Asia/Manila'); echo date("l\, F j\,  Y"); ?>
    </div>
    <div class="active col-md-4 text-right">
        <i class="fa fa-gears"></i> <?php echo $_SESSION['current_sem'].', SY '.$_SESSION['current_sy']?>
    </div>
</div>