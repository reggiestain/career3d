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
<style>
#u-name, #u-surname,#t-u-name,#t-u-surname,#t-u-rep{
    text-transform: capitalize;
}
</style>
<div class="pages_banner register">
      <div class="main_banner">
        <div class="inner_banner">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <h1 class="title title_1">Fund Your Hopes,<br>Dreams & Passions</h1>
                  <!-- <h1 class="title title_2" style="">GET STARTED</h1> --> 
                  
                </div>
              </div>
            </div>  
        </div>
      </div>
</div>
<!--<div class="pages_banner text-center">
    <a href="#" class="btn btn-danger">START A CAMPAIGN</a>
</div>-->
<div class="container">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#individual" aria-controls="individual" role="tab" data-toggle="tab">INDIVIDUAL </a></li>
        <li role="presentation"><a href="#team" aria-controls="team" role="tab" data-toggle="tab">TEAM </a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="individual">
            <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <!-- <div style="margin-bottom: 50px;max-width: 80%;width:100%;">
                                <p><h1>REGISTER WITH US</h1></p> 
                                <p>ProQuest is dedicated to making your dreams a reality. If you have a dream and are ready to share your story, please complete the form below.</p>
                                <p>
                                    You will need to meet our eligibility requirements, in order to launch a ProQuest Campaign so, please read the <a href="javascript:void()" class="guidelines">Campaign Guidelines</a> before registering yourself. 
                                </p>
                            </div> -->

                            <ul class="steps list-inline m-b-30" style="margin-top: 50px">
                                <li>
                                    <div id="n-step1" class="number active">1</div>
                                    <div class="desc">Personal Details</div>
                                </li>
                                <li>
                                    <div id="n-step2" class="number">2</div>
                                    <div class="desc">Social Media Accounts</div>
                                </li>
                                <li>
                                    <div id="n-step3" class="number">3</div>
                                    <div class="desc">Campaign Information</div>
                                </li>
                                <li>
                                    <div id="n-step4" class="number">4</div>
                                    <div class="desc">Share<br>Campaign</div>
                                </li>
                            </ul>
                            <div>
                <?php  
                 echo $this->Flash->render();
                 echo $this->Flash->render('auth');
                 ?>    
                            </div>     
                <?php echo $this->Form->create($profile,['type'=>'file','url'=>['controller'=>'profiles','action'=>'register']]);?>
                            <div class="row m-t-30" id="step1">
                                <div style="margin-bottom: 50px;max-width: 80%;width:100%;">
                                    <p><h1>REGISTER WITH US</h1></p> 
                                    <p>ProQuest is dedicated to making your dreams a reality. If you have a dream and are ready to share your story, please complete the form below.</p>
                                    <p>
                                        You will need to meet our eligibility requirements, in order to launch a ProQuest Campaign so, please read the <a href="#" class="guidelines">Campaign Guidelines</a> before registering yourself. 
                                    </p>
                                </div>                                                              
                                                               
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">                                
                                    <label for="email">Name*</label>
                                 <?php echo $this->Form->input('name',['label' => false,'type'=>'text','class'=>'form-control','id'=>'u-name','required']) ;?>
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="pwd">Surname*</label>
                                 <?php echo $this->Form->input('surname',['label' => false,'type'=>'text','class'=>'form-control','id'=>'u-surname','required']) ;?>
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 10px">
                                    <label for="inputEmail3" class="control-label">Date Of Birth*</label>
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name="date_of_birth" id="date3" placeholder="1977/04/19" required>
                                        <span class="input-group-addon">
                                            <span class="arrow"></span>
                                            <i class="fa fa-calendar"></i>    
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 10px">
                                    <label for="pwd">RSA ID NO</label>
                                 <?php echo $this->Form->input('ID_number',['label' => false,'type'=>'text','class'=>'form-control','id'=>'id-num','required']) ;?>
                                </div>
                                
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <!--<label for="pwd">Association Registration No</label>-->
                                 <?php //echo $this->Form->input('reg_no',['label' => false,'type'=>'text','class'=>'form-control']) ;?> 
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="pwd">Association Registration No</label>
                                 <?php echo $this->Form->input('reg_no',['label' => false,'type'=>'text','class'=>'form-control']) ;?> 
                                </div>                                                               
                                
                                <div id="parent-info" class="col-sm-12" style="display:none; margin-bottom: 20px"> 
                                    <h5 style="color:#e80f3f">ProQuest requires parental consent, as you are under 18 years of age, please complete the information below so that we can get this.</h5>
                                    <div class="form-group col-sm-6">
                          <?php echo $this->Form->input('parent_name',['label' => 'Name of parent / legal guardian *','type'=>'text','id'=>'','class'=>'form-control']) ;?>
                                    </div>
                                    <div class="form-group col-sm-6">
                          <?php echo $this->Form->input('parent_contact',['label' => 'Contact number *','type'=>'text','placeholder'=>'+27','class'=>'form-control']) ;?>
                                    </div>
                                    <div class="form-group col-sm-6">
                          <?php echo $this->Form->input('parent_email',['label' => 'Email address *','type'=>'email','id'=>'','class'=>'form-control']) ;?>
                                    </div>
                                    <div class="form-group col-sm-6">
                          <?php //echo $this->Form->input('parent_ID',['label' => 'Parent ID number *','type'=>'number','id'=>'','class'=>'form-control']) ;?>
                                    </div>     
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="inputEmail3" class="control-label">Email Address *</label>
                        <?php echo $this->Form->input('email',['label' => false,'type'=>'email','id'=>'u-email','class'=>'form-control']) ;?>
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="inputEmail3" class="control-label">Mobile Number *</label>
                        <?php echo $this->Form->input('contact_number',['label' => false,'type'=>'text','placeholder'=>'+27','class'=>'form-control']) ;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6">
                                    <label for="inputEmail3" class="control-label">City *</label>
                        <?php echo $this->Form->input('city',['label' => false,'type'=>'text','id'=>'u-city','class'=>'form-control','required']) ;?>
                                </div>
                       <div class="form-group col-sm-6">
                       <label for="inputEmail3" class="control-label">Province *</label>
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
                                
                       <div class="form-group col-sm-6" style="margin-top: 20px">
                                    <label for="inputEmail3" class="control-label">Country *</label>
                        <?php 
                         echo $this->Form->input('country_id',['label' => false,       
                        'options' => $Country,
                        'type' => 'select',
                        'default' => 'South Africa',
                        'id'=>'u-province',     
                        'class'=>'form-control',
                        'required'
                         ]
                       ); ?>
                       </div>
                       
                        <div class="form-group col-sm-6" style="margin-top: 20px"> 
                                <label for="pwd">Sport *</label>    
                                <?php 
                                echo $this->Form->input('sport_id',['label' => false,       
                                'options' => $Sport,
                                'type' => 'select',
                                'default' => 'Cycling',
                                'id'=>'t-u-sport',     
                                'class'=>'form-control',
                                'required'
                                 ]); ?>                                       
                        </div>           
                                                      
                        <div class="col-xs-12 m-t-30">
                                    <button id='step-1' type="button" class="btn btn-primary step-btn" data-step="2">Save &amp; Continue</button>
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>
                        </div>

                            <div class="row m-t-30 hidden" id="step2">
                                <div class="form-group col-sm-12" style="margin-bottom: 20px">
                                    <label for="pwd">How active are you on social media?</label><br>
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
                                <div class="form-group col-sm-12">
                                    <label for="pwd">What type of social media do you currently use?</label>
                                </div>
                                <div class="form-group col-sm-4">
                                    <div class="checkbox">
                                        <label><input name="facebook" type="checkbox" class="face"> Facebook</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input name="twitter" type="checkbox" class="twit"> Twitter</label>
                                    </div>    
                                    <div class="checkbox">
                                        <label><input name="instagram" type="checkbox" class="insta"> Instagram</label>
                                    </div> 
                                </div>
                                <div class="form-group col-sm-4"> 
                                    <div class="checkbox">
                                        <label><input name="linkedin" type="checkbox" class="linkin"> LinkedIn</label>
                                    </div>  
                                    <div class="checkbox">
                                        <label><input name="google" type="checkbox" class="google"> Google+</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input name="snapchat" type="checkbox" class="snap"> SnapChat</label>
                                    </div> 
                                </div>    
                                <div class="form-group col-sm-4" style="margin-bottom: 20px">                         
                                    <div class="checkbox">
                                        <label><input name="personal_blog" type="checkbox" class="personal"> Personal Blog</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input name="other" type="checkbox" class="other"> Other</label>
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
                                <div class="clearfix"></div>

                                <div class="col-xs-12 m-t-30">
                                    <button type="button" class="btn btn-primary step_back pull-right" data-step="1">Back</button>
                                    <button type="button" class="btn btn-primary step-btn" data-step="3">Save &amp; Continue</button>
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>
                            </div>

                            <div class="row m-t-30 hidden" id="step3">                                                               
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6" style="margin-top: 20px">
                                    <label for="pwd">Campaign Title *</label>
                                    <p>Name your campaign - Capture your audience!</p>
                    <?php echo $this->Form->input('campaign_title',['label' => false,'type'=>'text','id'=>'c-title','class'=>'form-control']) ;?>    
                                </div>
                                <div class="form-group col-sm-6">

                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6">
                                    <label for="pwd">Describe your story and what makes it unique *</label>
                                    <?php echo $this->Form->input('campaign_description',['label' => false,'type'=>'textarea','id'=>'c-story','class'=>'form-control']) ;?>   
                                    <br>
                                    <label for="pwd">How much money are you trying to raise? *</label>    
                                    <div class="input-group"style="max-width:150px;width:100%;">
                                      <span class="input-group-addon">R</span>
                                        <?php echo $this->Form->input('campaign_goal',['label' => false,'type'=>'number','type'=>'number','id'=>'money','class'=>'form-control','placeholder'=>'0']) ;?>                    
                                      <span class="input-group-addon">.00</span>
                                    </div>           
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="pwd">What are you raising money for? *</label>
                                    <?php echo $this->Form->input('money_raised_for',['label' => false,'type'=>'textarea','id'=>'c-raisedfor','class'=>'form-control']) ;?>  
                                    <br>
                                    <p class="text-danger">
                                        Please note: ProQuest retains 15% of the amount donated for administration and marketing fees so, please add this to the amount you have entered here.
                                    </p>                 
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label>What is the start date for your campaign *</label>    
                                    <div class="input-group">
                    <?php echo $this->Form->input('start_date',['label' => false,'class'=>'form-control','id'=>'date2']) ;?>  
                                        <span class="input-group-addon">
                                            <span class="arrow"></span>
                                            <i class="fa fa-calendar"></i>    
                                        </span>
                                    </div>  
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label>What is the end date for your campaign *</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="end_date" id='date'>
                                        <span class="input-group-addon">
                                            <span class="arrow"></span>
                                            <i class="fa fa-calendar"></i>    
                                        </span>
                                    </div>  
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6">
                                    <label>How have you supported your sport in the past? *</label>
                                    <br>  
                    <?php echo $this->Form->input('past_sport_support',['label' => false,'type'=>'textarea','id'=>'c-past','class'=>'form-control']) ;?>                    
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Let us know about some of your hobbies outside sport:</label>

                    <?php echo $this->Form->input('hobbies_outside_sport',['label' => false,'type'=>'textarea','class'=>'form-control']) ;?>                   
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6" style="margin-top:20px">
                                    <label>Main Photo: *</label>
                                    <p>This photo is the first that will catch eye of donors. A great, well-lit, professional photo significantly increases the amount of people clicking into the campaign. </p>
                                    <p>Upload Photo (725 x 495)</p>
                                    <p>This shows up in listings - make it identifiable and appealing.</p>
                    <?php echo $this->Form->input('main_photo',['label' => false,'type'=>'file','id'=>'c-pic','requred']) ;?>      
                                </div>
                                <div class="form-group col-sm-6" style="margin-top:20px">
                                    <label for="pwd">Video Link:</label>
                                    <p>A link to your ProQuest, YouTube or Vimeo video. Please keep your videos to two minutes or less.</p>
                    <?php echo $this->Form->input('video_url',['label' => false,'type'=>'url','class'=>'form-control','placeholder'=>'Paste movie link here']) ;?>                  
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-xs-12 m-t-30">
                                    <button type="button" class="btn btn-primary step_back pull-right" data-step="2">Back</button>
                                    <button type="button" id="step-3" class="btn btn-primary step-btn" data-step="4">Save &amp; Continue</button>
                                    <!--<input type="submit" value="save">-->
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>
                            </div>
                            <div class="row m-t-30 hidden" id="step4">
                                <div class="form-group col-sm-12">
                                    <div class="checkbox">
                                    <!-- <label><input name="accept_terms" type="checkbox" class="google" required> <a style="color:blue;text-decoration: underline" href="<?php echo \Cake\Routing\Router::Url('/users/terms_of_use');?>">Terms of Use</a> and <a style="color:blue;text-decoration: underline" href="<?php echo \Cake\Routing\Router::Url('/users/policy');?>"> Privacy Policy.</a> By submitting your registration, you agree to ProQuest’s Terms of Use and Privacy Policy. Once submitted, your Campaign will be sent to the ProQuest Administrator for approval.</label>  -->    
                                    </div> 
                                    <p>By submitting your registration, you agree to ProQuest’s <a style="color:blue;text-decoration: underline" href="<?php echo \Cake\Routing\Router::Url('/users/terms_of_use');?>">Terms of Use</a> and <a style="color:blue;text-decoration: underline" href="<?php echo \Cake\Routing\Router::Url('/users/policy');?>"> Privacy Policy.</a> Once submitted, your Campaign will be sent to the ProQuest Administrator for approval.</p>
                                </div>

                                <!-- <div class="form-group col-sm-12">
                                    <p>You have completed your campaign information. Once submitted your Campaign will be sent to the ProQuest Administrator for approval.</p>    
                                    <p>Please click submit for approval button below to initiate the process.</p>
                                </div>  -->

                                <div class="clearfix"></div>
                                <div class="col-xs-12 m-t-30">
                                    <button type="button" class="btn btn-primary step_back pull-right" data-step="3">Back</button>
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    <!--<input type="submit" value="save">-->
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>   
                            </div>
                <?php echo $this->Form->end();?>   

                        </div>
                        <div class="col-md-3 sidebar">
                            <!--<div class="thumbnail profile">
                                <img src="./img/default-img.jpg" alt="" class="full-max-width">
                                <h4>John Doe</h4>
                                <hr>
                                <h4>0</h4>
                                <p>Campaigns</p>-->
                            <?php echo $this->element('sidebar_reg');?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div role="tabpanel" class="tab-pane" id="team">
         <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <!-- <div style="margin-bottom: 50px;max-width: 80%;width:100%;">
                                <p><h1>REGISTER WITH US</h1></p> 
                                <p>ProQuest is dedicated to making your dreams a reality. If you have a team with a dream, please complete the form below.</p>
                                <p>
                                    Please read the Campaign Guidelines  
                                    on the right before registering yourself. 
                                </p>
                            </div> -->

                            <ul class="steps list-inline m-b-30" style="margin-top: 50px">
                                <li>
                                    <div id="n-step1" class="number active">1</div>
                                    <div class="desc">Team<br>Details</div>
                                </li>
                                <li>
                                    <div id="n-step2" class="number">2</div>
                                    <div class="desc">Social Media Accounts</div>
                                </li>
                                <li>
                                    <div id="n-step3" class="number">3</div>
                                    <div class="desc">Campaign Information</div>
                                </li>
                                <li>
                                    <div id="n-step4" class="number">4</div>
                                    <div class="desc">Share<br>Campaign</div>
                                </li>
                            </ul>
                            <div>
                <?php  
                 echo $this->Flash->render();
                 echo $this->Flash->render('auth');
                 ?>    
                            </div>     
                <?php echo $this->Form->create($profile,['type'=>'file','url'=>['controller'=>'profiles','action'=>'register']]);?>
                            <div class="row m-t-30" id="step1">
                                <div style="margin-bottom: 50px;max-width: 80%;width:100%;">
                                <p><h1>REGISTER WITH US</h1></p> 
                                <p>
                                ProQuest is dedicated to making your teams dreams a reality. If your team has a dream and are ready to share their story, please complete the form below.    
                                </p>
                                <p>
                                If you are the Team’s representative you will need to meet our <a class="guidelines" href="javascript:void()">eligibility requirements of being 18 years or older</a>, in order to launch a ProQuest Campaign. Please read the Campaign Guidelines before registering your Team.    
                                </p>
                                </div>
                                
                               <div class="form-group col-sm-6" style="margin-bottom: 0px">  
                                <label for="pwd">Team Name *</label>   
                                <?php echo $this->Form->input('team_name',['label' => false,'type'=>'text','class'=>'form-control','id'=>'t-u-tname','required']) ;?>
                               </div>
                               <div class="form-group col-sm-6" style="margin-bottom: 0px">
                                    <label for="pwd">Team Representative *</label>
                                 <?php echo $this->Form->input('team_rep',['label' => false,'type'=>'text','class'=>'form-control','id'=>'t-u-rep','required']) ;?>
                               </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <!--<label for="inputEmail3" class="control-label">Date Of Birth*</label>
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name="date_of_birth" id='date-3' placeholder="19/04/1977" required>
                                        <span class="input-group-addon">
                                            <span class="arrow"></span>
                                            <i class="fa fa-calendar"></i>    
                                        </span>
                                    </div>-->
                                </div>                                                               
                                <!--<div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="pwd">ID Number*</label>
                                 <?php //echo $this->Form->input('ID_number',['label' => false,'type'=>'text','class'=>'form-control','id'=>'id-num','required']) ;?>
                                </div>-->
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <!--<p class="note">
                                        <span>PLEASE NOTE:</span> <br>
                                        If you are not older than 18 years of age, please tick <strong>"I have parental concent"</strong> to enter parent details.
                                    </p>
                                    <div class="checkbox">
                                        <label>
                                            <input id="parent" type="checkbox"> I have parental concent
                                        </label>
                                    </div>-->
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="pwd">Association Registration No</label>
                                 <?php echo $this->Form->input('reg_no',['label' => false,'type'=>'text','class'=>'form-control']) ;?> 
                                </div>
                                
                                <div id="parent-info" class="col-sm-12" style="display:none; margin-bottom: 20px">    
                                    <div class="form-group col-sm-6">
                          <?php echo $this->Form->input('parent_name',['label' => 'Name of Parent *','type'=>'text','id'=>'','class'=>'form-control']) ;?>
                                    </div>
                                    <div class="form-group col-sm-6">
                          <?php echo $this->Form->input('parent_contact',['label' => 'Contact Number *','type'=>'text','id'=>'','class'=>'form-control']) ;?>
                                    </div>
                                    <div class="form-group col-sm-6">
                          <?php echo $this->Form->input('parent_email',['label' => 'Parent email address *','type'=>'email','id'=>'','class'=>'form-control']) ;?>
                                    </div>
                                    <div class="form-group col-sm-6">
                          <?php echo $this->Form->input('parent_ID',['label' => 'Parent ID number *','type'=>'number','id'=>'','class'=>'form-control']) ;?>
                                    </div>     
                                </div>
                                
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="inputEmail3" class="control-label">Email Address *</label>
                        <?php echo $this->Form->input('email',['label' => false,'type'=>'email','placeholder'=>'you@email.co.za','id'=>'t-u-email','class'=>'form-control']) ;?>
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label for="inputEmail3" class="control-label">Mobile Number *</label>
                        <?php echo $this->Form->input('contact_number',['label' => false,'type'=>'text','placeholder'=>'+27','class'=>'form-control']) ;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6" >
                                    <label for="inputEmail3" class="control-label">City *</label>
                        <?php echo $this->Form->input('city',['label' => false,'type'=>'text','placeholder'=>'City','id'=>'t-u-city','class'=>'form-control','required']) ;?>
                                </div>
                       <div class="form-group col-sm-6">
                                    <label for="inputEmail3" class="control-label">Province *</label>
                        <?php 
                         echo $this->Form->input('province_id',['label' => false,       
                        'options' => $province,
                        'type' => 'select',
                        'empty' => '--Select Province--',
                        'id'=>'t-u-province',     
                        'class'=>'form-control',
                        'required'
                         ]
                       ); ?>
                       </div>
                       <div class="form-group col-sm-6" style="margin-top: 20px">
                                    <label for="inputEmail3" class="control-label">Country *</label>
                        <?php 
                         echo $this->Form->input('country_id',['label' => false,       
                        'options' => $Country,
                        'type' => 'select',
                        'default' => 'South Africa',
                        'id'=>'u-province',     
                        'class'=>'form-control',
                        'required'
                         ]
                       ); ?>
                       </div>
                       <div class="form-group col-sm-6" style="margin-top: 20px"> 
                                <label for="pwd">Sport *</label>    
                                <?php 
                                echo $this->Form->input('sport_id',['label' => false,       
                                'options' => $Sport,
                                'type' => 'select',
                                'default' => 'Cycling',
                                'id'=>'t-u-sport',     
                                'class'=>'form-control',
                                'required'
                                 ]); ?>   
                        </div>        
                                <div class="col-xs-12 text-center m-t-30">
                                    <button id='t-step-1' type="button" class="btn btn-primary step-btn" data-step="2">Save &amp; Continue</button>
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>
                            </div>

                            <div class="row m-t-30 hidden" id="step2">
                                <div class="form-group col-sm-12" style="margin-bottom: 20px">
                                <label for="pwd">What type of social media do you currently use? Does your Team have any social media accounts?</label><br>
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
                                <div class="form-group col-sm-12">
                                    <label for="pwd">What type of social media do you currently use?</label>
                                </div>
                                <div class="form-group col-sm-4">

                                    <div class="checkbox">
                                        <label><input name="facebook" type="checkbox" class="face"> Facebook</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input name="twitter" type="checkbox" class="twit"> Twitter</label>
                                    </div>  
                                    <div class="checkbox">
                                        <label><input name="instagram" type="checkbox" class="insta"> Instagram</label>
                                    </div> 
                                </div>
                                <div class="form-group col-sm-4"> 
                                    <div class="checkbox">
                                        <label><input name="linkedin" type="checkbox" class="linkin"> LinkedIn</label>
                                    </div>  
                                    <div class="checkbox">
                                        <label><input name="google" type="checkbox" class="google"> Google+</label>
                                    </div> 
                                    <div class="checkbox">
                                        <label><input name="snapchat" type="checkbox" class="snap"> SnapChat</label>
                                    </div> 
                                </div>    
                                <div class="form-group col-sm-4" style="margin-bottom: 20px">                         
                                    <div class="checkbox">
                                        <label><input name="personal_blog" type="checkbox" class="personal"> Personal Blog</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input name="other" type="checkbox" class="other"> Other</label>
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
                    <?php echo $this->Form->input('twitter_handle',['label' => false,'type'=>'text','class'=>'form-control','placeholder'=>'Twitter']) ;?>                                          
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
                                <div class="clearfix"></div>

                                <div class="col-xs-12 m-t-30">
                                    <button type="button" class="btn btn-primary step_back pull-right" data-step="1">Back</button>
                                    <button type="button" class="btn btn-primary step-btn" data-step="3">Save &amp; Continue</button>
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>
                            </div>

                            <div class="row m-t-30 hidden" id="step3">
                  <!--<div class="form-group col-sm-6">
                                    <label>I'm creating a campaign for an Athlete *</label>
                     <?php 
                    /*
                     $options = ['Team'=>'Team'];
                     echo $this->Form->input('athlete',['label' => false,                   
                     'options' => $options,
                     'type' => 'select',
                     'default' => 'Team',
                     'id'=>'athlete',    
                     'class'=>'form-control'  
                      
                     ]);
                     *    
                     */
                     ?>
                    </div>-->
                   <!-- <div class="form-group col-sm-6">
                    label>Team Name *</label>    
                    <?php //echo $this->Form->input('athlete_name',['label' => false,'type'=>'text','id'=>'athlete-name','class'=>'form-control']) ;?>   
                    </div>-->
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6">
                                    <label for="pwd">Name your Team campaign *</label>
                                    <p>Capture your audience!</p>
                    <?php echo $this->Form->input('campaign_title',['label' => false,'type'=>'text','id'=>'t-title','class'=>'form-control']) ;?>    
                                </div>
                                <div class="form-group col-sm-6">

                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6">
                                    <label for="pwd">Describe your Team’s story and what makes it unique *</label>
                     <?php echo $this->Form->input('campaign_description',['label' => false,'type'=>'textarea','id'=>'t-story','class'=>'form-control']) ;?>              
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="pwd">What are you raising money for? *</label>
                    <?php echo $this->Form->input('money_raised_for',['label' => false,'type'=>'textarea','id'=>'t-raisedfor','class'=>'form-control']) ;?>                   
                                </div>
                                <div class="clearfix"></div>
                                <div form-group col-sm-6 style="margin-left: 15px;margin-top:10px">
                                    <label for="pwd">How much money are you trying to raise? *</label>    
                                    <div class="input-group col-sm-6">
                                        <span class="input-group-addon">R</span>
                    <?php echo $this->Form->input('campaign_goal',['label' => false,'type'=>'number','type'=>'number','id'=>'t-money','class'=>'form-control','placeholder'=>'0.00','style'=>'width:380px']) ;?>                    
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label>What is the start date for your campaign *</label>    
                                    <div class="input-group">
                    <?php echo $this->Form->input('start_date',['label' => false,'class'=>'form-control','id'=>'date-2']) ;?>  
                                        <span class="input-group-addon">
                                            <span class="arrow"></span>
                                            <i class="fa fa-calendar"></i>    
                                        </span>
                                    </div>     
                                </div>
                                <div class="form-group col-sm-6" style="margin-bottom: 20px">
                                    <label>What is the end date for your campaign *</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="end_date" id='date-1'>
                                        <span class="input-group-addon">
                                            <span class="arrow"></span>
                                            <i class="fa fa-calendar"></i>    
                                        </span>
                                    </div>  
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6">
                                    <label>How has your Team supported itself in the past? *</label>
                                   
                    <?php echo $this->Form->input('past_sport_support',['label' => false,'type'=>'textarea','id'=>'t-past','class'=>'form-control']) ;?>                    
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Tell us about your Team’s achievements</label>

                    <?php echo $this->Form->input('hobbies_outside_sport',['label' => false,'type'=>'textarea','class'=>'form-control']) ;?>                   
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-6" style="margin-top:10px">
                                    <label>Main Photo *</label>
                                    <p>This photo is the first that will catch eye of donors. A great, well-lit, professional photo significantly increases the amount of people clicking into the campaign. </p>
                                    <p>Upload Photo (725 x 495)</p>
                                    <p>This shows up in listings - make it identifiable and appealing.</p>
                    <?php echo $this->Form->input('main_photo',['label' => false,'type'=>'file','id'=>'t-pic','requred']) ;?>      
                                </div>
                                <div class="form-group col-sm-6" style="margin-top:10px">
                                    <label for="pwd">Video Link:</label>
                                    <p>A link to your ProQuest, YouTube or Vimeo video). Please keep your videos to two minutes or less.</p>
                    <?php echo $this->Form->input('video_url',['label' => false,'type'=>'url','class'=>'form-control']) ;?>                  
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-xs-12 m-t-30">
                                    <button type="button" class="btn btn-primary step_back pull-right" data-step="2">Back</button>
                                    <button type="button" id="t-step-3" class="btn btn-primary step-btn" data-step="4">Save &amp; Continue</button>
                                    <!--<input type="submit" value="save">-->
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>
                            </div>
                            <div class="row m-t-30 hidden" id="step4">
                                <div class="form-group col-sm-12">
                                    <div class="checkbox">
                                        <label><input name="accept_terms" type="checkbox" class="google" required> <a style="color:blue;text-decoration: underline" href="<?php echo \Cake\Routing\Router::Url('/users/terms_of_use');?>">Terms of Use</a> and <a style="color:blue;text-decoration: underline" href="<?php echo \Cake\Routing\Router::Url('/users/policy');?>"> Privacy Policy.</a> By submitting your registration, you agree to ProQuest’s Terms of Use and Privacy Policy. Once submitted, your Campaign will be sent to the ProQuest Administrator for approval.</label>    
                                    </div> 
                                </div>

                                <div class="form-group col-sm-12">
                                 <p>You have completed your campaign information. Once submitted your Campaign will be sent to the ProQuest Administrator for approval.</p>    
                                 <p>Please click submit for approval button below to initiate the process.</p>   
                                </div> 

                                <div class="clearfix"></div>
                                <div class="col-xs-12 m-t-30">
                                    <button type="button" class="btn btn-primary step_back pull-right" data-step="3">Back</button>
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    <!--<input type="submit" value="save">-->
                                    <!--<p>Saved 40 minutes ago</p>--> 
                                </div>   
                            </div>
                <?php echo $this->Form->end();?>   

                        </div>
                        <div class="col-md-3 sidebar">
                            <!--<div class="thumbnail profile">
                                <img src="./img/default-img.jpg" alt="" class="full-max-width">
                                <h4>John Doe</h4>
                                <hr>
                                <h4>0</h4>
                                <p>Campaigns</p>-->
                            <?php echo $this->element('sidebar_reg');?>
                        </div>
                    </div>
                </div>
            </section>
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
        $('#date-1').datepicker();
        $('#date-2').datepicker();
        $('#date3').datepicker({format: 'yyyy/mm/dd' });
        $('#date-3').datepicker();
        
        $("#date3").change(function () {
            var bdate = $(this).datepicker("getDate");
            var Birthdate = $('#date3').val().replace(/\//g,'');                 
            $("#id-num").val(Birthdate);
            var today = new Date();
            //var age = today.getFullYear() - bdate.getFullYear();
            var m = today.getMonth() - bdate.getMonth();
            var diff = today - bdate; // This is the difference in milliseconds
            var age = Math.floor(diff / 31536000000); // Divide by 1000*60*60*24*365                  
            if (age < 18) {
                $("input[name='parent_name']").attr('id','p-name');
                $("input[name='parent_contact']").attr('id','p-contact');
                $("input[name='parent_email']").attr('id','p-email');
                $("input[name='parent_ID']").attr('id','p-id');
                $('#parent-info').show();
            } else {
                $("input[name='parent_name']").attr('id','');
                $("input[name='parent_contact']").attr('id','');
                $("input[name='parent_email']").attr('id','');
                $("input[name='parent_ID']").attr('id','');
                $('#parent-info').hide();
            }
        });
        
        $("#date-3").change(function () {
            var bdate = $(this).datepicker("getDate");
            var Bdate = $('#date-3').replace(/\\/g, '');
            
            $("#id-num").val(Bdate);
            var today = new Date();
            //var age = today.getFullYear() - bdate.getFullYear();
            var m = today.getMonth() - bdate.getMonth();
            var diff = today - bdate; // This is the difference in milliseconds
            var age = Math.floor(diff / 31536000000); // Divide by 1000*60*60*24*365                  
            if (age < 18) {
                $("input[name='parent_name']").attr('id','p-name');
                $("input[name='parent_contact']").attr('id','p-contact');
                $("input[name='parent_email']").attr('id','p-email');
                $("input[name='parent_ID']").attr('id','p-id');
                $('#parent-info').show();
            } else {
                $("input[name='parent_name']").attr('id','');
                $("input[name='parent_contact']").attr('id','');
                $("input[name='parent_email']").attr('id','');
                $("input[name='parent_ID']").attr('id','');
                $('#parent-info').hide();
            }
        });

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
        $('.linkin').click(function () {
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
                $('#p-name,#p-email,#p-id,#p-contact').prop('required', true);
                $("#parent-info").show();
            } else {
                $('#p-name,#p-email,#p-id,#p-contact').prop('required', false);
                $("#parent-info").hide();
            }
        });

        $(document).on('click', '#guide', function () {
            $('#modal-1').modal();
        });
        
        $(document).on('click', '#step-1', function () {
           
            var name = $('#u-name').val();
            var surname = $('#u-surname').val();
            var birth = $('#date3').val();
            var email = $('#u-email').val();
            var phone = $('#u-phone').val();
            var city = $('#u-city').val();
            var province = $('#u-province').val();
            
            var Pname = $('#p-name').val();
            var Pcontact = $('#p-contact').val();
            var Pmail = $('#p-email').val();
            //var PId = $('#p-id').val();
                       
            if((name == ''|| surname == '' || birth == '' || email == '' || city == '' || phone == '' 
                || province == ''|| Pname == ''|| Pname == ''|| Pcontact == '' || Pmail == '')){               
                $('div#step2').addClass('hidden');
                $('div#step1').removeClass('hidden');
                $('#n-step1').addClass('active');
                $('#n-step2').removeClass('active');
                alert('Please complete all required fields.');
            }
        });
        
        $(document).on('click', '#t-step-1', function () {
            var name = $('#t-u-name').val();           
            var email = $('#t-u-email').val();
            var phone = $('#t-u-phone').val();
            var city = $('#t-u-city').val();
            var province = $('#t-u-province').val();
            var tname = $('#t-u-tname').val(); 
                                  
            if((name == ''|| email == '' || city == '' || phone == '' 
                || province == '' || tname == '')){               
                $('div#step2').addClass('hidden');
                $('div#step1').removeClass('hidden');
                $('#n-step1').addClass('active');
                $('#n-step2').removeClass('active');
                alert('Please complete all required fields.');
            }
        });
        
        
        $(document).on('click', '#step-3', function () {
            var athlete = $('#athlete').val();
            var atName = $('#athlete-name').val();
            var title = $('#c-title').val();
            var story = $('#c-story').val();
            var rfor = $('#c-raisedfor').val();
            var money = $('#money').val();
            var sdate = $('#date2').val();
            var edate = $('#date').val();
            var past = $('#c-past').val();
            var pic = $('#c-pic').val();
            
            if((athlete == ''|| atName == '' || title == '' || story == '' || rfor == '' 
                || money == '' || sdate == ''|| edate == '' || past == ''|| pic == '')){               
                $('div#step4').addClass('hidden');
                $('div#step3').removeClass('hidden');
                $('#n-step3').addClass('active');
                $('#n-step4').removeClass('active');
                alert('Please complete all required fields.');
            }
        });
        
        $(document).on('click', '#t-step-3', function () {           
            var title = $('#t-title').val();
            var story = $('#t-story').val();
            var rfor = $('#t-raisedfor').val();
            var money = $('#t-money').val();
            var sdate = $('#date-2').val();
            var edate = $('#date-2').val();
            var past = $('#t-past').val();
            var pic = $('#t-pic').val();
            
            if((title == '' || story == '' || rfor == '' 
                || money == '' || sdate == ''|| edate == '' || past == ''|| pic == '')){               
                $('div#step4').addClass('hidden');
                $('div#step3').removeClass('hidden');
                $('#n-step3').addClass('active');
                $('#n-step4').removeClass('active');
                alert('Please complete all required fields.');
            }
        });

       $(document).on('click', '.guidelines', function () {           
            $('#modal-1').modal();           
        });
    });




</script>