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
?>

<p>
Good day,<br>
   
Proquest will like you to approve or decline <?php echo $name;?> Proquest account.<br>

Please click on the button below to approve or decline.
</p>
<div>
    <a href="http://proquest.co.za/users/index/<?php echo $campId;?>/<?php echo 'approved';?>" class="btn btn-success">APPROVE</a>
    &nbsp; or  &nbsp;
    <a href="http://proquest.co.za/users/index/<?php echo $campId;?>/<?php echo 'declined';?>" class="btn btn-success">DECLINE</a>
</div>
 
