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
use Cake\Mailer\Email as m;


class PagesController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
       
        parent::beforeFilter($event);
         
        $this->Auth->allow(['register','resetpass','sendmessage','careerinfo','index','dashboard','login']);
        
        $this->viewBuilder()->layout('Career3D.default');
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function index() {
      
        $careers = $this->Careers->find('list');
        $group = $this->UserGroups->find('list');
        $user = $this->Users->newEntity();
        $this->set('careers', $careers);
        $this->set('users', $user);
        $this->set('group', $group);
    }
    
    public function careerinfo($id) {
        $this->careerTable = $this->viewVars['CareersTable'];
        $career = $this->careerTable->get($id);
        $this->set('careerInfo', $career);
        $this->viewBuilder()->layout(false);
       
    }
    
    public function dashboard() {
        if($this->Auth->user('id')){
           return $this->redirect(['controller' => 'Users','action' => 'dashboard']); 
        }
       return $this->redirect(['action' => 'index']);  
        
    }
    
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            $this->Auth->setUser($user);
            switch ($this->Auth->user('user_group_id')) {
                case 1:
                    if ($this->Auth->user('status') === 'In-ative') {
                        $this->Flash->error(__('This account has been blocked, please contact Admin for assistance.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        return $this->redirect(['action' => 'dashboard']);
                    }
                    break;
                case 3:
                    if ($this->Auth->user('status') === 'In-ative') {
                        $this->Flash->error(__('This account has been blocked, please contact Admin for assistance.'));
                        return $this->redirect(['action' => 'dashboard']);
                    } else {
                        return $this->redirect(['controller' => 'Mentors', 'action' => 'dashboard']);
                    }
                    break;
                case 2:
                    if ($this->Auth->user('status') === 'In-ative') {
                        $this->Flash->error(__('This account has been blocked, please contact Admin for assistance.'));
                        return $this->redirect(['action' => 'dashboard']);
                    } else {
                        return $this->redirect(['controller' => 'Admin', 'action' => 'dashboard']);
                    }
                    break;    
                default:
                    $this->Flash->error(__("Invalid email or password. Make sure your email and password is correct and then you try again."));
                    return $this->redirect(['action' => 'index']);
            }
        }
    }
    
    public function register() {
        if ($this->request->is('ajax')) {
            $profile = $this->Profiles->newEntity();
            $user = $this->Users->newEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if (empty($user->errors())) {
                    $this->Users->save($user);
                    $profile->user_id = $user->id;
                    $profile = $this->Profiles->patchEntity($profile, $this->request->data);
                    $this->Profiles->save($profile);
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
            $this->set('_serialize', ['status', 'message']);

            $this->viewBuilder()->layout(false);
        }
    }
    
    public function resetpass() {
        if ($this->request->is('ajax')) {
            $user = $this->UsersTable->get($this->request->data('user_id'));
            if ($this->request->is('post')) {                  
                $user->password = $this->request->data('password');
                $check = $this->UsersTable->patchEntity($user, $this->request->data); 
                if (empty($check->errors())) {
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
    
    public function sendmessage() { 
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {      
                $template = 'Career3D.admin_message';
                $transport = 'default';
                $subj  =  $this->request->data('name'). ' '.$this->request->data('email');
                $phone =  $this->request->data('phone');
                $msg   =  $this->request->data('message');
                $to    =  'reggiestain@gmail.com';
                               
                $email = new m();
                
                        $email->viewVars(['msg' => $msg,'phone'=>$phone]);
                        $email->transport($transport);
                        $email->template($template, $template)->emailFormat('html')
                                ->from(['info@siyanontech.co.za' => 'siyanontech.co.za'])->to($to)
                                ->subject($subj)->send();
                $message = 'Thank you for the message, we will get back to you soon.';
                $status = '200';
            }else{                
                $message = 'An error occured, please try again.';
                $status = 'error';
            }     
                 $this->set("status", $status);
                 $this->set("message", $message);
                 $this->viewBuilder()->layout(false);
           }      
          }
    
}
                