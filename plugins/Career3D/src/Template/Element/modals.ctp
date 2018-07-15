<?php ?>
<style>
    .message-div{position: absolute; 
                 color: transparent; 
                 overflow: hidden; 
                 white-space: pre-wrap; 
                 border: 1.33333px solid rgb(204, 204, 204); 
                 border-radius: 4px; box-sizing: border-box; 
                 //height: 228px; width: 817.333px; z-index: 0; 
                 //padding: 6px 12px; margin: 0px; top: auto; 
                 left: auto; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(255, 255, 255); 
    }
</style>
<!---Upload Modal-->
<div id="profileModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->      
                   <?php //echo $this->Form->create(null,['id'=>'login-form','url'=>['controller' => 'users','action' => 'login']]);?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <form id="upload-widget" method="post" action="<?php echo Cake\Routing\Router::url('/career3-d/users/fileupload');?>" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Cancel</button>     
                </div>
            </div>
        </div>
                <?php //echo $this->Form->end(<);?>

    </div>
</div> 
<!---Certificate Modal-->
<div id="certificateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->      
                   <?php //echo $this->Form->create(null,['id'=>'login-form','url'=>['controller' => 'users','action' => 'login']]);?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <form id="cert-widget" method="post" action="<?php echo Cake\Routing\Router::url('/career3-d/users/certificateupload');?>" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Cancel</button>     
                </div>
            </div>
        </div>
                <?php //echo $this->Form->end(<);?>

    </div>
</div>

<!---Message Modal-->
<div id="messageModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->      
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">New Message</h5>
            </div>
            <div class="modal-body">
                <div class="modal-msg"></div>    
            <?php  if(!empty($netwrk)){;?>        
            <?php echo $this->Form->create($messages,['id'=>'message-form','class'=>'form-horizontal','url'=>['controller' => 'messages','action' => 'add']]);?>       
                <div class="form-group">
                    <label class="col-sm-2" for="inputTo">To</label>
                    <div class="col-sm-10">
                  <?php 
                  echo $this->Form->select('to_id',$list, ['empty'=>'-select-','class'=>'form-control multiselect-ui','label'=>false,'required'=>false,'error' => true,'style'=>'width:100%']);
                  ?>   
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="inputSubject">Subject</label>
                    <div class="col-sm-10"><input type="text" name="subject" class="form-control" id="inputSubject" placeholder="subject"></div>
                </div>
                <div class="form-group">
                 <label class="col-sm-12" for="inputBody">Message</label>
                 <div class="col-sm-12">                  
                  <?php 
                  echo $this->Form->input('message',['type' =>'textarea','class'=>'form-control','label'=>false,'required'=>false,'error' => true,'multiple'=>'multiple','style'=>'width:100%']);
                  ?> 
                 </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="bottom-text" class="btn btn-default" data-dismiss="modal">Cancel</button> 
                    <button type="submit" id="bottom-text" class="btn btn-primary">Send</button>            
                </div>
                <?php echo $this->Form->end();?>           
                
            <?php }else{
                echo "<p class='text-danger'><strong>You have no connections to send messages, please connect with people to send messages.</strong></p>"
                     . "<div class='modal-footer'><button type='button' id='bottom-text' class='btn btn-default' data-dismiss='modal'>Cancel</button> ";
                
                
            }?> 
               
            </div>
        </div>
    </div>
</div> 

<script>
    $(".multiselect-ui").select2({
        theme: "classic"
    });   
</script>    