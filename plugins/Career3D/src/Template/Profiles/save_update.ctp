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
<div class="table-responsive"> 
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert"></button>
        Success: This
        <a class="link" href="#">Update Info</a>
        has been updated successfully.
    </div>
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
