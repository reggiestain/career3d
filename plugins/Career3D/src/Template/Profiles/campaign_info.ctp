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
?>

<style>
    .detailBox {
        width:320px;
        border:1px solid #bbb;
        margin:50px;
    }
    .titleBox {
        background-color:#fdfdfd;
        padding:10px;
    }
    .titleBox label{
        color:#444;
        margin:0;
        display:inline-block;
    }

    .commentBox {
        padding:10px;
        border-top:1px dotted #bbb;
    }
    .commentBox .form-group:first-child, .actionBox .form-group:first-child {
        width:80%;
    }
    .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
        width:18%;
    }
    .actionBox .form-group * {
        width:100%;
    }
    .taskDescription {
        margin-top:10px 0;
    }
    .commentList {
        padding:0;
        list-style:none;
        max-height:200px;
        overflow:auto;
    }
    .commentList li {
        margin:0;
        margin-top:10px;
    }
    .commentList li > div {
        display:table-cell;
    }
    .commenterImage {
        width:30px;
        margin-right:5px;
        height:100%;
        float:left;
    }
    .commenterImage img {
        width:100%;
        border-radius:50%;
    }
    .commentText p {
        margin:0;
    }
    .sub-text {
        color:#aaa;
        font-family:verdana;
        font-size:11px;
    }
    .actionBox {
        border-top:1px dotted #bbb;
        padding:10px;
    }    
</style>

<div class="pages_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $Camp->campaign_title;?></h1>
                <?php if(!empty($Camp->profile->name)){?>
                <div class="author">by <?php echo $Camp->profile->name.' '.$Camp->profile->surname;?></div>
                <?php } else { ?>
                <div class="author">by <?php echo $Camp->profile->team_rep;?></div>
               <?php  } ?>
                
            </div>
            <div class="col-md-6 text-right">
                <div class="pricing">
                    <h1 class="big_price">
                        <?php if(empty($Camp->payments)){
                              echo 'R 0.00';    
                        } else {
                        for ($i = 0; $i < count($Camp->payments); $i++) {
                                 echo  "R ".number_format($Camp->payments[$i]->amount, 2, '.', ',');                         
                            }    
                        }
                       ;?>
                        <br><span class="pledge">pledged of R <?php echo number_format($Camp->campaign_goal, 2, '.', ',');?> goal</span></h1>
                    <h1 class="backers_container"><?php echo $Backers;?> <br><span class="backers">backers</span></h1>
             <?php 
             $dStart = new DateTime();
             $dEnd  = new DateTime($Camp->end_date);
             $dDiff = $dEnd->diff($dStart);
             //$videoUrl = str_replace("https://","https://player.","$Camp->video_url");
             
             ?>
             <?php if($dDiff->days === 1){?>       
                    <h1 class="date_container"><?php echo $dDiff->days;?> <br><span class="days">day to go</span></h1>
             <?php }else{?>
                    <h1 class="date_container"><?php echo $dDiff->days;?> <br><span class="days">days to go</span></h1>
             <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">  
                
                <?php if(!empty($Camp->video_url)){?>
                <!--<iframe src="<?php //echo $Camp->video_url;?>" width="100%" height="430" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
                <?php echo $Camp->video_url;?>
               <?php } else { ?>
                <?php echo $this->Html->image('campaign_photos/'.$Camp->campaign_photos[0]->id.'-'.$Camp->campaign_photos[0]->image,['style'=>'width:100%;height:430px',
                                            "alt" => "Campaign Picture"
                                            ]);?>
                <?php }  ?>
                <h1 class="pull-right text-danger"><?php echo $Camp->sport->name;?></h1>
                <h1><i class="fa fa-map-marker"></i> <?php echo $Camp->city.', '.$Camp->province->name.', '.$Camp->country->name;?></h1>

                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ABOUT CAMPAIGN</a></li>
                        <!--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">COMMENTS (<?php //echo $CountCom;?>)</a></li>-->
                        <li role="presentation"><a href="#update" aria-controls="messages" role="tab" data-toggle="tab">UPDATES (<?php echo $UpdateCount;?>)</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <p>
                            <?php echo $Camp->campaign_description;?>    
                            </p>
                            <strong class="text-danger">WHAT'S THE MONEY RAISED FOR?</strong>
                            <p>
                            <?php echo $Camp->money_raised_for;?>    
                            </p>
                            <strong class="text-danger">HOW HAVE YOU SUPPORTED YOUR CAMPAIGN IN THE PAST?</strong>
                            <p>
                            <?php echo $Camp->past_sport_support;?>    
                            </p>
                            <strong class="text-danger">MY HOBBIES OUTSIDE SPORT</strong>
                            <p>
                            <?php echo $Camp->profile->hobbies_outside_sport;?>    
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="update">
                            <?php foreach ($Update as $Updates):?>  

                            <strong class="text-danger"><?php echo $Updates->title;?></strong>                           
                            <p>
                            <?php echo $Updates->description;?>    
                            </p>
                            <span class="date sub-text"><?php echo $Updates->created;?></span>
                            <br>
                            <div id="button">
                                                    <?php
                                                    $name = urlencode($comment->name);
                                                    $title = preg_replace('/\s+/', '', $Camp->campaign_title);
                                                    $url= "http://proquest.co.za/campaign_info/'$id'";
                                                    $summary=urlencode($Updates->description);
                                                    $image = 'http://proquest.co.za/img/campaign_photos/'.$Camp->campaign_photos[0]->id.'-'.$Camp->campaign_photos[0]->image;
                                                    ?>
                                <a style="color:#48649F" class="share_button" var="<?php echo $name; ?>" url="<?php echo $url; ?>" title="<?php echo $title;?>" img="<?php echo $image ?>" comment="<?php echo $summary;?>">
                                    <i class="fa fa-fw fa-share"></i>Share
                                </a>                                                       
                            </div>

                            <?php endforeach;?>
                        </div>
                        

                    </div>
                </div>


            </div>
            <div class="col-md-5 sidebar">
                <div>
                <?php  
                 echo $this->Flash->render();
                 echo $this->Flash->render('auth');
                 ?>    
                </div>    
                              
               <div id='pay'><a><a href="#" class="btn btn-success btn-block"><h4>Click Here TO Donate</h4></a></div>

              <div class="white_bg m-t-30">
                  <div class="comment-msg">
                          
                  </div>
                  <div class="row" id="comments">
                      
                      <div class="col-sm-9">
                          <h1 class="with_pink_border m-tb-0">Comments</h1>  
                      </div>
                      
                      <div class="col-sm-3 text-right"><h1 class="m-tb-0"><?php echo $CountCom;?></h1></div>
                  </div>
                  <hr> 
                  <?php foreach ($Camp->comments as $comment):?>
                  <?php if($comment->status === 'Approved'){;?>
                  <p>
                    <?php echo $comment->comment;?>
                    <br><br>
                    <strong><?php echo $comment->name;?></strong>
                  </p>
                  <div>
                                                    <!--<a href="#" class="fa fa-fw fa-facebook">Share</a>-->

                                                    <div id="button" style="float:left">
                                                    <?php
                                                    $name = urlencode($comment->name);
                                                    $title = preg_replace('/\s+/', ' ', $Camp->campaign_title);
                                                    $url= "http://proquest.co.za/campaign_info/'$id'";
                                                    $summary=urlencode($comment->comment);
                                                    $image = 'http://proquest.co.za/img/campaign_photos/'.$Camp->campaign_photos[0]->id.'-'.$Camp->campaign_photos[0]->image;
                                                    ?>
                                                        <a style="color:#48649F" class="share_button" var="<?php echo $name; ?>" url="<?php echo $url; ?>" title="<?php echo $title;?>" img="<?php echo $image ?>" comment="<?php echo $summary;?>">
                                                            <i class="fa fa-fw fa-share"></i>Share
                                                        </a>                                                       
                                                    </div>
                                                    <!--<div class="fb-like" style="float:left;margin-left: 40px" data-width="450" ></div>-->

                                                </div>
                  <hr>
                  <?php } ;?>
                  <?php endforeach;?>
                  <a href="#" class="add-com"> <i class="fa fa-comment"></i> Leave a Comment</a>
              </div>

                <div class="total_campaigns">
                    <h1 class="camp_total"><?php echo $Backers;?> | </h1>
                    <h1>campaign contributors</h1>

                </div>

                <!--<div class="side_title">
                    <span class="line"></span>
                    <h1>CAMPAIGN MVP</h1>
                </div> 
                <p>
                    <strong>Triathlon New Brunswick</strong> <br>
                    Triathlon New Brunswick has been the MVP of my success so far. They have been instrumental in my development as an athlete and a person.
                </p>-->
                <div class="side_title">
                    <span class="line"></span>
                    <h1>SHARE THIS CAMPAIGN</h1>
                </div>
                <!-- <ul class="list-inline">
                     <li><a href="#" class="social-icon"> <i class="fa fa-google-plus"></i> </a></li>
                     <li><a data-href="https://developers.facebook.com/docs/plugins/" class="social-icon"> <i class="fa fa-facebook"></i> </a></li>
                     <li><a href="#" class="social-icon"> <i class="fa fa-twitter"></i> </a></li>
                 </ul> -->


                <!-- Place this tag in your head or just before your close body tag. -->
                <script src="https://apis.google.com/js/platform.js" async defer></script>
                <!-- Place this tag where you want the share button to render. -->
                <div class="list-inline">
                    <div class="g-plus" data-action="share" data-height="24" data-href="http://proquest.co.za/profiles/campaign_info/<?php echo $id;?>"></div> 
                    <br><br>
                    <div class="fb-share-button" data-href="http://proquest.co.za/profiles/campaign_info/<?php echo $id;?>" data-layout="button_count"></div>
                    <div id="fb-root"></div>
                    <br>
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <script>!function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = p + '://platform.twitter.com/widgets.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, 'script', 'twitter-wjs');</script>

                </div>
            </div>
        </div>
    </div>
</section>
<div class="row"> 
    <div class="modal fade" id="modal-1" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-md">               
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thanks for your support, please enter an amount and click Pay Now.</h4>                                                     
                </div>

                <div class="modal-body">


                    <div class="form-group">
                        <form id="pay-form" name="frmPay" method="post" action="https://www.payfast.co.za/eng/process">

                            <input type="hidden" value="11254785" name="merchant_id">
                            <input type="hidden" value="REGinald19" name="password">
                            <input type="hidden" value="k3gi0hswddvwv" name="merchant_key">
                            <input id="r-url" type="hidden" value="" name="return_url">
                            <input type="hidden" value="http://proquest.co.za" name="cancel_url">
                            <input type="hidden" value="http://proquest.co.za" name="notify_url">
                            <!--<input type="hidden" value="brad.eliot@gmail.com" name="email_address">-->
                            <input type="hidden" value="<?php echo $id;?>" name="m_payment_id">
                            <div class="form-group">                               
                                <div class="form-group input-group col-sm-12" id="n-div">
                                    <label>First Name:</label>    
                                    <input id="name" type="text" class="form-control" value="" name="name_first" required>
                                </div>
                                <div class="form-group input-group col-sm-12" id="s-div">
                                    <label>Surname:</label>    
                                    <input id="surname" type="text" class="form-control" id="s-div" value="" name="name_last" required>
                                </div>
                                <div class="form-group input-group col-sm-12">
                                    <label>Email:</label>    
                                    <input id="e-mail" type="email" class="form-control" value="" name="email_address" required>
                                </div>
                                <label>Donation:</label>
                                <div class="form-group input-group col-sm-12"> 
                                    <span class="input-group-addon">R</span>
                                    <input id="amount" type="number" type="number" name="amount" min="1"  class="form-control currency" id="any" required/>
                                </div>
                                <div class="input-group"> 
                                <div class="checkbox">
                                    <label> <input id="make-anon" name="" type="checkbox"><a>Make this donation anonymous</a></label>
                                </div> 
                                </div>    
                            </div>

                            <input id="item" type="hidden" value="Donation" var="<?php echo $id;?>" name="item_name">
                            <input type="hidden" value="Donation" name="item_description">
                            <!--<input type="hidden" value="" name="signature">-->
                            </div>
                            <div class="modal-footer">
                                <button style="margin-right: 50px" type="submit"><img src="http://www.payfast.co.za/images/buttons/paynow_basic_logo.gif" width="95" height="57" alt="Pay" title="Pay Now with PayFast" /></button>
                                <button class="btn default" data-dismiss="modal">Cancel</button>
                            </div>
                            <!--<input type="submit" value="Proceed to payment gateway" name="submit">-->
                        </form>

                    </div>
                </div>    
                <!--<div class="modal-footer">
                    <button class="btn default" data-dismiss="modal">Cancel</button>    
                    <button type="submit" id="give-back" class="btn btn-primary">OK</button>
                </div> --> 
                    <?php //echo $this->Form->end();?>
            </div>                            
        </div> 
    </div>      
</div>

<div class="row"> 
    <div class="modal fade" id="modal-2" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-md">               
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thanks for your support, please click Pay Now.</h4>                                                     
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <form id="g-form" name="frmPay" method="post" action="https://www.payfast.co.za/eng/process">

                            <input type="hidden" value="10002820" name="merchant_id">
                            <input type="hidden" value="q4uwh2sfqc6ap" name="merchant_key">
                            <input id="r2-url" type="hidden" value="" name="return_url">
                            <input type="hidden" value="http://proquest.co.za" name="cancel_url">
                            <input type="hidden" value="http://proquest.co.za" name="notify_url">                            
                            <input id="camp-id" type="hidden" value="<?php echo $id;?>" name="m_payment_id">
                            <div class="form-group">                                
                                <div class="form-group input-group col-sm-12">
                                    <label>First Name:</label>    
                                    <input id="name-1" type="text" class="form-control" value="" name="name_first" required>
                                </div>
                                <div class="form-group input-group col-sm-12" >
                                    <label>Surname:</label>    
                                    <input id="surname-1" type="text" class="form-control" value="" name="name_last" required>
                                </div>
                                <div class="form-group input-group col-sm-12">
                                    <label>Email:</label>    
                                    <input id="e-mail-1" type="email" class="form-control" value="" name="email" required>
                                </div>
                                <label>Amount:</label> 
                                <div class="input-group"> 
                                    <span class="input-group-addon">R</span>
                                    <input id="gift-value" type="number" type="number" name="amount" min="1"  value="" class="form-control currency" id="any" readonly/>
                                </div>
                                <div class="input-group"> 
                                <div class="checkbox">
                                    <label><input name="Make this donation anonymous" type="checkbox" class="google" required><a href="<?php echo \Cake\Routing\Router::Url('/users/terms_of_use');?>">By submitting your application, you agree to PROQUEST's Terms of Use and Private Policy</a></label>
                                </div> 
                                </div>    
                            </div>

                            <input type="hidden" id="gift-name" value="" name="item_name">
                            <input id="item-1" type="hidden" value="GiveBack" name="item_description">
                            <input id="g-id" type="hidden" value="" name="custom_1">
                            <!--<input type="hidden" value="" name="signature">-->
                            </div>
                            <div class="modal-footer">
                                <button style="margin-right: 50px" type="submit"><img src="http://www.payfast.co.za/images/buttons/paynow_basic_logo.gif" width="95" height="57" alt="Pay" title="Pay Now with PayFast" /></button>
                                <button class="btn default" data-dismiss="modal">Cancel</button>
                            </div>
                            <!--<input type="submit" value="Proceed to payment gateway" name="submit">-->
                        </form>

                    <?php //echo $this->Form->end();?>
                    </div>                            
                </div> 
            </div>      
        </div>
    </div>

    <div class="row"> 
        <div class="modal fade" id="modal-3" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-md">               
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title"></h3>                                                     
                    </div>

                    <div class="modal-body">
                        <!--<form id="add-comment"  method="post">-->  
                        <?php echo $this->Form->create($Comment,['id'=>'add-comment']);?>    
                        <?php if(!empty($ProfileInfo->first()->id)){?>
                        <div class="form-group row col-md-8">
                            <input type="hidden" name="name" class="form-control" value="<?php echo $ProfileInfo->first()->name;?>" required>  
                            <input  type="hidden" name="campaign_id" value="<?php echo $id;?>" >
                        </div>
                        <div class="form-group row col-md-8">
                            <input type="hidden" name="surname" class="form-control" value="<?php echo $ProfileInfo->first()->surname;?>" required>    
                        </div> 
                        <div class="form-group row col-md-8">
                            <input type="hidden" name="email" class="form-control" value="<?php echo $ProfileInfo->first()->email;?>" required>    
                        </div> 
                        <?php } else {?>
                        <div class="form-group row col-md-8">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>  
                            <input id="camp-id" type="hidden" name="campaign_id" value="<?php echo $id;?>" >
                        </div>
                        <div class="form-group row col-md-8">
                            <input type="text" name="surname" class="form-control" placeholder="Surname" required>    
                        </div> 
                        <div class="form-group row col-md-8">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>    
                        </div> 
                        <?php }?>
                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Comment.."></textarea>    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button class="btn default" data-dismiss="modal">Cancel</button>
                        </div>   
                        </form>
                    </div>
                    <?php echo $this->Form->end();?>
                </div>  


            </div> 
        </div>      
    </div>
</div>
<!-- Place this tag in your head or just before your close body tag. -->


<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '609828555840051',
            xfbml: true,
            version: 'v2.5'
        });
    };
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    $(document).ready(function () {
        $("#password2").keyup(function (event) {
            // get password value from first password field
            var pwd = $('#password1').val();
            // get the 2nd password value from the verify password field
            var vPwd = $('#password2').val();
            // verify the values if they are matched
            // if matched then show match alert | hide unmatch alert
            if (pwd == vPwd) {
                $("#verify-pass-error").hide();
            } // else, show unmatch alert | hide match alert
            else {
                $("#verify-pass-error").show();
            }
            event.preventDefault();
        });
        
        $('#make-anon').click(function () {
            if ($(this).is(':checked')) {
                $('#name').val('Anonymous');
                $('#surname').val('Anonymous');
                $('#n-div,#s-div').hide();
                //$('#e-mail').val('anonymous@gmail.com');
            } else {
                $('#name').val('');
                $('#surname').val('');
                $('#n-div,#s-div').show();
                //$('#e-mail').val('');
                
            }
        });

        $('.share_button').click(function (e) {
            var url = $(this).attr('url');
            var title = $(this).attr('title');
            var comment = $(this).attr('comment');
            var img = $(this).attr('img');
            var name = $(this).attr('var');
            e.preventDefault();
            FB.ui(
                    {
                        method: 'feed',
                        name: title,
                        link: url,
                        picture: img,
                        caption: name,
                        description: comment,
                        message: comment
                    });
        });

        $('#datetimepicker4').datepicker();
        $('#datetimepicker5').datepicker();
        $('#checkin').datepicker();
        $('#checkout').datepicker();
        //$('#value').val(id);
        $(document).on('click', '#pay', function () {

            $('#modal-1').modal();
        });

        $(document).on('submit', '#pay-form', function () {
            var id = $('#item').attr("var");
            var desc = $('#item').val();
            var name = $('#name').val();
            var surname = $('#surname').val();
            var amount = $('#amount').val();
            var email = $('#e-mail').val();
            $('#r-url').val("http://proquest.co.za/profiles/return_payment/" + id + "/" + name + "/" + surname + "/" + desc + "/" + amount + "/" + email);

        });

        $(document).on('click', '#get-gift', function () {
            var val = $(this).attr('var');
            var gift = $(this).attr('give');
            var giftId = $(this).attr('var2');
            $('#gift-value').val(val);
            $('#gift-name').val(gift);
            $('#g-id').val(giftId);
            $('#modal-2').modal();
        });

        $(document).on('submit', '#g-form', function () {
            var id = $('#camp-id').val();
            var desc = $('#item-1').val();
            var name = $('#name-1').val();
            var surname = $('#surname-1').val();
            var amount = $('#gift-value').val();
            var email = $('#e-mail-1').val();
            var giftId = $('#g-id').val();

            $('#r2-url').val("http://proquest.co.za/profiles/return_payment/" + id + "/" + name + "/" + surname + "/" + desc + "/" + amount + "/" + email + "/" + giftId);

        });

        $(document).on('click', '#give-back', function (event) {
            event.preventDefault();
            $('#modal-1').modal('toggle');
            $('#modal-2').modal();
        });

        $(document).on('click', '#at-give', function (event) {
            event.preventDefault();
            $('.thanks').hide();
            $('#f-athl').hide();
            $('.white_bg').show();
        });

        $('#make-payment').submit(function (event) {
            event.preventDefault();
            $('#modal-1').modal('toggle');
            var values = $('#make-payment').serialize();
            $.ajax({
                type: "POST",
                url: "https://www.payfast.co.za/eng/process",
                data: values,
                success: function (data) {
                    $('.confirm-msg').html(data);
                    //window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });

        $('.add-com').click(function () {
            var camp = $(this).attr('id');
            $('#camp-id').val(camp);
            $('#modal-3').modal();
        });

        $(document).on('submit', '#add-comment', function (event) {
            event.preventDefault();
            $('#modal-3').modal('toggle');

            var values = $('#add-comment').serialize();
            var name = $('input[name=name]').val('');
            var surname = $('input[name=surname]').val('');
            var email = $('input[name=email]').val('');
            var message = $('textarea[name=comment]').val('');
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/users/save_comment'); ?>",
                data: values,
                success: function (data) {
                    $('.comment-msg').html(data);
                    //alert('Thank you for signing up for our news letters.');
                    // window.setTimeout('location.reload()', 3000); //Reloads after three seconds                 
                }
            });
        });
    });



</script>