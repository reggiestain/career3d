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
<style>
    #custom-search-input {
        background: #e8e6e7 none repeat scroll 0 0;
        margin: 0;
        padding: 10px;
    }
    #custom-search-input .search-query {
        background: #fff none repeat scroll 0 0 !important;
        border-radius: 4px;
        height: 33px;
        margin-bottom: 0;
        padding-left: 7px;
        padding-right: 7px;
    }
    #custom-search-input button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: 0 none;
        border-radius: 3px;
        color: #666666;
        left: auto;
        margin-bottom: 0;
        margin-top: 7px;
        padding: 2px 5px;
        position: absolute;
        right: 0;
        z-index: 9999;
    }
    .search-query:focus + button {
        z-index: 3;   
    }
    .all_conversation button {
        background: #f5f3f3 none repeat scroll 0 0;
        border: 1px solid #dddddd;
        height: 38px;
        text-align: left;
        width: 100%;
    }
    .all_conversation i {
        background: #e9e7e8 none repeat scroll 0 0;
        border-radius: 100px;
        color: #636363;
        font-size: 17px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        width: 30px;
    }
    .all_conversation .caret {
        bottom: 0;
        margin: auto;
        position: absolute;
        right: 15px;
        top: 0;
    }
    .all_conversation .dropdown-menu {
        background: #f5f3f3 none repeat scroll 0 0;
        border-radius: 0;
        margin-top: 0;
        padding: 0;
        width: 100%;
    }
    .all_conversation ul li {
        border-bottom: 1px solid #dddddd;
        line-height: normal;
        width: 100%;
    }
    .all_conversation ul li a:hover {
        background: #dddddd none repeat scroll 0 0;
        color:#333;
    }
    .all_conversation ul li a {
        color: #333;
        line-height: 30px;
        padding: 3px 20px;
    }
    .member_list .chat-body {
        margin-left: 47px;
        margin-top: 0;
    }
    .top_nav {
        overflow: visible;
    }
    .member_list .contact_sec {
        margin-top: 3px;
    }
    .member_list li {
        padding: 6px;
    }
    .member_list ul {
        border: 1px solid #dddddd;
    }
    .chat-img img {
        height: 34px;
        width: 34px;
    }
    .member_list li {
        border-bottom: 1px solid #dddddd;
        padding: 6px;
    }
    .member_list li:last-child {
        border-bottom:none;
    }
    .member_list {
        height: 380px;
        overflow-x: hidden;
        overflow-y: auto;
    }
    .sub_menu_ {
        background: #e8e6e7 none repeat scroll 0 0;
        left: 100%;
        max-width: 233px;
        position: absolute;
        width: 100%;
    }
    .sub_menu_ {
        background: #f5f3f3 none repeat scroll 0 0;
        border: 1px solid rgba(0, 0, 0, 0.15);
        display: none;
        left: 100%;
        margin-left: 0;
        max-width: 233px;
        position: absolute;
        top: 0;
        width: 100%;
    }
    .all_conversation ul li:hover .sub_menu_ {
        display: block;
    }
    .new_message_head button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
    }
    .new_message_head {
        background: #f5f3f3 none repeat scroll 0 0;
        float: left;
        font-size: 13px;
        font-weight: 600;
        padding: 18px 10px;
        width: 100%;
    }
    .message_section {
        border: 1px solid #dddddd;
    }
    .chat_area {
        float: left;
        height: 300px;
        overflow-x: hidden;
        overflow-y: auto;
        width: 100%;
    }
    .chat_area li {
        padding: 14px 14px 0;
    }
    .chat_area li .chat-img1 img {
        height: 40px;
        width: 40px;
    }
    .chat_area .chat-body1 {
        margin-left: 50px;
    }
    .chat_area .chat-body2 {
        margin-right: 50px;
    }
    .chat-body1 p {
        background: #fbf9fa none repeat scroll 0 0;
        padding: 10px;
    }
    
    .chat-body2 p {
        background: #fbf9fa none repeat scroll 0 0;
        padding: 10px;
    }
    .chat_area .admin_chat .chat-body1 {
        margin-left: 0;
        margin-right: 50px;
    }
    .chat_area li:last-child {
        padding-bottom: 10px;
    }
    .message_write {
        background: #f5f3f3 none repeat scroll 0 0;
        float: left;
        padding: 15px;
        width: 100%;
    }

    .message_write textarea.form-control {
        height: 70px;
        padding: 10px;
    }
    .chat_bottom {
        float: left;
        margin-top: 13px;
        width: 100%;
    }
    .upload_btn {
        color: #777777;
    }
    .sub_menu_ > li a, .sub_menu_ > li {
        float: left;
        width:100%;
    }
    .member_list li:hover {
        background: #428bca none repeat scroll 0 0;
        color: #fff;
        cursor:pointer;
    }    
</style>
<div class="container">  
    <div style="padding-top:50px;" class="alert-msg"> </div>
    <div class="row">
     <?php //echo $this->element('section/messages');?>
        <section class="col-md-10" style='background:'>
            <div class="main_section profile-sec">
                <div class="chat_container">
                    <div class="col-sm-3 chat_sidebar">
                        <div class="row">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="  search-query form-control" placeholder="Conversation" />
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="dropdown all_conversation">
                                <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-weixin" aria-hidden="true"></i>
                                    All Conversations
                                    <span class="caret pull-right"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                     <!--
                                    <li><a href="#"> All Conversation </a>                                       
                                        <ul class="sub_menu_ list-unstyled">
                                            <li><a href="#"> All Conversation </a> </li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                       
                                    </li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li><a href="#">Separated link</a></li>
                                         -->
                                </ul>
                            </div>
                            <div class="member_list">
                                <ul class="list-unstyled">
                                    <?php foreach ($chats as $chat): ?><?php //var_dump($chat)?>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                         <?php 
                                            if(!empty($chat->avatar)){
                                          echo $this->Html->image('Career3D.upload/avatar/'.$chat->avatar,['class'=>'img-circle','alt'=>'Profile image']);
                                          }else {
                                           echo $this->Html->image('Career3D.upload/avatar/profile.jpg',['class'=>'img-circle','alt'=>'Profile image']);                               
                                          }
                                         ?>   

                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header_sec" user="<?php echo $chat->user_id;?>" toid="<?php echo $chat->to_id;?>" msgid="<?php echo $chat->id;?>">
                                                <strong class="primary-font"><?php echo $chat->sender;?></strong> <strong class="primary-font"> </strong> 
                                                
                                                <?php if($chat->status === 'new'){
                                                   echo "<span class='badge pull-right' style='background:green !important'>".
                                                             count($chat->status).
                                                        "</span><br>";
                                                        }
                                                ?>
                                               
                                                        <?php if (strlen($chat->message) > 30){
                                                                 echo substr($chat->message, 0, 20) . '  <a href="#">ReadMore...</a>';
                                                                }else {
                                                                 echo $chat->min.'...';  
                                                                }
                                                                ?>
                                                <br>        
                                                        <?php echo $this->Time->nice($chat->created);?>
                                            </div>
                                            <div class="contact_sec">

                                            </div>
                                        </div>
                                    </li>
                                       <?php endforeach;?>
                                </ul>
                            </div></div>
                    </div>
                    <!--chat_sidebar-->


                    <div class="col-sm-9 message_section">
                        <div class="row">
                            <div class="new_message_head">
                                <div class="pull-left" id="new-message"><button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div><div class="pull-right"><div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cogs" aria-hidden="true"></i>  Setting
                                            <span class="caret"></span>
                                        </button>
                                        <!--
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Profile</a></li>
                                            <li><a href="#">Logout</a></li>
                                        </ul>
                                        -->
                                    </div></div>
                            </div><!--new_message_head-->
                            <div class="msg-list">
                            
                        </div>
                        </div>
                    </div> <!--message_section-->
                </div>
            </div>
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
            },
                    file.rejectDimensions = function () {
                        done('The image must be at least 640 x 480px')
                    };
        }

    };

    $(document).ready(function () {
        $(".chat_area").niceScroll({cursorcolor:"#0F0"});
        $("#new-message").click(function () {
            $("#messageModal").modal();
        });
        
        var output = document.getElementById('wait');

        var userId = $(".header_sec").attr('user');
        var toId = $(".header_sec").attr('toid');
        var msgId = $(".header_sec").attr('msgid');
        
        if (userId && toId) {
            $.ajax({
                url: '<?php echo Cake\Routing\Router::url('/career3-d/messages/messagelist/')?>'+ userId+'/'+toId+'/'+msgId,
                type: "GET",
                asyn: false,
                beforeSend: function () {
                    $('.msg-list').html(output.innerHTML);
                },
                success: function (data, textStatus, jqXHR)
                {
                    $(".msg-list").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        }

        $(document).on('click', '.send-msg', function (e) {
            e.preventDefault();
            var reply = $('textarea[name="msg_reply"]').val();
            var toId  = $(this).attr('to_id');
            if (reply) {
                $.ajax({
                    url: '<?php echo Router::url('/career3-d/messages/reply');?>',
                    type: "POST",
                    asyn: false,
                    data: {'reply': reply,'to_id':toId},
                    beforeSend: function () {
                    $('.send-msg').text('Sending...');
                     },
                    success: function (data, textStatus, jqXHR)
                    {
                        //$('.msg-list').html(data);
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            } else {
               alert('Please enter a reply.');
            }
        });

        $(document).on('click', '.header_sec', function (event) {
            var userId = $(this).attr('user');
            var toId = $(this).attr('toid');
            var msgId = $(this).attr('msgid');
            $.ajax({
                url: "<?php echo Cake\Routing\Router::url('/career3-d/messages/messagelist/')?>"+ userId+'/'+toId+'/'+msgId,
                type: "GET",
                asyn: false,
                beforeSend: function () {
                   // $('.msg-list').html(output.innerHTML);
                    location.reload();
                },
                success: function (data, textStatus, jqXHR)
                {
                    $(".msg-list").html(data);
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

        //Submit message form
        $(document).on('submit', '#message-form', function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '500') {
                        $('.modal-msg').html("<div class='alert alert-success'><strong>success! </strong>Message has been sent successfully.</div>");
                        setTimeout(function () {
                            location.reload(1);
                        }, 5000);
                    } else {
                        $('.modal-msg').html(data);

                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
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