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

<div class="avatar">
    <?php echo $this->Html->image('Career3D.upload/avatar/'.$img->avatar,['class'=>'card-img-top img-circle','alt'=>'Profile image']);?>
    <div class="middle">
        <div class="text profile-image">
            <span class="glyphicon glyphicon-camera" data-toggle="tooltip" data-placement="right" title="Update Profile Picture"></span>
        </div>   
    </div>
</div>