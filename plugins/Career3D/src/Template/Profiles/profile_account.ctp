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
               <?php echo $this->element('main/post_campaign');?>
               <br>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>

                </p>
            </div>
            <div class="col-lg-12">

                <div class="confirm-msg">
                <div>
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                 ?>
                </div><br>
                
                <h2>PUBLISHED CAMPAIGNS</h2><br>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PUBLISHED BY</th>                                
                                <th>PUBLISHED ON</th>                            
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>CAMPAIGN TITLE</th>
                                <th>CAMPAIGN DESCRIPTION</th>
                                <th>GOAL</th>                                
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php foreach ($Campaigns as $Campaigns): ?>
                            <tr>
                                <td><?php echo $Campaigns->id;?></td>
                                <td>
                                    <?php 
                                    if(!empty($Campaigns->profile->team_name)){
                                       echo $Campaigns->profile->team_rep;
                                       }else{
                                       echo $Campaigns->profile->name.' '.$Campaigns->profile->surname;    
                                    }
                                    ?>
                                </td>
                                
                                <td><?php echo $Campaigns->created;?></td>
                                <td><?php echo $Campaigns->start_date;?></td>   
                                <td><?php echo $Campaigns->end_date;?></td>
                                <td>
                                    <?php if($Campaigns->state ==='Payed' or $Campaigns->state ==='OverRide'){?>
                                    <a href="<?php echo \Cake\Routing\Router::Url('/profiles/campaign_info/');?><?php echo $Campaigns->id;?>"><?php echo $Campaigns->campaign_title;?></a>
                                    <?php }else{ ?>
                                    <?php echo $Campaigns->campaign_title;?>
                                    <?php }?>
                                </td>
                                <td><?php echo $Campaigns->campaign_description;?></td>
                                <td><?php echo number_format($Campaigns->campaign_goal, 2, '.', ',');?></td>

<!-- <td>
    <div class="progress">
        <div class="progress-bar progress-bar-info" style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar">
            <span class="sr-only">40% Complete (success)</span>
        </div>
    </div>    
</td>-->
                                <td><?php echo $Campaigns->state;?></td>
                                <td>
                                 
                                <?php 
                                if($Campaigns->state === 'Payed' or $Campaigns->state === 'OverRide'){   
                                echo $this->Html->link('<span><i class="fa fa-fcase"></i></span> Manage', ['controller' => 'profiles','action' => 'campaign', $Campaigns->id],['escape'=>false,'class'=>'btn btn-primary']) ;
                                }
                                ?>
                                
                                &nbsp;
                                <?php 
                                if($Campaigns->state === 'Approved'){
                                   $name = $Campaigns->profile->name;
                                   $surname = $Campaigns->profile->surname;
                                //echo $this->Html->link('<span><i class="fa fa-pay"></i></span> Pay', ['controller' => 'profiles','action' => 'make_payment', $Campaigns->id],['escape'=>false,'class'=>'btn btn-success']) ;
                                   echo "<a href='#' id='pay' var='$Campaigns->id' var1='$name'. var2='$surname' class='btn btn-success'>Pay</a>";
                                    
                                }
                                ?>
                                </td>
                            </tr>
                                     <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <h2>CAMPAIGNS AWAITING APPROVAL</h2><br>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PUBLISHED BY</th>                               
                                <th>PUBLISHED ON</th>                            
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>CAMPAIGN TITLE</th>                               
                                <th>GOAL</th> 
                                <th>PARENTAL STATUS</th>
                                <th>ADMIN STATUS</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                    <?php foreach ($Reviews as $Camp): ?>
                            <tr>
                                <td><?php echo $Camp->id;?></td>
                                <td>
                                 <?php 
                                    if(!empty($Campaigns->profile->team_name)){
                                        echo $Campaigns->profile->team_rep;
                                    }else{
                                    echo $Campaigns->profile->name.' '.$Campaigns->profile->surname;    
                                    }
                                    ?>    
                                </td>
                                
                                <td><?php echo $Camp->created;?></td>
                                <td><?php echo $Camp->start_date;?></td>   
                                <td><?php echo $Camp->end_date;?></td>
                                <td><?php echo $Camp->campaign_title;?></td>                                
                                <td><?php echo number_format($Camp->campaign_goal, 2, '.', ',');?></td>

<!-- <td>
    <div class="progress">
        <div class="progress-bar progress-bar-info" style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar">
            <span class="sr-only">40% Complete (success)</span>
        </div>
    </div>    
</td>-->
                                <td>
                                <?php if($Camp->parental_status === 'Awaiting parental consent'){?>      
                                <button class="btn btn-primary"><?php echo $Camp->parental_status;?></button>
                                <?php } ?> 
                                <?php if($Camp->parental_status === 'approved'){?>      
                                <button class="btn btn-primary"><?php echo $Camp->parental_status;?></button>
                                <?php } ?> 
                                <?php if($Camp->parental_status === 'declined'){?>      
                                <button class="btn btn-danger"><?php echo $Camp->parental_status;?></button>
                                <?php } ?>
                                <?php if(!empty($Camp->parental_status)){?>      
                                <?php } ?> 
                                </td>
                                <td>                                  
                                <button class="btn btn-warning"> <?php echo $Camp->state;?> </button>
                                <?php //echo $this->Html->link('<span><i class="fa fa-fcase"></i></span> Manage', ['action' => 'print_hotel', $Profiles->id],['escape'=>false,'class'=>'btn btn-primary']) ;?>
                                </td>
                            </tr>
                                     <?php endforeach; ?>
                        </tbody>
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
                    <?php //echo $this->Form->create($Camp, ['id'=>'make-payment']);?>                        <div class="modal-body">

                            <div class="form-group">
                                <form id="frmPay" name="frmPay" method="post" action="https://sandbox.payfast.co.za/eng/process">

                                    <input type="hidden" value="10002820" name="merchant_id">
                                    <input type="hidden" value="q4uwh2sfqc6ap" name="merchant_key">
                                    <input type="hidden" id="r-url" value="" name="return_url">
                                    <input type="hidden" value="http://test11.finedemo.co.za/proquest" name="cancel_url">
                                    <input type="hidden" value="http://test11.finedemo.co.za/proquest" name="notify_url">
                                    <input type="hidden" id="name" value="" name="name_first">
                                    <input type="hidden" id="surname" value="" name="name_last">
                                    <input type="hidden" value="sbtu01@payfast.co.za" name="email_address">
                                    <input type="hidden" id="campaign-id" value="" name="m_payment_id">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Thanks you for Registering with Proquest, click Pay Now to start managing your campaign.</label>    
                                        <div class="input-group"> 
                                            <span class="input-group-addon">R</span>
                                            <input type="number"   class="form-control currency" name="amount" value="150" readonly/>
                                        </div>
                                    </div>

                                    <input type="hidden" id="camp-pay" value="" name="item_name">
                                    <input type="hidden" value="" name="item_description">
                                    
                                    <!--<input type="hidden" value="" name="signature">-->
                                    </div>
                                    <div class="modal-footer">
                                        <button style="margin-right: 50px" type="submit"><img src="http://www.payfast.co.za/images/buttons/paynow_basic_logo.gif" width="95" height="57" alt="Pay" title="Pay Now with PayFast" /></button>
                                        <button class="btn default" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <!--<input type="submit" value="Proceed to payment gateway" name="submit">-->
                                </form>
                            </div>
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

        $('#datetimepicker4').datepicker();
        $('#datetimepicker5').datepicker();
        $('#checkin').datepicker();
        $('#checkout').datepicker();
        //$('#example').DataTable();
        //var id = $('#e-hotel').attr('var');
        //$('#value').val(id);
        $(document).on('click', '#pay', function () {
            var id = $(this).attr('var');
            var name = $(this).attr('var1');
            var surname = $(this).attr('var2');
            var campPay = 'CampaignPayment';
            $('#campaign-id').val(id);
            $('#name').val(name);
            $('#surname').val(surname);
            $('#camp-pay').val(campPay);
            $('#r-url').val("http://test11.finedemo.co.za/proquest/profiles/return_payment/"+id+'/'+name+'/'+surname+'/'+campPay);
            $('#modal-1').modal();
        });

        $(document).on('submit', '#make-payment', function (event) {
            event.preventDefault();
            $('#modal-1').modal('toggle');
            var values = $('#make-payment').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/users/make_payment'); ?>",
                data: values,
                success: function (data) {
                    $('.confirm-msg').html(data);
                    window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });
    });




</script>