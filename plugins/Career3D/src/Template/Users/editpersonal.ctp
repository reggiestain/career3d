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
    <?php echo $this->Form->create($profile,['id'=>'info-form','url'=>['controller' => 'users', 'action' => 'editpersonal',$profile->id]]);?>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="firstname" class="form-label">First Name</label>
                                <?php echo $this->Form->input('firstname',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                               
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="surname" class="form-label">Surname</label>
                                <?php echo $this->Form->input('surname',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                   
        </div>    
    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="email" class="form-label">Email Address</label>
                                <?php echo $this->Form->input('email',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                             
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="phone" class="form-label">Phone Number</label>
                                <?php echo $this->Form->input('mobile',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
        </div>                            
    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">    
            <label for="date_of_birth" class="form-label">Date of birth</label>   
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                
                            <?php echo $this->Form->input('birth_date',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control datepicker','id'=>'b-date','required'=>false, 'error' => true]);?>
            </div>              
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="career" class="form-label">Gender</label>    
                        <?php  
                        $gender = ['Male'=>'Male','Female'=>'Female'];
                        echo $this->Form->select('gender',$gender, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                        ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="gender" class="form-label">Province</label>    
                        <?php          
                        echo $this->Form->select('province_id',$province, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                        ?>
        </div> 
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="career" class="form-label">Career Path</label>    
                        <?php          
                        echo $this->Form->select('career_id',$careers, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                        ?>
        </div>
    </div> 
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="gender" class="form-label">Driver’s License</label>    
                        <?php          
                        $lic = ['Yes'=>'Yes','No'=>'No'];
                        echo $this->Form->select('drivers_lic',$lic, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                        ?>
        </div> 
    </div>
    <div class="modal-footer">
        <button type="submit" id="bottom-text" class="btn btn-success update-p">Update</button>  
        <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>
<?php } ?>      


<script>
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
}); 

$(document).ready(function(){
  $('#b-date').datepicker();
  
});
</script>
