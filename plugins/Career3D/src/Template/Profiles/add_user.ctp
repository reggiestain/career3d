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

<div class="row">
    <div class="col-md-12">

        <div>
          <?php  
            echo $this->Flash->render();
            echo $this->Flash->render('auth');
            ?>
        </div>
        <br>
        <!-- tile -->
        <div class="start">
        <section class="tile color transparent-white">



            <!-- tile header -->
            <div class="tile-header">
                <h1 style=""><strong>Add</strong> User</h1>
                <div class="controls">
                    <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                    <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                    <a href="#" class="remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- /tile header -->

            <!-- tile body -->
            <div class="tile-body">

                <!-- <form class="form-horizontal" role="form">-->
                     <?php echo $this->Form->create($UserData,['class'=>'form-horizontal','id'=>'register-form']);?>  
                     <?php //echo $this->Form->input('school_id',['type' => 'hidden', 'value'=>$SkulId,'class'=>'form-control']) ;?>                     
                     <?php echo $this->Form->input('status',['type' => 'hidden', 'value'=>'active','class'=>'form-control']) ;?>
                
                    <label class="col-sm-4 control-label">First Name *</label>
                    <div class="col-sm-8">
                      <!--<input type="text" class="form-control" id="input01">-->
                          <?php echo $this->Form->input('first_name',['label' => false,'class'=>'form-control','id'=>'first-name','required']) ;?>
                        <span class="help-block" style="color:#a94442" id="firstname-error">First Name is required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Surname *</label>
                    <div class="col-sm-8">
                      <!--<input type="text" class="form-control" id="input01">-->
                    <?php echo $this->Form->input('surname',['label' => false,'class'=>'form-control','id'=>'surname','required']) ;?>
                        <span class="help-block" style="color:#a94442" id="surname-error">Surname is required</span>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Phone Number *</label>
                    <div class="col-sm-8">
                          <?php echo $this->Form->input('phone_number',['label' => false,'class'=>'form-control','required']) ;?>                   
                    </div>          
                </div>      
                
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Email Address *</label>
                    <div class="col-sm-8">
                          <?php echo $this->Form->input('email',['label' => false,'class'=>'form-control','id'=>'mail']) ;?>                   
                    </div>          
                </div>      
                
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Title *</label>
                    <div class="col-sm-8">
                      <?php 
                        echo $this->Form->input('title_id', array(
                                                'options' => $Title,
                                                'type' => 'select',
                                                'empty' => 'Select Title',
                                                'label' => false, 
                                                'id'=>'position',
                                                'class'=>'chosen-select chosen-transparent form-control',
                                                'required'
                                                   ));
                        ?>
                        <span class="help-block" style="color:#a94442" id="position-error">Surname is required</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label  class="col-sm-4 control-label">Position *</label>
                    <div class="col-sm-8">
                      <?php 
                        echo $this->Form->input('position_id', array(
                                                'options' => $Position,
                                                'type' => 'select',
                                                'empty' => 'Select  Position',
                                                'label' => false, 
                                                'id'=>'position',
                                                'class'=>'chosen-select chosen-transparent form-control',
                                                'required'
                                                   ));
                        ?>
                        <span class="help-block" style="color:#a94442" id="position-error">Surname is required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-4 control-label">Password *</label>
                    <div class="col-sm-8">
                           <?php echo $this->Form->input('password',['label' => false,'id'=>'password1','class'=>'form-control']) ;?>                      
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Confirm Password *</label>
                    <div class="col-sm-8">
                           <?php echo $this->Form->input('confirm_password',['label' => false,'type'=>'password','id'=>'password2','class'=>'form-control']) ;?>
                        <span class="help-block" style="color:red" id="verify-pass-error">Password does not match !</span>
                    </div>
                </div>                
                <div class="form-group">
                    <label  class="col-sm-4 control-label">User Role *</label>
                    <div class="col-sm-8">
                      <?php 
                        echo $this->Form->input('role_id', array(
                                                'options' => $Perms,
                                                'type' => 'select',
                                                'empty' => 'Select user type',
                                                'label' => false,  
                                                'id'=>'role',
                                                'class'=>'chosen-select chosen-transparent form-control'
                                                   ));
                        ?>
                    </div>
                </div>

                <div class="form-group form-footer">
                    <div class="col-sm-offset-4 col-sm-8">
                        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                          <?php echo $this->Form->submit('Submit', array('style','margin-left:30px','div'=>false,"class"=>"btn btn-primary"));?>
                        <!--<button type="reset" class="btn btn-default">Reset</button>  'formnovalidate' =>true,-->

                    </div>
                </div>

                </form>

            </div>
            <!-- /tile body -->
        </section>
    </div>
        <!-- /tile -->
    </div> 
</div>

<!--jquery-->
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


    });




</script>