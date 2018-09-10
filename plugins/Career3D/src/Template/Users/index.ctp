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
    span{
        font-size: 1em !important;  
    } 


</style>

<?php echo $this->element('Career3D.header'); ?>

<section class="slider" id="home">
    <div class="container">
        <?php
        echo $this->Flash->render();
        echo $this->Flash->render('auth');
        ?>
        <div class="row overflownone">
            <div class="col-md-4 information nopaddingleft nopaddingright hidden-sm hidden-xs">
                <!---->
                <div class="banner">
                    <div class="container">
                        <div class="col-md-4 banner-matter">
                            <!-- requried-jsfiles-for owl -->

                            <!-- //requried-jsfiles-for owl -->
                            <!-- start content_slider -->
                            <div id="owl-demo1" class="owl-carousel">
                                <div class="item-bottom">
                                    <div class="item-right">
                                        <h1>Successful people have goals</h1>
                                        <span>First, decide what you want to do, accomplish, or be in life.</span>
                                        <span>Secondly, split your larger goal into smaller and more achievable goals or targets that you have to achieve</span>
                                        <span>Finally, you will want to formulate and develop a proper plan for your goal</span>

<!--<a href="#"><i> </i>Download </a>-->
                                    </div>
                                </div>														
                            </div>
                        </div>
                        <div class="col-md-6 banner-side">
                            <div class="col-md-6 side">


                            </div>
                            <div class="col-md-6 side">

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>	
                </div>
                <!---->
            </div>
            <div class="col-md-8 nopaddingleft nopaddingright">
                <div class="slideshow">
                    <div class="overlay-id1 overlay-item">
                        <h3>Choose option</h3>
                        <ul class="quickmenu">
                            <li><a href="#" title="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                            <li><a href="#" title="#">Praesent posuere tellus a luctus aliquet.</a></li>
                            <li><a href="#" title="#">Phasellus imperdiet mi eget sollicitudin molestie.</a></li>
                            <li><a href="#" title="#">In accumsan tortor eget massa bibendum, ut suscipit elit maximus.</a></li>
                            <li><a href="#" title="#">Nulla sodales turpis vitae dapibus convallis.</a></li>
                        </ul>
                    </div>
                    <div class="overlay-id2 overlay-item">
                        <h3>Choose option</h3>
                        <ul class="quickmenu">
                            <li><a href="#" title="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                            <li><a href="#" title="#">Praesent posuere tellus a luctus aliquet.</a></li>
                            <li><a href="#" title="#">Phasellus imperdiet mi eget sollicitudin molestie.</a></li>
                            <li><a href="#" title="#">In accumsan tortor eget massa bibendum, ut suscipit elit maximus.</a></li>
                            <li><a href="#" title="#">Nulla sodales turpis vitae dapibus convallis.</a></li>
                        </ul>
                    </div>
                    <div class="overlay-id3 overlay-item">
                        <h3>Choose option</h3>
                        <ul class="quickmenu">
                            <li><a href="#" title="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                            <li><a href="#" title="#">Praesent posuere tellus a luctus aliquet.</a></li>
                            <li><a href="#" title="#">Phasellus imperdiet mi eget sollicitudin molestie.</a></li>
                            <li><a href="#" title="#">In accumsan tortor eget massa bibendum, ut suscipit elit maximus.</a></li>
                            <li><a href="#" title="#">Nulla sodales turpis vitae dapibus convallis.</a></li>
                        </ul>
                    </div>
                    <div class="overlay-id4 overlay-item">
                        <h3>Choose option</h3>
                        <ul class="quickmenu">
                            <li><a href="#" title="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                            <li><a href="#" title="#">Praesent posuere tellus a luctus aliquet.</a></li>
                            <li><a href="#" title="#">Phasellus imperdiet mi eget sollicitudin molestie.</a></li>
                            <li><a href="#" title="#">In accumsan tortor eget massa bibendum, ut suscipit elit maximus.</a></li>
                            <li><a href="#" title="#">Nulla sodales turpis vitae dapibus convallis.</a></li>
                        </ul>
                    </div>
                    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <?php echo $this->Html->image('Career3D.img/student-banner-2.jpg', ['class' => 'img-responsive center-block', 'style' => 'height:550px']); ?>
                                <div class="carousel-caption">                   <p>Earn a Promotion</p>
                                    <h3>It is always a good feeling to get promoted, and a promotion involves careful planning, commitment, and execution on your part as an employee.</h3>      

                                </div>
                            </div>
                            <div class="item">
                                <?php echo $this->Html->image('Career3D.img/student-6.jpg', ['class' => 'img-responsive center-block']); ?>
                                <div class="carousel-caption">
                                    <p>Increase Performance Metrics</p>
                                    <h3>Certain industries and companies use performance metrics when they evaluate an employee’s performance, productivity, and effectiveness levels.</h3>
                                </div>
                            </div>
                            <div class="item">
                                <?php echo $this->Html->image('Career3D.img/student-banner.jpg', ['class' => 'img-responsive center-block', 'style' => 'height:500px']); ?>
                                <div class="carousel-caption">
                                    <p>Start a Business</p>
                                    <h3>A lot of people associate success with branching out on their own, and a viable career goal, in that case, can be to start your own business or open your own practice to become your own boss.</h3>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row visible-xs visible-sm ">
            <div class="col-md-12 mobile-menu-bg">
                <ul class="information_menu_mobile">
                    <li class="active"><a href="#"><i class="fa fa-calendar-plus-o"></i> <span class="hidden-xs">Lorem ipsum</span></a></li>
                    <li><a href="#"><i class="fa fa-commenting-o"></i> <span class="hidden-xs">Praesent posuere</span></a></li>
                    <li><a href="#"><i class="fa fa-medkit"></i> <span class="hidden-xs">Phasellus imperdiet</span></a></li>
                    <li><a href="#"><i class="fa fa-heartbeat"></i> <span class="hidden-xs">In accumsan</span></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>       
<!-- about section -->
<section class="about text-center" id="about" style="background-color: rgba(255, 0, 0, 0.25), url(../img/body4.jpg); z-index: 9999;color: white">
    <div class="container">
        <div class="row">
            <!--<h2>about us</h2>-->
            <div class="section-head text-center">
                <h3>
                    <span class="frist"> </span>
                    STUDENT LIFE
                    <span class="second"> </span>    
                </h3>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail">
                    <div class="about-img">
                        <?php echo $this->Html->image('Career3D.img/studies.jpg', ['class' => 'img-responsive']); ?>                                    
                    </div>

                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1>A</h1>
                        </div>

                        <h3>Academics</h3>
                        <p>An academic collaboration programme hosted by Unisa’s Department of Marketing and Retail Management was held on 15 and 16 August 2017 in Pretoria. The conference gathered together representatives from 12 South African tertiary institutions, and one from Uganda. Also attending were representatives from Services Seta, various marketing councils, and academic research organisations.

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail">
                    <div class="about-img">
                        <?php echo $this->Html->image('Career3D.img/careers.jpg', ['class' => 'img-responsive', 'title' => 'image']); ?>
                    </div>

                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1>C</h1>
                        </div>

                        <h3>Career Guidance</h3>
                        <p>One of the most daunting choices you’ll face in your last two or three years of school is deciding which career you’d like to pursue, and which tertiary qualifications will help you meet your goal.

                            This is about finding the place where your passions, your abilities and the needs of the job market meet up.

                            Here a few tips about how you can choose the right career path: Make a list of your strengths and interests. A good place to start is by taking a look at the various career options.<br><br>
                            <a href="#" class="btn btn-success btn-sm career-in"> Click to view <br>Careers and Occupations <br> in great detail.</a></p>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail clearfix">
                    <div class="about-img">                        
                        <?php echo $this->Html->image('Career3D.img/internships.jpg', ['class' => 'img-responsive']); ?>
                    </div>

                    <div class="about-details">
                        <div class="pentagon-text">
                            <a href="<?php echo \Cake\Routing\Router::Url('/career-3d/users/assessment'); ?>"><h1>M</h1></a>
                        </div>

                        <h3>Mentorship Programmes</h3>

                        <p>A good mentor is as valuable for a start-up as a good coach is for a rising sports star. They want you to succeed, are quick with advice, honest in their critiques and generous with their networks.A mentor that’s very experienced can direct the mentee in terms of things they need to think about, who they need to connect with and give them a heads up about questions they wouldn’t even think to ask. Here’s how to link up with a mentor who’s a match for you</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- end of about section -->


<!-- service section starts here -->

<section class="service text-center" id="service">
    <div class="container">
        <div class="row">
            <h2>Bursaries</h2>
            <h4></h4>

            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">
                            <?php echo $this->Html->image('Career3D.img/absa-4.png', ['class' => 'img-responsive', 'style' => '200px;height:100px']); ?>                                    
                        </div>
                    </div>
                    <h3><a href="http://bursaries-southafrica.co.za/list-of-all-bursaries-in-south-africa/" style="color:#fff">                                
                            ABSA Bursaries 2016 -2017</a></h3>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">
                            <?php echo $this->Html->image('Career3D.img/allan-gray.png', ['class' => 'img-responsive', 'style' => '200px;height:100px']); ?>                                    
                        </div>
                    </div>
                    <h3><a href="http://bursaries-southafrica.co.za/list-of-all-bursaries-in-south-africa/" style="color:#fff">                                
                            Allan Gray Bursaries 2016 - 2017</a></h3>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">                                   
                            <?php echo $this->Html->image('Career3D.img/ekulu.png', ['class' => 'img-responsive', 'style' => '200px;height:100px']); ?>
                        </div>
                    </div>
                    <h3><a href="http://bursaries-southafrica.co.za/list-of-all-bursaries-in-south-africa/" style="color:#fff">
                            Ekurhuleni Bursaries 2016 - 2017
                        </a></h3>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">
                            <?php echo $this->Html->image('Career3D.img/eskom.png', ['class' => 'img-responsive', 'style' => '200px;height:100px']); ?>                                    
                        </div>
                    </div>
                    <h3><a href="http://bursaries-southafrica.co.za/list-of-all-bursaries-in-south-africa/" style="color:#fff">
                            Eskom Bursaries (2016-2017)</a></h3>
                </div>
            </div>
        </div>
    </div>
</section><!-- end of service section -->


<!-- team section -->

<section class="team" id="team">
    <div class="container">
        <div class="row">
            <div class="team-heading text-center">
                <h2>Recruiters</h2>
                <h4></h4>
            </div>

            <div class="col-md-2 single-member col-sm-4">
                <div class="person">                          
                    <?php echo $this->Html->image('Career3D.img/item1.jpg', ['class' => 'img-responsive']); ?>
                </div>

                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>Mr. Graham</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>

            </div>

            <div class="col-md-2 single-member col-sm-4">

                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Mr. David</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
                <div class="person">
                    <?php echo $this->Html->image('Career3D.img/item2.jpg', ['class' => 'img-responsive']); ?>
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <?php echo $this->Html->image('Career3D.img/item3.jpg', ['class' => 'img-responsive']); ?>
                </div>
                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>Mr. Hovid</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
            </div>

            <div class="col-md-2 single-member col-sm-4">
                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Mr Jasak</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
                <div class="person">
                    <?php echo $this->Html->image('Career3D.img/item4.jpg', ['class' => 'img-responsive']); ?>
                </div>
            </div>

            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <?php echo $this->Html->image('Career3D.img/item5.jpg', ['class' => 'img-responsive']); ?>
                </div>

                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>Mr. Joy Ka</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
            </div>

            <div class="col-md-2 single-member col-sm-4">

                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Mr. Mikari</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
                <div class="person">
                    <?php echo $this->Html->image('Career3D.img/item6.jpg', ['class' => 'img-responsive']); ?>
                </div>

            </div>
        </div>
    </div>
</section><!-- end of team section -->

<!-- map section -->
<section class="api-map" id="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 map" id="map"></div>
        </div>
    </div>
</section><!-- end of map section -->

<!-- contact section starts here -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="contact-caption clearfix">
                <div class="contact-heading text-center">
                    <h2>contact us</h2>
                </div>

                <div class="col-md-5 contact-info text-left">
                    <h3>contact information</h3>
                    <div class="info-detail">
                        <ul><li><i class="fa fa-calendar"></i><span>Monday - Friday:</span> 9:30 AM to 6:30 PM</li></ul>
                        <ul><li><i class="fa fa-map-marker"></i><span>Address:</span> 93 Hornbill Avenue, Rooihuiskraal Centurion, 0157</li></ul>
                        <ul><li><i class="fa fa-phone"></i><span>Phone:</span> 078-4450-830</li></ul>
                        <ul><li><i class="fa fa-fax"></i><span>Fax:</span> (01) 999-1234</li></ul>
                        <ul><li><i class="fa fa-envelope"></i><span>Email:</span> info@siyanontech.co.za</li></ul>
                    </div>
                </div>


                <div class="col-md-6 col-md-offset-1 contact-form">
                    <div class="m-alert"></div>
                    <h3>leave us a message</h3>
                    <?php echo $this->Form->create(null, ['id' => 'send-m', 'class' => 'form', 'url' => ['controller' => 'pages', 'action' => 'sendmessage']]); ?>
                    <!--<form id="send-msg" class="form">-->
                    <input class="name" type="text" placeholder="Name" name="name">
                    <input class="email" type="email" placeholder="Email" name="email">
                    <input class="phone" type="text" placeholder="Phone No:" name="phone">
                    <textarea class="message" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                    <input class="submit-btn" type="submit" value="SUBMIT">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section><!-- end of contact section -->
<!-- Register Modal -->
<div id="regModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->               
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Register</h1>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create(null, ['id' => 'reg-form', 'url' => ['controller' => 'pages', 'action' => 'register']]); ?>
                <p class="text-success lead"><b>You are a few minutes away from the best student experience in SA! By registering below you'll get full access to jobs, bursaries, internships, mentorship, career guidance & so much more.</p>
                <p class="reg-alert"></p>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="firstname" class="form-label">First Name</label>
                        <?php echo $this->Form->input('firstname', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>                               
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="surname" class="form-label">Surname</label>
                        <?php echo $this->Form->input('surname', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>                   
                    </div>    
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="email" class="form-label">Email Address</label>
                        <?php echo $this->Form->input('email', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>                             
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="phone" class="form-label">Phone Number</label>
                        <?php echo $this->Form->input('mobile', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>                            
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">    
                        <label for="date_of_birth" class="form-label">Date of birth</label>   
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                
                            <?php echo $this->Form->input('birth_date', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control datepicker', 'id' => 'b-date', 'required' => false, 'error' => true]); ?>
                        </div>              
                    </div>                    
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="gender" class="form-label">Gender</label>    
                        <?php
                        $gender = ['Male' => 'Male', 'Female' => 'Female'];
                        echo $this->Form->select('gender', $gender, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                        ?>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="gender" class="form-label">Race</label>    
                        <?php
                        $race = ['Black'=>'Black','Coloured'=>'Coloured','Indian'=>'Indian','White'=>'White','Other'=>'Other'];
                        echo $this->Form->select('race', $race, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                        ?>
                </div>
                </div>    
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="gender" class="form-label">Province</label>    
                        <?php
                        echo $this->Form->select('province_id', $province, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="career" class="form-label">Career Path</label> <br>   
                        <?php
                        echo $this->Form->select('career_id', $careers, ['empty' => '--Choose One--', 'id'=>'career','class' => 'form-control','style'=>'width:100%;height:30px !important','label' => false, 'required' => false, 'error' => true]);
                        ?>
                    </div>

                </div>  
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="pwd" class="form-label">Password</label>
                        <?php echo $this->Form->input('password', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'password', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>                     
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="pwd-confirm" class="form-label">Confirm Password</label>
                        <?php echo $this->Form->input('confirm_password', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'password', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>    
                </div>
                <div class="row">
                    <br>
                 <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     By clicking Sign Up, you agree to our <a href="#" class="terms">Terms, Data Policy</a> and Cookie Policy. 
                  You may receive SMS notifications from us and can opt out at any time. 
                 </div>
                    
                 <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 terms-info" style="display:none">
                  In accessing this website, you confirm that you have read, understood and agree to be bound by our terms and conditions in this disclaimer.  The website is an evaluation exercise designed for our users to obtain online career guidance. You are required to provide basic registration information, in order to have access to the evaluation exercise, results and tool kit.  This information becomes our property and may be used by us, reproduced, published, transmitted, modified or distributed at our discretion, subject to our obligations under this disclaimer.  If you are not over the age of 18 years, you must obtain the consent of your parent or guardian before using this website.  You must not use any other person’s details, username or password when accessing or using this website, unless it is with our consent; post or transmit any data which in any way defames, harasses or offends any person, is obscene or which in any way may interfere with any other users of this website; provide any information to us which is the confidential information or proprietary information of any other person; use this website in any way which may be in breach of any laws, rules or regulations or may infringe any third party rights; or knowingly transmit any virus or take any action which may interfere with the operation of this website.   

                  All contents of this website, including the software, design, text and graphics are owned by or licensed to us and are protected by copyright, you may not reproduce, transmit, adapt, distribute, sell, modify or publish or otherwise use any of the material on this website without our prior written consent.   

                  As permitted by law, we exclude all warranties, conditions and representations whether express, implied, statutory or otherwise relating in any way to this website, your use of this website and the information supplied to you or anyone else in respect of any loss or damage, costs and expenses suffered by you or claims made against you arising from or in connection with any use of the information, products or services supplied, through this website for any reason whatsoever.  You agree to indemnify us and our partners, agents, employees and other authorised representatives against all claims, demands, damages, liabilities, costs or expenses arising in any way out of or in any way connected to your use of this website.  If in our reasonable opinion you fail to comply with any of these terms and conditions of use of this website, we may terminate or limit your access to this website.    
 
                  Third party products and services advertised on this website are not provided by us and your legal relationship will be with the third party supplier.  You must check with any third party supplier as to the terms of provision of such products and services and the costs and charges involved.  We may receive fees or commissions from third parties for such products and services.  We make no representations about the accuracy or suitability of the information provided on any third party websites. The information is provided 'as is' without express or implied warranty. You use the information at your own risk.  This website may contain links to other websites which are not under our control or which are not maintained by us. T he links to any such third party websites are provided for your convenience and information only.  If you access these websites you do so at your own risk.  We are not responsible for the content of those websites and will not be liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use or your reliance on any such content.  The fact that a website is linked to this website does not imply any endorsement or sponsorship by us of that website or that we are affiliated in any way with the third party operating that third party website.   

                  Any legal issues arising out of the use of this website will be governed by the laws of South Africa and by using this website you submit to the jurisdiction of the courts of SA.     
                 </div>   
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-success btn-lg pull-right">Sign Up</button>  
                    <button type="button" id="bottom-text" class="btn btn-link  btn-lg pull-left signup">Login</button>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>

    </div>
</div>    

<!-- Register Modal -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->               
        <?php echo $this->Form->create($users, ['id' => 'login-form', 'url' => ['controller' => 'users', 'action' => 'login']]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Login!</h1>
            </div>
            <div class="modal-body">
                <p class="text-success lead"><b>You are a few minutes away from the best student experience in SA! By registering below you'll get full access to jobs, bursaries, internships, mentorship, career guidance & so much more.</p>
                <p class="log-alert lead">

                </p>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="firstname" class="form-label">Email</label>
                        <?php echo $this->Form->input('email', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'email', 'label' => false, 'id' => 'r-email', 'class' => 'form-control', 'required' => false, 'error' => true]); ?>                               
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="surname" class="form-label">Password</label>
                        <?php echo $this->Form->input('password', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'password', 'label' => false, 'id' => 'r-pass', 'class' => 'form-control', 'required' => false, 'error' => true]); ?>                   
                    </div>    
                </div>
                
                <div class="modal-footer">
                    <button type="button" id="bottom-text" class="btn btn-link  pull-left register">Register</button>
                    <button type="submit"  class="btn btn-success login-status btn-lg pull-right">Login</button> 

                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>   
<!-- Register Modal -->
<div id="resetModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->               
        <?php echo $this->Form->create($users, ['id' => 'reset-form', 'url' => ['controller' => 'users', 'action' => 'resetpass']]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Reset Password</h1>
            </div>
            <div class="modal-body">               
                <div class="reset-alert"></div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="p-email" class="form-label">Email Address</label>
                        <?php echo $this->Form->input('email', ['placeholder' => 'Enter your registered email address', 'type' => 'email', 'label' => false, 'id' => 'l-email', 'class' => 'form-control', 'required' => true, 'error' => true]); ?>                               
                    </div>  
                </div>                        
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-success reset-status">Submit</button>                    
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>   
<!-- Register Modal -->
<div id="careerModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->               
        <?php //echo $this->Form->create($users, ['id' => 'res-form', 'url' => ['controller' => 'users', 'action' => 'resetpass']]); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Careers and Occupations Reference</h1>
            </div>
            <div class="modal-body">               
                <div class="reset-alert"></div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="career" class="form-label">Select a career Path</label>    
                        <?php
                        echo $this->Form->select('career_id', $careers, ['empty' => '--Choose One--', 'label' => false, 'class' => 'form-control careerid', 'id' => 'careerId','style'=>'width: 80%']);
                        ?>
                    </div>
                </div> 
                <div class="career-info">

                </div>
                <div class="modal-footer ">
                  <div class="login-desc" style="display:none">
                  <a href="#"  class="btn btn-success btn-lg pull-right signup">Login to view all career related info</a>                    
                  </div>
                 </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>    
<?php echo $this->element('Career3D.footer'); ?>

<script>
    $(document).ready(function () {
        $('#send-m').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                beforeSend: function () {
                    $(".reset-status").html("<p>sending....</p><i class='fa fa-envelope-o fa-spin' style='font-size:24px'></i>");
                },
                success: function (data, textStatus, jqXHR)
                {
                    $(".m-alert").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        $(".register").click(function (event) {
            event.preventDefault();
            $("#loginModal").modal('hide');
            $("#regModal").modal();
        });

        $(".career-in").click(function (event) {
            event.preventDefault();
            $("#careerModal").modal();
        });

        $('.careerid').change(function () {
            var career = $(this).val();
            if (career == '') {
                return false;
            }
            var url = "<?php echo Router::url('/career3-d/pages/careerinfo/'); ?>" + career;
            $.ajax({
                url: url,
                type: "GET",
                asyn: false,
                beforeSend: function () {
                    $(".career-info").html("<p>Loading career info....</p>");
                },
                success: function (data, textStatus, jqXHR)
                {
                    $(".career-info").html(data);
                    $(".login-desc").show();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        $(document).on("click",".signup",function (event) {
            event.preventDefault();
            $("#regModal,#careerModal").modal('hide');
            $("#loginModal").modal();
        });
        $(".reset-p").click(function () {
            $("#resetModal").modal();
        });
        $('#b-date').datepicker();

        $('#reg-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#reg-form").serialize();
            var url = "<?php echo Router::url('/career3-d/pages/register'); ?>";
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#regModal").modal('toggle');
                        $("#loginModal").modal();
                        $(".log-alert").html("<div class='alert alert-success'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>Success!</strong> Registration was successful, please login with your email and password.</div>");
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    //location.reload();
                }
            });
        });

        $('#logi-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#login-form").serialize();
            var url = $("#login-form").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#loginModal").modal('hide');
                        window.location.href = "<?php echo Router::url('/career3-d/users/dashboard'); ?>";
                    } else {
                        $(".log-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

        $('#reset-form').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                beforeSend: function () {
                    $(".reset-status").html("<p>sending....</p><i class='fa fa-envelope-o fa-spin' style='font-size:24px'></i>");
                },
                success: function (data, textStatus, jqXHR)
                {
                    $(".reset-status").html('Submit');
                    $(".reset-alert").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    // location.reload();
                    $(".reset-status").html('Submit');
                }
            });
        });

        $('#career').select2({
            placeholder: '--Choose One--',           
            allowClear: true
            
        });
        
        $('#careerId').select2({
            placeholder: '--Choose One--',           
            allowClear: true
            
        });
        
        $(document).on("click",".terms",function (event) {
          $(".terms-info").toggle();
        });


    });

</script>

