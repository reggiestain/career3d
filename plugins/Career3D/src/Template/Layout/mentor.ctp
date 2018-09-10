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
        <?php echo $this->Html->css('Career3D.mentor/morris/morris.css');?>
        <?php echo $this->Html->css('Career3D.mentor/iCheck/flat/blue.css');?>
        
        <?php echo $this->Html->css('Career3D.mentor/jvectormap/jquery-jvectormap-1.2.2.css');?>
        <?php echo $this->Html->css('Career3D.mentor/datepicker/datepicker3.css') ;?>
        <?php echo $this->Html->css('Career3D.mentor/daterangepicker/daterangepicker-bs3.css');?>
        <?php echo $this->Html->css('Career3D.mentor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>        
    </head>
    <body class="skin-blue">  
    <div class="wrapper">     
    <?php echo $this->fetch('content');?>
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
    <?php echo $this->Html->script('Career3D.mentor/jQuery/jquery.min');?>
        <!-- jQuery UI-->
    <?php echo $this->Html->script('Career3D.mentor/jQuery/jquery-ui.min');?>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->    
    <?php echo $this->Html->script('Career3D.mentor/bootstrap/bootstrap.min');?>
    <!-- Morris.js charts -->
    <?php echo $this->Html->script('Career3D.mentor/raphael/raphael.min');?>
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
    <?php //echo $this->Html->css('Career3D.summernote.css') ;?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-81003044-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-81003044-2');
</script>

    </body>
</html>

