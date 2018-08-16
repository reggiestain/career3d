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

<style>
    .stacktable { width: 100%; }
    .st-head-row { padding-top: 1em; }
    .st-head-row.st-head-row-main { font-size: 1.5em; padding-top: 0; }
    .st-key { width: 49%; text-align: right; padding-right: 1%; }
    .st-val { width: 49%; padding-left: 1%; }



    /* RESPONSIVE EXAMPLE */

    .stacktable.large-only { display: table; }
    .stacktable.small-only { display: none; }

    @media (max-width: 800px) {
        .stacktable.large-only { display: none; }
        .stacktable.small-only { display: table; }
    }

    h2 {
        text-align: center;
        padding-top: 10px;
    }

    table caption {
        padding: .5em 0;
    }

    .p {
        text-align: center;
        padding-top: 140px;
        font-size: 14px;
    }
</style>    

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>

        <div class="col-md-8">
            <?php //echo $this->element('admin_dashboard');?>
            <div class="grid simple">
                <div class="grid-title no-border">
                    <h4>Leads  <span class="semi-bold">Received</span></h4>
                    <div class="tools">	<!--<a href="javascript:;" class="collapse"></a>-->
                        <a href="#grid-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="grid-body no-border">
                    <div class="row">
                       
                        <!--<h3><span class="semi-bold">Dashboard</span></h3>-->
                        <!--  <div class="table-responsive">
                             <table class="table table-hover table-condensed" id="example">
                                 <thead>
                                     <tr>
                                         <th style="width:6%">First Name</th>                                     
                                         <th style="width:6%">Surname</th>
                                         <th style="width:6%">Email</th>
                                         <th style="width:16%">Phone Number</th>
                                         <th style="width:6%">Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                        
                                 </tbody>
                             </table>
                         </div>-->
                        <div class="table-responsive">
                            <table class="table table-striped dataTable" id="example">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>                               
                             <?php foreach ($Agents as $Agent): ?>
                                     <tr>
                                         <td>
                             <?php echo $Agent->first_name;?>  
                                         </td>                                                                
                                         <td>
                            <?php echo $Agent->surname;?>     
                                         </td>  
                                         <td>
                            <?php echo $Agent->email;?>     
                                         </td>   
                                         <td>
                            <?php echo $Agent->phone_number;?>     
                                         </td>   
                                         <td>
                            <?php echo $this->Html->link('View Details', ['controller'=>'leads','action' => 'agent_lead', $Agent->id],['escape'=>false,'class'=>'label label-success']) ;?>
                                         </td>
                                     </tr>
                        <?php endforeach; ?>  
                            </tbody>                            
                        </table>
                 </div>    
                </div>
                 </div>    
                <br>

                <div class="grid-body no-border">    
                    <div class="row">       
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4>Sales <span class="semi-bold">Charts</span></h4>
                                <div class="tools"> <!--<a href="javascript:;" class="collapse"></a>--> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                            </div>
                            <div class="grid-body no-border">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--<h4>Sales Agents <span class="semi-bold">Line Charts</span></h4>-->
                                        <p>  </p>
                                        <div id="contain"> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>            

        <div class="col-md-4">
            <div class="tiles white">
                <div class="tiles-body"> 
                    <div class="controller">
                        <a class="reload" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                    <div class="tiles-title"> NOTIFICATIONS </div>
                    <br>            
                <?php foreach ($Leads as $Lead):?>
                    <div class="user-comment-wrapper col-mid-12">
                        <div class="profile-wrapper">
                     <?php if(!empty($Lead->profile->profile_photos->image)){?>
                            <img src="<?php echo $this->request->webroot.'img/profile_photos/'.$Lead->profile->profile_photos[0]->image;?>"  alt="" data-src="<?php echo $this->request->webroot.'img/profile_photos/'.$Lead->profile->profile_photos[0]->image;?>" data-src-retina="<?php echo $this->request->webroot.'img/profile_photos/'.$Lead->profile->profile_photos[0]->image;?>" width="35" height="35" /> 
                        <?php }else{?>
                            <img src="<?php echo $this->request->webroot.'img/profiles/default-avatar.png';?>"  alt="" data-src="<?php echo $this->request->webroot.'img/profiles/default-avatar.png';?>" data-src-retina="<?php echo $this->request->webroot.'img/profiles/default-avatar.png';?>" width="35" height="35" />
                        <?php };?>                      
                        </div>  
                        <div class="comment">
                            <div class="user-name"> <?php echo $Lead->profile->first_name;?>
                                <span class="semi-bold"> <?php echo $Lead->profile->surname;?></span>
                            </div>
                            <div class="pull-left">
                                <p><span class="muted bold text-black">Leads Taken</span></p>
                                <p><span class="muted bold text-success">+<?php echo $Lead->profile_id;?></span></p>
                                <p><span class="muted bold text-black">SOLD</span> <span class="label label-important"><?php echo $SoldLeads->first()->profile_id;?></span> </p>
                            </div>      
                        </div>    
                        <div class="clearfix"></div>    
                    </div> 
                <?php endforeach;?>
                </div>     
            </div>
            <!--Chart variables-->
            <input id="agents" type="hidden" value="<?php echo $JasonAgent;?>"/>
        </div>
    </div>
    <?php echo $this->element('admin_dashboard');?>
</div>
    <?php //echo $this->Html->script('charts');?>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
       // $('#example').stacktable();
        $('input[type="checkbox"]').click(function () {
            if ($(this).prop("checked")) {
                $(this).prop("checked", false);
            }
        });


        var jandata = '<?php echo $janData;?>';
        var jan = parseInt(jandata);
        var febdata = '<?php echo $febData;?>';
        var feb = parseInt(febdata);
        var mardata = '<?php echo $marData;?>';
        var mar = parseInt(mardata);
        var aprildata = '<?php echo $aprilData;?>';
        var april = parseInt(aprildata);
        var maydata = '<?php echo $mayData;?>';
        var may = parseInt(maydata);
        var junedata = '<?php echo $juneData;?>';
        var june = parseInt(junedata);
        var julydata = '<?php echo $julyData;?>';
        var july = parseInt(julydata);
        var augdata = '<?php echo $augData;?>';
        var aug = parseInt(augdata);
        var septdata = '<?php echo $septData;?>';
        var sept = parseInt(septdata);
        var octdata = '<?php echo $octData;?>';
        var oct = parseInt(octdata);
        var novdata = '<?php echo $novData;?>';
        var nov = parseInt(novdata);
        var decdata = '<?php echo $decData;?>';
        var dec = parseInt(decdata);

        $('#contain').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Monthly Sales Chart'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Monthly Sales'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Monthly Sales',
                    data: [jan, feb, mar, april, may, june, july, aug, sept, oct, nov, dec]
                }]
        });

    });

</script>
