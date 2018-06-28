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
                <!-- <ol class="breadcrumb">
                      <li>
                          <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                      </li>
 
                     <li class="active">
                        <i class="fa fa-tag"></i><b> Thank you for choosing Zilko Travel Tours. We are pleased to confirm your reservation as follows</b>
                     </li>
                 </ol>-->
            <div style="float:right"><a href="<?php echo \Cake\Routing\Router::Url('/users/account_report');?>" class="btn btn-default" target="_blank"><i class="fa fa-file-pdf-o"></i>Export to PDF</a></div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>

                </p>
            </div>
            <div class="col-lg-12">

                <div class="archive-msg">
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                 ?>
                </div><br>
                <h2>CAMPAIGN LIST</h2><br>
                <div class="table-responsive">
                    <table id="example-4" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <!--<th>ID</th>-->
                                <th>PUBLISHED BY</th>
                                <th>PUBLISHED ON</th>
                                <th>TITLE</th>
                                <th>START DATE</th>
                                <th>END DATE</th>                                
                                <th>GOAL</th>                                
                                <th>DONATIONS</th>
                                <th>GIVE BACKS</th>
                                <th>Commission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php foreach ($Camp as $Campaigns): ?>
                            <tr>
                                <!--<td><?php //echo $Campaigns->id;?></td>-->
                                <td><?php echo $Campaigns->profile->name.' '.$Campaigns->profile->surname;?></td>
                                <td><?php echo $Campaigns->created;?></td>
                                <td><?php echo $Campaigns->campaign_title;?></td>                                
                                <td><?php echo $Campaigns->start_date;?></td>   
                                <td><?php echo $Campaigns->end_date;?></td>                                
                                <td><?php echo "R ".number_format($Campaigns->campaign_goal, 2, '.', ',');?></td>                                                                                                                                                             
                                <td>
                                <?php 
                               $donate = 0;
                                foreach ($Campaigns->payments as $Donations) {
                                      if($Donations->payment_type === 'Donation'){
                                         $donate  +=$Donations->amount;
                                         
                                       }
                                 }
                                 echo "R ".number_format($donate, 2, '.', ',');
                                 ?>                                                                                  
                                </td>    
                                <td>
                                <?php 
                                 $give = 0;
                                 foreach ($Campaigns->payments as $Donations) {
                                      if($Donations->payment_type === 'GiveBack'){
                                         $give  +=$Donations->amount;
                                        
                                       }
                                 }
                                  echo "R ".number_format($give, 2, '.', ',');
                                 ?>                                                                                  
                                </td>     
                                <td>
                                <?php 
                                $total = 0;
                                foreach ($Campaigns->payments as $Donations) {   
                                         $total  +=$Donations->amount;
                                         }
                                         
                                 echo "R ".number_format($total / 15, 2, '.', ',');
                                         
                                 ?>                                                                                  
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success">Donate</a>    
                                </td>
                            </tr>
                       <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
            
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
        
        $('#example-4').DataTable();
           
        $('#datetimepicker4').datepicker();
        $('#datetimepicker5').datepicker();
        $('#checkin').datepicker();
        $('#checkout').datepicker();
        //$('#example').DataTable();
        var id = $('#e-hotel').attr('var');
        $('#value').val(id);

        $('[name="status"]').bootstrapSwitch({
           onColor: 'success',
           offColor:'danger',
           onText:  'Approve',
           offText: 'Reject'
        });        
        
        $('[name="status"]').on('switchChange.bootstrapSwitch', function (event, state) {
          var id =  $(this).attr('id'); 
          var status = state;
          $.ajax({type: "POST",
                    url: "<?php echo \Cake\Routing\Router::Url('/users/review_status/'); ?>"+ id+"/"+ status,
                    //data: values,
                    success: function (data) {
                        //$('.status-confirm').html(data);
                        //$("#close-lead-modal" + id).modal('toggle');
                        location.reload();
                    }
                });           
        });
        
        $('.archive').click(function(){
            var id =  $(this).attr('id'); 
            
            $.ajax({type: "POST",
                    url: "<?php echo \Cake\Routing\Router::Url('/users/archive/'); ?>"+ id,
                    //data: values,
                    success: function (data) {
                        $('.archive-msg').html(data);
                        //$("#close-lead-modal" + id).modal('toggle');
                       window.setTimeout('location.reload()', 3000); //Reloads after three seconds
                    }
                });         
        });
        
        $('.un-archive').click(function(){
            var id =  $(this).attr('id'); 
            
            $.ajax({type: "POST",
                    url: "<?php echo \Cake\Routing\Router::Url('/users/unarchive/'); ?>"+ id,
                    //data: values,
                    success: function (data) {
                        $('.archive-msg').html(data);
                        //$("#close-lead-modal" + id).modal('toggle');
                       window.setTimeout('location.reload()', 3000); //Reloads after three seconds
                    }
                });         
        });
        
        $('.over-ride').click(function(){
            var id =  $(this).attr('id'); 
            
            $.ajax({type: "POST",
                    url: "<?php echo \Cake\Routing\Router::Url('/users/over_ride/'); ?>"+ id,
                    //data: values,
                    success: function (data) {
                        $('.archive-msg').html(data);
                        //$("#close-lead-modal" + id).modal('toggle');
                       window.setTimeout('location.reload()', 3000); //Reloads after three seconds
                    }
                });         
        });
       
    });




</script>