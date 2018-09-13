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

<style>
 body{margin:50px;}
      #accordion .glyphicon { margin-right:10px; }
      .panel-collapse>.list-group .list-group-item:first-child {border-top-right-radius: 0;border-top-left-radius: 0;}
      .panel-collapse>.list-group .list-group-item {border-width: 1px 0;}
      .panel-collapse>.list-group {margin-bottom: 0;}
      .panel-collapse .list-group-item {border-radius:0;}

      .panel-collapse .list-group .list-group {margin: 0;margin-top: 10px;}
      .panel-collapse .list-group-item li.list-group-item {margin: 0 -15px;border-top: 1px solid #ddd !important;border-bottom: 0;padding-left: 30px;}
      .panel-collapse .list-group-item li.list-group-item:last-child {padding-bottom: 0;}

      .panel-collapse div.list-group div.list-group{margin: 0;}
      .panel-collapse div.list-group .list-group a.list-group-item {border-top: 1px solid #ddd !important;border-bottom: 0;padding-left: 30px;}
      .panel-collapse .list-group-item li.list-group-item {border-top: 1px solid #DDD !important;}   
</style>

<?php echo $this->element('Career3D.mentor/header');?>
<!-- Left side column. contains the logo and sidebar -->
<?php echo $this->element('Career3D.mentor/sidebar');?>  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Test
            <small>Preview</small>
        </h1>
        <!-- <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li><a href="#">Forms</a></li>
           <li class="active">General Elements</li>
         </ol>
        -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- right column -->
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Test Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>  
              <?php echo $this->Flash->render();?>
              <?php echo $this->Form->create($test);?>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Test Name</label>
                  <?php echo $this->Form->input('name',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>true, 'error' => true]);?> 
                            </div>
                            <div class="form-group">
                                <label>Test Description</label>                
                  <?php echo $this->Form->textarea('description',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-1','required'=>false, 'error' => true]);?>                 
                            </div> 
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                                                        </span>Content</a>
                                                </h4>
                                            </div>
                                            
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                                                        </span>Reports</a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item">
                                                        Cras justo odio
                                                    </a>
                                                    <div class="list-group">
                                                        <a href="#" class="list-group-item">
                                                            Cras justo odio
                                                        </a>
                                                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                                                        <a href="#" class="list-group-item">Morbi leo risus</a>
                                                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                                                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                                                    </div>
                                                    <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                                                    <a href="#" class="list-group-item">Morbi leo risus</a>
                                                    <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                                                    <a href="#" class="list-group-item">Vestibulum at eros</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-heart">
                                                        </span>Reports</a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                                    </a>
                                                </div>
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item active">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                                    </a>
                                                </div>
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-md-9">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Dashboard</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>Admin Dashboard Accordion List Group Menu</p>
                                            <div class="alert alert-success"><h3>Yes! It's compatible with BS 3.0.3, 3.1 & 3.2 </h3></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="box-footer">
                    <!--<button class="btn btn-default">Cancel</button>-->
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div> 

              <?php echo $this->Form->end();?>  


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function () {


        $('#reg-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#reg-form").serialize();
            var url = $("#reg-form").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#regModal").modal('hide');
                        $(".log-alert").html("<div class='alert alert-success'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>Success!</strong> Registration was successful, please login with your email and password.</div>");
                        $("#loginModal").modal('show');
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

        $('#logi-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#login-form").serialize();
            var url = $("#login-form").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#loginModal").modal('hide');
                        //window.location.href ="<?php //echo Router::url('career3-d/users/dashboard');?>";
                    } else {
                        $(".log-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

    });
</script>      