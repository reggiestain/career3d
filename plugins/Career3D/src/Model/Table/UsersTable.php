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
use Cake\ElasticSearch\Type;

class UsersTable extends Table {

    public function initialize(array $config) {

        $this->table('users');
        $this->addBehavior('Timestamp');
        //$this->primaryKey('profile_id');  
        
        $this->hasMany('Career3D.Posts', [
            'className' => 'Career3D.Posts'
        ]);
        
        $this->hasMany('Career3D.Likes', [
            'className' => 'Career3D.Likes'
        ]);
        
        $this->hasMany('Career3D.Photos', [
            'className' => 'Career3D.Photos'
        ]);
        
        $this->hasMany('Career3D.Tertiaries', [
            'className' => 'Career3D.Tertiaries'
        ]);
        
        $this->hasMany('Career3D.HighSchools', [
            'className' => 'Career3D.HighSchools'
        ]);
        
        $this->hasMany('Career3D.Comments', [
            'className' => 'Career3D.Comments'
        ]);
        
        $this->hasMany('Career3D.CommentReplies', [
            'className' => 'Career3D.CommentReplies'
        ]);
        
        $this->hasMany('Career3D.UserMessages', [
            'className' => 'Career3D.UserMessages'
        ]);
        
        $this->belongsTo('Career3D.UserGroups', [
            'className' => 'Career3D.UserGroups',
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);

    }

    public function validationDefault(Validator $validator) {
        $validator->notEmpty('firstname', 'First name is required.')
                  ->notEmpty('surname', 'Surname is required.')                
                  ->notEmpty('mobile', 'Mobile number is required.')       
                  ->notEmpty('user_group_id', 'Registration Type is required.')
                  ->notEmpty('race', 'Race is required.')
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
                ->add('mobile', 'notEmpty', [
                    'rule' => ['custom', '/^([0-9]{1}[0-9]{9})$/'],
                    'message' => __('Invalid mobile number! mobile number format: eg 0755434434')
                ])
                ->add('mobile', ['unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => 'This mobile number already exist.']
                        ]
                )//->notEmpty('password', 'Password is required.')
                //->notEmpty('confirm_password', 'Password Confirmationis required.')
                ->add('password', [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => 'Password must contain at least 6 character'
                    ],]
                );
        
        $validator
            ->requirePresence('confirm_password', 'create', 'Password must be required!')
            ->notEmpty('confirm_password', 'Confirm password must be required!')
            ->add(
                'confirm_password',
                'custom',
                [
                    'rule' => function ($value, $context) {
                            if (isset($context['data']['password']) && $value == $context['data']['password']) {
                                return true;
                            }
                            return false;
                        },
                    'message' => 'Sorry, password and confirm password does not matched'
                ]
            );   
       
        return $validator;
    }

}
