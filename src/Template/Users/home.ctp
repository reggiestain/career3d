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
   
      <!--
      ========================================================
      							HEADER
      ========================================================
      
      
      -->
      <?php echo $this->element('header');?>
      <!--
      ========================================================
                                  CONTENT
      ========================================================
      -->
         
    <main>
    <div class="col-md-4">
    <a style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=judahtips15-20&marketplace=amazon&region=US&placement=B01J2QN7RU&asins=B01J2QN7RU&linkId=e3b14f7f1965e5b4ef080701159c8cb9&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff">
    </a>     
    </div>       
       
    <section class="camera_container">
        <div id="camera" class="camera_wrap">
            <!--<div data-src="images/page-1_slide01.jpg">-->
            <div data-src="<?php echo $this->request->webroot.'img/page-1_slide01.jpg'?>">    
                <div class="camera_caption fadeIn">
                    <div class="container">
                        <div class="row">
                            <div class="preffix_6 grid_6">Helping with any of your business needs!</div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-src="<?php echo $this->request->webroot.'img/page-1_slide02.jpg'?>">
                <div class="camera_caption fadeIn">
                    <div class="container">
                        <div class="row">
                            <div class="preffix_6 grid_6">The best strategies to attract new business</div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-src="<?php echo $this->request->webroot.'img/page-1_slide03.jpg'?>">
                <div class="camera_caption fadeIn">
                    <div class="container">
                        <div class="row">
                            <div class="preffix_6 grid_6">Marketing that will take your business to the top.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container banner_wr">
            <ul class="banner">
                <li>
                    <div class="fa-globe"></div>
                    <h3>Web<br/>Devlopement</h3>
                    <p>
                        Looking for an in house web designer or website developer that will work with you on all of your projects, such as an in-house designer or developer. We at Hidden Web Genius can assist you, with our unique approach we can offer you a new remote team member that will meet and understand your requirements.

                        Unlike taking the freelancing approach, we offer you a high level of professionalism, and qualified skill designers and developers.

                        Outsourcing your work has many benefits from cutting cost to improving productivity. We understand the Web industry and the demand from the customers that’s required on every project. With our special team and structure we can work with any company looking to hire a remote developer or a designer to be part of their team.   
                    </p><a href="#"></a>
                </li>
                <li>
                    <div class="fa-cog"></div>
                    <h3>Graphic<br/>Design</h3>
                    <p>
                        A logo is a piece of art which will reflect your brand identity onto your customer and 
                        logo design shows your thought to your customer, log design itself is an art and this is the right platform to develop it.    
                    </p><a href="#"></a>
                </li>
                <li>
                    <div class="fa-lightbulb-o"></div>
                    <h3>SEO<br/></h3>
                    <p>
                        In SEO we go beyond ranking and do everything to give Return on investment to client.
                        Word of Mouth Publicity is getting transferred over to Social Media.
                        Start a Campaign today and see what difference it can make to your business.   
                    </p><a href="#"></a>
                </li>

                <li>
                    <div class="fa-thumbs-up"></div>
                    <h3>Internet <br>Marketing</h3>
                    <p>
                        The competition is tough today. It will be tougher tomorrow. But you need not worry for we'll provide you with marketing strategies and solutions that will outshine you from the rest. Try out our eminent website, MarketingAxle.    
                    </p><a href="#"></a>
                </li>
            </ul>
        </div>
    </section>
    <section class="well ins1">
        <div class="container hr">
            <ul class="row product-list">
                <li class="grid_6">
                    <div class="box wow fadeInRight">
                        <div class="box_aside">
                            <div class="icon fa-send"></div>
                        </div>
                        <div class="box_cnt__no-flow">
                            <h3><a href="#">SMS Marketing</a></h3>
                            <p>
                                Manage your SMS and email marketing on the same platform. Create integrated, cross-channel campaigns with personalised, rich-content SMSes 
                                for better engagement, and track everything that happens after you send.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div data-wow-delay="0.2s" class="box wow fadeInRight">
                        <div class="box_aside">
                            <div class="icon fa-comment-o"></div>
                        </div>
                        <div class="box_cnt__no-flow">
                            <h3><a href="#">Social Media Marketing</a></h3>
                            <p>
                                Social Marketing is an integral part of the web and is beneficial for increasing search results.    
                            </p>
                        </div>
                    </div>
                </li>
                <li class="grid_6">
                    <div data-wow-delay="0.3s" class="box wow fadeInRight">
                        <div class="box_aside">
                            <div class="icon fa-mail-reply-all"></div>
                        </div>
                        <div class="box_cnt__no-flow">
                            <h3><a href="#">Email Marketing</a></h3>
                            <p>
                                Complex email marketing campaigns with ease. Our software is fully POPI compliant, with large-scale sending infrastructure to ensure the best delivery rates.   
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div data-wow-delay="0.4s" class="box wow fadeInRight">
                        <div class="box_aside">
                            <div class="icon fa-briefcase"></div>
                        </div>
                        <div class="box_cnt__no-flow">
                            <h3><a href="#">Automated Lead Management</a></h3>
                            <p>
                                Lead generation is the marketing process of stimulating and capturing interest in a product or service for the purpose of developing sales for your agency. It often uses digital channels, and has been undergoing substantial changes in recent years from the rise of new online and social techniques.  
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="well1">
        <div class="container">
            <div class="row">
                <div class="grid_4">
                    <h2>About</h2><img src="images/page-1_img01.jpg" alt="">
                    <p>
                        Looking for an in house web designer or website developer that will work with you on all of your projects, such as an in-house designer or developer. We at Hidden Web Genius can assist you, with our unique approach we can offer you a new remote team member that will meet and understand your requirements.

                        Unlike taking the freelancing approach, we offer you a high level of professionalism, and qualified skill designers and developers.

                        Outsourcing your work has many benefits from cutting cost to improving productivity. We understand the Web industry and the demand from the customers that’s required on every project. With our special team and structure we can work with any company looking to hire a remote developer or a designer to be part of their team.       
                    </p>
                    <a href="#" class="btn">Read more</a>
                </div>
                <div class="grid_4">
                    <h2>Services</h2>
                    <p></p>
                    <ul class="marked-list">
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Search Engine Optimization</a></li>
                        <li><a href="#">Internet Marketing</a></li>
                        <li><a href="#">SMS Marketing</a></li>
                        <li><a href="#">Email Marketing</a></li>
                        <li><a href="#">Social Media Marketing</a></li>
                        <li><a href="#">Automated Lead Management</a></li>
                    </ul><a href="#" class="btn">Read more</a>
                </div>
                <div class="grid_4">
                    <div class="info-box">
                        <h2 class="fa-comment">Help center</h2>
                        <hr>
                        <h3>Ask professionals:</h3>
                        <dl>
                            <dt>Monday - Friday:</dt>
                            <dd>8am-7pm</dd>
                        </dl>
                        <dl>
                            <dt>Saturday:</dt>
                            <dd>8am-5pm</dd>
                        </dl>
                        <dl>
                            <dt>Sunday:</dt>
                            <dd>1pm-5pm</dd>
                        </dl>
                        <hr>
                        <h3>24/7 Online Support:</h3>
                        <dl>
                            <dt>info@judahtips.org</dt>
                        </dl>
                    </div>
                    <div class="owl-carousel">
                        <div class="item">
                            <blockquote class="box">
                                <div class="box_aside"><img src="images/page-1_img02.jpg" alt=""></div>
                                <div class="box_cnt__no-flow">
                                    <p>
                                        <q>Smashing Magazine – For Professional Web Designers and Developers.</q>
                                    </p>
                                    <cite><a href="https://www.smashingmagazine.com">Check it out!</a></cite>
                                </div>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote class="box">
                                <div class="box_aside"><img src="images/page-1_img03.jpg" alt=""></div>
                                <div class="box_cnt__no-flow">
                                    <p>
                                        <q>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</q>
                                    </p>
                                    <cite><a href="#">Incididunt ut labor</a></cite>
                                </div>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote class="box">
                                <div class="box_aside"><img src="images/page-1_img04.jpg" alt=""></div>
                                <div class="box_cnt__no-flow">
                                    <p>
                                        <q>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</q>
                                    </p>
                                    <cite><a href="#">Incididunt ut labor</a></cite>
                                </div>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote class="box">
                                <div class="box_aside"><img src="images/page-1_img05.jpg" alt=""></div>
                                <div class="box_cnt__no-flow">
                                    <p>
                                        <q>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</q>
                                    </p>
                                    <cite><a href="#">Incididunt ut labor</a></cite>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--
========================================================
                            FOOTER
========================================================
-->
<footer>
    <section class="well3">
        <div class="container">
            <ul class="row contact-list">
                <li class="grid_4">
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-map-marker"></div>
                        </div>
                        <div class="box_cnt__no-flow">
                            <address>93 horbill avenue rooihuiskraal, centurion<br/> Pretoria</address>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-envelope"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a href="mailto:info@judahtips.org">info@judahtips.org</a></div>
                    </div>
                </li>
                <li class="grid_4">
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-phone"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a href="callto:+27784450830">+27 78 445 0830</a></div>
                    </div>
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-fax"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a href="callto:+27784450830">+27 78 445 0830</a></div>
                    </div>
                </li>
                <li class="grid_4">
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-facebook"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a href="#">Follow on facebook</a></div>
                    </div>
                    <div class="box">
                        <div class="box_aside">
                            <div class="icon2 fa-twitter"></div>
                        </div>
                        <div class="box_cnt__no-flow"><a href="#">Follow on Twitter</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="copyright">Judahtips © <span id="copyright-year"></span>.&nbsp;&nbsp;<a href="#"></a>
            </div>
        </div>
    </section>
   <?php //echo $this->element('footer');?>
</footer>	