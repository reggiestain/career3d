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
    <div style="padding-top:50px;"> </div>
    <div class="row">
        <?php echo $this->element('section/left'); ?>
        <section class="col-md-7" style="overflow: auto;" id="scroll">
            <div class="panel panel-white" id="scroll">
                <div class="panel-body">
                    Share a post, photo or update   
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default write-post"><span class="fa fa-edit"> Write a post</span></button>  
                    <button class="btn btn-default"><span class="fa fa-camera"></span></button>
                    <button class="btn btn-primary pull-right">Post</button>
                </div>
            </div>
            <!-- Post Modal -->
            <div id="postModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->      
                    <?php echo $this->Form->create(null, ['id' => 'post-form', 'url' => ['controller' => 'users', 'action' => 'publish']]); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">    
                                <?php
                                echo $this->Form->select('topic_id', $topics, ['empty' => '--Choose Subject--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                                ?> 
                            </div>  
                        </div>
                        <div class="modal-body">                           
                            <textarea class="input-block-level" id="summernote" name="content">
                            </textarea>
                            <div class="modal-footer">
                                <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Cancel</button>   
                                <button type="submit" id="bottom-text" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>

                </div>
            </div> 
            <div class="view-post">
                <?php foreach ($post as $post): ?>   
                    <div class="panel panel-white post panel-shadow">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <?php
                                if (!empty($post->user->photos[0]->avatar)) {
                                    echo $this->Html->image('Career3D.upload/avatar/' . $post->user->photos[0]->avatar, ['class' => 'card-img-top img-circle', 'style' => 'width:100px;height:100px', 'alt' => 'Profile image']);
                                } else {
                                    echo $this->Html->image('Career3D.upload/avatar/profile.jpg', ['class' => 'card-img-top img-circle', 'style' => 'width:100px;height:100px', 'alt' => 'Profile image']);
                                }
                                ?>
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b><?php echo $post->user->firstname . ' ' . $post->user->surname; ?></b></a>
                                    made a post.
                                </div>
                                <h6 class="text-muted time"> <?php echo $this->Time->timeAgoInWords($post->created); ?></h6>
                            </div>

                        </div>                
                        <div class="post-description"> 
                            <p><?php echo $post->content; ?></p>
                            <div >
                                <a href="#" class="like" id="<?php echo $post->id; ?>">
                                    <?php
                                    if (!empty($post->likes)) {
                                        echo $post->likes[0]->total;
                                    } else {
                                        echo'0 ';
                                    }
                                    ?> likes
                                </a> 
                                <a href="#" class="comm" id="comm<?php echo $post->id; ?>" data="<?php echo $post->id; ?>" style="margin-left:60px">
                                    <?php
                                    if (!empty($post->comments)) {
                                        echo count($post->comments) . ' ';
                                    } else {
                                        echo'0 ';
                                    }
                                    ?>comment</a>
                            </div>
                            <div class="stats">                        
                                <a href="#" class="btn btn-default stat-item like" id="<?php echo $post->id; ?>">
                                    <i class="fa fa-thumbs-up icon"></i>Like
                                </a>
                                <a href="#" class="btn btn-default stat-item comm" id="<?php echo $post->id; ?>" data="<?php echo $post->id; ?>">
                                    <i class="fa fa-comment icon"></i>Comment
                                </a>
                                <div class="dropdown stat-item" id="<?php echo $post->id; ?>">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fa fa-share icon"></i>Share</button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><span class="fa fa-facebook-square fa-lg icon"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter-square fa-lg icon"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin-square fa-lg icon"></span></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>    
                        <div class="post-footer show-comm<?php echo $post->id; ?>" style="display: none"> 


                        </div>
                    </div>
                <?php endforeach; ?>
            </div>     
        </section>  
        <?php echo $this->element('section/right'); ?>
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
    //CKEDITOR.replace( 'editor1');

    $(document).ready(function () {
        $(".write-post").click(function () {
            $("#postModal").modal();
        });
        $("#scroll").niceScroll({cursorcolor:"#0F0"});
        var HelloButton = function (context) {
            var ui = $.summernote.ui;
            // create button
            var button = ui.button({
                contents: '<i class="fa fa-child"/> Hello',
                tooltip: 'hello',
                click: function () {
                    // invoke insertText method with 'hello' on editor module.
                    var node = document.createElement('p');
                    context.invoke('editor.insertText', 'Hello, world');
                    //context.invoke('editor.createLink', {
                    //text: 'This is the Summernote',
                    //url: 'https://www.edu-apps.org/lti_public_resources/?tool_id=quizlet',
                    //isNewWindow: true
                    // });
                }
            });
            return button.render(); // return button as jquery object 
        }

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
                ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']],
                ['mybutton', ['hello']]
            ],
            buttons: {
                hello: HelloButton
            },
            popover: {
                image: [
                    ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow']]
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['mybutton', ['hello']]
                ]
            },
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
                url: '<?php echo Router::url('/career3-d/users/like'); ?>',
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
                url: '<?php echo Router::url('/career3-d/users/likecomment'); ?>',
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
                url: '<?php echo Router::url('/career3-d/users/showcomment'); ?>',
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
                url: '<?php echo Router::url('/career3-d/users/comment'); ?>',
                type: "POST",
                asyn: false,
                data: {'message': comment, 'post_id': id},
                success: function (data, textStatus, jqXHR)
                {
                    $('#comm' + id).load('<?php echo Router::url('/career3-d/users/countcomment/'); ?>' + id);
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
                url: '<?php echo Router::url('/career3-d/users/showcommentreply'); ?>',
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
                url: '<?php echo Router::url('/career3-d/users/addreply'); ?>',
                type: "POST",
                asyn: false,
                data: {'reply': reply, 'comment_id': id},
                success: function (data, textStatus, jqXHR)
                {
                    $('#reply' + id).load('<?php echo Router::url('/career3-d/users/countreply/'); ?>' + id);
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