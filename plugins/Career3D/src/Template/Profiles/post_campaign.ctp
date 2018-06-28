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
use Cake\View\Helper\FormHelper;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Helper\NumberHelper;

?>
<style>
    .help-block{
        display: none;
        font-weight: bold;
        font-size: 15px;
        color: #a94442;
    } 

</style>


<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <?php //echo $this->Html->image('latest_logo.png');?>

                <h1 class="page-header"></h1>
                <!--<div><a href="#" class="btn btn-primary btn-lg" style="float:right">Post Campaign</a></div>-->
                <br>
                <ul class="nav nav-tabs">
                    <li id="overv" class="active"><a href="#">DEFINE</a></li>                    
                    <!--<li id="bonus"><a href="#">BONUSES</a></li>
                    <li id="comm"><a href="#">MVP</a></li>
                    <li id="update"><a href="#">PAYMENT</a></li>
                    <li id="update"><a href="#">REVIEW</a></li>
                    <li id="update"><a href="#">SCHEDULE / PUBLISH</a></li>-->
                </ul>

            </div>
            <div class="col-lg-12">
                <!--<form role="form">-->
                <br>
                <div>
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                ?>
                </div>
                <br> 
                <?php echo $this->Form->create($Campaign,['type'=>'file']);?>                
                <div class="form-group">
                    <label>City:</label>
                    <p>Where is this campaign from?</p>
                    <!--<input class="form-control">-->
                   <?php echo $this->Form->input('city',['label' => false,'class'=>'form-control','required']) ;?>                       
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>

                <div class="form-group">
                    <label for="pwd">Province:</label>
                <?php echo $this->Form->input('province_id',['label' => false,       
                'options' => $province,
                'type' => 'select',
                'empty' => '--Select Province--',
                'class'=>'form-control'    
                    ]); ?>
                </div>

                <div class="form-group">
                    <label>Campaign Title:</label>
                    <p>Name your campaign - Capture your audience!</p>
                    <!--<input class="form-control">-->
                                <?php echo $this->Form->input('profile_id',['value' => $Profile->id,'type'=>'hidden']) ;?>                                           
                                <?php echo $this->Form->input('campaign_title',['label' => false,'class'=>'form-control','required']) ;?>                       
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>

                <div class="form-group">
                    <label for="pwd">Describe your story and what makes it unique *</label>
                <?php echo $this->Form->input('campaign_description',['label' => false,'type'=>'textarea','class'=>'form-control']) ;?>
                </div>

                <div class="form-group">
                    <label for="pwd">What are you raising money for? *</label>
                <?php echo $this->Form->input('money_raised_for',['label' => false,'type'=>'textarea','class'=>'form-control']) ;?>
                </div> 
                
                <div class="form-group">
                    <label>How much money are you trying to raise? *</label>
                     <div class="input-group">
                       <span class="input-group-addon">R</span>
                    <?php echo $this->Form->input('campaign_goal',['label' => false,'type'=>'number','type'=>'number','id'=>'money','class'=>'form-control','placeholder'=>'Amount']) ;?>                    
                       <span class="input-group-addon">.00</span>
                     </div>
                     </div>    

                <!--<div class="form-group">
                    <label for="pwd">What will you offer your supporters as give backs? Please identify a prize, title and description of each give back</label> <br>              
                    <div class="col-lg-4"><?php //echo $this->Form->input('gift_title',['label' => false,'type'=>'text','placeholder'=>'Team Jersey ','class'=>'form-control','required']) ;?></div>
                    <div class="col-lg-4"><?php //echo $this->Form->input('give_back',['label' => false,'type'=>'text','placeholder'=>'From Winning Team','class'=>'form-control','required']) ;?></div>
                    <div class="col-lg-4"><?php //echo $this->Form->input('gift_amount',['label' => false,'type'=>'number','placeholder'=>'Price (Example R1,000)','class'=>'form-control','required']) ;?></div>
                </div>  
                <br><br>-->
                <div class="form-group">
                    <label for="pwd">How have you supported your sport in the past? *</label>
                <?php echo $this->Form->input('past_sport_support',['label' => false,'type'=>'textarea','class'=>'form-control']) ;?>
                </div> 

                <div class="form-group">
                    <label>Main Photo:</label>
                    <p>This photo is the first that will catch eye of donors. A great, well-lit, professional photo significantly increases the amount of people clicking into the campaign. </p>
                    <p>Upload Photo (725 x 495)</p>
                    <p>This shows up in listings - make it identifiable and appealing.</p>
                <?php echo $this->Form->input('main_photo',['label' => false,'type'=>'file','required']) ;?>                                           
                </div>                

                <div class="form-group">
                    <label>Upload Video:</label>
                    <p>Videos increase the chance of funding exponentially.</p>
                    <p>A link to your Proquest YouTube or Vimeo video (If created). Please keep your videos two minutes or less</p>
                    <?php echo $this->Form->input('video_url',['label' => false,'class'=>'form-control','placeholder'=>'Video URL']) ;?>                                          
                </div>

                <label>Start Date:</label>
                <div class="form-group input-group">
                    <input class="form-control" type="text" name="start_date" id='datetimepicker4'>
                    <span class="input-group-addon">
                        <span class="arrow"></span>
                        <i class="fa fa-calendar"></i>    
                    </span>
                </div>  
                <label>End Date:</label>
                <div class="form-group input-group">
                    <input class="form-control" type="text" name="end_date" id='datetimepicker5'>
                    <span class="input-group-addon">
                        <span class="arrow"></span>
                        <i class="fa fa-calendar"></i>    
                    </span>
                </div>  
                <button type="submit" class="btn btn-success btn-lg">Submit</button>        
                <?php echo $this->Form->end();?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>

                </p>
            </div>
            <div class="col-lg-12">



                <div class="table-responsive" id="overview">
                    <table class="table table-bordered table-hover table-striped">
                        <!--<h2>OVERVIEW</h2><br>-->  
                    </table>
                </div>

                <div class="table-responsive" id="contribute" style="display:none">
                    <h2>CONTRIBUTE</h2><br>
                    <table  class="table table-bordered table-hover table-striped">
                     <?php //echo var_dump(rand(1000,5000));?>   

                    </table>
                </div>

                <div class="table-responsive" id="bonuses" style="display:none">
                    <h2>BONUS</h2><br>
                    <table  class="table table-bordered table-hover table-striped">


                    </table>
                </div>

                <div class="table-responsive" id="comment" style="display:none">
                    <h2>COMMENT</h2><br>
                    <table  class="table table-bordered table-hover table-striped">


                    </table>
                </div>

                <div class="table-responsive" id="update" style="display:none">
                    <h2>UPDATE</h2><br>
                    <table  class="table table-bordered table-hover table-striped">


                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.row -->
        <div class="row"> 
            <div class="modal fade" id="modal-1" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog modal-md">               
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title"></h3>                                                     
                        </div>
                    <?php echo $this->Form->create($HotelData, ['url' => ['controller' => 'users', 'action' => 'email_hotel']]);?>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Enter Email Address:</label>
                                <!--<input class="form-control">-->
                     <?php echo $this->Form->input('id',['label' => false,'type'=>'hidden','id'=>'value']) ;?>
                    <?php echo $this->Form->input('email',['label' => false,'type'=>'email','class'=>'form-control']) ;?>                       
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                        </div>    
                        <div class="modal-footer">
                            <button class="btn default" data-dismiss="modal">Cancel</button>    
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>  
                    <?php echo $this->Form->end();?>
                    </div>                            
                </div> 
            </div>      
        </div>
    </div>    
    <!-- /.container-fluid -->

</div>
<script>
    $(document).ready(function () {

        $('#contri').click(function () {
            $("#overview,#bonuses,#update,#comment").hide();
            $('#overv').removeClass('active');
            $(this).addClass('active');
            $('#contribute').show();
        });

        $('#datetimepicker4').datepicker();
        $('#datetimepicker5').datepicker();


    });




</script>