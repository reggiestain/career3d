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

<?php echo $this->element('Career3D.header');?>

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
                                        <h1>best mobIle app</h1>
                                        <span>Download this cool app for free</span>
                                        <p>velit ullamcorper, lobortis vel, vel ad duis lorem nisl. Iriure dolore et eros aliquip aliquip zzril vel praesent ex feugiat dolor nostrud eu vel delenit. Duis eu qui iusto, commodo consequat, consequat laoreet augue, duis at adipiscing ullamcorper facilisis dolor te odio. </p>
                                        <a href="#"><i> </i>Download </a>
                                    </div>
                                </div>														
                            </div>
                        </div>
                        <div class="col-md-6 banner-side">
                            <div class="col-md-6 side">
                                <img class="img-responsive" src="web/images/ba.jpg" alt="">
                            </div>
                            <div class="col-md-6 side">
                                <img class="img-responsive" src="web/images/ba1.jpg" alt="">
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
                                        <?php echo $this->Html->image('Career3D.img/student-banner-2.jpg',['class'=>'img-responsive center-block','style'=>'height:550px']);?>
                                <div class="carousel-caption">                        
                                    <h3>First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="item">
                                        <?php echo $this->Html->image('Career3D.img/student-6.jpg',['class'=>'img-responsive center-block']);?>
                                <div class="carousel-caption">
                                    <h3>First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="item">
                                        <?php echo $this->Html->image('Career3D.img/student-banner.jpg',['class'=>'img-responsive center-block','style'=>'height:500px']);?>
                                <div class="carousel-caption">
                                    <h3>First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
                            <?php echo $this->Html->image('Career3D.img/studies.jpg',['class'=>'img-responsive']);?>                                    
                    </div>

                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1>A</h1>
                        </div>

                        <h3>Academics</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail">
                    <div class="about-img">
                            <?php echo $this->Html->image('Career3D.img/careers.jpg',['class'=>'img-responsive','title'=>'image']);?>
                    </div>

                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1>C</h1>
                        </div>

                        <h3>Career Guidance</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail clearfix">
                    <div class="about-img">                        
                            <?php echo $this->Html->image('Career3D.img/internships.jpg',['class'=>'img-responsive']);?>
                    </div>

                    <div class="about-details">
                        <div class="pentagon-text">
                            <a href="<?php echo \Cake\Routing\Router::Url('/career-3d/users/assessment');?>"><h1>M</h1></a>
                        </div>

                        <h3>Mentorship Program</h3>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
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
                                <?php echo $this->Html->image('Career3D.img/absa-4.png',['class'=>'img-responsive','style'=>'200px;height:100px']);?>                                    
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
                                <?php echo $this->Html->image('Career3D.img/allan-gray.png',['class'=>'img-responsive','style'=>'200px;height:100px']);?>                                    
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
                                <?php echo $this->Html->image('Career3D.img/ekulu.png',['class'=>'img-responsive','style'=>'200px;height:100px']);?>
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
                                <?php echo $this->Html->image('Career3D.img/eskom.png',['class'=>'img-responsive','style'=>'200px;height:100px']);?>                                    
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
                            <?php echo $this->Html->image('Career3D.img/item1.jpg',['class'=>'img-responsive']);?>
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
                            <?php echo $this->Html->image('Career3D.img/item2.jpg',['class'=>'img-responsive']);?>
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                            <?php echo $this->Html->image('Career3D.img/item3.jpg',['class'=>'img-responsive']);?>
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
                            <?php echo $this->Html->image('Career3D.img/item4.jpg',['class'=>'img-responsive']);?>
                </div>
            </div>

            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                            <?php echo $this->Html->image('Career3D.img/item5.jpg',['class'=>'img-responsive']);?>
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
                            <?php echo $this->Html->image('Career3D.img/item6.jpg',['class'=>'img-responsive']);?>
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
                        <ul><li><i class="fa fa-map-marker"></i><span>Address:</span> 123 Some Street , California, US, CP 123</li></ul>
                        <ul><li><i class="fa fa-phone"></i><span>Phone:</span> (01) 999-1235</li></ul>
                        <ul><li><i class="fa fa-fax"></i><span>Fax:</span> (01) 999-1234</li></ul>
                        <ul><li><i class="fa fa-envelope"></i><span>Email:</span> info@domain.com</li></ul>
                    </div>
                </div>


                <div class="col-md-6 col-md-offset-1 contact-form">
                    <h3>leave us a message</h3>

                    <form class="form">
                        <input class="name" type="text" placeholder="Name">
                        <input class="email" type="email" placeholder="Email">
                        <input class="phone" type="text" placeholder="Phone No:">
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
                <h1 class="modal-title">Register so you can get a job!</h1>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create(null,['id'=>'reg-form','url'=>['controller' => 'users', 'action' => 'register']]);?>
                <p class="text-success lead"><b>You are a few minutes away from the best student experience in SA! By registering below you'll get full access to jobs, bursaries, internships, mentorship, career guidance & so much more.</p>
                <p class="reg-alert"></p>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="firstname" class="form-label">First Name</label>
                                <?php echo $this->Form->input('firstname',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                               
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="surname" class="form-label">Surname</label>
                                <?php echo $this->Form->input('surname',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                   
                    </div>    
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="email" class="form-label">Email Address</label>
                                <?php echo $this->Form->input('email',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                             
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="phone" class="form-label">Phone Number</label>
                                <?php echo $this->Form->input('mobile',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>                            
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">    
                        <label for="date_of_birth" class="form-label">Date of birth</label>   
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                
                            <?php echo $this->Form->input('birth_date',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control datepicker','id'=>'b-date','required'=>false, 'error' => true]);?>
                        </div>              
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label for="career" class="form-label">Career Path</label>    
                        <?php           
                        echo $this->Form->select('career_id',$careers, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label for="gender" class="form-label">Driver’s License</label>    
                        <?php          
                        $gender = ['Yes'=>'Yes','No'=>'No'];
                        echo $this->Form->select('career_id',$gender, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                        ?>
                    </div>                    
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label for="gender" class="form-label">Province</label>    
                        <?php          
                        $gender = ['Male'=>'Male','Female'=>'Female'];
                        echo $this->Form->select('career_id',$gender, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);
                        ?>
                    </div>
                </div>  
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="pwd" class="form-label">Password</label>
                                <?php echo $this->Form->input('password',['templates' => ['inputContainer' => '{{content}}'],'type' => 'password','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                     
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="pwd-confirm" class="form-label">Confirm Password</label>
                                <?php echo $this->Form->input('confirm_password',['templates' => ['inputContainer' => '{{content}}'],'type' => 'password','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="submit" id="bottom-text" class="btn btn-success">Submit</button>  
                    <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
                    <?php echo $this->Form->end();?>
        </div>

    </div>
</div>    

<!-- Register Modal -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->               
       <?php echo $this->Form->create($users,['id'=>'login-form','url'=>['controller' => 'users','action' => 'login']]);?>
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
                                <?php echo $this->Form->input('email',['templates' => ['inputContainer' => '{{content}}'],'type' => 'email','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                               
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="surname" class="form-label">Password</label>
                                <?php echo $this->Form->input('password',['templates' => ['inputContainer' => '{{content}}'],'type' => 'password','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                   
                    </div>    
                </div>                        
                <div class="modal-footer">
                    <button type="submit" id="bottom-text" class="btn btn-success">Login</button>     
                </div>
            </div>
        </div>
                <?php echo $this->Form->end();?>

    </div>
</div>    
   <?php echo $this->element('Career3D.footer');?>

<script>
    $(document).ready(function () {
        $(".register").click(function () {
            $("#regModal").modal();
        });
        $(".signup").click(function () {
            $("#loginModal").modal();
        });
        $('#b-date').datepicker();
        
        $('#reg-form').submit(function (event) {
            event.preventDefault();
            var formData = $("#reg-form").serialize();
            var url = $("#reg-form").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#regModal").modal('hide');
                        $(".log-alert").html("<div class='alert alert-success'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>Success!</strong> Registration was successful, please login with your email and password.</div>");
                        $("#loginModal").modal('show');
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
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
                       //window.location.href ="<?php echo Router::url('career3-d/users/dashboard');?>";
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

    });






</script>

