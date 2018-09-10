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
<html lang="en">
    <head>    
        <title>Career Guide</title>
        <meta name="description" content="Career3D">
        <meta name="keywords" content="Mentorship,Careers,Recruiters,Student Life,Bursaries,Academics">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="Career Guide">
        <link rel="shortcut icon" sizes="16x16" href="../../webroot/img/icon-16x16.png">
        <link rel="shortcut icon" sizes="196x196" href="../../webroot/img/careers.png">
        <link rel="apple-touch-icon-precomposed" href="../../webroot/img/icon-152x152.png">
        <?php echo $this->Html->css('Career3D.font-awesome.min.css');?>
        <?php echo $this->Html->css('Career3D.mystyle.css') ;?>
        <?php echo $this->Html->css('Career3D.cake-style.css') ;?>
        <?php echo $this->Html->css('Career3D.bootstrap.min.css');?>
        <?php echo $this->Html->css('Career3D.datepicker.min.css');?> 
        <?php //echo $this->Html->css('Career3D.addtohomescreen.css');?>        
        <?php echo $this->Html->css('Career3D.style.css') ;?>
        <?php echo $this->Html->css('Career3D.custom.css') ;?>
        <?php echo $this->Html->css('Career3D.menu.css') ;?>
        <?php echo $this->Html->css('Career3D.overlay.css') ;?>
        <?php echo $this->Html->css('Career3D.google-font-1.css') ;?>
        <?php echo $this->Html->css('Career3D.google-font-2.css') ;?>
        <?php echo $this->Html->css('Career3D.select2.css') ;?>
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>-->
        <?php //echo $this->Html->script('Career3D.script');?>
        <?php echo $this->Html->script('Career3D.jquery.min');?> 
        
        <?php //echo $this->Html->script('Career3D.addtohomescreen') ;?>           
        <!-- FONT ICON (FONT-AWESOME) -->                                                
        <?php //echo $this->Html->css('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') ;?>
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <!-- ****************
              After neccessary customization/modification, Please minify HTML/CSS according to http://browserdiet.com/en/ for better performance
             **************** -->
    </head>
    <body>        
    <?php echo $this->fetch('content');?>
      <!--<script>
        //addToHomescreen.removeSession();     // use this to remove the localStorage variable
            //var ath = addToHomescreen({
                //appID: 'org.cubiq.myCoolApp',
                //debug: 'android', // activate debug mode in ios emulation
                //skipFirstVisit: false, // show at first access
                //startDelay: 0, // display the message right away
                //lifespan: 0, // do not automatically kill the call out
                //displayPace: 0, // do not obey the display pace
                //privateModeOverride: true, // show the message in private mode
               // maxDisplayCount: 0      // do not obey the max display count
                        //message: '',
           // });
            //ath.clearSession();      // reset the user session
        </script>-->
        <?php echo $this->Html->script('Career3D.bootstrap.min');?>
        <?php echo $this->Html->script('Career3D.bootstrap-datepicker.min');?> 
        <?php echo $this->Html->script('Career3D.select25');?>
        <!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
        <?php //echo $this->Html->script('Career3D.gmaps') ;?>
        <?php //echo $this->Html->script('Career3D.smoothscroll');?>        
        <?php //echo $this->Html->script('Career3D.custom');?>    
        <?php echo $this->Html->script('Career3D.custom-2');?>
          
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-81003044-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-81003044-2');
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4204410640766542",
    enable_page_level_ads: true
  });
</script>

        
    </body>
</html>
