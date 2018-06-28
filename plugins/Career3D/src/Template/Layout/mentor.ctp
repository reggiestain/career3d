<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = 'CakePHP: the rapid development php framework';

$cakeDescription = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <?php echo $this->Html->css('Career3D.mentor/bootstrap.min.css');?>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />   
        <?php echo $this->Html->css('Career3D.mentor/AdminLTE.min.css');?>
        <?php echo $this->Html->css('Career3D.mentor/skins/_all-skins.min.css') ;?>
        <?php echo $this->Html->css('Career3D.mentor/iCheck/flat/blue.css');?>
        <?php echo $this->Html->css('Career3D.mentor/morris/morris.css');?>
        <?php echo $this->Html->css('Career3D.mentor/jvectormap/jquery-jvectormap-1.2.2.css');?>
        <?php echo $this->Html->css('Career3D.mentor/datepicker/datepicker3.css') ;?>
        <?php echo $this->Html->css('Career3D.mentor/daterangepicker/daterangepicker-bs3.css');?>
        <?php echo $this->Html->css('Career3D.mentor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>        
    </head>
    <body class="skin-blue">  
    <?php echo $this->fetch('content');?>
        <!-- Include JS files --> 
    <?php echo $this->Html->script('Career3D.mentor/jQuery/jQuery-2.1.3.min');?>
        <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->    
    <?php echo $this->Html->script('Career3D.mentor/jQuery/jQuery-2.1.3.min');?>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <?php echo $this->Html->script('Career3D.mentor/morris/morris.min');?>
    <!-- Sparkline -->
    <?php echo $this->Html->script('Career3D.mentor/sparkline/jquery.sparkline.min');?>
    <?php echo $this->Html->script('Career3D.mentor/jvectormap/jquery-jvectormap-1.2.2.min');?>
    <?php echo $this->Html->script('Career3D.mentor/jvectormap/jquery-jvectormap-world-mill-en');?>
    <!-- jQuery Knob Chart -->
    <?php echo $this->Html->script('Career3D.mentor/knob/jquery.knob');?>
    <!-- daterangepicker -->
    <?php echo $this->Html->script('Career3D.mentor/daterangepicker/daterangepicker');?>
    <!-- datepicker -->
    <?php echo $this->Html->script('Career3D.mentor/datepicker/bootstrap-datepicker');?>
    <!-- Bootstrap WYSIHTML5 -->
    <?php echo $this->Html->script('Career3D.mentor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min');?>
    <!-- iCheck -->
    <?php echo $this->Html->script('Career3D.mentor/iCheck/icheck.min');?>
    <!-- Slimscroll -->
    <?php echo $this->Html->script('Career3D.mentor/slimScroll/jquery.slimscroll.min');?>
    <!-- FastClick -->
    <?php echo $this->Html->script('Career3D.mentor/fastclick/fastclick.min');?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('Career3D.mentor/app.min');?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <?php echo $this->Html->script('Career3D.mentor/pages/dashboard');?>    
    <!-- AdminLTE for demo purposes -->
    <?php echo $this->Html->script('Career3D.mentor/demo');?>
    </body>
</html>
<script>
    $(document).ready(function () {
        $(".register").click(function () {
            $("#regModal").modal();
        });
        $(".signup").click(function () {
            $("#loginModal").modal();
        });
        $('#b-date').datepicker();
        
        $('#reg-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#reg-form").serialize();
            var url = $("#reg-form").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#regModal").modal('hide');
                        $(".log-alert").html("<div class='alert alert-success'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>Success!</strong> Registration was successful, please login with your email and password.</div>");
                        $("#loginModal").modal('show');
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
        
        $('#logi-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#login-form").serialize();
            var url = $("#login-form").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#loginModal").modal('hide');
                       //window.location.href ="<?php //echo Router::url('career3-d/users/dashboard');?>";
                    } else {
                        $(".log-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

    });
</script>
