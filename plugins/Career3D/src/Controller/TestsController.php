<?php

namespace Career3D\Controller;

use Career3D\Controller\AppController;
//use App\Controller\AppController;
use Cake\ORM\Registry;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Request;
use Cake\Network\Email\Email;
use Cake\Network\Http\Client;
use Cake\View\Helper\RssHelper;
use LearnositySdk\Request\Init;
use LearnositySdk\Request\DataApi;
use Facebook\Facebook;

/**
 * Users Controller
 *
 * @property \Career3D\Model\\Users $Users
 */
class TestsController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['index', 'register', 'login']);

        $this->viewBuilder()->layout('Career3D.mentor-default');
        $this->set('img',$this->Photos->find()->where(['user_id' => $this->Auth->user('id')])->order(['avatar' => 'DESC'])->first());
        $this->set('profile',$this->Profiles->find()->where(['user_id' => $this->Auth->user('id')])->contain(['Careers', 'Provinces'])->first());
        $this->set('user' , $this->Users->get($this->Auth->user('id')));        
        $this->set('mcount', $this->userMsgcount($this->Auth->user('id')));
    }


    public function index() {
        $test = $this->Tests->find('all')->where(['user_id'=>$this->Auth->user('id')]);
        $this->set('test',$test);
        $this->set('title','View Tests');
    }
    
    public function add() {
        
        $test = $this->Tests->newEntity();
        if ($this->request->is('post')) {            
            $testdata = $this->Tests->patchEntity($test, $this->request->data);
            if (empty($test->errors())) {
                $testdata->user_id = $this->Auth->user('id');
                $this->Tests->save($testdata);
                $this->Flash->success(__('Your test has been saved.'));
                return $this->redirect(['action' => 'list_tests']);
            } else {
            $this->Flash->error(__('Unable to add test'));  
          }           
        }
        $this->set('test',$test);
        $this->set('title','Add Tests');
    }
    
    public function edit($id) {
        
        $test = $this->Tests->get($id);
        if ($this->request->is(['post','put'])) {            
            $testdata = $this->Tests->patchEntity($test, $this->request->data);
            if (empty($test->errors())) {
                $testdata->user_id = $this->Auth->user('id');
                $this->Tests->save($testdata);
                $this->Flash->success(__('Your test has been saved.'));
                return $this->redirect(['action' => 'list_tests']);
            } else {
            $this->Flash->error(__('Unable to add test'));  
          }           
        }
        $this->set('test',$test);
        $this->set('title','Add Tests');
        
    }
    
    public function delete() {
        
    }
    
} 
