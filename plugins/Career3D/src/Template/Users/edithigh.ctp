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

<?php 

if($status ==='500'){
    echo $status;
}else{
?>
<div>
    <div class="update-alert"></div>
 <?php echo $this->Form->create($high,['id'=>'high-form','url'=>['controller' => 'users', 'action' => 'edithigh',$high->id]]);?>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="firstname" class="form-label">School</label>
             <?php echo $this->Form->input('school',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                               
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="career" class="form-label">Subjects</label>    
             <?php echo $this->Form->select('subjects._ids',$subject, ['empty' => '--Choose One--','class'=>'multiselect-ui form-control','label'=>false,'required'=>false, 'error' => true,'multiple'=>'multiple']);?>                                 
        </div>            
    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">    
            <label for="" class="form-label">Start Date</label>   
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                
        <?php echo $this->Form->input('end_date',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control datepicker1','id'=>'date1','required'=>false, 'error' => true]);?>
            </div>              
        </div>    
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">    
            <label for="" class="form-label">End Date</label>   
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                
        <?php echo $this->Form->input('end_date',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control datepicker2','id'=>'date2','required'=>false, 'error' => true]);?>
            </div>              
        </div>                                        
    </div>    
    <div class="modal-footer">
        <button type="submit" id="bottom-text" class="btn btn-success update-p">Update</button>  
        <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>
<?php } ?>

<script>
    $(".multiselect-ui").select2({
        theme: "classic"
    });

   $(document).ready(function () {
        $('#date1').datepicker();
        $('#date2').datepicker();
    });
</script>
