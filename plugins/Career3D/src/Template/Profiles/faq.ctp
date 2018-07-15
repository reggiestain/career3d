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
<div class="pages_banner text-center">
    <a href="<?php echo \Cake\Routing\Router::Url('/profiles/register');?>" class="btn btn-danger">START A CAMPAIGN</a>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>HOW TO START a PROQUEST CAMPAIGN?</h1>
                <p>
                    <strong>ProQuest is dedicated to making athletes’ dreams a reality.</strong> Both individuals and businesses can support athletes - connecting directly and, building a personal connection with each athlete - while helping them fulfill their aspirations on their journey to success. 
                    <br>
                    <br>

                    <a class="btn btn-danger" href="<?php echo \Cake\Routing\Router::Url('/profiles/register');?>">START YOUR PROQUEST CAMPAIGN</a>
                </p>
                <hr>
                <div id="c-campaign" class="col-lg-12">
                <h1>HOW DO I CREATE A CAMPAIGN?</h1>
                <p>
                    To register for a ProQuest account and create a Campaign, you need to be 18 years or older or, have parental or your legal guardian’s consent. 
                    <br><br>
                    You’re responsible for your account and all the activity on it. We reserve the right to ask you for proof of age at any time, either before or after you have created an Account. 
                    <br>
                    <br>
                    You can browse ProQuest to view other athlete’s Campaigns, without registering for a ProQuest account (“Account”), but to create a Campaign (“Campaign”) you’ll need to register, create an Account and receive a password. 
                    <br>
                    <br>
                    When you do that, the information you give us has to be accurate and complete. Don’t impersonate anyone else or choose names that are offensive or that violate anyone’s rights. If you don’t follow these rules, we may cancel your Account. 
                    
                    <br>
                    <br>
                    Once your registration has been validated by ProQuest we will advise you by email and you will then pay your registration fee of R150, which includes your first Campaign. ProQuest will then publish your Campaign and you will be able to share this using your social media channels and network. 
                    <br>
                    <br>                  
                    
                    <a id="guide" class="btn btn-danger" href="#">GUIDELINE TO CREATING A CAMPAIGN</a>
               
                </p>
                </div>
                <hr>
                <div id="d-goal" class="col-lg-12">
                <h1>HOW DO I DEFINE MY GOAL?</h1>
                <p>
                    It is critical to the success of your ProQuest Campaign that you define clearly what you are trying to achieve <em>(to cover travel, equipment expenses, enter a competition etc.)</em> why you need to accomplish them. 
                    <br>
                    <br>
                    This should Include specific dates as well as budgets, help illustrate to potential Supporters why you need their support and that your ProQuest Campaign targets, match your sport-related needs. 
                    <br>
                    <br>                    
                    
                    This gives potential Supporters the ability to assess the value of their donation and ultimately increases their likelihood to support you. It is important that you have taken the time to understand the scale and cost of your ProQuest Campaign goal and that you can communicate this clearly.
                </p>
                <hr>
                <h1>HOW DO I PROMOTE MY PROQUEST CAMPAIGN?</h1>
                <p>
                    Support for your ProQuest Campaign can come from Supporters you have never connected with but most will come from your own networks and your networks’ network. If you want people to support your ProQuest Campaign, you have to tell them about it. 
                    <br>
                    <br>
                    You can use Email, Facebook, Twitter and word-of-mouth etc. 
                    <br>
                    <br>
                    It’s best to craft a personal email message. Then encourage Supporters to reach out to their networks with a personal message. It helps if you are willing to do the work and craft the message, for them to send out. 
                    <br>
                    <br>
                    Use the sports organizations that are committed to your success too - your club, provincial and national sporting bodies. They have an interest in you because; your success is their success. 
                    <br>
                    <br>
                    Share news, press, and photos from your life, training and competitions. Your Supporters are a part of your team. Communicating with your Supporters can be one of the most rewarding parts of the process, and helps build your long-term support network. 
                    <br>
                    <br>
                    Make sure you tell everyone about your ProQuest Campaign. Go for coffee with anyone interested and don’t be afraid to bring a face to your online ProQuest Campaign. 
                    <br>
                    <br>
                    Finally, use the media. The press loves a great story about an athlete trying to reach their goals. Find someone who will listen and tell your story. If you are successful, direct them to your online ProQuest Campaign page, where Supporters can donate to your quest.
                </p>
                </div>
                <hr>
                <h1>HOW DO I UPDATE MY CAMPAIGN?</h1>
                <p>
                    It is very useful to engage your Supporters by updating your progress during your ProQuest Campaign. You can share your progress, update Supporters on your training, and send along fun facts on your Campaign in the “Updates”. Campaign updates can be daily or weekly, and will help continue to spread the word over the life of your Campaign and help to raise more support.
                    <br>
                    <br>
                    Circumstances such as injuries or competition cancellation can substantially change your plans and need for funding. If your ProQuest Campaign requires a fundamental change in approach, it is important you communicate this news to your Supporters. Most Supporters will be very understanding, but it is essential you keep your team aware of your circumstance, and the nature for the use of funds of your ProQuest Campaign they have supported or plan to support.
                </p>
                <hr>
                <a class="btn btn-danger" href="<?php echo \Cake\Routing\Router::Url('/profiles/register');?>">START YOUR PROQUEST CAMPAIGN</a>
            </div>
            <div class="col-md-3 sidebar">
              <?php echo $this->element('sidebar_reg'); ?>
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
                        <h1 class="modal-title">GUIDELINE TO CREATING A CAMPAIGN</h1>                                                     
                    </div>

                    <div class="modal-body">
                        <h1>YOUR CAMPAIGN TITLE</h1>   
                        <p>This should be simple, descriptive, and memorable.</p> 
                        <h1>PICTURE</h1>   
                        <p>Your image will be what your Supporters see first, so choose a high-resolution photo that looks professional.</p>
                        <h1>BIOGRAPHY AND TELL YOUR STORY</h1>   
                        <p>Show your potential Supporters what you have done, and why you have what it takes to reach your PROQUEST Campaign target. Be authentic, spoken in your words and make it personal.</p>
                        <p>All athletes have goals, hopes and dreams; give Supporters a reason to care about yours. Mention specific memories - when you, first started in the sport or the moment you knew you wanted to be an athlete. Reveal any hardships you may have endured.</p>
                        <p>Here are a few things you need to include that might help you develop your story:</p>
                        <ul>
                        <li>Who you are</li>    
                        <li>Your personality</li>
                        <li>What sport you are in</li>
                        <li>Your PROQUEST goal and budget</li>
                        <li>What the money means to you</li>
                        <li>A giant thank you</li>                       
                        </ul>
                        <h3>Other information:</h3>
                        <ul>
                        <li>Winning for the very first time</li>    
                        <li>A moment when you had to pick yourself up, after a disappointment</li>
                        <li>Something about your training </li>
                        <li>The first time you tried your sport </li>
                        <li>Meeting a hero and the impact it had on you</li>
                        <li>Reveal what is hard about you being an amateur athlete, juggling work</li>                        
                        </ul>
                    </div>
                    
                </div>  


            </div> 
        </div>      
    </div>
<script>
    $(document).ready(function () {
      $(document).on('click', '#guide', function () {
           
            $('#modal-1').modal();
        });
    });
</script>    