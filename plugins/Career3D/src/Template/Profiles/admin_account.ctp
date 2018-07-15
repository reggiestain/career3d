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

            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>

                </p>
            </div>
            <div class="col-lg-12">

                <div>
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                 ?>
                </div><br>
                <h2>CAMPAIGN LIST</h2><br>
                <div class="table-responsive">
                    <table id="example-1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PUBLISHED BY</th>
                                <th>PUBLISHED ON</th>
                                <th>TITLE</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
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
                                <td><?php echo $Campaigns->profile->name.' '.$Campaigns->profile->surname;?></td>
                                <td><?php echo $Campaigns->created;?></td>
                                <td><?php echo $Campaigns->campaign_title;?></td>                                
                                <td><?php echo $Campaigns->start_date;?></td>   
                                <td><?php echo $Campaigns->end_date;?></td>
                                <td><?php echo $Campaigns->campaign_description;?></td>
                                <td><?php echo "R ".number_format($Campaigns->campaign_goal, 2, '.', ',');?></td>
                                
                               <!-- <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>    
                                </td>-->
                                <td><?php echo $Campaigns->state;?></td>

                                <td> 
                                <div>    
                                <?php echo $this->Html->link('<span><i class="fa fa-fcase"></i></span> Manage', ['controller' => 'profiles','action' => 'admin_edit_profile', $Campaigns->id],['escape'=>false,'class'=>'btn btn-primary btn-sm']) ;?>
                                </div>
                                <br>
                                <div class="make-switch" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                                <input type="checkbox" name="status" id="<?php echo $Campaigns->id;?>" <?php if($Campaigns->state === 'Approved'){echo 'checked';}?>/>
                                </div>
                                <a href="#" class="btn btn-default btn-sm">Archive</a>
                                </td>
                        
                            
                            </tr>
                                     <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
            
             <div class="col-lg-12">

                <div>
                <?php  
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                 ?>
                </div><br>
                <h2>ARCHIVED CAMPAIGNS</h2><br>
                <div class="table-responsive">
                    <table id="example-2" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PUBLISHED BY</th>
                                <th>PUBLISHED ON</th>
                                <th>TITLE</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>CAMPAIGN DESCRIPTION</th>
                                <th>GOAL</th>                                
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php foreach ($Camp as $Campaigns): ?>
                            <tr>
                                <td><?php echo $Campaigns->id;?></td>
                                <td><?php echo $Campaigns->profile->name.' '.$Campaigns->profile->surname;?></td>
                                <td><?php echo $Campaigns->created;?></td>
                                <td><?php echo $Campaigns->campaign_title;?></td>                                
                                <td><?php echo $Campaigns->start_date;?></td>   
                                <td><?php echo $Campaigns->end_date;?></td>
                                <td><?php echo $Campaigns->campaign_description;?></td>
                                <td><?php echo "R ".number_format($Campaigns->campaign_goal, 2, '.', ',');?></td>
                                
                               <!-- <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>    
                                </td>-->
                                <td><?php echo $Campaigns->state;?></td>

                                <td>
                                 
                               <?php echo $this->Html->link('<span><i class="fa fa-fcase"></i></span> Manage', ['controller' => 'profiles','action' => 'admin_edit_profile', $Campaigns->id],['escape'=>false,'class'=>'btn btn-primary btn-sm']) ;?>
                                    &nbsp<br>
                                <div class="make-switch" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                                <input type="checkbox" name="status" id="<?php echo $Campaigns->id;?>" <?php if($Campaigns->state === 'Approved'){echo 'checked';}?>/>
                                </div>
                                <?php echo $this->Html->link('<span><i class="fa fa-fcase"></i></span> Archive', ['controller' => 'profiles','action' => 'admin_edit_profile', $Campaigns->id],['escape'=>false,'class'=>'btn btn-default btn-sm']) ;?>
                                    &nbsp<br>       
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
        
        $('#example-1').DataTable();
        $('#example-2').DataTable();
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
       
    });




</script>