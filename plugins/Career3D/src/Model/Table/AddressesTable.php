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
use Cake\Validation\Validator;

class AddressesTable extends Table {

    public function initialize(array $config) {

        $this->table('addresses');
        $this->addBehavior('Timestamp');
        // Just add the belongsTo relation with CategoriesTable
        //$this->primaryKey('id');
        $this->belongsTo('Provinces', [
            'className' => 'Provinces',
            'foreignKey' => 'province_id',
            'joinType' => 'INNER'
        ]);
    }
    
    public function validationDefault(Validator $validator) {

        $validator->notEmpty('line_1', 'Address is required')
                  ->notEmpty('city','City is required')
                  ->notEmpty('province_id','Province is required')
                   ->notEmpty('subject_id','Subject is required');
   
        return $validator;
    }
}
