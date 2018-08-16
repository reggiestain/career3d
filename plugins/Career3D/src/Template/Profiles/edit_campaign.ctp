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

                <h1 class="page-header">

                </h1>
                <ol class="breadcrumb">
                    <!-- <li>
                         <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                     </li>-->

                    <li class="active">
                       <!-- <i class="fa fa-tag"></i> <b> Thank you for choosing Zilko Travel Tours. We are pleased to confirm your reservation as follows</b>
                        --></li>
                </ol>

            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>
                <h2> Edit Campaign</h2> <br>

                </p>
            </div>
            <div class="col-lg-12">              
                <div>
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                ?>
                </div>
                <br> 
                <?php echo $this->Form->create($Campaign,['type'=>'file']);?> 
                <?php if(!empty($Campaign->profile->team_name)){?>
                <div class="form-group">
                    <label>Team Name:</label>
                    <!--<input class="form-control">-->
                                <?php echo $this->Form->input('team_name',['label' => false,'value' => $Campaign->profile->name,'type'=>'text','class'=>'form-control']) ;?>                                                                          
                </div>
                <?php }else {?> 
                 <div class="form-group">
                    <label>Name:</label>
                    <!--<input class="form-control">-->
                                <?php echo $this->Form->input('name',['label' => false,'value' => $Campaign->profile->name,'type'=>'text','class'=>'form-control']) ;?>                                                                          
                </div>
                <?php } ?>
                
                <?php if(!empty($Campaign->profile->team_rep)){?>
                <div class="form-group">
                    <label>Surname:</label>
                   <?php echo $this->Form->input('team_rep',['label' => false,'value' => $Campaign->profile->team_rep,'type'=>'text','class'=>'form-control']) ;?>                       

                </div>
                <div class="form-group">
                    <label>Surname:</label>
                   <?php echo $this->Form->input('team_reg_no',['label' => false,'value' => $Campaign->profile->team_reg_no,'type'=>'text','class'=>'form-control']) ;?>                       

                </div>
                <?php } else {?> 
                 <div class="form-group">
                    <label>Surname:</label>
                   <?php echo $this->Form->input('surname',['label' => false,'value' => $Campaign->profile->surname,'type'=>'text','class'=>'form-control']) ;?>                       

                </div>
                <?php } ?>
                <div class="form-group">
                    <label>Contact Number:</label>
                   <?php echo $this->Form->input('contact_number',['label' => false,'value' => $Campaign->profile->contact_number,'type'=>'text','class'=>'form-control']) ;?>                       

                </div>
                
                <div class="form-group">
                    <label>Email Address:</label>
                   <?php echo $this->Form->input('email',['label' => false,'value' => $Campaign->profile->email,'type'=>'text','class'=>'form-control']) ;?>                       

                </div>

                <div class="form-group">
                    <label>City:</label>
                    <p>Where is this campaign from?</p>
                   <?php echo $this->Form->input('city',['label' => false,'type'=>'text','class'=>'form-control']) ;?>                       

                </div>

                <div class="form-group">
                  <label for="pwd">Province:</label>
                <?php echo $this->Form->input('province_id',['label' => false,       
                    'options' => $Province,
                    'type' => 'select',
                    'empty' => '--Select Province--',
                    'class'=>'form-control'    
                       ]
                 ); ?>
                </div>
                
                <label>Date of Birth:</label>
                <div class="form-group input-group">                    
                    <?php echo $this->Form->input('date_of_birth',['label' => false,'type'=>'text','value'=>$Campaign->profile->date_of_birth,'class'=>'form-control','id'=>'datetimepicker4']) ;?>
                    <span class="input-group-addon">
                        <span class="arrow"></span>
                        <i class="fa fa-th"></i>    
                    </span>
                </div>
                
                <div class="form-group">
                        <label>Sport:</label>
                <?php 
                echo $this->Form->input('sport_id', array(
                                                'options' => $Sport,
                                                'type' => 'select',
                                                'empty' => '--Choose One--',
                                                'label' => false,  
                                                //'id'=>'role',
                                                'class'=>'form-control'
                                                   ));
                ?>
                    </div>      

                    <div class="form-group">
                        <label>Campaign Title:</label>
                        <p>Name your campaign - Capture your audience!</p>
                        <!--<input class="form-control">-->
                                <?php echo $this->Form->input('profile_id',['value' => $Campaign->profile->id,'type'=>'hidden']) ;?>                                           
                                <?php echo $this->Form->input('campaign_title',['label' => false,'class'=>'form-control']) ;?>                       
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                    </div>
                <br>
                <div col-lg-12>
                <div class="form-group col-lg-6">
                        <label>Main Photo:</label>
                        <p>This photo is the first that will catch eye of donors. A great, well-lit, professional photo significantly increases the amount of people clicking into the campaign. </p>
                        <p>Upload Photo (725 x 495)</p>
                        <p>This shows up in listings - make it identifiable and appealing.</p>
                <?php echo $this->Form->input('main_photo',['label' => false,'type'=>'file']) ;?>                                           
                </div>
                <?php if(!empty($Campaign->campaign_photos[0]->id)){;?>    
                <div class="form-group col-lg-4">
                    <div class="thumbnail">
                     <div class="featured_image">
                     <?php echo $this->Html->image('campaign_photos/'.$Campaign->campaign_photos[0]->id.'-'.$Campaign->campaign_photos[0]->image,[]);?>
                            
                    </div>        
                </div>
                </div>
                <?php };?>    
                </div>               
                <div class="clearfix"></div><br>
                    <div class="form-group">
                        <label>Campaign Goal:</label>
                        <p>Set a challenging yet attainable goal. If your campaign is a project, make sure that you are asking for enough money to let you carry out the project.</p>
                        <p>his must be between R1,000.00 and R100,000.00.</p>
                    <?php echo $this->Form->input('campaign_goal',['label' => false,'class'=>'form-control','required']) ;?>                       
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                    </div>
                
                    <label>Campaign Description:</label>
                    <div class="form-group input-group">
                        <p>Describe your Campaign in an appealing, succinct, and memorable way as possible. 
                            Campaigners frequently underestimate or misuse the impact of a good campaign description. Use the space to speak to the donor about the importance of your campaign.</p>
                    <?php echo $this->Form->input('campaign_description',['label' => false,'type'=>'textarea','class'=>'form-control','required']) ;?>                                           
                    </div>
                    
                   <!-- <label>Give Backs:</label>
                    <div class="form-group input-group">
                        <p>What will you offer your supporters as give backs? Please identify a prize, title and description of each give back.</p>
                    <?php //echo $this->Form->input('give_backs',['label' => false,'type'=>'textarea','class'=>'form-control','required']) ;?>                                           
                    </div>-->
                    
                    <div class="form-group">
                        <label>How have you supported your sport in the past?:</label>
                        <?php echo $this->Form->input('past_sport_support',['label' => false,'type'=>'textarea','class'=>'form-control','required']) ;?>                       
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                    </div>
                    
                    <div class="form-group">
                        <label>Let us know about some of your hobbies outside sport (art, reading, wood working, volunteering....)*:</label>
                        <?php echo $this->Form->input('hobbies_outside_sport',['label' => false,'type'=>'textarea','value'=>$Campaign->profile->hobbies_outside_sport,'class'=>'form-control','required']) ;?>                       
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                    </div>
                    
                    <div class="form-group">
                        <label>Upload Video:</label>
                        <p>Videos increase the chance of funding exponentially.</p>
                        <p>A link to your Proquest YouTube or Vimeo video (If created). Please keep your videos two minutes or less.</p>
                    <?php echo $this->Form->input('video_url',['label' => false,'type'=>'url','class'=>'form-control']) ;?>                                          
                    </div>
                                                
                   <label>Start Date:</label>
                    <div class="form-group input-group">
                        <input class="form-control" type="text" value='<?php echo $Campaign->start_date;?>' name="start_date" id='datetimepicker6'>
                        <span class="input-group-addon">
                            <span class="arrow"></span>
                            <i class="fa fa-calendar"></i>    
                        </span>
                    </div>
                   
                    <label>End Date:</label>
                    <div class="form-group input-group">
                        <input class="form-control" type="text" value='<?php echo $Campaign->end_date;?>' name="end_date" id='datetimepicker5'>
                        <span class="input-group-addon">
                            <span class="arrow"></span>
                            <i class="fa fa-calendar"></i>    
                        </span>
                    </div>  
                    <button type="submit" class="btn btn-success btn-lg">Submit</button>        
                <?php echo $this->Form->end();?>
                </div>
<script>
    $(document).ready(function () {

        $('#contri').click(function () {
            $("#overview,#bonuses,#update,#comment").hide();
            $('#overv').removeClass('active');
            $(this).addClass('active');
            $('#contribute').show();            
        });
        
        $('#datetimepicker4').datepicker({format: 'yyyy/mm/dd'});         
        $('#datetimepicker5').datepicker();   
        $('#datetimepicker6').datepicker();
    });




</script>