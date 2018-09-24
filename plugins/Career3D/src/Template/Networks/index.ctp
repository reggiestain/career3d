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
<div class="container">  
    <div style="padding-top:40px;" class="alert-msg">

    </div>
    <div class="row">
     <?php echo $this->element('section/left');?>
        <section class="col-md-7">
            <div class="panel panel-white">
                <div class="panel panel-heading" style="font-size:16px">Pending Invitations</div>
                <div class="panel-body">
                    <div class="media">                                     
                        <div class="media-body">
                            <?php foreach ($netwrk as $netwrk):?>
                            <div class="row">
                                <div class="clearfix col-md-6">
                                <?php 
                                if(!empty($netwrk->user->photos[0]->avatar)){
                                          echo $this->Html->image('Career3D.upload/avatar/'.$netwrk->user->photos[0]->avatar,['class'=>'pull-left img-circle','style'=>'width:50px;height:50px;margin-right:10px','alt'=>'Profile image']);
                                          }else {
                                           echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'pull-left img-circle','style'=>'width:60px;height:60px','alt'=>'Profile image']);                               
                                          }
                                   ?>     
                                    <p>
                                        <strong><a href="#"><?php echo $netwrk->user->name;?></a></strong><br>
                                            <?php 
                                            if(!empty($netwrk->user->high_schools[0]->school)){
                                                      echo '<b>High School</b><br>'.$netwrk->user->high_schools[0]->school.'<br>';
                                              }else{
                                                 echo '<br>'; 
                                              }
                                              if(!empty($netwrk->user->tertiaries[0]->institution)){
                                                      echo '<b>Tertiary Education</b><br>'.$netwrk->user->tertiaries[0]->institution;
                                              }else{
                                                  
                                              }
                                    ?>
                                    </p>
                                </div>
                                <div class="col-md-4 act-decide" id="<?php echo $netwrk->id;?>">
                                    <button class="btn btn-default decide" id="<?php echo $netwrk->id;?>">Reject</button>  
                                    <button class="btn btn-primary decide" id="<?php echo $netwrk->id;?>">Accept</button>
                                </div>
                            </div><hr>    
                            <?php endforeach;?>
                        </div>     
                    </div>
                </div>
            </div>

            <div class="panel panel-white">
                <div class="panel panel-heading" style="font-size:16px">People in the same career path</div>
                <div class="panel-body" id="scrollbox3">
                    <div class="media">                                     
                        <div class="media-body">
                            <?php foreach ($users as $user):?>
                            <div class="row">
                                <div class="clearfix col-md-6">
                                <?php 
                                if(!empty($user->user->photos[0]->avatar)){
                                          echo $this->Html->image('Career3D.upload/avatar/'.$user->user->photos[0]->avatar,['class'=>'pull-left','style'=>'width:60px;height:50px;margin-right:10px','alt'=>'Profile image']);
                                          }else {
                                           echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'pull-left','style'=>'width:60px;height:50px','alt'=>'Profile image']);                               
                                          }
                                   ?>     
                                    <p>
                                        <strong><a href="#"><?php echo $user->name;?></a></strong><br>
                                            <?php 
                                            if(!empty($user->user->high_schools[0]->school)){
                                                      echo '<b>High School</b><br>'.$user->user->high_schools[0]->school.'<br>';
                                              }else{
                                                 echo '<br>'; 
                                              }
                                              if(!empty($user->user->tertiaries[0]->institution)){
                                                      echo '<b>Tertiary Education</b><br>'.$user->user->tertiaries[0]->institution;
                                              }else{
                                                  
                                              }
                                            ?>
                                    </p>
                                </div>
                                <div class="col-md-4 act-con" id="<?php echo $user->user->id;?>">
                                    <button class="btn btn-default connect" id="<?php echo $user->user->id;?>">Cancel</button>  
                                    <button class="btn btn-primary connect" id="<?php echo $user->user->id;?>">Connect</button>
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
        <?php echo $this->element('section/right');?>
    </div>


</div>
<script type="text/javascript">
    Dropzone.options.uploadWidget = false;
    Dropzone.options.uploadWidget = {
        paramName: 'file',
        maxFilesize: 2, // MB
        maxFiles: 1,
        uploadMultiple: false,
        //addRemoveLinks: true,
        //dictCancelUploadConfirmation: 'Image has been cancelled.',
        dictDefaultMessage: 'Drag an image here to upload, or click to select one',
        headers: {
            //'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
        },
        acceptedFiles: 'image/*',
        init: function () {

            this.on('addedfile', function (file) {

            });
            this.on('success', function (file, resp) {
                this.removeFile(file);
                $("#profileModal").modal('hide');
            });
            this.on('addedfile', function (file, resp) {

            });
            this.on('maxfilesexceeded', function (file) {
                this.removeFile(file);
            });
            this.on("complete", function (file) {
                location.reload();
            });
            this.on('thumbnail', function (file) {
                if (file.width < 640 || file.height < 480) {
                    file.rejectDimensions();
                }
                else {
                    file.acceptDimensions();
                }
            });
        },
        accept: function (file, done) {
            file.acceptDimensions = function () {
                done();
            }
            file.rejectDimensions = function () {
                done('The image must be at least 640 x 480px')
            };
        }

    };
    $(function () {
        $('#scrollbox3').perfectScrollbar();
    });
    $(document).ready(function () {
        $(".write-post").click(function () {
            $("#postModal").modal();
        });
        $(".connect").click(function () {
            var id = $(this).attr('id');
            var status = $(this).text();
            $.ajax({
                url: '<?php echo Router::url('/career3-d/networks/connect');?>',
                type: "POST",
                asyn: false,
                data: {'network_id': id, 'status': status},
                beforeSend: function () {
                    $("div#" + id).html("<button class='btn btn-default btn-sm'><i class='fa fa-spinner fa-spin'></i> " + status + "ing....</button>");
                },
                success: function (data, textStatus, jqXHR)
                {
                   $('.alert-msg').html(data);                  
                   setTimeout(function () {                        
                       location.reload(1);
                    }, 5000);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
        $(".decide").click(function () {
            var id = $(this).attr('id');
            var status = $(this).text();
            $.ajax({
                url: '<?php echo Router::url('/career3-d/networks/decide/');?>' + id + '/' + status,
                type: "POST",
                asyn: false,
                beforeSend: function () {
                    $("div#" + id).html("<button class='btn btn-default btn-sm'><i class='fa fa-spinner fa-spin'></i> " + status + "ing....</button>");
                },
                success: function (data, textStatus, jqXHR)
                {
                   $('.alert-msg').html(data);                  
                   setTimeout(function () {                        
                       location.reload(1);
                    }, 5000);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

        $('#summernote').summernote({
            height: 150, //set editable area's height
            placeholder: 'Write a post......',
            codemirror: {// codemirror options
                theme: 'monokai'
            },
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
            ]
        });
        $('#post-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#post-form").serialize();
            var url = $("#post-form").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
        //like post action
        $(document).on('click', '.like', function (event) {
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: '<?php echo Router::url('/career3-d/users/like');?>',
                type: "POST",
                asyn: false,
                data: {'post_id': id},
                success: function (data, textStatus, jqXHR)
                {
                    $('.view-post').html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    //location.reload();
                }
            });
        });
        //like comment action
        $(document).on('click', '.like-reply', function (event) {
            event.preventDefault();
            var commentId = $(this).attr('id');
            var postId = $(this).attr('data');
            $.ajax({
                url: '<?php echo Router::url('/career3-d/users/likecomment');?>',
                type: "POST",
                asyn: false,
                data: {'post_id': postId, 'comment_id': commentId},
                success: function (data, textStatus, jqXHR)
                {
                    $('.show-comm' + postId).html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
        $(document).on('click', '.comm', function (event) {
            event.preventDefault();
            var id = $(this).attr('data');
            $.ajax({
                url: '<?php echo Router::url('/career3-d/users/showcomment');?>',
                type: "POST",
                asyn: false,
                data: {'post_id': id},
                success: function (data, textStatus, jqXHR)
                {
                    $('.show-comm' + id).html(data);
                    $('.show-comm' + id).toggle('fast');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
        $(document).on('click', '.post-comm', function () {
            var id = $(this).attr('id');
            var comment = $('input[name=comment' + id + ']').val();
            $.ajax({
                url: '<?php echo Router::url('/career3-d/users/comment');?>',
                type: "POST",
                asyn: false,
                data: {'message': comment, 'post_id': id},
                success: function (data, textStatus, jqXHR)
                {
                    $('#comm' + id).load('<?php echo Router::url('/career3-d/users/countcomment/');?>' + id);
                    $('.show-comm' + id).html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
        //write reply
        $(document).on('click', '.write-reply', function (event) {
            event.preventDefault();
            var id = $(this).attr('data');
            $('#replies' + id).toggle();
            $.ajax({
                url: '<?php echo Router::url('/career3-d/users/showcommentreply');?>',
                type: "POST",
                asyn: false,
                data: {'comment_id': id},
                success: function (data, textStatus, jqXHR)
                {
                    $('#replies' + id).html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
        //submit reply
        $(document).on('click', '.btn-reply', function () {
            var id = $(this).attr('id');
            //var postid = $(this).attr('data');
            var reply = $('input[name=reply' + id + ']').val();
            $.ajax({
                url: '<?php echo Router::url('/career3-d/users/addreply');?>',
                type: "POST",
                asyn: false,
                data: {'reply': reply, 'comment_id': id},
                success: function (data, textStatus, jqXHR)
                {
                    $('#reply' + id).load('<?php echo Router::url('/career3-d/users/countreply/');?>' + id);
                    $('#replies' + id).html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });
    });
</script>