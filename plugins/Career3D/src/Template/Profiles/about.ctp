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
<div class="pages_banner text-center">
    <a href="<?php echo \Cake\Routing\Router::Url('/profiles/register');?>" class="btn btn-danger">START A CAMPAIGN</a>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>WHAT IS PROQUEST</h1>
                <p>
                    <strong>ProQuest, powered by CrowdQuest, is a crowd-funding platform created to empower athletes to fund their quest to become professional athletes.</strong>
                    <br>
                    <br>
                    ProQuest is dedicated to making athletes’ dreams a reality. Both individuals and businesses can support and connect directly, building a personal connection, with each athlete while helping them fulfill their sporting aspirations and, journey to success.
                    <br>
                    <br>
                    Financial support for athlete Campaigns, goes directly to the athlete, to support items like training, coaching, nutrition, team fees, equipment, travel, and basic living expenses.
                    <br>
                    <br>
                    Founded by Tony Harding and ProTouch Sports, a sports management business that believes in enriching and developing people, through participation in sports.
                    <br>
                    <br>
                    Tony has over 15 years of experience in professional cycling, having managed some of the best National Team members, Olympic and Commonwealth Games, professional teams and individuals racing in both South Africa and abroad. Tony also has a professional relationship with Robert Hunter who, through ProTouch Global, acts as an agent and representative for European-based cyclists and other professional athletes.
                </p>
                <hr>
                <h1>FEES</h1>
                <p>
                    PROQUEST is free for supporters to register and to contribute to a Campaign. It costs the athlete R150 to register and create their first Campaign. Thereafter each campaign costs R150.
                    <br>
                    <br>
                    When an athlete’s Campaign raises funds, PROQUEST charges a 15% fee on the total funds raised. This fee is used by PROQUEST to provide marketing support, administration and payment processing charges.    
                </p>
                <hr>                
                <a href="<?php echo \Cake\Routing\Router::Url('/profiles/register');?>" class="btn btn-danger">START YOUR PROQUEST CAMPAIGN</a>
            </div>
            <div class="col-md-3 sidebar">
              <?php echo $this->element('sidebar'); ?>
            </div>
        </div>
    </div>
</section>
