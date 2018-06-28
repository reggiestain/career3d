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
               <?php //echo $this->element('main/post_campaign');?>
                <div><a href="#" id="edit-camp" var="<?php echo $ProfileId;?>" class="btn btn-success btn-lg" style="float:right">EDIT CAMPAIGN</a></div> 
                <br>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>

                </p>
            </div>
            <div class="col-md-10" style="margin-left: 50px">

                <div class="confirm-msg">
                    <div>
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                 ?>
                    </div><br>
                    <div class="row">
                    <?php 
                    if($Profile->team_name === 'true'){                    
                    echo"<h2> MY TEAM PROFILE </h2><br>";
                    }else {
                    echo"<h2> MY PROFILE</h2><br>";    
                    }
                    ?> 
                    </div>     
    <?php echo $this->Form->create($Profile,['type'=>'file','class'=>'row m-t-30','url'=>['controller'=>'#','action'=>'#']]);?>    
                    <?php if($Profile->team_name === 'true'){?>
                    <div class="form-group">
                        <label for="pwd">Team Representative:</label>
    <?php echo $this->Form->input('team_rep',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                    </div>
                    <?php }else{ ?>
                    <div class="form-group">
                        <label for="email">Name:</label>
    <?php echo $this->Form->input('name',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Surname:</label>
    <?php echo $this->Form->input('surname',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <label for="pwd">Contact Phone Number:</label>
    <?php echo $this->Form->input('contact_number',['label' => false,'type'=>'text','class'=>'form-control']) ;?>
                    </div>   

                    <div class="form-group">
                        <label for="pwd">Contact Email:</label>
    <?php echo $this->Form->input('email',['label' => false,'type'=>'email','class'=>'form-control']) ;?>
                    </div>               

                    <div class="form-group">
                        <label for="pwd">City:</label>
    <?php echo $this->Form->input('city',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                    </div>   
                    <div class="form-group">
                        <label for="pwd">Province:</label>
    <?php 
    echo $this->Form->input('province_id',['label' => false,       
    'options' => $province,
    'type' => 'select',
    'empty' => '--Select Province--',
    'class'=>'form-control'    
   ]
   ); ?>
                    </div>  
                    <?php if($Profile->team_name === 'true'){ 
                        
                    } else { ?>

                    <label>Date of Birth:</label>
                    <div class="form-group input-group">
                        <input class="form-control" type="text" name="date_of_birth" value="<?php echo $Profile->date_of_birth;?>" id='date3'>
                        <span class="input-group-addon">
                            <span class="arrow"></span>
                            <i class="fa fa-th"></i>    
                        </span>
                    </div>
                    <?php } ?>
                    <!--<div class="form-group">
                        <label for="pwd">Let us know about some of your hobbies outside sport.</label>
    <?php //echo $this->Form->input('hobbies_outside_sport',['label' => false,'type'=>'textarea','class'=>'form-control']) ;?>
                    </div>-->   
                    <div class="form-group">
                       <?php if($Profile->team_name === 'true'){?> 
                        <label for="pwd">What type of social media do you currently use? Does your Team have any social media accounts?</label><br>
                       <?php }else{?>
                        <label for="pwd">How active are you on social media?</label><br>
                       <?php }?>
                       <?php 
                         echo $this->Form->radio(
                         'active_on_social_media',
                        [
                          /*['value' => 'I use social media many times a day', 'text' => 'I use social media many times a day', 'style' => 'margin-right:10px;margin-left:10px'],*/
                          ['value' => 'I use social media many times a day', 'text' => 'I use social media many times a day', 'style' => 'margin-right:10px;margin-left:10px'],
                          ['value' => 'I use social media once or twice a day', 'text' => 'I use social media once or twice a day', 'style' => 'margin-right:10px;margin-left:10px'],
                          ['value' => 'I don\'t use social media', 'text' => 'I don\'t use social media', 'style' => 'margin-right:10px;margin-left:10px'],
                        ]
                       );?>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="pwd">What type of social media do you currently use?</label>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="checkbox">
                                <label><input name="facebook" type="checkbox" checlass="face" <?php if($Profile->facebook ==='Yes'){echo 'checked';}?>> Facebook</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="twitter" type="checkbox" class="twit" <?php if($Profile->twitter ==='Yes'){echo 'checked';}?>> Twitter</label>
                            </div>    
                            <div class="checkbox">
                                <label><input name="instagram" type="checkbox" class="insta" <?php if($Profile->instagram ==='Yes'){echo 'checked';}?>> Instagram</label>
                            </div> 
                        </div>
                        <div class="form-group col-sm-4"> 
                            <div class="checkbox">
                                <label><input name="linkedin" type="checkbox" class="linkin" <?php if($Profile->linkedin ==='Yes'){echo 'checked';}?>> LinkedIn</label>
                            </div>  
                            <div class="checkbox">
                                <label><input name="google" type="checkbox" class="google" <?php if($Profile->google ==='Yes'){echo 'checked';}?>> Google+</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="snapchat" type="checkbox" class="snap" <?php if($Profile->snapchat ==='Yes'){echo 'checked';}?>> SnapChat</label>
                            </div> 
                        </div>  
                        <div class="form-group col-sm-4" style="margin-bottom: 20px">                         
                            <div class="checkbox">
                                <label><input name="personal_blog" type="checkbox" class="personal" <?php if($Profile->personal_blog ==='Yes'){echo 'checked';}?>> Personal Blog</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="other" type="checkbox" class="other" <?php if($Profile->other ==='Yes'){echo 'checked';}?>> Other</label>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="pwd">How many followers do you have on Twitter?</label>
                     <?php 
                     $options = ['1 - 25'=>'1 - 25','25 - 50'=>'25 - 50','50 - 100'=>'50 - 100','101 – 500'=>'101 – 500','501 – 999'=>'501 – 999'];
                     echo $this->Form->input('twitter_followers',['label' => false,                   
                     'options' => $options,
                     'type' => 'select',
                     'empty' => '',
                     'class'=>'form-control'    
                     ]);?>    
                        </div>
                        <div class="form-group col-sm-6" style="margin-bottom: 20px">
                            <label for="pwd">How many friends do you have on Facebook?</label>
                    <?php 
                    $options = ['1 - 25'=>'1 - 25','25 - 50'=>'25 - 50','50 - 100'=>'50 - 100','101 – 500'=>'101 – 500','501 – 999'=>'501 – 999'];
                    echo $this->Form->input('facebook_frnds',['label' => false,       
                    'options' => $options,
                    'type' => 'select',
                    'empty' => '',
                    'class'=>'form-control'    
                    ]);?>   
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Social Media handles?</label>   
                        </div>
                        <div class="form-group col-sm-6">
                    <?php echo $this->Form->input('facebook_url',['label' => false,'type'=>'text','class'=>'form-control','placeholder'=>'Facebook']) ;?>                  
                        </div>
                        <div class="form-group col-sm-6">
                            <div class="input-group">   
                                <span class="input-group-addon">@</span>   
                    <?php echo $this->Form->input('twitter_handle',['label' => false,'type'=>'text','class'=>'form-control','placeholder'=>'Twitter']) ;?>                                          
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                    <?php echo $this->Form->input('instagram_url',['label' => false,'type'=>'text','class'=>'form-control','placeholder'=>'Instagram']) ;?>                  
                        </div>
                        <div class="form-group col-sm-6">
                    <?php echo $this->Form->input('linkedin_url',['label' => false,'type'=>'url','class'=>'form-control','placeholder'=>'linkedIn']) ;?>                                          
                        </div>
                        <div class="form-group col-sm-6">
                    <?php echo $this->Form->input('website_url',['label' => false,'type'=>'url','class'=>'form-control','placeholder'=>'Website']) ;?>                  
                        </div>
                        <div class="form-group col-sm-6">
                    <?php echo $this->Form->input('blog_url',['label' => false,'type'=>'url','class'=>'form-control','placeholder'=>'Blog']) ;?>                                          
                        </div>
                    </div>
                    <br>
                    <!-- <div class="form-group">
                          <button type="submit" class="btn btn-primary">Update</button> 
                      </div>-->

              <?php echo $this->Form->end();?>  
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row"> 
    <div class="modal fade" id="modal-1" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-md">               
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title">GUIDELINE TO CREATING A CAMPAIGN</h1>                                                     
                </div>

                <div class="modal-body">
                    <h1>YOUR CAMPAIGN TITLE</h1>   
                    <p>This should be simple, descriptive, and memorable.</p> 
                    <h1>PICTURE</h1>   
                    <p>Your image will be what your Supporters see first, so choose a high-resolution photo that looks professional.</p>
                    <h1>BIOGRAPHY AND TELL YOUR STORY</h1>   
                    <p>Show your potential Supporters what you have done, and why you have what it takes to reach your PROQUEST Campaign target. Be authentic, spoken in your words and make it personal.</p>
                    <p>All athletes have goals, hopes and dreams; give Supporters a reason to care about yours. Mention specific memories - when you, first started in the sport or the moment you knew you wanted to be an athlete. Reveal any hardships you may have endured.</p>
                    <p>Here are a few things you need to include that might help you develop your story:</p>
                    <ul>
                        <li>Who you are</li>    
                        <li>Your personality</li>
                        <li>What sport you are in</li>
                        <li>Your PROQUEST goal and budget</li>
                        <li>What the money means to you</li>
                        <li>A giant thank you</li>                       
                    </ul>
                    <h3>Other information:</h3>
                    <ul>
                        <li>Winning for the very first time</li>    
                        <li>A moment when you had to pick yourself up, after a disappointment</li>
                        <li>Something about your training </li>
                        <li>The first time you tried your sport </li>
                        <li>Meeting a hero and the impact it had on you</li>
                        <li>Reveal what is hard about you being an amateur athlete, juggling work</li>                        
                    </ul>
                </div>

            </div>  


        </div> 
    </div>      
</div>
<div class="row"> 
    <div class="modal fade" id="modal-2" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-md">               
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">EDIT PROFILE INFORMATION</h3>                                                     
                </div>

                <div class="modal-body">               
                <?php echo $this->Form->create($Profile,['url'=>['controller'=>'profiles','action'=>'update_profile']]);?>                        
                    <div class="form-group">
                        <label for="pwd">Contact Phone Number:</label>
                <?php echo $this->Form->input('contact_number',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                    </div>   

                    <div class="form-group">
                        <label for="pwd">Contact Email</label>
                <?php echo $this->Form->input('email',['label' => false,'type'=>'email','class'=>'form-control','required']) ;?>
                    </div>  
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label">City:</label>
                        <?php echo $this->Form->input('city',['label' => false,'type'=>'text','id'=>'u-city','class'=>'form-control','required']) ;?>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label">Province</label>
                        <?php 
                         echo $this->Form->input('province_id',['label' => false,       
                        'options' => $province,
                        'type' => 'select',
                        'empty' => '--Select Province--',
                        'id'=>'u-province',     
                        'class'=>'form-control',
                        'required'
                         ]
                       ); ?>
                    </div>
                    <p>
                        IF YOU NEED TO EDIT ADDITIONAL FIELDS PLEASE EMAIL THESE TO <a href="mailto:ADMIN@PROQUEST.CO.ZA">ADMIN@PROQUEST.CO.ZA</a>    
                    </p>    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <button class="btn default" data-dismiss="modal">Cancel</button>
                </div>
                <?php echo $this->Form->end();?>
            </div>  


        </div> 
    </div>      
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
        $('#date').datepicker();
        $('#date2').datepicker();
        $('#date3').datepicker();
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
        $('.insta').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('Yes');
            } else {
                $(this).val('');
            }
        });
        $('.snap').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('Yes');
            } else {
                $(this).val('');
            }
        });
        $('.personal').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('Yes');
            } else {
                $(this).val('');
            }
        });

        $('.other').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('Yes');
            } else {
                $(this).val('');
            }
        });
        $('#parent').click(function () {
            if ($(this).is(':checked')) {
                $(".parent-info").show();
            } else {
                $(".parent-info").hide();
            }
        });

        $(document).on('click', '#guide', function () {
            $('#modal-1').modal();
        });

        $(document).on('click', '#edit-camp', function () {
            var id = $(this).attr('var');
            $('#modal-2').modal();
        });

    });




</script>