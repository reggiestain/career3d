<?php

namespace Career3D\Controller;

use Career3D\Controller\AppController;
//use App\Controller\AppController;
use Cake\ORM\TableRegistry;
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
 * @property \Career3D\Model\Table\UsersTable $Users
 */
class AdminController extends AppController {
    
    private $careerTable;

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('RequestHandler');
        //$this->Auth->allow(['index', 'register', 'login']);

        $this->viewBuilder()->layout('Career3D.mentor-default');
        $this->set('img',$this->PhotosTable->find()->where(['user_id' => $this->Auth->user('id')])->order(['avatar' => 'DESC'])->first());
        $this->set('profile',$this->ProfilesTable->find()->where(['user_id' => $this->Auth->user('id')])->contain(['Careers', 'Provinces'])->first());
        $this->set('user' , $this->UsersTable->get($this->Auth->user('id')));        
        $this->set('mcount', $this->userMsgcount($this->Auth->user('id')));
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    

    public function dashboard() {
        
    }
    
    public function index() {
       $this->careerTable = $this->viewVars['CareersTable'];
       $career = $this->careerTable->find();
       $this->set('career', $career);
    }

    public function create() {
        $this->careerTable = $this->viewVars['CareersTable'];
        $career = $this->careerTable->newEntity();
        if ($this->request->is('post')) {            
            $careerdata = $this->careerTable->patchEntity($career, $this->request->data);
            if (empty($career->errors())) {
                $this->careerTable->save($careerdata);
                $this->Flash->success(__('Your career has been saved.'));
                return $this->redirect(['action' => 'create']);
            } else {
            $this->Flash->error(__('Unable to add your career.'));  
          }           
        }
        $this->set('career', $career);
    }
    
    public function edit($id) {
        $this->careerTable = $this->viewVars['CareersTable'];
        $career = $this->careerTable->get($id);
        if ($this->request->is(['post','put'])) {            
            $careerdata = $this->careerTable->patchEntity($career, $this->request->data);
            if (empty($career->errors())) {
                $this->careerTable->save($careerdata);
                $this->Flash->success(__('Your career has been updated.'));
                return $this->redirect(['action' => 'create']);
            } else {
            $this->Flash->error(__('Unable to add your career.'));  
          }           
        }
        $this->set('career', $career);
    }

    public function profile() {
        $this->dashboard();
        $subject = $this->SubjectsTable->find('list');
        $highschool = $this->HighSchoolsTable->find('all')->where(['user_id' => $this->Auth->user('id')])->contain(['Subjects']);
        $address = $this->AddressesTable->find('all')->where(['user_id' => $this->Auth->user('id')])->contain(['Provinces']);
        $tertiary = $this->TertiariesTable->find('all')->where(['user_id' => $this->Auth->user('id')]);
        $workexp = $this->WorkExpsTable->find('all')->where(['user_id' => $this->Auth->user('id')]);


        $this->set('subject', $subject);
        $this->set('address', $address);
        $this->set('tertiary', $tertiary);
        $this->set('highschool', $highschool);
        $this->set('workexp', $workexp);
    }

}
