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

<?php foreach($commentreply as $replies):?>
<li class="comment">
    <a class="pull-left" href="#">                         
                <?php if(!empty($replies->user->photos[0]->avatar)){
                                echo $this->Html->image('Career3D.upload/avatar/'.$replies->user->photos[0]->avatar,['class'=>'avatar','alt'=>'Profile image']);
                               }else {
                            echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'avatar','style'=>'width:50px;height:50px','alt'=>'Profile image']);                               
                          }
        ?> 
    </a>
    <div class="comment-body">
        <div class="comment-heading">
            <h4 class="user"><?php echo $replies->user->name ;?></h4>
            <h5 class="time"><?php echo $this->Time->timeAgoInWords($replies->created);?></h5>
        </div>
        <p><?php echo $replies->reply;?></p>                        
    </div>
</li>            
<?php endforeach;?>
<div>
<input class="form-control" placeholder="add reply...." name="reply<?php echo $commentId;?>" type="text">
<button class="btn btn-primary btn-sm btn-reply" data="<?php //echo $comment->post_id;?>" id="<?php echo $commentId;?>" style="margin-top:4px">Reply</button>
</div> 

