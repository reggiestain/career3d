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
        <title><?php echo $this->fetch('title');?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php //echo $this->Html->css('Career3D.bootstrap-cosmo.css') ;?>
  <?php echo $this->Html->css('Career3D.bootstrap.min.css') ;?>
  <?php echo $this->Html->css('Career3D.font-awesome.min.css') ;?>
  <?php echo $this->Html->css('Career3D.summernote.css') ;?>
  <?php echo $this->Html->css('Career3D.cake-style.css') ;?>
  <?php echo $this->Html->css('Career3D.dropzone.css');?>  
  <?php echo $this->Html->css('Career3D.datepicker.min.css');?> 
  <?php echo $this->Html->css('Career3D.select2-bootstrap.min.css');?>
  <?php echo $this->Html->css('perfect-scrollbar.min.css');?>       
  <!--<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>--> 
  <?php echo $this->Html->script('Career3D.jquery.min');?>
  <?php echo $this->Html->script('Career3D.bootstrap.min');?>
  <?php echo $this->Html->script('Career3D.jquery.nicescroll/jquery.nicescroll.iframehelper');?> 
  <?php echo $this->Html->script('Career3D.jquery.nicescroll/jquery.nicescroll.min');?>       
  <?php echo $this->Html->script('perfect-scrollbar.min');?>
  <?php echo $this->Html->script('Career3D.bootstrap-datepicker.min');?>
  <?php echo $this->Html->script('Career3D.multiselect');?>
  <?php echo $this->Html->script('Career3D.summernote');?>
  <?php echo $this->Html->script('Career3D.dropzone');?> 

  <?php echo $this->Html->script('Career3D.index');?> 
        <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 450px}

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            .loader {
                border: 16px solid #f3f3f3; /* Light grey */
                border-top: 16px solid #3498db; /* Blue */
                border-radius: 50%;
                width: 60px;
                height: 60px;
                animation: spin 2s linear infinite;
            }

            .scrollbar
            {

                float: left;
                height: 800px;
                width: 100%;
                background: #F5F5F5;
                overflow-y: scroll;

            }

            #style-1::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                border-radius: 10px;
                background-color: #F5F5F5;
            }

            #style-1::-webkit-scrollbar
            {
                width: 12px;
                background-color: #F5F5F5;
            }

            #style-1::-webkit-scrollbar-thumb
            {
                border-radius: 10px;
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                background-color: #555;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height:auto;} 
            }
        </style>
    </head>
    <div class="col-md-6" id="wait" style="display:none">
        <div style="text-align:center;width:100%;height:100%;padding:100px">
            <button class="btn btn-default btn-lg"><i class="fa fa-spinner fa-spin"></i> Loading</button>
        </div>
    </div>
<?php echo $this->element('profile/header');?> 
<?php echo $this->fetch('content');?>
<?php echo $this->element('modals');?>    
<?php //echo $this->element('profile/footer');?>
<?php echo $this->Html->script('Career3D.require');?>  

    <script>
        $(document).ready(function () {
            $('a').tooltip({placement: 'top'});

            $("#toggle1").click(function () {
                $("#widget-body1").slideToggle("slow");
                $('#toggle1').toggleClass(function () {
                    if ($(this).is('.fa fa-chevron-down')) {
                        return '.fa fa-chevron-up';
                    } else {
                        return '.fa fa-chevron-down';
                    }
                });
            });

            $("#toggle2").click(function () {
                $("#widget-body2").slideToggle("slow");

                $('#toggle2').toggleClass(function () {
                    if ($(this).is('.fa fa-chevron-down')) {
                        return '.fa fa-chevron-up';
                    } else {
                        return '.fa fa-chevron-down';
                    }
                });
            });

            $(document).on('keyup', '.se', function () {
                $('input.se').searchbox({
                    url: '<?php echo Cake\Routing\Router::url('/career3-d/users/search');?>',
                    param: 'q',
                    dom_id: '.vt',
                    delay: 250,
                    loading_css: '#spinner'
                });
            });
        });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-81003044-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-81003044-2');
    </script>

</body>
</html>
