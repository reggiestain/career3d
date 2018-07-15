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


if($msg === 'error'){
  echo "<div class='alert alert-warning alert-dismissable'><a href ='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong> Error! </strong>An".$msg." occured, please try again.</div>"; 
}else{
  //$msg = ($msg === 'connect') ? true : false;
  if($msg === 'Connect'){
  echo "<div class='alert alert-success alert-dismissable'><a href ='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong> Success! </strong>Request has been sent successfully.</div>";   
  }else {
  echo "<div class='alert alert-success alert-dismissable'><a href ='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong> Success! </strong>Request has been cancelled successfully.</div>";   
  }
}

    