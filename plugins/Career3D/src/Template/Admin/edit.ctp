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

<?php echo $this->element('Career3D.mentor/header');?>
      <!-- Left side column. contains the logo and sidebar -->
<?php echo $this->element('Career3D.mentor/sidebar');?>  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Career Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo $this->Flash->render();?>
              <?php echo $this->Form->create($career);?>
                <!-- text input -->
                <div class="form-group">
                  <label>Career</label>
                  <?php echo $this->Form->input('name',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>true, 'error' => true]);?> 
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Description – what is this occupation?</label>                
                  <?php echo $this->Form->textarea('description',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-1','required'=>false, 'error' => true]);?>                 
                </div>               
                <!-- textarea -->
                <div class="form-group">
                  <label>Typical Job Activities – what will I do in this occupation?</label>
                  <?php echo $this->Form->textarea('job_activities',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-2','required'=>false, 'error' => true]);?> 
                </div>
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Related Occupations – which occupations are more or less the same?</label>
                  <?php echo $this->Form->textarea('related_occupations',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-3','required'=>false, 'error' => true]);?>               
                </div>                
                <!-- textarea -->
                <div class="form-group">
                  <label>Educational Requirements - which qualifications do I need to enter this occupation?</label>
                  <?php echo $this->Form->textarea('educational_req',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-4','required'=>false, 'error' => true]);?>                              
                  </div>                
                
                <div class="form-group">
                  <label>What level of natural skill and/or aptitude do I need for this occupation?</label>
                   <?php echo $this->Form->textarea('level_of_skills',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-7','required'=>false, 'error' => true]);?>                                                                
                </div>
                
                <div class="form-group">
                  <label>Employment Indicators – what are the important employment facts regarding this occupation</label>
                   <?php echo $this->Form->textarea('employment_indicators',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-8','required'=>false, 'error' => true]);?>                                                                
                </div>
                
                <div class="form-group">
                  <label>Possible Employers – where do I find this occupation?</label>
                   <?php echo $this->Form->textarea('possible_employers',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-9','required'=>false, 'error' => true]);?>                                                                
                </div>
                
                <div class="form-group">
                  <label>Relevant Contact Details – where can I get more information on this occupation?</label>
                   <?php echo $this->Form->textarea('contact_details',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-10','required'=>false, 'error' => true]);?>                                                                
                </div>
                
                <div class="form-group">
                  <label>Activities to enhance career progress – what can I do to improve my career progress in this occupation?</label>
                   <?php echo $this->Form->textarea('career_progress',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-11','required'=>false, 'error' => true]);?>                                                                
                </div>
                
                <div class="form-group">
                  <label>Employment Stability</label>
                   <?php echo $this->Form->textarea('emp_stability',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-12','required'=>false, 'error' => true]);?>                                                                
                </div>
                
                <div class="form-group">
                  <label>Possible reasons to consider this career – I should consider this career if I want a job where:</label>
                   <?php echo $this->Form->textarea('career_consideration',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','id'=>'summernote-13','required'=>false, 'error' => true]);?>                                                                
                </div>
               
               
              <div class="box-footer">
                <button class="btn btn-default">Cancel</button>
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

        $('#summernote-1').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-2').summernote({
            height: 150, //set editable area's height
           // placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-3').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-4').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-7').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-8').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-9').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-10').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-11').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-12').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
        });
        
        $('#summernote-13').summernote({
            height: 150, //set editable area's height
            //placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            }
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