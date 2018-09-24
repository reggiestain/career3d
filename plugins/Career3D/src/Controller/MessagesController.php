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

/**
 * Users Controller
 *
 * @property \Career3D\Model\\Users $Users
 */
class MessagesController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);

        $this->viewBuilder()->layout('Career3D.dashboard');

        $img = $this->Photos->find()->where(['user_id' => $this->Auth->user('id')])->order(['avatar' => 'DESC'])->first();
        //$profile = $this->Profiles->find()->where(['user_id' => $this->Auth->user('id')])->contain(['Careers', 'Provinces'])->first();
        $profile = $this->profileInfo($this->Auth->user('id'));
        $province = $this->Provinces->find('list');
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
        $messages = $this->Messages->newEntity();
        $netwrk = $this->netwrks($this->Auth->user('id'));

        $list = $this->Networks->find('list', [
                    'keyField' => 'network_id',
                    'valueField' => 'user.name'
                ])->where(['user_id' => $this->Auth->user('id')])->contain(['Users']);

        $users = $this->assoc($this->Auth->user('id'));
        $chats = $this->messages($this->Auth->user('id'));

        $this->set('users', $users);
        $this->set('netwrk', $netwrk);
        $this->set('messages', $messages);
        $this->set('list', $list);
        $this->set('chats', $chats);
    }

    public function messagelist($userId,$toId,$msgId) {
        if ($this->request->is('ajax')) {
            $messages = $this->Messages->find('all')->where(['user_id' => $userId,'to_id'=>$toId])->order(['id'=>'desc']);
            $Mupdate = $this->Messages->find()->where(['to_id'=>$toId]);
                         foreach ($Mupdate as $value) {
                                  $value->status = 'read';
                                  $this->Messages->save($value);
                         }
                         
            $this->set('messages', $messages);
            $this->set('title', 'messages');
            $this->set('userId', $this->Auth->user('id'));
            $this->set('toId', $userId);
            
            $this->viewBuilder()->layout(false);
        }
    }

    public function add() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $messages = $this->Messages->newEntity();
                $messages->user_id = $this->Auth->user('id');
                $messages->sender = $this->Auth->user('firstname') . ' ' . $this->Auth->user('surname');
                $messages = $this->Messages->patchEntity($messages, $this->request->data);
                $messages->avatar = $this->Auth->user('pic');
                if (empty($messages->errors())) {
                    $this->Messages->save($messages);
                    $status = '500';
                    $message = 'Message has been sent successfully.';
                } else {
                    $error_msg = [];
                    foreach ($messages->errors() as $errors) {
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
                $this->set('status', $status);
                $this->set('message', $message);
                $this->viewBuilder()->layout(false);
            }
        }
    }

    public function reply() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $Mreply = $this->Messages->newEntity();
                $Mreply->user_id = $this->request->data('to_id');
                $Mreply->to_id = $this->Auth->user('id');
                $Mreply->status = 'reply';
                $Mreply->sender = $this->Auth->user('firstname') . ' ' . $this->Auth->user('surname');
                $Mreply->message = $this->request->data('reply');
                $Mreply->avatar = $this->Auth->user('pic');
                $Mreply->reply = 'yes';
                if ($this->Messages->save($Mreply)) {
                    $messages = $this->Messages->find()->where(['to_id' =>$this->Auth->user('id')])->order(['id'=>'desc']);
                    $this->set('messages', $messages);
                    $this->set('userId', $this->Auth->user('id'));
                }
                $this->viewBuilder()->layout(false);
            }
        }
    }

}
