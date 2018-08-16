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

class CommentsTable extends Table {

    public function initialize(array $config) {

        $this->table('comments');
        $this->addBehavior('Timestamp');
        
        //$this->primaryKey('id');
        // Just add the belongsTo relation with CategoriesTable
        $this->belongsTo('Career3D.Users', [
            'className' => 'Career3D.Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Career3D.CommentReplies', [
            'className' => 'Career3D.CommentReplies'
        ]);
        
        $this->hasMany('Career3D.CommentLikes', [
            'className' => 'Career3D.CommentLikes'
        ]);
    }
}
