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
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;

?>
<div class="container">
    <div class="row">
        <div style="padding-top:50px;"> </div>
        <div class="col-md-3 profile-sec">
            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <?php 
                    if($img === 'profile.jpg'){
                    echo $this->Html->image('Career3D.upload/avatar/'.$img,['class'=>'card-img-top img-circle','alt'=>'Profile image']);
                    }else{
                    echo $this->Html->image('Career3D.upload/avatar/'.$img->avatar,['class'=>'card-img-top img-circle','alt'=>'Profile image']);    
                    }
                    ?>
                    <div class="middle">
                        <div class="text profile-image">
                            <span class="glyphicon glyphicon-camera" data-toggle="tooltip" data-placement="right" title="Update Profile Picture"></span>
                        </div>   
                    </div>
                </div>
                <div class="info">
                    <div class="title">
                        <a href="<?php echo Router::url('/career3-d/users/profile');?>"><?php echo $profile->name;?></a>
                    </div>
                    <div class="desc">Passionate designer</div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek</div>
                </div>
                <div class="bottom">
                    <button type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-facebook fa-2x"></i></button>
                    <button type="button" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-youtube fa-2x"></i></button>
                    <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-linkedin-square fa-2x"></i></button>
                </div>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#"><h5>Who's viewed your profile <span class="badge badge-primary">0</span></h5></a></li>
                        <li class="list-group-item"><a href="#"><h5>My Connections <span class="badge badge-success">0</span></h5></a></li>
                        <li class="list-group-item"><a href="#"><h5>My Mentors <span class="badge badge-primary">5</span></h5></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-body">
                   <!-- <span>
                        <h1 class="panel-title pull-left" style="font-size:25px;"><strong><?php echo $profile->name;?> <?php echo $profile->email;?></strong> <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i></h1>
                        <div class="dropdown pull-right">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Friends
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Familly</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Friends</a></li>
                                <li><a href="#">Work</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add a new aspect</a></li>
                            </ul>
                        </div>
                    </span>
                    <br><br>
                    <i class="fa fa-tags" aria-hidden="true"></i> <a href="/tags/diaspora" class="tag">#diaspora</a> <a href="/tags/hashtag" class="tag">#hashtag</a> <a href="/tags/caturday" class="tag">#caturday</a>
                    <br><br>
                  
                   <hr> -->
                    <span class="pull-left">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> Posts</a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-picture-o" aria-hidden="true"></i> Photos <span class="badge">0</span></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Contacts <span class="badge">0</span></a>
                    </span>
                </div>
            </div>
            <div class="scrollbar" id="style-2">
            <div class="force-overflow"></div>
            <div class="panel panel-success">
                <div class="panel-heading">General Information</div>
                <div class="panel-body">                    
                    <div class="row custom-row">                        
                        <div class="col-md-12">                             
                            <div class="high-alert"></div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Firstname</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->firstname;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Surname</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->surname;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Mobile</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->mobile;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Email</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->email;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Gender</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->gender;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Birth Date</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->birth_date;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Career</strong></div>
                                <div class="col-sm-9">
                                <?php 
                                if(!empty($profile->careers)){
                                   echo $profile->careers[0]->name;
                                }
                                ?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Province</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->province->name;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Drivers License</strong></div>
                                <div class="col-sm-9">
                                <?php echo $profile->drivers_lic;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="button" id="<?php echo $profile->id;?>" class="btn btn-primary btn-sm edit-personal">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <br>
                    <?php if(!$address->isEmpty()){?>
                    <?php foreach ($address as $address):?>
                    
                    <div class="row custom-row">                        
                        <div class="col-md-12">                             
                            <div class="high-alert"></div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Address</strong></div>
                                <div class="col-sm-9">
                                <?php echo $address->line_1;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Street</strong></div>
                                <div class="col-sm-9">
                                <?php echo $address->line_2;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>City</strong></div>
                                <div class="col-sm-9">
                                <?php echo $address->city;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Province</strong></div>
                                <div class="col-sm-9">
                                <?php echo $address->province->name;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Post Code</strong></div>
                                <div class="col-sm-9">
                                <?php echo $address->post_code;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-sm edit-address" id="<?php echo $address->id;?>">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <br>
                    <?php endforeach;?>
                    
                    <?php }else{ ?>                   
                    <div class="row custom-row">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p class="h5"><a href="#" class="add-address"><span class="fa fa-plus"></span> Add address</a></p>                        
                        </div>  
                        <div class="col-md-12" id="add-address" style="display:none"> 
                            <div class="address-alert"></div>
                            <?php echo $this->Form->create(null,['id'=>'address-form','url'=>['controller' => 'users', 'action' =>'saveaddress']]);?>                                        
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Address</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="line_1" placeholder="Address" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Street</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Street" name="line_2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>City</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="City" name="city" class="form-control">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Province</strong></label>
                                <div class="col-sm-4">
                                  <?php           
                                 echo $this->Form->select('province_id',$province, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                                 ?>
                                </div>

                                <label class="col-sm-3 control-label" for="textinput"><strong>Postcode</strong></label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="Post Code"name="post_code" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">                     
                                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    </div>
                                </div>
                            </div>
                          <?php echo $this->Form->end();?>
                        </div>   
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">High School Education</div>
                <div class="panel-body">
                 <?php if(!$highschool->isEmpty()){?> 
                 <?php foreach ($highschool as $highschool):?>
                    <div class="row custom-row">                        
                        <div class="col-md-12">                             
                            <div class="high-alert"></div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>School</strong></div>
                                <div class="col-sm-9">
                                <?php echo $highschool->school;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Course</strong></div>
                                <div class="col-sm-9">
                                <?php foreach($highschool->subjects as $highschools){?>
                                <?php echo $highschools->name.', ';?>    
                                <?php };?>    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Start Date</strong></div>
                                <div class="col-sm-9">
                                <?php echo $highschool->start_date;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Start Date</strong></div>
                                <div class="col-sm-9">
                                <?php echo $highschool->end_date;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-sm edit-high" id="<?php echo $highschool->id;?>">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <br>
                 <?php endforeach;?>
                 <?php }else{?>  
                    <div class="row custom-row">
                        <?php echo $this->Form->create(null,['id'=>'high-form','url'=>['controller' => 'users', 'action' => 'savehighschool']]);?>                
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p class="h5"><a href="#" class="add-high"><span class="fa fa-plus"></span> Add high school education</a></p>                        
                        </div>                        
                        <div class="col-md-12" id="add-high" style="display:none">                             
                            <div class="high-alert"></div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>School</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="school" class="form-control">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Subject</strong></label>
                                <div class="col-sm-9">
                                 <?php           
                                 echo $this->Form->select('subject_id',$subject, ['empty' => '--Choose One--','class'=>'form-control multiselect-ui','label'=>false,'required'=>false, 'error' => true,'multiple'=>'multiple','style'=>'width:500px !important']);
                                 ?>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-3 control-label" for="textinput"><strong>Certificate</strong></label>
                            <div class="col-sm-9">
                            <a href="#" class="high-cert">Upload Certificate</a>   
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Start Date</strong></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="start_date" id="start-date" class="form-control">
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="textinput"><strong>End Date</strong></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="end_date" id="end-date" class="form-control">
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-default btn-sm add-high">Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php echo $this->Form->end();?>
                    </div>  
                 <?php }?>     
                </div>
                <div class="panel-footer">

                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">Tertiary Education</div>
                <div class="panel-body">
                 <?php if(!$tertiary->isEmpty()){?> 
                    <?php foreach ($tertiary as $tertiary):?>
                    <div class="row custom-row">                        
                        <div class="col-md-12">                             
                            <div class="ter-1-alert"></div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Institution</strong></div>
                                <div class="col-sm-9">
                                <?php echo $tertiary->institution;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Course</strong></div>
                                <div class="col-sm-9">
                                <?php echo $tertiary->course;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Start Date</strong></div>
                                <div class="col-sm-9">
                                <?php echo $tertiary->start_date;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Start Date</strong></div>
                                <div class="col-sm-9">
                                <?php echo $tertiary->end_date;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-primary btn-sm edit-ter" id="<?php echo $tertiary->id;?>">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <br>
                    <?php endforeach;?>
                    <div class="row">
                        <?php echo $this->Form->create(null,['id'=>'ter-2-form','url'=>['controller' => 'users', 'action' => 'savetertiary']]);?>                
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p class="h5"><a href="#" class="add-high"><span class="fa fa-plus"></span> Add tertiary education</a></p>                        
                        </div>                        
                        <div class="col-md-12" id="add-high" style="display:none">                             
                            <div class="ter-2-alert"></div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Institution</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="institution" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Course</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="course" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Start Date</strong></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="start_date" id="start-date" class="form-control">
                                    </div>
                                </div>
                             </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>End Date</strong></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="end_date" id="end-date" class="form-control">
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-default btn-sm add-high">Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php echo $this->Form->end();?>
                    </div>
                 
                 <?php }?>     
                </div>
                <div class="panel-footer">

                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">Work Experience</div>
                <div class="panel-body">
                 <?php if(!$workexp->isEmpty()){?> 
                    <?php foreach ($workexp as $workexp):?>
                    <div class="row custom-row">                        
                        <div class="col-md-12">                             
                            <div class="work-alert"></div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Company</strong></div>
                                <div class="col-sm-9">
                                <?php echo $workexp->company;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Duties</strong></div>
                                <div class="col-sm-9">
                                <?php echo $workexp->duties;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>Start Date</strong></div>
                                <div class="col-sm-9">
                                <?php echo $workexp->start_date;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"><strong>End Date</strong></div>
                                <div class="col-sm-9">
                                <?php echo $workexp->end_date;?>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                   <button type="submit" class="btn btn-primary btn-sm edit-ex" id="<?php echo $workexp->id;?>">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>  
                    <br>
                    <?php endforeach;?>
                    <div class="row">
                        <?php echo $this->Form->create(null,['id'=>'wex-form','url'=>['controller' => 'users', 'action' => 'saveworkex']]);?>                
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p class="h5"><a href="#" class="add-wex"><span class="fa fa-plus"></span> Add work experience</a></p>                        
                        </div>                        
                        <div class="col-md-12" id="add-wex" style="display:none">                             
                            <div class="wex-alert"></div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Company</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="company" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Duties</strong></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="duties" id="duties"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Start Date</strong></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="start_date" id="start-date" class="form-control">
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="textinput"><strong>End Date</strong></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="end_date" id="end-date" class="form-control">
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php echo $this->Form->end();?>
                    </div>
                 <?php }else{?>  
                    <div class="row custom">
                        <?php echo $this->Form->create(null,['id'=>'wex-form','url'=>['controller' => 'users', 'action' => 'saveworkex']]);?>                
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p class="h5"><a href="#" class="add-wex"><span class="fa fa-plus"></span> Add work experience</a></p>                        
                        </div>                        
                        <div class="col-md-12" id="add-wex" style="display:none">                             
                            <div class="wex-alert"></div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Company</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="company" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Duties</strong></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="duties" id="duties"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="textinput"><strong>Start Date</strong></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="start_date" id="start-datew" class="form-control">
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="textinput"><strong>End Date</strong></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="" name="end_date" id="end-datew" class="form-control">
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php echo $this->Form->end();?>
                    </div>  
                 <?php }?>     
                </div>
                <div class="panel-footer">

                </div>
            </div>
            
            </div>
            <!-- Register Modal -->
            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->               
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title edit-title"></h4>
                        </div>
                        <div class="modal-body edit-info">


                        </div>                  
                    </div>
                </div>
                <?php echo $this->Form->end();?>
            </div>
        </div> 
        <div class="row col-md-3">
            <div class="notice notice-success">
                <strong>Notice</strong> notice-success
            </div>
            <div class="notice notice-danger">
                <strong>Notice</strong> notice-danger
            </div>
            <div class="notice notice-info">
                <strong>Notice</strong> notice-info
            </div>
            <div class="notice notice-warning">
                <strong>Notice</strong> notice-warning
            </div>
            <div class="notice notice-lg">
                <strong>Big notice</strong> notice-lg
            </div>
            <div class="notice notice-sm">
                <strong>Small notice</strong> notice-sm
            </div>

        </div>
    </div>
</div>
    <script>       
         $(document).ready(function () {
            $(".add-address").click(function (event) {
                event.preventDefault();
                $("#add-address").toggle();
            });
            
            $(".multiselect-ui").select2({
                theme: "classic"
             }); 
            
            $(".add-high").click(function (event) {
                event.preventDefault();
                $("#add-high").toggle();
            });
            $(".add-wex").click(function (event) {
                event.preventDefault();
                $("#add-wex").toggle();
            });
            $('#start-date').datepicker();
            $('#end-date').datepicker();
            $('#start-datew').datepicker();
            $('#end-datew').datepicker();
            $(".write-post").click(function () {
                $("#postModal").modal();
            });
            $('#duties').summernote({
                height: 200, //set editable area's height
                placeholder: 'Write your duties......',
                codemirror: {// codemirror options
                    theme: 'monokai'
                }
            });

            $('#high-form').submit(function (event) {
                event.preventDefault();
                var formData = $("#high-form").serialize();
                var url = $("#high-form").attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.high-alert').html(data);
                        setTimeout(function () {
                            location.reload(1);
                        }, 5000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            $('#address-form').submit(function (event) {
                event.preventDefault();
                var formData = $("#address-form").serialize();
                var url = $("#address-form").attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.address-alert').html(data);
                        setTimeout(function () {
                            location.reload(1);
                        }, 5000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Save tertiary education
            $('#ter-2-form').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.ter-2-alert').html(data);
                        //setTimeout(function () {
                           // location.reload(1);
                       // }, 5000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Save work experience
            $('#wex-form').submit(function (event) {
                event.preventDefault();
                var formData = $("#wex-form").serialize();
                var url = $("#wex-form").attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        if (data === '500') {
                            location.reload();
                        } else {
                            $('.wex-alert').html(data);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Edit personal info
            $(document).on('click', '.edit-personal', function () {
                //event.preventDefault();
                var id = $(this).attr('id');
                $('.edit-title').html('Edit Personal Information');
                $('#editModal').modal();
                $.ajax({
                    url: '<?php echo Router::url('/career3-d/users/editpersonal/');?>' + id,
                    type: "POST",
                    asyn: false,
                    //data: {'profileId': id},
                    beforeSend: function () {
                        $('.edit-info').html("<button class='btn btn-lg btn-default'><span class='glyphicon glyphicon-refresh spinning'></span> Loading...</button>");
                    },
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.edit-info').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        //location.reload();
                    }
                });
            });
            //Update Personal Info
            $(document).on('submit', '#info-form', function (event) {
                event.preventDefault();
                var formData = $("#info-form").serialize();
                var url = $("#info-form").attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.update-alert').html("<div class='alert alert-success'><strong>Success! </strong>Info updated successfully.</div>");
                        location.reload();

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Edit address
            $(document).on('click', '.edit-address', function () {
                //event.preventDefault();
                var id = $(this).attr('id');
                $('.edit-title').html('Edit Physical Address');
                $('#editModal').modal();
                $.ajax({
                    url: '<?php echo Router::url('/career3-d/users/editaddress/');?>' + id,
                    type: "POST",
                    asyn: false,
                    //data: {'profileId': id},
                    beforeSend: function () {
                        $('.edit-info').html("<button class='btn btn-lg btn-default'><span class='glyphicon glyphicon-refresh spinning'></span> Loading...</button>");
                    },
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.edit-info').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Update address
            $(document).on('submit', '#address-form', function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.update-alert').html("<div class='alert alert-success'><strong>Success! </strong>Address updated successfully.</div>");
                        location.reload();

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Edit High School
            $(document).on('click', '.edit-high', function () {
                //event.preventDefault();
                var id = $(this).attr('id');
                $('.edit-title').html('Edit High School');
                $('#editModal').modal();
                $.ajax({
                    url: '<?php echo Router::url('/career3-d/users/edithigh/');?>' + id,
                    type: "POST",
                    asyn: false,
                    //data: {'profileId': id},
                    beforeSend: function () {
                        $('.edit-info').html("<button class='btn btn-lg btn-default'><span class='glyphicon glyphicon-refresh spinning'></span> Loading...</button>");
                    },
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.edit-info').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Update High School
            $(document).on('submit', '#high-form', function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.update-alert').html("<div class='alert alert-success'><strong>Success! </strong>High school updated successfully.</div>");
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });

            //Edit High School
            $(document).on('click', '.edit-ter', function () {
                //event.preventDefault();
                var id = $(this).attr('id');
                $('.edit-title').html('Edit Tertiary Education');
                $('#editModal').modal();
                $.ajax({
                    url: '<?php echo Router::url('/career3-d/users/edittertiary/');?>' + id,
                    type: "POST",
                    asyn: false,
                    //data: {'profileId': id},
                    beforeSend: function () {
                        $('.edit-info').html("<button class='btn btn-lg btn-default'><span class='glyphicon glyphicon-refresh spinning'></span> Loading...</button>");
                    },
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.edit-info').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Update High School
            $(document).on('submit', '#ter-form', function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.update-alert').html("<div class='alert alert-success'><strong>Success! </strong>Tertiary education was updated successfully.</div>");
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            
            $(document).on('click', '.edit-ex', function () {
                //event.preventDefault();
                var id = $(this).attr('id');
                $('.edit-title').html('Edit Work Experience');
                $('#editModal').modal();
                $.ajax({
                    url: '<?php echo Router::url('/career3-d/users/editworkex/');?>' + id,
                    type: "POST",
                    asyn: false,
                    //data: {'profileId': id},
                    beforeSend: function () {
                        $('.edit-info').html("<button class='btn btn-lg btn-default'><span class='glyphicon glyphicon-refresh spinning'></span> Loading...</button>");
                    },
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.edit-info').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
            //Update work experience
            $(document).on('submit', '#ex-form', function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $('.update-alert').html("<div class='alert alert-success'><strong>Success! </strong>Tertiary education was updated successfully.</div>");
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
        });
        
        Dropzone.options.uploadWidget = false;
        Dropzone.options.uploadWidget = {
            paramName: 'file',
            maxFilesize: 2, // MB
            maxFiles: 1,
            uploadMultiple: false,
            //addRemoveLinks: true,
            //dictCancelUploadConfirmation: 'Image has been cancelled.',
            dictDefaultMessage: 'Drag an image here to upload, or click to select one',
            headers: {
                //'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
            },
            acceptedFiles: 'image/*',
            init: function () {

                this.on('addedfile', function (file) {

                });
                this.on('success', function (file, resp) {
                    this.removeFile(file);
                    $("#profileModal").modal('hide');
                });
                this.on('addedfile', function (file, resp) {

                });

                this.on('maxfilesexceeded', function (file) {
                    this.removeFile(file);
                });

                this.on("complete", function (file) {
                    location.reload();
                });
                this.on('thumbnail', function (file) {
                    if (file.width < 640 || file.height < 480) {
                        file.rejectDimensions();
                    }
                    else {
                        file.acceptDimensions();
                    }
                });
            },
            accept: function (file, done) {
                file.acceptDimensions = function () {
                    done();
                }
                file.rejectDimensions = function () {
                    done('The image must be at least 640 x 480px')
                };
            }

        };
             
        
        Dropzone.options.certWidget = false;
        Dropzone.options.certWidget = {
            paramName: 'file',
            maxFilesize: 2, // MB
            maxFiles: 1,
            uploadMultiple: false,
            //addRemoveLinks: true,
            //dictCancelUploadConfirmation: 'Image has been cancelled.',
            dictDefaultMessage: 'Drag an image here to upload, or click to select one',
            headers: {
                //'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
            },
            acceptedFiles: 'application/pdf',
            init: function () {

                this.on('addedfile', function (file) {

                });
                this.on('success', function (file, resp) {
                    this.removeFile(file);
                    $("#profileModal").modal('hide');
                });
                this.on('maxfilesexceeded', function (file) {
                    this.removeFile(file);
                });

                this.on("complete", function (file) {
                   // location.reload();
                });
            },
            accept: function (file, done) {
                //file.acceptDimensions = function () {
                    done();
               // }              
            }

        };    
    </script>