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

   <?php foreach ($post as $post): ?>   
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <?php if(!empty($post->user->photos[0]->avatar)){
                                echo $this->Html->image('Career3D.upload/avatar/'.$post->user->photos[0]->avatar,['class'=>'card-img-top img-circle','style'=>'width:100px;height:100px','alt'=>'Profile image']);
                               }else {
                            echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'card-img-top img-circle','style'=>'width:100px;height:100px','alt'=>'Profile image']);                               
                          }
                    ?>
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b><?php echo $post->user->firstname.' '.$post->user->surname;?></b></a>
                            made a post.
                        </div>
                        <h6 class="text-muted time"> <?php echo $this->Time->timeAgoInWords($post->created);?></h6>
                    </div>

                </div>                
                <div class="post-description"> 
                    <p><?php echo $post->content;?></p>
                    <div >
                        <a href="#" class="like" id="<?php echo $post->id;?>">
                        <?php if(!empty($post->likes)){echo $post->likes[0]->total;   
                        }else{
                           echo'0 ';
                        }
                        ?> likes
                        </a> 
                        <a href="#" class="comm" id="comm<?php echo $post->id;?>" data="<?php echo $post->id;?>" style="margin-left:60px">
                        <?php if(!empty($post->comments)){echo count($post->comments).' ';   
                        }else{
                           echo'0 ';
                        }
                        ?>comment</a>
                    </div>
                    <div class="stats">                        
                        <a href="#" class="btn btn-default stat-item like" id="<?php echo $post->id;?>">
                            <i class="fa fa-thumbs-up icon"></i>Like
                        </a>
                        <a href="#" class="btn btn-default stat-item comm" id="<?php echo $post->id;?>" data="<?php echo $post->id;?>">
                            <i class="fa fa-comment icon"></i>Comment
                        </a>
                        <a href="#" class="btn btn-default stat-item reply" id="<?php echo $post->id;?>">
                            <i class="fa fa-share icon"></i>Share
                        </a>
                    </div>
                </div>    
                <div class="post-footer show-comm<?php echo $post->id;?>" style="display: none"> 
                    
                    
                </div>
            </div>
            <?php endforeach; ?>