<?php
namespace Career3D\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * FindUser behavior
 */
class FindUserBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    public function findForUser(\Cake\ORM\Query $query, array $options) {
        return $query->where(['user_id'=>$options['user_id']]);
    }
}
