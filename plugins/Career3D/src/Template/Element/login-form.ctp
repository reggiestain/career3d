<?php;
//use Cake\Routing\Router;
?>
 <!-- Modal content-->
                <?php echo $this->Form->create('Recipe',['id'=>'reg-form','url'=>['controller' => 'users', 'action' => 'register']]);?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title">Login so you can get a job!</h1>
                    </div>
                    <div class="modal-body">
                        <p class="text-success lead"><b>You are a few minutes away from the best student experience in SA! By registering below you'll get full access to jobs, bursaries, internships, mentorship, career guidance & so much more.</p>
                        <p class="reg-alert"></p>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="firstname" class="form-label">Email</label>
                                <?php echo $this->Form->input('email',['templates' => ['inputContainer' => '{{content}}'],'type' => 'email','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>                               
                            </div>
                            <div class="form-group col-md-6">
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