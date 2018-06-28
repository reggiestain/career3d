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
<?php if(!empty($comments)){?>
<?php foreach ($comments as $comment): ?>
<ul class="comments-list">
    <li class="comment">
        <a class="pull-left" href="#">       
        <?php if(!empty($comment->user->photos[0]->avatar)){
                                  echo $this->Html->image('Career3D.upload/avatar/'.$comment->user->photos[0]->avatar,['class'=>'avatar','alt'=>'Profile image']);
                               }else {
                            echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'avatar','style'=>'width:50px;height:50px','alt'=>'Profile image']);                               
                          }
        ?> 
        
        </a>                             
        <div class="comment-body">
            <div class="comment-heading">
                <h4 class="user"><?php echo $comment->user->firstname.' '.$comment->user->surnname;?></h4>
                <h5 class="time"><?php echo $this->Time->timeAgoInWords($comment->created);?></h5>
            </div>
            <p><?php echo $comment->message;?></p>
            <div>
                <a href="#" class="like-reply" data="<?php echo $comment->post_id;?>" id="<?php echo $comment->id;?>"><?php echo count($comment->comment_likes);?> Like</a>&nbsp;|&nbsp;<a href="#" class="write-reply" id="comm<?php echo $comment->id;?>" data="<?php echo $comment->id;?>"> <?php echo count($comment->comment_replies);?> Reply</a> 
            </div>
        </div>
        <ul class="comments-list" id="replies<?php echo $comment->id;?>" style="display:none">        
        
        </ul>        
    </li>
</ul>
<?php endforeach;?>
<?php } ?>
<div class="input-group"> 
    <input class="form-control" placeholder="comment...." name="comment<?php echo $postId;?>" type="text">
    <span class="input-group-addon">
        <a href="#"><i class="fa fa-edit"></i></a>  
    </span>                        
</div>
<div class="form-group" style="margin-top:4px">
    <button class="btn btn-primary btn-sm post-comm" id="<?php echo $postId;?>">Post</button>
</div>