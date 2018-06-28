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

/**
 * Users Controller
 *
 * @property \Career3D\Model\Table\UsersTable $Users
 */
class PagesController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['register','resetpass']);
        $this->UsersTable = TableRegistry::get('Career3D.Users');
        $this->ProfilesTable = TableRegistry::get('Career3D.Profiles');
        $this->ProvincesTable = TableRegistry::get('Career3D.Provinces');
        $this->ProfileCareersTable = TableRegistry::get('Career3D.Profile_Careers');      
        $this->viewBuilder()->layout('Career3D.default');
        
        $province = $this->ProvincesTable->find('list');
        $this->set('province',$province);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function register() {
        if ($this->request->is('ajax')) {
            $profile = $this->ProfilesTable->newEntity();
            $user = $this->UsersTable->newEntity();
            $ProCareers = $this->ProfileCareersTable->newEntity();
            if ($this->request->is('post')) {
                $user = $this->UsersTable->patchEntity($user, $this->request->data);
                $this->UsersTable->save($user);
                $profile->user_id = $user->id;
                $profile = $this->ProfilesTable->patchEntity($profile, $this->request->data);
                if (empty($profile->errors())) {
                    $this->ProfilesTable->save($profile);
                    $data = ['profile_id'=>$profile->id,'career_id'=>$this->request->data('career_id')];
                    $Careers = $this->ProfileCareersTable->patchEntity($ProCareers, $data); 
                    $this->ProfileCareersTable->save($Careers);
                    $status = '200';
                    $message = '';
                } else {
                    $error_msg = [];
                    foreach ($profile->errors() as $errors) {
                        if (is_array($errors)) {
                            foreach ($errors as $error) {
                                $error_msg[] = $error;
                            }
                        } else {
                            $error_msg[] = $errors;
                        }
                    }
                    $status = 'error';
                    $message = $error_msg;
                }
            }
            
            $this->set("status", $status);
            $this->set("message", $message);
            $this->viewBuilder()->layout(false);
        }
    }
    
    public function resetpass() {
        if ($this->request->is('ajax')) {
            $user = $this->UsersTable->get($this->request->data('user_id'));
            if ($this->request->is('post')) {
                $user = $this->UsersTable->patchEntity($user, $this->request->data);   
                $user->password = $this->request->data('password');
                if (empty($user->errors())) {
                    $this->UsersTable->save($user);
                    $status = '200';
                    $message = 'Password has been updated successfully, please login with new password.';
                } else {
                    $error_msg = [];
                    foreach ($user->errors() as $errors) {
                        if (is_array($errors)) {
                            foreach ($errors as $error) {
                                $error_msg[] = $error;
                            }
                        } else {
                            $error_msg[] = $errors;
                        }
                    }
                    $status = 'error';
                    $message = $error_msg;
                }
            }
            
            $this->set("status", $status);
            $this->set("message", $message);
            $this->viewBuilder()->layout(false);
        }
    }
}
                