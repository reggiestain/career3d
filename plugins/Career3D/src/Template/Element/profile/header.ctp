<?php

;
//use Cake\Routing\Router;
?>
<style>
    .navbar-default .navbar-nav > li > a {
        color: #fff !important;
    } 
    .navbar-form input[type=text]{
        width:300px !important;
    }
    .head-list{
        color: #fff !important;  
    }
    .panel-heading{
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    body {
        padding-top: 50px;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        margin-top: -1px;
        padding: 6px 20px;
    }
    .input-group-btn .btn-group {
        display: flex !important;
    }
    .btn-group .btn {
        border-radius: 0;
        margin-left: -1px;
    }
    .btn-group .btn:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .btn-group .form-horizontal .btn[type="submit"] {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .form-horizontal .form-group {
        margin-left: 0;
        margin-right: 0;
    }
    .form-group .form-control:last-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    /* Dropdown Button */
    .dropbtn {
        background-color: #3498DB;
        color: white;
        padding-top: 16px !important;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover, .dropbtn:focus {
        background-color: #2980B9;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        width:500px;
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;    
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd}

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {display:block;}

    @media screen and (min-width: 768px) {
        #adv-search {          
            width: 400px;
            margin: 0 auto;
        }
        .dropdown.dropdown-lg {
            position: static !important;
        }
        .dropdown.dropdown-lg .dropdown-menu {
            min-width: 400px;
        }
    }
</style>
<div class="navbar-wrapper">
    <div class="container-fluid">
        <div class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: black">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./ORqmj" style="margin-right:-8px; margin-top:-5px;">
                        <img alt="Brand" src="https://lut.im/7trApsDX08/GeilMRp1FIm4f2p7.png" width="30px" height="30px">
                    </a>
                    <a class="navbar-brand" href="./ORqmj">Career3d</a>
                    <i class="brand_network"><small><small>African Guidance</small></small></i>
                </div>

                <div class="navbar-collapse collapse">
                    <div class="col-sm-3 col-md-4">    
                        <!--<form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control se"  placeholder="Search" name="search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                                
                            </div>
                        </form>-->

                        <!--<div class="input-group" id="adv-search" style="margin-top:10px;">
                            <input type="text" class="form-control" placeholder="Search" />
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="filter">Filter by</label>
                                                    <select class="form-control">
                                                        <option value="0" selected>All Snippets</option>
                                                        <option value="1">Featured</option>
                                                        <option value="2">Most popular</option>
                                                        <option value="3">Top rated</option>
                                                        <option value="4">Most commented</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contain">Author</label>
                                                    <input class="form-control" type="text" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="contain">Contains the words</label>
                                                    <input class="form-control" type="text" />
                                                </div>
                                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>-->
                        <form class="navbar-form" role="search">
                            <div class="dropdown">
                                <input type="text" id="myInput" class="form-control" onkeydown="filterFunction()" placeholder="Search..." />
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                <div id="myDropdown" class="dropdown-content">                                   
                                 <a href="#"><strong><i class="fa fa-group" aria-hidden="true"></i>  Students </strong></a>
                                 <a href="#"><strong><i class="fa fa-slideshare" aria-hidden="true"></i>  Mentors</strong></a>
                                 <a href="#"><strong><i class="fa fa-thumbs-up" aria-hidden="true"></i>  Recruiters</strong></a>
                                 <a href="#"><strong><i class="fa fa-graduation-cap" aria-hidden="true"></i>  Jobs</strong></a>
                                </div>
                                <div id="secDropdown" class="dropdown-content">
                                <?php 
                                foreach ($profileSearch as $member) {
                                 echo '<a href="#"><strong>'.$member->name.'</strong></a>';
                                
                                 }
                                ?>       
                                </div>
                            </div>
                        </form>
                    </div>
                    <ul class="nav nav-tabs navbar-right">
                        <!--<li><a href="./ORqmj">Stream</a></li>
                        <li><a href="#">My Activity</a></li>-->
                        <li class="dropdown">
                            <a href="<?php echo Cake\Routing\Router::url('/career3-d/users/dashboard');?>" class="head-list" style="text-align:center">
                                <i class="fa fa-home fa-lg" aria-hidden="true"></i><br>
                                Home
                            </a>
                        </li>
                        <li class="dropdown">
                            <?php if(''){ ?>
                            <span class="badge badge-important"><?php echo '';?></span>
                            <?php }?>
                            <a href="#" class="dropdown-toggle head-list" data-toggle="dropdown" style="text-align:center">
                                <i class="fa fa-hand-paper-o fa-lg" aria-hidden="true"></i><br>
                                Internships
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <?php if(''){ ?>
                            <span class="badge badge-important"><?php echo '';?></span>
                            <?php }?>
                            <a href="#" class="dropdown-toggle head-list" data-toggle="dropdown" style="text-align:center">
                                <i class="fa fa-hard-of-hearing fa-lg" aria-hidden="true"></i><br>
                                Bursaries
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <?php if(''){ ?>
                            <span class="badge badge-important"><?php echo '';?></span>
                            <?php }?>
                            <a href="#" class="dropdown-toggle head-list" style="text-align:center">
                                <i class="fa fa-bell-o fa-lg" aria-hidden="true"></i><br>
                                Notifications
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li>
                            <?php if(''){ ?>
                            <span class="badge badge-important"><?php echo '';?></span>
                            <?php }?>
                            <a href="<?php echo Cake\Routing\Router::url('/career3-d/networks/index');?>" class="head-list" style="text-align:center">
                                <i class="fa fa-users fa-lg" aria-hidden="true"></i><br>
                                Network
                               <!-- <span class="caret"></span>-->
                            </a>
                        </li>
                        <li>
                            <?php if($mcount){ ?>
                            <span class="badge badge-important"><?php echo $mcount;?></span>
                            <?php }?>
                            <a href="<?php echo Cake\Routing\Router::url('/career3-d/messages/index');?>" class="head-list" style="text-align:center">
                                <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><br>
                                Messaging
                               <!-- <span class="caret"></span>-->
                            </a>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle head-list" data-toggle="dropdown">
                                <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <?php                                             
                                if($img === 'profile.jpg'){
                                echo $this->Html->image('Career3D.upload/avatar/'.$img,['class'=>'img-responsive img-circle','alt'=>'Profile image','style'=>'width:30px;height:30px']);
                                }else{
                                echo $this->Html->image('Career3D.upload/avatar/'.$img->avatar,['class'=>'img-responsive img-circle','alt'=>'Profile image','style'=>'width:30px;height:30px']);    
                                }
                                ?>    
                                </span>
                                <span class="user-name">
                                <?php echo 'Me';?>
                                </span>
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="navbar-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                            <?php                                             
                                            if($img === 'profile.jpg'){
                                            echo $this->Html->image('Career3D.upload/avatar/'.$img,['class'=>'img-responsive','alt'=>'Profile image','style'=>'width:120px;height:120px']);
                                            }else{
                                            echo $this->Html->image('Career3D.upload/avatar/'.$img->avatar,['class'=>'img-responsive','alt'=>'Profile image','style'=>'width:120px;height:120px']);    
                                            }
                                             ?>                  
                                           <!-- <p class="text-center small">
                                                   <a href="./3X6zm">Change Photo</a></p>-->
                                            </div>
                                            <div class="col-md-7">
                                                <span><?php echo $profile->name;?></span>
                                                <p class="text-muted small">
                                                    <?php echo $profile->email;?></p>
                                                <div class="divider">
                                                </div>
                                                <a href="<?php echo Cake\Routing\Router::url('/career3-d/users/profile');?>" class="btn btn-default btn-xs"><i class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
                                                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-address-card-o" aria-hidden="true"></i> Contacts</a>
                                                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
                                                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Help!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-footer">
                                        <div class="navbar-footer-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Passowrd</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="<?php echo Cake\Routing\Router::url('/career3-d/users/logout');?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Sign Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  
       
    $(document).on('click','#myInput',function(){
        $("#myDropdown").toggle();
        $("#secDropdown").hide();
    });
    
    
    
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    function filterFunction() {
         $("#myDropdown").hide();
         $("#secDropdown").toggle();
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("secDropdown");
        a = div.getElementsByTagName("a");
        
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

 

</script>    
