<?php;
//use Cake\Routing\Router;
?>
<style>
header a[href^="mailto:"]::before {
    color: #6bc7ed;
    font-size: 34px;
    left: -44px;
    position: absolute;
    top: -4px;
}   
.fa-mail-reply::before {
    content: "\f003";
}
header a[href^="mailto:"] {
    color: #777777;
    font-size: 24px;
    margin-top: 7px;
    position: relative;
}
header a[href^="mailto:"], header .container > p {
    clear: right;
    float: right;
}
</style>
<header>
        <div class="container">
          <div class="brand">
            <h1 class="brand_name"><a href="./">Judahtips</a></h1>
            <?php //echo $this->Html->image('judahtips-logo.png',['style'=>'width:']);?>
            <p class="brand_slogan"></p>
          </div>
            <a href="callto:+27784450830" class="fa-phone">+27 78 445 0830</a><br>
            <a href="mailto:info@judahtips.org" class="fa-envelope">info@judahtips.org</a>
          <p>One of our representatives will happily contact you within 24 hours. For urgent needs email us at info@judahtips.org</p>
        </div>
        <div id="stuck_container" class="stuck_container">
          <div class="container">
            <nav class="nav">
              <ul data-type="navbar" class="sf-menu">
                <li class="active"><a href="./">Home</a>
                </li>
                <li><a href="<?php //echo \Cake\Routing\Router::Url('/users/about');?>">About</a>                  
                </li>
                <li><a href="<?php //echo \Cake\Routing\Router::Url('/users/services');?>">Services</a>
                 <!--
                 <ul>                   
                    <li><a href="#">Lorem ipsum dolor</a></li>
                    <li><a href="#">Conse ctetur adipisicing</a></li>
                    <li><a href="#">Elit sed do eiusmod
                        <ul>
                          <li><a href="#">Lorem ipsum</a></li>
                          <li><a href="#">Conse adipisicing</a></li>
                          <li><a href="#">Sit amet dolore</a></li>
                        </ul></a></li>
                    <li><a href="#">Incididunt ut labore</a></li>
                    <li><a href="#">Et dolore magna</a></li>
                    <li><a href="#">Ut enim ad minim</a></li>
                  </ul> 
                    -->
                </li>
                <li><a href="#">Products</a>
                <ul> 
                    <li><?php echo $this->Html->link('Career3D',['plugin' => 'Career3D', 'controller' => 'users', 'action' => 'index'],['target' => '_blank']);?></li>
                    <li><a href="<?php echo \Cake\Routing\Router::Url('/reg-master/pages');?>" target="_blank">RegMaster</a></li>           
                    <li><a href="http://judahtips.org/careers/demos/simple" target="_blank">Career Guide App</a></li>
                </ul>   
                </li>    
                <li><a href="#">FAQS</a>
                </li>
                <li><a href="<?php echo \Cake\Routing\Router::Url('/users/contact');?>">Contacts</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </header>