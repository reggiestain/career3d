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

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('RequestHandler');
        //$this->Auth->allow(['index', 'register', 'login']);

        $this->viewBuilder()->layout('Career3D.Mentor');

        $img = $this->PhotosTable->find()->where(['user_id' => $this->Auth->user('id')])->order(['avatar' => 'DESC'])->first();
        $profile = $this->ProfilesTable->find()->where(['user_id' => $this->Auth->user('id')])->contain(['ProfileCareers', 'Provinces'])->first();

        $province = $this->ProvincesTable->find('list');
        if (empty($img)) {
            $this->set('img', 'profile.jpg');
        } else {
            $this->set('img', $img);
        }

        $mcount = $this->userMsgcount($this->Auth->user('id'));

        $this->set('profile', $profile);
        $this->set('province', $province);
        $this->set('mcount', $mcount);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        
    }

    public function dashboard() {
        
    }
    
    public function create() {
        
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