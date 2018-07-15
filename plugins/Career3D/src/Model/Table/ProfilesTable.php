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

class ProfilesTable extends Table {

    public function initialize(array $config) {

        $this->table('profiles');
        $this->addBehavior('Timestamp');  
        $this->addBehavior('Career3D.FindUser');
        
        $this->belongsTo('Career3D.Users', [
            'className' => 'Career3D.Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Career3D.ProfileCareers');
        
        $this->belongsTo('Career3D.Provinces', [
            'className' => 'Career3D.Provinces',
            'foreignKey' => 'province_id',
            'joinType' => 'INNER'
        ]);
        
    }

    
    public function validationDefault(Validator $validator) {

       $validator->notEmpty('firstname', 'First name is required.')
                ->notEmpty('surname', 'Surname is required.')
                ->notEmpty('birth_date', 'Date of birth is required.')
                ->notEmpty('career_id', 'Career Path is required.')
                ->add('email', ['unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => 'This email already exist.']
                        ],
                        'validFormat', [
                    'rule' => 'email',
                    'message' => 'E-mail must be a valid email address.'
                ]
                )
                ->notEmpty('province_id', 'Province is required.')
               ->notEmpty('gender', 'Gender is required.')
                ->notEmpty('mobile', 'Mobile number is required.')
                ->notEmpty('date_of_birth', 'Date of birth is required.')
                ->add('mobile', 'notEmpty', [
                    'rule' => ['custom', '/^([0-9]{1}[0-9]{9})$/'],
                    'message' => __('Invalid mobile number! mobile number format: eg 0755434434')
                ])
               
                ->add('mobile', ['unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => 'This mobile number already exist.']
                        ]
                )->add('password', [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => 'Password must contain at least 6 character'
                    ],]
                );
        
                
        
        return $validator;
    }

}
