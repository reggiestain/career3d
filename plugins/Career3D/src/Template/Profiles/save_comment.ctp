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
<?php if($message ==='Your comment has been submitted successfully.'){?>
<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
Success:
<a class="link" href="#">Your comment</a>
 has been submitted successfully, we will contact you by email when this comment is approved.
</div>
<?php }?>

<?php if($message ==='Your comment was not submitted, please try again.'){?>
<div class="alert alert-error">
<button class="close" data-dismiss="alert"></button>
Error: An error 
<a class="link" href="#">Occurred,</a>
please try again.
</div>
<?php };?>

<?php if($message ==='Your comment has been submitted successfully.'){?>
<div class="alert alert-error">
<button class="close" data-dismiss="alert"></button>
This Email address is already in use,
<a class="link" href="#">please enter a different email. </a>
please try again.
</div>
<?php };?>
