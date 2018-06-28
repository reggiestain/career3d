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
  <section id="slider">
      <div class="main_banner">
        <div class="banner_link">
            <a href="#" class="">start your campaign</a>
        </div>
        
      </div>
  </section>
  <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
              <h1>LATEST CAMPAIGNS</h1>
              <?php echo $this->element('campaigns/campaigns'); ?>
              <div class="text-right">
                <a href="#" class="btn btn-primary view-all">view all</a>
              </div>
             <!-- <h1>CAMPAIGNS YOU LOVE</h1>
              <?php //echo $this->element('campaigns/campaigns'); ?>
              <div class="text-right">
                <a href="#" class="btn btn-primary view-all">load more</a>
              </div>-->
          </div>
          <div class="col-md-3 sidebar">
              <?php echo $this->element('sidebar'); ?>
          </div>
        </div>
      </div>
  </section>

