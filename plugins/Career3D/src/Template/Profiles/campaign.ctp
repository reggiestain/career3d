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
                <?php echo $this->element('main/edit_campaign');?>
                <br><br>    
                <!--<ul class="nav nav-tabs">
                    <li id="giveback" class="active"><a href="#">GIVE BACKS</a></li>
                    <li id="contri" id="contri"><a href="#">CONTRIBUTERS</a></li>
                    <li id="bonus"><a href="#">BONUSES</a></li>
                    <li id="comm"><a href="#">COMMENTS</a></li>
                    <li id="update"><a href="#">UPDATES</a></li>
                    
                </ul>-->
                <!-- Tab panes -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#giveback" aria-controls="giveback" role="tab" data-toggle="tab">GIVE BACKS (<?php echo $GiveBackCount;?>)</a></li>
                    <li role="presentation"><a href="#pdate" aria-controls="pdate" role="tab" data-toggle="tab">UPDATES (<?php echo $UpdateCount;?>)</a></li>
                    <li role="presentation"><a href="#mvp" aria-controls="mvp" role="tab" data-toggle="tab">Contributors (<?php echo $ContributorCount;?>)</a></li>
                    <li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Comments (<?php echo $CommCount;?>)</a></li>
                </ul>
            </div>

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
            </div>
            <br>

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="giveback">
                    <div class="col-lg-12" id="gift-index">
                        <div class="table-responsive" id="update">
                            <h3>GIVE BACKS</h3>
                            <div class="row col-lg-6" style="margin-bottom:10px;float:right"><a href="#" id="create-gift"><span><i class="fa fa-fw fa-plus"></i></span>Create</a></div>

                            <table  class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>GIVE BACK</th>
                                        <th>AMOUNT</th>                            
                                        <th>CREATED</th>  
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php foreach ($gifts as $gift): ?>
                                    <tr>
                                        <td><?php echo $gift->id;?></td>
                                        <td><?php echo $gift->gift_title;?></td>
                                        <td><?php echo $gift->give_back;?></td>
                                        <td><?php echo $gift->gift_amount;?></td>
                                        <td><?php echo $gift->created;?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm" id="edit-gift" var="<?php echo $gift->id;?>">Edit</a>    
                                            &nbsp;   
                            <?php //echo $this->Html->link('<span><i class="fa fa-fcase"></i></span> Manage', ['controller' => 'profiles','action' => 'campaign', $Campaigns->id],['escape'=>false,'class'=>'btn btn-primary']) ;?>                                
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                    <div class="col-lg-12" id="add-gift" style="display:none">
                        <div class="confirm-msg"></div>
                        <h4>ADD GIVE BACK</h4><br>
                        <div class="row col-lg-6" style="margin-bottom:40px;float:right"><a href="#" id="view-gift"><span><i class="fa fa-fw fa-eye"></i></span>View</a></div>
                        <br>
                        <div class="table-responsive">
                            <form id="gift-form" action="#">
                                <div class="form-group">
                                    <label for="email">TITLE :</label>
                        <?php echo $this->Form->input('campaign_id',['label' => false,'type'=>'hidden','value'=>$CampaignId]) ;?>
                        <?php echo $this->Form->input('gift_title',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                                </div>  
                                <div class="form-group">
                                    <label for="email">GIVE BACK :</label>
                        <?php echo $this->Form->input('give_back',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                                </div>  
                                <div class="form-group">
                                    <label for="email">AMOUNT (Example R1,000):</label>
                        <?php echo $this->Form->input('gift_amount',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                                </div> 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form> 
                        </div>                                       
                    </div>

                    <div class="col-lg-12" id="show-edit-gift" style="display:none">

                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="pdate">
                    <div class="col-lg-12" id="pdate-index">
                        <div class="table-responsive"> 
                            <h3>UPDATES</h3>
                            <div class="row col-lg-6" style="margin-bottom:10px;float:right"><a href="#" id="add-pdate"><span><i class="fa fa-fw fa-plus"></i></span>Add Update</a></div>
                            <table  class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created</th>                                                              
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php foreach ($update as $update): ?>
                                    <tr>
                                        <td><?php echo $update->id;?></td>
                                        <td><?php echo $update->title;?></td>
                                        <td><?php echo $update->description;?></td>                                                                                                               
                                        <td><?php echo $update->created;?></td>

                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm" id="edit-update" var="<?php echo $update->id;?>">Edit</a>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>   
                        </div>
                    </div> 
                    <div class="col-lg-12" id="add-update" style="display:none">
                        <div class="update-msg"></div>
                        <h4>ADD UPDATE</h4><br>
                        <div class="row col-lg-6" style="margin-bottom:40px;float:right"><a href="#" id="view-update"><span><i class="fa fa-fw fa-eye"></i></span>View</a></div>
                        <br>
                        <div class="table-responsive col-lg-12">
                            <form id="update-form" action="#">                                                                   
                                <div class="form-group">

                        <?php echo $this->Form->input('campaign_id',['label' => false,'type'=>'hidden','value'=>$CampId]) ;?>   
                        <?php echo $this->Form->input('title',['label' => 'Title','type'=>'text','class'=>'form-control','required']) ;?> <br>
                        <?php echo $this->Form->input('description',['label' => 'Description','type'=>'textarea','class'=>'form-control','required']) ;?>
                                </div> 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form> 
                        </div>

                    </div>
                    <div class="table-responsive col-lg-12" id="edit-update-v" style="display:none">


                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="mvp">
                    <div class="col-lg-12" id="gift-index">
                        <div class="table-responsive" id="update">
                            <h3>CONTRIBUTORS</h3>
                           <!-- <div class="row col-lg-6" style="margin-bottom:10px;float:right"><a href="#" id="create-gift"><span><i class="fa fa-fw fa-plus"></i></span>Create</a></div>-->

                            <table  class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Payment Type</th>
                                        <th>AMOUNT</th>                            
                                        <th>CREATED</th>  
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php foreach ($Contributors as $Contributor): ?>
                                    <tr>
                                        <td><?php echo $Contributor->name;?></td>
                                        <td><?php echo $Contributor->surname;?></td>
                                        <td><?php echo $Contributor->email;?></td>
                                        <td><?php echo $Contributor->payment_type;?></td>
                                        <td><?php echo "R ".number_format($Contributor->amount, 2, '.', ',');?></td>
                                        <td><?php echo $Contributor->created;?></td>
                                        <td>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>  
                    </div>                   
                </div> 

                <div role="tabpanel" class="tab-pane" id="comment">
                    <div class="col-lg-12" id="gift-index">
                        <div class="table-responsive" id="update">
                            <div class="comment-status"></div>
                            <h3>COMMENTS</h3>
                           <!-- <div class="row col-lg-6" style="margin-bottom:10px;float:right"><a href="#" id="create-gift"><span><i class="fa fa-fw fa-plus"></i></span>Create</a></div>-->

                            <table  class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Comment</th>   
                                        <th>Status</th>
                                        <th>Created</th>  
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php foreach ($comments as $Comment): ?>
                                    <tr>
                                        <td><?php echo $Comment->name;?></td>
                                        <td><?php echo $Comment->surname;?></td>
                                        <td><?php echo $Comment->email;?></td>
                                        <td><?php echo $Comment->comment;?></td>
                                        <td><?php echo $Comment->status;?></td>
                                        <td><?php echo $Comment->created;?></td>
                                        <td>
                                            <!--<input type="checkbox" name="status" data-inverse="true" id="<?php //echo $Comment->id;?>" checked=""/>-->
                                            <div style="margin-bottom:5px" class="make-switch" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                                                <input type="checkbox" name="status" id="<?php echo $Comment->id;?>" <?php if($Comment->status === 'Approved'){echo 'checked';}?>/>
                                            </div>  
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>  
                    </div>                   
                </div>
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

        $(document).on('click', '#create-gift', function () {
            $('#gift-index,#show-edit-gift').hide();
            $('#add-gift').show();
        });
        $(document).on('click', '#add-pdate', function () {
            $('#show-edit-gift,#pdate-index').hide();
            $('#add-update').show();
        });
        $(document).on('click', '#view-update', function () {
            $('#add-gift,#show-edit-gift,#add-update,#edit-update-v').hide();
            $('#pdate-index').show();
        });
        $(document).on('click', '#view-gift', function () {
            $('#add-gift,#show-edit-gift').hide();
            $('#gift-index').show();
        });
        $(document).on('click', '#edit-gift', function () {
            $('#add-gift,#gift-index').hide();
            $('#show-edit-gift').show('fast');
            var id = $(this).attr('var');
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/profiles/edit_gift/'); ?>" + id,
                //data: values,
                success: function (data) {
                    $('#show-edit-gift').html(data);

                }
            });
        });
        $(document).on('submit', '#gift-form', function (event) {
            event.preventDefault();
            var values = $('#gift-form').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/profiles/add_gift'); ?>",
                data: values,
                success: function (data) {
                    $('.confirm-msg').html(data);
                    window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });
        $(document).on('submit', '#edit-gift-form', function (event) {
            event.preventDefault();
            var values = $('#edit-gift-form').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/profiles/update_gift'); ?>",
                data: values,
                success: function (data) {
                    $('.edit-confirm-msg').html(data);
                    window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });

        $(document).on('submit', '#update-form', function (event) {
            event.preventDefault();
            var values = $('#update-form').serialize();
            //var comment = $('textarea[name=comment]').val('');
            $('.update-msg').show();
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/profiles/admin_update'); ?>",
                data: values,
                success: function (data) {
                    $('.update-msg').html(data);
                    window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });

        $(document).on('click', '#edit-update', function () {
            //event.preventDefault();
            var id = $(this).attr('var');
            $('#add-update, #pdate-index').hide();
            $('#edit-update-v').show();
            $.ajax({
                type: "GET",
                url: "<?php echo \Cake\Routing\Router::Url('/profiles/edit_update/'); ?>" + id,
                success: function (data) {
                    $('#edit-update-v').html(data);
                    //window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });

        $(document).on('submit', '#edit-form', function (event) {
            event.preventDefault();
            var values = $('#edit-form').serialize();
            //var comment = $('textarea[name=comment]').val('');
            $('#edit-update-v').hide();
            $('#pdate-index').show();
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/profiles/save_update'); ?>",
                data: values,
                success: function (data) {
                    $('#pdate-index').html(data);
                    //window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });

        $('[name="status"]').bootstrapSwitch({
            offColor: 'danger',
            onColor: 'success',
            onText: 'Approve',
            offText: 'Reject'

        });

        $('[name="status"]').on('switchChange.bootstrapSwitch', function (event, state) {
            var id = $(this).attr('id');
            var status = state;
            $.ajax({type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/profiles/comment_status/'); ?>" + id + "/" + status,
                //data: values,
                success: function (data) {
                    $('.comment-status').html(data);
                    //$("#close-lead-modal" + id).modal('toggle');
                    window.setTimeout('location.reload()', 3000); //Reloads after three seconds
                }
            });
        });
    });




</script>