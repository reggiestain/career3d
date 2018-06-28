<section class="col-md-3 profile-sec">
            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <?php 
                    if($img === 'profile.jpg'){
                    echo $this->Html->image('Career3D.upload/avatar/'.$img,['class'=>'card-img-top img-circle','alt'=>'Profile image']);
                    }else{
                    echo $this->Html->image('Career3D.upload/avatar/'.$img->avatar,['class'=>'card-img-top img-circle','alt'=>'Profile image']);    
                    }
                    ?>
                    <div class="middle">
                        <div class="text profile-image">
                            <span class="glyphicon glyphicon-camera" data-toggle="tooltip" data-placement="right" title="Update Profile Picture"></span>
                        </div>   
                    </div>
                </div>
                <div class="info">
                    <div class="title">
                        <a href="<?php echo Cake\Routing\Router::url('/career3-d/users/profile');?>"><?php echo $profile->name;?></a>
                    </div>
                    <div class="desc">Passionate designer</div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek</div>
                </div>
                <div class="bottom">
                    <button type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-facebook fa-2x"></i></button>
                    <button type="button" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-youtube fa-2x"></i></button>
                    <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-linkedin-square fa-2x"></i></button>
                </div>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#"><h5>Who's viewed your profile <span class="badge badge-primary">0</span></h5></a></li>
                        <li class="list-group-item"><a href="#"><h5>My Connections <span class="badge badge-success">0</span></h5></a></li>
                        <li class="list-group-item"><a href="#"><h5>My Mentors <span class="badge badge-primary">5</span></h5></a></li>
                    </ul>
                </div>
            </div>
       
        </section>