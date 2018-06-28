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

<section id="top-area">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12" id="logo"><a href="index.html">&nbsp;</a></div>

<!-- <div class="btn-responsive-menu"> <span class="bar"></span> <span class="bar"></span><span class="bar"></span> </div> -->
                <!--     <nav class="col-md-8 col-xs-9" id="top-nav"> -->
                <!--        <ul>
                            <li>Menu</li>
                            <li>Menu</li>
                     </ul> -->
                <!-- </nav> --><!-- End Nav -->

            </div><!-- End row -->
        </div><!-- End container -->
    </header> <!-- End header -->

    <div class="container">
        <div class="row">
            <div class="col-sm-12 btsl">
                <h1 class="white">TELL US WHAT YOU THINK</h1>
                <h2 class="white">Smart Advice. Smart Savings.</h2>
            </div><!-- /.col-sm-3 -->
        </div><!-- /.row -->

    </div>
</section>      



<section class="container" id="main">

    <!-- Start Survey container -->
    <div id="survey_container">

        <div id="top-wizard">
            <strong>Click forward to continue <span id="location"></span></strong>
            <div id="progressbar"></div>
            <div class="shadow"></div>
        </div><!-- end top-wizard -->

        <form name="example-1" id="wrapped" action="survey_send_1.php" method="POST">
            <div id="middle-wizard">
                <div class="step">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 style="text-align:left!important" class="wizard-header">How can we make the 2016 school year easier for you?</h2>

                            <p class="info">How will 2016 unfold for you and your family? The Learning Network aims to be a questionnaire that supports you and your child on the journey from childhood to adulthood. Whether it be their development, education, use of technology, health & safety or balancing health and family life, all of this will prepare them for their future.<br><br>Could you take a few minutes to fill in the questions that follow so that we can shape The Learning Network to give you what you need, whether you are a parent, educator or learner.  Let us know what insights, information or services you need by answering the questions below. As a token of our appreciation for your time and input, we’ll email you a voucher that gives you R100 off a stationery spend of R350* or more, from Bidvest Waltons.  


                            </p> 
                        </div><!-- /.col-sm-12 -->

                    </div><!-- /.row -->

                    <div class="row">

                        <div class="col-md-6 blue-box">
                            <h2 style="color:#fff;">Enter your personal info</h2>
                            <ul class="data-list">
                                <li><input type="text" name="first_name" class="required form-control" placeholder="First name"></li>
                                <li><input type="text" name="surname" class="required form-control" placeholder="Surname"></li>
                                <li><input type="email" name="email" class="required form-control" placeholder="Your Email"></li>
                            </ul>
                        </div><!-- end col-md-6 -->

                        <div class="col-md-6 col-sm-12 col-xs-12 bts">
                            <!--<img src="img/back-2-school.jpg" class="img-responsive bts2"  /> -->
                            <?php echo $this->Html->image('back-2-school.jpg',['class'=>'img-responsive bts2']);?>

                        </div><!-- end col-md-6 -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-md-12 ">
                            <br><br>

                            <ul class="data-list" id="terms">
                                <li>
                                    I accept that my email address will be used to send me a <strong>Bidvest Waltons stationery voucher</strong> when I complete and submit this survey, and once more at some time in the future to notify me when The Learning Network launches.
                                    <label class="switch-light switch-ios ">
                                        <input type="checkbox" name="terms" class="required fix_ie8" value="yes">
                                        <span>
                                            <span class="ie8_hide">No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div><!-- end step-->

                <div class="step row">

                    <div class="col-md-12">
                        <h2>SECTION B</h2>
                        <h3>How many children do you have? </h3>
                        <div class="col-md-6 col-xs-12">

                            <ul class="data-list-2">
                                <li>
                                    <div class="styled-select">
                                        <select class="form-control required chooseOption" id="optionName" name="NumberChildren">
                                            <option value="" selected>Select number of children</option>
                                            <option value="one">1</option>
                                            <option value="two">2</option>
                                            <option value="three">3</option>
                                            <option value="four">4</option>
                                            <option value="five">5</option>
                                            <option value="six">6</option>
                                            <option value="seven">7</option>
                                            <option value="eight">8</option>
                                            <option value="nine">9</option>
                                            <option value="ten">10</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>

                        </div><!-- end col-md-6 -->
                        <div class="col-md-6 col-xs-12">

                            <ul class="data-list-2 floated clearfix">

                                <span class="optionName one">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li> 
                                </span> 

                                <span class="optionName two">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                </span><!-- /.optionName two -->

                                <span class="optionName three">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>
                                </span>

                                <span class="optionName four">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age4" class="form-control" placeholder="Age"></li>
                                </span>
                                <span class="optionName five">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age4" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age5" class="form-control" placeholder="Age"></li>
                                </span>

                                <span class="optionName six">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age4" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age5" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age6" class="form-control" placeholder="Age"></li>
                                </span>
                                <span class="optionName seven">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age4" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age5" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age6" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age7" class="form-control" placeholder="Age"></li>
                                </span>
                                <span class="optionName eight">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age4" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age5" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age6" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age7" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age8" class="form-control" placeholder="Age"></li>
                                </span>
                                <span class="optionName nine">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age4" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age5" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age6" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age7" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age8" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age9" class="form-control" placeholder="Age"></li>
                                </span>  
                                <span class="optionName ten">
                                    <li id="age"><input type="text" name="age" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age2" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age3" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age4" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age5" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age6" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age7" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age8" class="form-control" placeholder="Age"></li>  
                                    <li id="age"><input type="text" name="age9" class="form-control" placeholder="Age"></li>
                                    <li id="age"><input type="text" name="age10" class="form-control" placeholder="Age"></li>
                            </ul>


                        </div><!-- /.col-md-6 -->


                        <div class="clearfix"></div><!-- /.clearfix -->
                        <hr>
                        <h3>What kind of information would you prefer? </h3>
                        <ul class="data-list-2">
                            <span class="col-md-12">
                                <li><input name="question1" type="radio" class="required check_radio" value="A"><label>Age, stage and developmentally appropriate milestones & behavior</label></li></span><!-- col-md-6 -->
                            <span class="col-md-12">
                                <li><input name="question1" type="radio" class="required check_radio" value="B"><label>Ideas for what to do when I want to spend quality time with my child</label></li></span><!-- col-md-6 -->
                            </span><!-- col-md-6 -->
                            <span class="col-md-12">
                                <li><input name="question1" type="radio" class="required check_radio" value="C"><label>Both of the above</label></li>
                            </span><!-- col-md-6 -->
                        </ul>

                        <hr>

                        <h3>I would source a tutor to help my child with school studies.</h3>
                        <ul class="data-list-2">
                            <span class="col-md-12">
                                <span class="col-md-12">
                                    <li><input name="question2" type="radio" class="required check_radio" value="A"><label>On the recommendation of the school, a teacher or a friend </label></li></span><!-- col-md-6 -->
                                <span class="col-md-12">    
                                    <li><input name="question2" type="radio" class="required check_radio" value="B"><label>If there was an online database of recommended tutors in my suburb</label></li>
                                </span><!-- col-md-6 -->
                                <span class="col-md-12">
                                    <li><input name="question2" type="radio" class="required check_radio" value="C"><label>Both of the above</label></li>
                                </span><!-- col-md-6 -->

                            </span><!-- col-md-6 -->
                        </ul>

                        <hr>

                        <h3>Which of the following statements most accurately describes your feelings?</h3>
                        <ul class="data-list-2">
                            <span class="col-md-12">
                                <li><input name="question3" type="radio" class="required check_radio" value="A"><label>I do not feel I am equipped to help my child with their homework and studies</label></li>
                            </span><!-- col-md-6 -->
                            <span class="col-md-12">
                                <li><input name="question3" type="radio" class="required check_radio" value="B"><label>I do not have the time to help my child with their homework and studies</label></li>
                            </span><!-- col-md-6 -->
                            <span class="col-md-12">
                                <li><input name="question3" type="radio" class="required check_radio" value="C"><label>I would rather hire a tutor to help my child with homework and studies</label></li>
                            </span><!-- col-md-6 -->
                        </ul>

                        <hr>

                        <h3>My child uses e-books for…</h3>
                        <ul class="data-list-2">
                            <span class="col-md-12">
                                <li><input name="question4" type="radio" class="required check_radio" value="A"><label>School-related work</label></li>
                            </span>
                            <span class="col-md-12">
                                <li><input name="question4" type="radio" class="required check_radio" value="B"><label>Leisure reading</label></li>
                            </span>
                            <span class="col-md-12">
                                <li><input name="question4" type="radio" class="required check_radio" value="C"><label>My child doesn’t use e-books
                                    </label></li>

                            </span><!-- col-md-6 -->
                        </ul>

                        <hr>

                        <h3>I want my child to be a tech-savvy digital citizen and would value</h3>
                        <ul class="data-list-2">
                            <span class="col-md-12">
                                <li><input name="question5" type="radio" class="required check_radio" value="A"><label>Information to educate my child about using digital technology and devices safely </label></li>
                            </span>
                            <span class="col-md-12">
                                <li><input name="question5" type="radio" class="required check_radio" value="B"><label>Information to educate me about digital technology and devices</label></li>
                            </span>
                            <span class="col-md-12">
                                <li><input name="question5" type="radio" class="required check_radio" value="C"><label>Both of the above</label></li>

                            </span><!-- col-md-6 -->
                        </ul>
                    </div>
                </div><!-- end step -->    

          <?php foreach ($QuestionGroups as $QuestionGroup):?>  
                <div class="step row">
                    <div class="col-md-12">               
                        <h2><?php echo $QuestionGroup->name;?></h2>
                        <hr>
                        <?php  for ($i = 0; $i < count($QuestionGroup->questions); $i++) {?>
                        <h3><?php echo $QuestionGroup->questions[$i]->question;?></h3>
                        <ul class="data-list-2">
                            <span class="col-md-12">
                                <li><input name="answer[<?php echo $QuestionGroup->questions[$i]->id;?>]" type="radio" class="required check_radio" value="A"><label><?php echo $QuestionGroup->questions[$i]->option_1;?></label></li>
                                <li><input name="answer[<?php echo $QuestionGroup->questions[$i]->id;?>]" type="radio" class="required check_radio" value="B"><label><?php echo $QuestionGroup->questions[$i]->option_2;?></label></li>
                            </span><!-- col-md-6 -->

                            <li><input name="answer[<?php echo $QuestionGroup->questions[$i]->id;?>]" type="radio" class="required check_radio" value="C"><label><?php echo $QuestionGroup->questions[$i]->option_3;?></label></li>
                            </span><!-- col-md-6 -->
                        </ul> 
                        <hr>
                 <?php } ?>
                    </div>
                </div><!-- end step -->    
                 <?php endforeach;?>   


                <div class="submit step" id="complete">
                    <i class="icon-check"></i>
                    <h3>Questionnaire complete! Thank you for you time.</h3>
                    <button type="submit" name="process" class="submit">Submit to get Voucher</button>
                </div><!-- end submit step -->

            </div><!-- end middle-wizard -->

            <div id="bottom-wizard">
                <button type="button" name="backward" class="backward">Backward</button>
                <button type="button" name="forward" class="forward">Forward</button>
            </div><!-- end bottom-wizard -->
        </form>

    </div><!-- end Survey container -->





    <!-- <div class="divider"></div> -->




</section><!-- end section main container -->

<footer>


    <section id="footer_2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul id="footer-nav">
                        <li>© 2016 The Learning Network I All Rights Reserved I <a href="http://fgx.co.za/" target="_blank">FGX Studios</a> I <a href="#" data-toggle="modal" data-target="#myModal">Privacy & Security Statement</a> I <!-- <a href="#" data-toggle="modal" data-target="#terms-txt">Disclaimer</a>--> </li>
                        <li></li>
                        <!-- <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy</a></li> -->
                    </ul>              
                </div>
                <!--     <div class="col-md-6" style="text-align:center">
                        <ul class="social-bookmarks clearfix">
                            <li class="facebook"><a href="#">facebook</a></li>
                            <li class="googleplus"><a href="#">googleplus</a></li>
                            <li class="twitter"><a href="#">twitter</a></li>
                            <li class="delicious"><a href="#">delicious</a></li>
                            <li class="paypal"><a href="#">paypal</a></li>
                        </ul>
                    </div> -->
            </div>
        </div>
    </section>

</footer> 

<div id="toTop">Back to Top</div>  

<!-- Modal About -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">PRIVACY AND SECURITY STATEMENT</h4>
            </div>
            <div class="modal-body">
                <p>Your right to privacy and security is very important to us. We, The Learning Network ("Learning Network") and its associated companies, (we, us, our), treat personal information ("information") obtained through our questionnaire as private and confidential. We are committed to giving you secure access to our online services.</p>
                <h4>Privacy</h4>
                <p><strong>1. How we use the information we collect</strong><br><br>

                    <i>We need to collect information to:</i><br><br>

                    meet our obligations to you<br>

                    follow your instructions<br>

                    inform you of new services<br>

                    make sure our business suits your needs.</p>
                <p><strong>2. Use of technology to monitor your use of our questionnaire</strong><br><br>

                    We collect and examine information about visits to this questionnaire. We use this information to find out which areas of the questionnaire people visit most. This helps us to add more value to our services. This information is gathered in such a way that we do not get information about any individual or their online behaviour on other questionnaires.<br><br>
                    <strong>3. Cookies</strong><br><br>

                    We use cookie technology in some parts of our questionnaire. A cookie consists of small pieces of text that are saved on your internet browser when you use our questionnaire. The cookie is sent back to our computer each time you visit our questionnaire. Cookies make it easier for us to give you a better experience online. You can stop your browser from accepting cookies but, if you do, some parts of our questionnaire or online services may not work. We recommend that you allow cookies.<br><br>
                    <strong>4. Third parties</strong><br><br>

                    We ask other organisations to provide support services to us. When we do this, they have to agree to our privacy policies if they need access to any personal information to carry out their services. <br><br>

                    Our questionnaire might contain links to or from other sites. We try to link only to questionnaires that also have high standards and respect for privacy, but we are not responsible for their security and privacy practices or their content. We recommend that you always read the privacy and security statements on these sites.<br><br>
                    <strong>5. When we will disclose information without consent</strong><br><br>

                    We will not reveal information to anyone outside our offices nor to certain of our service providers without your permission, unless:<br><br>

                    we must do so by law or in terms of a court order<br><br>

                    it is in the public interest<br><br>

                    we need to do so to protect our rights.<br><br>

                <h4>Security</h4><br>
                <strong>6. Storing information</strong><br><br>

                We store information collected in a safe place and no person outside our offices or certain service providers can get access to it.<br><br>
                <strong>7. Our security practices</strong><br><br>

                We are committed to providing safe online services. All use of our questionnaire and transactions through it are protected by encryption (secret codes) to international standards. Encryption protects information you send when you fill in application forms online. Our computers are protected by systems that guard against intruders. Only our authorised employees or agents can gain access to information on these computers. We have also used independent security experts to test our system's security and advise us about improvements to it. <br><br>

                You should read the security tips and updates on our questionnaire regularly to make sure that you benefit from our security systems.<br><br>
                <strong>8. Privacy and security statements applying to specific online services</strong><br><br>

                Different online services or businesses provided by us may have their own privacy and security policies because the service or product they offer may need different or extra policies. These specific policies will apply to your use of a particular service where they are different from our general policies.<br><br>


                <strong>9. Right to amend this privacy and security statement</strong><br><br>

                We may change this privacy and security statement from time to time. We will put all changes on our questionnaire. The latest version of our privacy and security statement will replace all earlier versions of it, unless it says differently.<br><br>
                <strong>10.Questions</strong><br><br>

                Please email us on <a href="mailto:support@thelearningnetwork.co.za">support@thelearningnetwork.co.za</a> if you have any questions about this privacy and security statement.<br><br>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal About -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="termsLabel">
                    DISCLAIMER</h4>
            </div>
            <div class="modal-body">
                <p>The material or publications contained in this questionnaire are for general information only. No material or publication on this questionnaire constitutes an offer or the solicitation of an offer for the sale or purchase of any product or security. Whilst The Learning Network (we, us, our) has taken care to ensure that the content and services on this site are accurate, The Learning Network does not herein warrant that the site, any tools such as calculators, software, information, content or other services will be error free or will meet any particular criteria of accuracy, completeness, reliability, performance or quality and that this site or any downloads via this site are free from viruses or destructive code, and expressly disclaim all such implied warranties. Neither we, nor our shareholders, agents, consultants, directors, officers or employees are liable for any damages whatsoever relating to your use of this site or the services offered or information made available on this site or your inability to use this site or any of the information or services. This includes without limitation any direct, indirect, special, incidental, consequential or punitive damages howsoever arising and regardless of whether we were advised of the possibility of such loss or damage. Whilst every care has been taken in publishing information on this site and every effort has been made to ensure the authenticity and completeness of information on this site, no representation, warranty or undertaking (expressed or implied) is given and no responsibility or liability is accepted by us or any of our employees and agents as to the reliability and accuracy of the information contained on this site. We can not be held liable for the reliance on and use of the information on this site, including but not limited to any opinions, summaries and findings. All opinions, summaries and findings contained on this site may be changed after publication at any time without notice. <br><br>
                    The contents of this site may not be copied or reproduced in whole or in part without our prior consent. The products and information available on this site are only available to residents of the Republic of South Africa (“RSA”) and legal entities incorporated in the RSA (collectively referred to as “RSA residents”). Any use or attempted use of the services, products and information by anyone else could result in civil action or criminal prosecution. </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

    $(document).ready(function () {
        $(".optionName").hide();
        $("select.chooseOption").change(function () {
            $("." + this.id).hide();
            var thisValue = $(this).val();
            if (thisValue != "")
                $("." + thisValue).show();
        });

        $('#wrapped').submit(function (event) {
            event.preventDefault();
            var values = $('#wrapped').serialize();
            //$('#modal-1').modal('toggle');
            //alert(values);
            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::Url('/users/register_user'); ?>",
                data: values,
                async: false,
                success: function (data) {
                    $('.notify').html(data);
                    var url = "https://thelearningnetwork.co.za";
                    $(location).attr('href', url);
                   // location.reload();
                }
            });
        });
    });
</script>

