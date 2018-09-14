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

<style>

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
        <?php echo $test->name;?> Questions
            <small>View</small>
        </h1>
        <!--  
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Tables</a></li>
          <li class="active">Data tables</li>
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
                        <h3 class="box-title">Question Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
              <?php echo $this->Flash->render();?>
               <?php echo $this->Form->create($test);?>
                        <!-- text input -->

                        <div class="form-group">                             
                            <div class="col-sm-3 col-md-3">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="ques-opt" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="1">
                                                    <!--<i class="fa fa-chec fa-spin fa-3x fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">Refreshing...</span>-->
                                                    <span style="margin-right:10px">
                                                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                    </span>Multiple Choice
                                                </a>
                                            </h4>
                                        </div>

                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="ques-opt" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="2">
                                                    <span style="margin-right:10px">
                                                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                    </span>Multiple Checkbox</a>
                                            </h4>
                                        </div>

                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="ques-opt" data-toggle="collapse" data-parent="#accordion"  href="#collapseThree" id="3">
                                                    <span style="margin-right:10px"> 
                                                        <i class="fa fa-bars" aria-hidden="true"></i>    
                                                    </span>Match the Folllowing</a>
                                            </h4>
                                        </div>                                           
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="ques-opt" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" id="4">
                                                    <span style="margin-right:10px">
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                                    </span>True or False</a>
                                            </h4>
                                        </div>                                           
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="ques-opt" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" id="5">
                                                    <span style="margin-right:10px">
                                                        <i class="fa fa-file-o" aria-hidden="true"></i>
                                                    </span>Fill in the Blanks</a>
                                            </h4>
                                        </div>                                           
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="ques-opt" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" id="6">
                                                    <span style="margin-right:10px">
                                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                                    </span>Essay</a>
                                            </h4>
                                        </div>                                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-9">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Dashboard</h3>
                                    </div>
                                    <div class="panel-body question-info">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row box-footer">

                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div> 

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

        $('.ques-opt').click(function (event) {
            event.preventDefault();
            var opt = $(this).attr('id');
            $.ajax({
                url: "<?php echo Router::url('career3-d/tests/question_dash/');?>"+opt,
                type: "GET",
                asyn: false,
                beforeSend: function () {
                    $(".question-info").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
                },

                success: function (data, textStatus, jqXHR)
                {                    
                     $(".question-info").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

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

