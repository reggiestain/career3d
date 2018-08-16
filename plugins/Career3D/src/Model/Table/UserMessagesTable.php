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
// src/Model/Table/UsersTable.php

namespace Career3D\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class UserMessagesTable extends Table {

    public function initialize(array $config) {

        $this->table('user_messages');
        $this->addBehavior('Timestamp');
        //$this->primaryKey('profile_id');  
        
        $this->hasMany('Career3D.Users', [
            'className' => 'Career3D.Users'
        ]);
        
        $this->belongsTo('Career3D.Messages', [
            'className' => 'Career3D.Messages',
            'foreignKey' => 'message_id',
            'joinType' => 'INNER'
        ]);

    }

}
