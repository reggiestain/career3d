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
            <?php echo $this->Html->image('latest_logo.png');?>

                <h1 class="page-header">

                </h1>
                <ol class="breadcrumb">
                    <!-- <li>
                         <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                     </li>-->

                    <li class="active">
                       <!-- <i class="fa fa-tag"></i>--> <b> Thank you for choosing Zilko Travel Tours. We are pleased to confirm your reservation as follows</b>
                    </li>
                </ol>

            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>

                </p>
            </div>
            <div class="col-lg-12">
                <h2>Hotel Reservation Info</h2>
                <div>
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                 ?>
                </div><br>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Voucher Number</th>
                                <th>Voucher Prepared By</th>
                                <th>Hotel Reservation Number</th>
                                <th>Guest</th>
                                <th>Arrival Date</th>
                                <th>Departure Date</th>
                                <th>Room Type</th>
                                <th>Meal Plan</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Billing Info</th>
                                <th>Remarks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php foreach ($HotelInfo as $HotelInfos): ?>
                            <tr>
                                <td><?php echo $HotelInfos->voucher_no;?></td>
                                <td><?php echo $HotelInfos->prepared_by;?></td>
                                <td><?php echo $HotelInfos->reservation_no;?></td>
                                <td><?php echo $HotelInfos->guest;?></td>
                                <td><?php echo $HotelInfos->arrival_date;?></td>
                                <td><?php echo $HotelInfos->departure_date;?></td>
                                <td><?php echo $HotelInfos->room_type;?></td>
                                <td><?php echo $HotelInfos->meal_plan;?></td>
                                <td><?php echo $HotelInfos->check_in;?></td>
                                <td><?php echo $HotelInfos->check_out;?></td>
                                <td><?php echo $HotelInfos->bill_info;?></td>
                                <td><?php echo $HotelInfos->remarks;?></td>
                                <td>
                                <?php echo $this->Html->link('<span><i class="fa fa-edit"></i></span> Edit', ['action' => 'edit_hotel', $HotelInfos->id],['escape'=>false,'class'=>'label label-success']) ;?>
                                    &nbsp;    
                                    <a href="#" class="label label-default" id="e-hotel" var="<?php echo $HotelInfos->id;?>" data-toggle="modal" data-target="#modal-1"><span><i class="fa fa-envelope"></i></span> Email</a>
                                <?php //echo $this->Html->link('<span><i class="fa fa-envelope"></i></span>  Email', ['action' => 'email_hotel', $HotelInfos->id],['escape'=>false,'class'=>'label label-default','id'=>'e-hotel']) ;?>
                                    &nbsp;    
                                <?php echo $this->Html->link('<span><i class="fa fa-print"></i></span> Print', ['action' => 'print_hotel', $HotelInfos->id],['escape'=>false,'class'=>'label label-default']) ;?>
                                    &nbsp;
                                <?php echo $this->Form->postLink(__('Cancel'), ['action' => 'cancel_hotel', $HotelInfos->id], ['confirm' => __('Are you sure you want to cancel # {0}?', $HotelInfos->id),'class'=>'label label-danger']) ?>
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
        $('#example').DataTable();
        var id = $('#e-hotel').attr('var');
        $('#value').val(id);
        //$(document).on('click', '#e-hotel', function () {
        //$('#myModal').modal();
        //});
    });




</script>