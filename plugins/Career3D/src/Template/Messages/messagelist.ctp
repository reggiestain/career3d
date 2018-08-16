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
                         <div class="chat_area">
                                <ul class="list-unstyled ">
                                <?php foreach ($messages as $message){?>

    <?php if($message->reply === 'yes'){?>
    <li class="right clearfix">
    <span class="chat-img1 pull-right">        
        <?php    
         if(!empty($message->avatar)){
                echo $this->Html->image('Career3D.upload/avatar/'.$message->avatar,['class'=>'img-circle','alt'=>'Profile image']);
                }else {
                 echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'img-circle','alt'=>'Profile image']);                               
                }
     ?>   
    </span>
    <div class="chat-body2 clearfix">
        <p>
        <?php echo $message->message;?><div class="chat_time pull-right">
        <a href="#"><?php echo $this->Time->nice($message->created);?></a>
    </div>
    </div>
    </li>    
    <?php } else { ?>
    <li class="left clearfix">
    <span class="chat-img1 pull-left">        
    <?php    
         if(!empty($message->avatar)){
                echo $this->Html->image('Career3D.upload/avatar/'.$message->avatar,['class'=>'img-circle','alt'=>'Profile image']);
                }else {
                 echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'img-circle','alt'=>'Profile image']);                               
                }
     ?>   
    </span>
    <div class="chat-body1 clearfix">
        <p>
        <?php echo $message->message;?>
        <div class="chat_time pull-left">
            <a href="#"><?php echo $this->Time->nice($message->created);?></a>
        </div>
    </div>
    </li>
    <?php } ?>
<?php }?>

                                </ul>
                            </div><!--chat_area-->
                            <div class="message_write">
                                <textarea class="form-control" placeholder="type a message" name="msg_reply"></textarea>
                                <div class="clearfix"></div>
                                <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                        Add Files</a>
                                    <a href="#" class="pull-right btn btn-success send-msg" to_id="<?php echo $toId;?>">
                                        Send</a>
                                </div>
                            </div>
 

