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
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Career</label>
                  <input type="text" class="form-control"  placeholder="Enter ...">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Description – what is this occupation?</label>
                  <textarea class="form-control" id="summernote" rows="3" placeholder="Enter ..."></textarea>
                </div>
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Typical Job Activities – what will I do in this occupation?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Related Occupations – which occupations are more or less the same?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Educational Requirements - which qualifications do I need to enter this occupation?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                
                <div class="form-group">
                  <label>Entry to Tertiary or Further Studies</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                
                <div class="form-group">
                  <label>Entry to Work Place</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
               

              </form>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>  
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
  $('#summernote').summernote({
            height: 150, //set editable area's height
            placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            },
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']],
                ['mybutton', ['hello']]
            ],
            buttons: {
                hello: HelloButton
            },
            popover: {
                image: [
                    ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow']]
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['mybutton', ['hello']]
                ]
            }
        });      
</script>        