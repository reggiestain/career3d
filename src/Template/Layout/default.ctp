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

//$cakeDescription = '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>    
        <meta charset="UTF-8">
        <?php //echo $this->Html->meta('favicon.ico','/favicon.ico',['type' => 'icon']);?>
        <link href="http://judahtips.org/webroot/favicon.ico" title="favicon.ico" type="image/x-icon"rel="alternate" />
        <meta name="google-site-verification" content="4X0C5q_MW1MubJ2ZeN3Mk0YecZi7bZHVRYCzn1qnwFw" />
        <meta name="description" content="Judahtips.org the home of web development and mind blowing software">
        <meta name="keywords" content="web development,graphic design,lead management, SEO, social media marketing, secure payment integration">
        <meta name="author" content="Reginald Bossman">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- SITE TITLE -->
        <title>
        <?php echo $title; ?>
        </title>

    <?php //echo $this->Html->css('bootstrap.min.css') ;?>   
        <!-- FONT ICON (FONT-AWESOME) -->                                        
    <?php //echo $this->Html->css('font-awesome.min.css') ;?>
    <?php //echo $this->Html->css('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') ;?>
        <!-- OWL-CAROUSEL -->                                        
    <?php echo $this->Html->css('grid.css') ;?>
    <?php echo $this->Html->css('style.css') ;?>   
        <!-- WODRY TEXT SLIDING  -->
    <?php echo $this->Html->css('camera.css') ;?>        
    <?php echo $this->Html->css('owl-carousel.css') ;?>   
        <!-- COLORS -->
    <?php echo $this->Html->script('jquery') ;?> 
    <?php echo $this->Html->script('jquery-migrate-1.2.1') ;?>     
    <?php echo $this->Html->script('device.min') ;?>
        <!--[if lt IE 9]>
                                    <script src="js/html5shiv.js"></script>
                                    <script src="js/respond.min.js"></script>
            <![endif]-->

        <!-- ****************
              After neccessary customization/modification, Please minify HTML/CSS according to http://browserdiet.com/en/ for better performance
             **************** -->
    </head>
    <body>
        <div class="page">    
         <?php echo $this->fetch('content');?>
        </div>
        <!-- Include JS files -->
    <?php echo $this->Html->script(array('script'
                                  ));?> 
    <?php echo $this->element('analyticstracking');?>    
    </body>
</html>
