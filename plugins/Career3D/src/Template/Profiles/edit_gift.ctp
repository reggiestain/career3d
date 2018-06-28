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
<div class="edit-confirm-msg"></div> 
 <h4>EDIT GIVE BACK</h4><br>
                    <div class="row col-lg-6" style="margin-bottom:40px;float:right"><a href="#" id="view-gift"><span><i class="fa fa-fw fa-eye"></i></span>View</a></div>
                    <br>
                    <div class="table-responsive">
                    <?php echo $this->Form->create($Egifts,['id'=>'edit-gift-form','url'=>['controller'=>'profiles','action'=>'save_gift']]);?>
                        <div class="form-group">
                        <label>TITLE :</label>
                        <?php echo $this->Form->input('id',['label' => false,'type'=>'hidden']) ;?>
                        <?php echo $this->Form->input('gift_title',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                        </div>  
                        <div class="form-group">
                        <label>GIVE BACK :</label>
                        <?php echo $this->Form->input('give_back',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                        </div>  
                        <div class="form-group">
                        <label>AMOUNT :</label>
                        <?php echo $this->Form->input('gift_amount',['label' => false,'type'=>'text','class'=>'form-control','required']) ;?>
                        </div> 
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    <?php echo $this->Form->end();?>
                    </div> 