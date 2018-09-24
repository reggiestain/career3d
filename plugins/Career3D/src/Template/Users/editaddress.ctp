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
    echo $message;
}else{
?>
<div>
  <div class="update-alert"></div>
 <?php echo $this->Form->create($address,['id'=>'address-form','url'=>['controller' => 'users', 'action' => 'editaddress',$address->id]]);?>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="firstname" class="form-label">Address</label>
        <?php echo $this->Form->input('line_1',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                               
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="email" class="form-label">Street</label>
            <?php echo $this->Form->input('line_2',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                             
        </div>   
    </div>
    <div class="row">        
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="career" class="form-label">city</label>    
            <?php echo $this->Form->input('city',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                   
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="surname" class="form-label">Province</label>
            <?php  
            echo $this->Form->select('province_id',$province, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
            ?>
        </div> 
    </div>
    <div class="row">        
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="firstname" class="form-label">Post Code</label>
            <?php echo $this->Form->input('post_code',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                               
        </div>        
    </div>

    <div class="modal-footer">
        <button type="submit" id="bottom-text" class="btn btn-success update-p">Update</button>  
        <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>
<?php } ?>                 
