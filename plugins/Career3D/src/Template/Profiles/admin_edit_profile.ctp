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
use Cake\Cache\Cache;
use Cake\I18n\Time;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

?>

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
                    'options' => $province,
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
                    <p>his must be between R1,000.00 and R100,000.00</p>
                    <?php echo $this->Form->input('campaign_goal',['label' => false,'class'=>'form-control','id'=>'currency','required']) ;?>                       
                    
                </div>

                <label>Campaign Description:</label>
                <div class="form-group">
                    <p>Describe your Campaign in an appealing, succinct, and memorable way as possible. 
                        Campaigners frequently underestimate or misuse the impact of a good campaign description. Use the space to speak to the donor about the importance of your campaign.</p>
                    <?php echo $this->Form->textarea('campaign_description',['label' => false,'id'=>'editor3','class'=>'form-control','required']) ;?>                                           
                </div>
                
                <label>What are you raising money for?</label>
                <div class="form-group">
                <?php echo $this->Form->textarea('money_raised_for',['label' => false,'id'=>'editor1','class'=>'form-control','required']) ;?>                                           
                </div>

               <!-- <div class="form-group">
                    <label for="pwd">What will you offer your supporters as give backs? Please identify a prize, title and description of each give back.</label>   <br>           
                    <div class="col-md-4"><?php //echo $this->Form->input('gift_title',['label' => 'Title','type'=>'text','value'=>$Campaign->give_backs[0]->gift_title,'class'=>'form-control','required']) ;?></div>
                    <div class="col-md-4"><?php //echo $this->Form->input('give_back',['label' => 'Description','type'=>'text','value'=>$Campaign->give_backs[0]->give_back,'class'=>'form-control','required']) ;?></div>
                    <div class="col-md-4"><?php //echo $this->Form->input('gift_amount',['label' => 'Prize','type'=>'number','value'=>$Campaign->give_backs[0]->gift_amount,'class'=>'form-control','required']) ;?></div>
                </div>  -->
                <br>

                <div class="form-group">
                    <label>How have you supported your sport in the past?:</label>
                        <?php echo $this->Form->textarea('past_sport_support',['label' => false,'id'=>'editor2','class'=>'form-control','required']) ;?>                       
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>

                <div class="form-group">
                    <label>Let us know about some of your hobbies outside sport:</label>
                        <?php echo $this->Form->textarea('hobbies_outside_sport',['label' => false,'id'=>'editor4','value'=>$Campaign->profile->hobbies_outside_sport,'class'=>'form-control','required']) ;?>                       
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>

                <div class="form-group">
                    <label>Upload Video:</label>
                    <p>Videos increase the chance of funding exponentially.</p>
                    <p>Enter YouTube / Vimeo Video URL</p>
                    <?php echo $this->Form->input('video_url',['label' => false,'class'=>'form-control']) ;?>                                          
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
                    $("#password2").keyup(function (event) {
                        // get password value from first password field
                        var pwd = $('#password1').val();
                        // get the 2nd password value from the verify password field
                        var vPwd = $('#password2').val();
                        // verify the values if they are matched
                        // if matched then show match alert | hide unmatch alert
                        if (pwd == vPwd) {
                            $("#verify-pass-error").hide();
                            $("#verify-pass-success").show();
                        } // else, show unmatch alert | hide match alert
                        else {
                            $("#verify-pass-success").hide();
                            $("#verify-pass-error").show();
                        }
                        event.preventDefault();
                    });
                    $('#datetimepicker4').datepicker({format: 'yyyy/mm/dd'});
                    $('#datetimepicker5').datepicker();
                    $('#datetimepicker6').datepicker()
                    $('#checkin').timepicker();
                    $('#checkout').timepicker();

                    $('.face').click(function () {
                        if ($(this).is(':checked')) {
                            $(this).val('Yes');
                        } else {
                            $(this).val('');
                        }
                    });
                    $('.twit').click(function () {
                        if ($(this).is(':checked')) {
                            $(this).val('Yes');
                        } else {
                            $(this).val('');
                        }
                    });
                    $('.google').click(function () {
                        if ($(this).is(':checked')) {
                            $(this).val('Yes');
                        } else {
                            $(this).val('');
                        }
                    });
                    $('.linkin').click(function () {
                        if ($(this).is(':checked')) {
                            $(this).val('Yes');
                        } else {
                            $(this).val('');
                        }
                    });
                    $("#currency").on("keyup", function () {
                        var value = $(this).val();
                        var num = parseFloat(value);
                        var result = num.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "R1,");
                                $(this).text(result);
                    });
                    
                   CKEDITOR.replace('editor1');  
                   CKEDITOR.replace('editor2');
                   CKEDITOR.replace('editor3');  
                   CKEDITOR.replace('editor4');
                });
            </script>