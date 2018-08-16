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

?>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="login_form">
                <div>
                <?php  
                 echo $this->Flash->render();
                 echo $this->Flash->render('auth');
                ?>    
               </div>                                        
                </div>              
            </div>
        </div>
    </div>
</section>
<div class="row"> 
    <div class="modal fade" id="modal-2" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-md">               
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reset Your Password</h4>                                                     
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <form id="reset-form" method="post" action="<?php echo \Cake\Routing\Router::Url('/users/reset_pass');?>">                            
                            <div class="form-group">                                
                                <div class="form-group input-group col-sm-12">
                                    <label>Enter your Proquest account email address:</label>    
                                    <input id="name-1" type="email" class="form-control" value="" name="reset_email" required>
                                </div>
                                <div class="form-group input-group col-sm-12">
                                    <label>Enter New Password:</label>    
                                    <input id="pass3" type="password" class="form-control" value="" name="pass3" required>
                                </div>
                                <div class="form-group input-group col-sm-12">
                                    <label>Confirm Password:</label>    
                                    <input id="pass4" type="password" class="form-control" value="" name="pass4" required>
                                    <span class="help-block" style="color:red;display:none" id="verify-pass-error">Password does not match !</span>
                                    <span class="help-block" style="color:green;display:none" id="verify-pass-success">Password matched successfully!</span>                

                                </div>                              
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" style="margin-right: 50px" type="submit">Submit</button>
                        <button class="btn default" data-dismiss="modal">Cancel</button>
                    </div>
                    <!--<input type="submit" value="Proceed to payment gateway" name="submit">-->
                    </form>

                    <?php //echo $this->Form->end();?>
                </div>                            
            </div> 
        </div>      
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#pass4").keyup(function (event) {
            // get password value from first password field
            var pwd = $('#pass3').val();
            // get the 2nd password value from the verify password field
            var vPwd = $('#pass4').val();
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
        $(document).on('click', '#reset-pass', function (event) {
            event.preventDefault();
            //$('#modal-1').modal('toggle');
            $('#modal-2').modal();
        });
        
        $(document).on('submit', '#rese-form', function () {
            var id = $('#camp-id').val();
            var desc = $('#item-1').val();
            var name = $('#name-1').val();
            var surname = $('#surname-1').val();
            var amount = $('#gift-value').val();
            var email = $('#e-mail-1').val();
            var giftId = $('#g-id').val();

            $('#r2-url').val("http://test11.finedemo.co.za/proquest/profiles/return_payment/" + id + "/" + name + "/" + surname + "/" + desc + "/" + amount + "/" + email + "/" + giftId);

        });
    });
</script>