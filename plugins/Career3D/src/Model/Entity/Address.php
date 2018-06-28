<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Career3D\Model\Entity;

use Cake\ORM\Entity;

class Address extends Entity {

// Make all fields mass assignable for now.
    protected $_accessible = ['*' => true];
    
    protected function _getAddress(){
        return  $this->line_1.'<br>' .$this->line_2.'<br><br>'.$this->city;
        
   }
}
