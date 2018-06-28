<?php
//use Cake\Routing\Router;
?>

<section class="col-md-4">
    <div class="panel panel-white">
        <div class="panel panel-heading" style="font-size:16px">Messaging <i id="write-message" class="pull-right fa fa-edit fa-lg" aria-hidden="true"></i></div>
        <div class="panel-body">
            <div class="media">                                     
                <div class="media-body">
                    <?php foreach ($chats as $chat):?>
                    <div class="row">
                        <div class="clearfix col-md-12">
                                <?php 
                                if(!empty($chat->user->photos[0]->avatar)){
                                          echo $this->Html->image('Career3D.upload/avatar/'.$chat->user->photos[0]->avatar,['class'=>'pull-left','style'=>'width:50px;height:50px;margin-right:10px','alt'=>'Profile image']);
                                          }else {
                                           echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'pull-left','style'=>'width:50px;height:50px;margin-right:10px','alt'=>'Profile image']);                               
                                          }
                                   ?>     
                            <p style="margin-left:20px !important">
                                <strong><a href="#"><?php echo $chat->user->name;?></a></strong> &nbsp;<?php echo $this->Time->nice($chat->created);?><br>
                                                    <?php if (strlen($chat->message) > 30){
                                                     echo substr($chat->message, 0, 20) . ' ReadMore...';
                                                    }else {
                                                     echo $chat->message.'...';  
                                                    }
                                                    ?>
                            </p>
                        </div>
                    </div><hr>    
                            <?php endforeach;?>
                </div>     
            </div>    
        </div>   
    </div>
    <!--<div class="panel-footer">
        <button class="btn btn-default write-post"><span class="fa fa-edit"> Write a post</span></button>  
        <button class="btn btn-default"><span class="fa fa-camera"></span></button>
        <button class="btn btn-primary pull-right">Post</button>
    </div>
    -->
</section> 