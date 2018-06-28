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
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Users <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Users
                    </li>
                </ol>
            </div>
        </div>
        <div>
      <?php  
              echo $this->Flash->render();
              echo $this->Flash->render('auth');
      ?>
        </div> 
        <br>
        <!-- BEGIN BASIC FORM ELEMENTS-->
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4>Edit <span class="semi-bold">User Profile</span></h4>
                        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                    </div>
                    <div class="grid-body no-border"> <br>
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                    <?php echo $this->Form->create($Profile);?>    

                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <span class="help">e.g. "Mr."</span>
                                    <div class="controls">
                                      <!--<input type="text" placeholder="You can put anything here" class="form-control">-->
                          <?php 
                        echo $this->Form->input('title_id', array(
                                                'options' => $Title,
                                                'type' => 'select',
                                                'empty' => '--Select Title--',
                                                'label' => false,  
                                                //'id'=>'role',
                                                'class'=>'form-control'
                                                   ));
                        ?>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <span class="help">e.g. "Lisa"</span>
                                    <div class="controls">
                                      <!--<input type="text" class="form-control">-->
                          <?php echo $this->Form->input('first_name',['type' => 'text','label'=>false,'class'=>'form-control']) ;?> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Surname</label>
                                    <span class="help">e.g. "Portrait"</span>
                                    <div class="controls">
                                      <!--<input type="password" class="form-control">-->
                          <?php echo $this->Form->input('surname',['type' => 'text','label'=>false,'class'=>'form-control']) ;?>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <span class="help">e.g. "some@example.com"</span>
                                    <div class="controls">
                                      <!--<input type="text" class="form-control">-->
                          <?php echo $this->Form->input('email',['type' => 'text','label'=>false,'class'=>'form-control']) ;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Contact Number</label>
                                    <span class="help">e.g. "some@example.com"</span>
                                    <div class="controls">
                                      <!--<input type="text" placeholder="You can put anything here" class="form-control">-->
                          <?php echo $this->Form->input('phone_number',['type' => 'text','label'=>false,'class'=>'form-control']) ;?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Profile Link</label>
                                    <span class="help">e.g. "http://pharoahgroup.com/Stationary/Scott_Pharoah/"</span>
                                    <div class="controls">  
                          <?php echo $this->Form->input('website_link',['label' => false,'class'=>'form-control','id'=>'mail']) ;?>                   
                                    </div>           
                                </div>     

                                <div class="form-group">
                                    <label class="form-label">Position</label>
                                    <span class="help">e.g. "Manager"</span>
                                    <div class="controls">
                                      <!--<input type="text" placeholder="You can put anything here" class="form-control">-->
                          <?php 
                        echo $this->Form->input('position_id', array(
                                                'options' => $Position,
                                                'type' => 'select',
                                                'empty' => '--Select Position--',
                                                'label' => false,  
                                                //'id'=>'role',
                                                'class'=>'form-control'
                                                   ));
                        ?>
                                    </div>
                                </div> 

                                <div><a href="#" class="update-pass" style="color:blue">Click to update Password</a></div>
                                <div id="pass-div" style="display: none"> 
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <span class="help">e.g. "12345#"</span>
                                        <div class="controls">
                                          <!--<input type="text" placeholder="You can put anything here" class="form-control">-->
                          <?php echo $this->Form->input('pass',['label' => false,'id'=>'password1','class'=>'form-control']) ;?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <span class="help">e.g. "12345#"</span>
                                        <div class="controls">
                                          <!--<input type="text" placeholder="You can put anything here" class="form-control">-->
                         <?php echo $this->Form->input('confirm_pass',['label' => false,'type'=>'password','id'=>'password2','class'=>'form-control']) ;?>
                                            <span class="help-block" style="color:red;display:none" id="verify-pass-error">Password does not match !</span>
                                        </div>
                                    </div>  
                                </div>


                                <div class="form-group">
                                    <div class="controls">
                                        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                          <?php echo $this->Form->submit('Submit', ['class'=>'btn btn-primary']);?>
                                        <!--<button type="reset" class="btn btn-default">Reset</button>  'formnovalidate' =>true,-->

                                    </div>
                                </div>
                    <?php echo $this->Form->end();?>    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BASIC FORM ELEMENTS-->	 
    </div>
<?php //echo $this->element('admin_dashboard');?>
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
            } // else, show unmatch alert | hide match alert
            else {

                $("#verify-pass-error").show();
            }
            event.preventDefault();
        });

        $(".update-pass").click(function () {
            $("#pass-div").toggle();
        });
    });




</script>