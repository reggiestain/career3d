<?php

namespace Career3D\Controller;

use App\Controller\AppController as BaseController;
use Cake\I18n\Time;
use Cake\ORM\Registry;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Http\Client;
use Cake\Mailer\Email;

class AppController extends BaseController {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize() {
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auth', [
            'authError' => 'Woopsie, you are not authorized to access this area.',
            'authenticate' => [
                'Basic',
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'storage' => 'Session',
            //'authorize' => ['Controller'], // Added this line
            'loginRedirect' => [
                'plugin' => 'Career3D', 'controller' => 'Pages',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'plugin' => 'Career3D', 'controller' => 'Pages',
                'action' => 'index'
            ]
        ]);
    }

    public function beforeFilter(\Cake\Event\Event $event) {
        
        //$this->Auth->allow(['index','view','login','logout']);

        $this->loadModel('Career3D.Users');
        $this->loadModel('Career3D.Profiles');
        $this->loadModel('Career3D.Careers');
        $this->loadModel('Career3D.Photos');
        $this->loadModel('Career3D.Topics');
        $this->loadModel('Career3D.Posts');
        $this->loadModel('Career3D.Likes');
        $this->loadModel('Career3D.Comments');
        $this->loadModel('Career3D.CommentReplies');
        $this->loadModel('Career3D.CommentLikes');
        $this->loadModel('Career3D.Subjects');
        $this->loadModel('Career3D.HighSchools');
        $this->loadModel('Career3D.HighSchoolsSubjects');
        $this->loadModel('Career3D.Provinces');
        $this->loadModel('Career3D.Addresses');
        $this->loadModel('Career3D.Tertiaries');
        $this->loadModel('Career3D.WorkExperiences');
        $this->loadModel('Career3D.Certificates');
        $this->loadModel('Career3D.Networks');
        $this->loadModel('Career3D.Messages');
        $this->loadModel('Career3D.Message_Reply');
        $this->loadModel('Career3D.UserGroups');
        $this->loadModel('Career3D.Tests');
        
        $this->set('profileSearch', $this->Profiles->find('all'));
        $this->set('province', $this->Provinces->find('list'));
    }

    protected function canvasAuth() {
        $accessToken = '7~oSlv0f2Hk09QA3OGXGzmraHnY0PWCBaNwyM3ZZaXRrdpb9YdpjZZFuJwfz8U3ZzT';
        $http = new Client([
            'headers' => ['Authorization' => 'Bearer ' . $accessToken]
        ]);
        return $http;
    }

    public function get_profile($key) {
        $profile = $this->Profiles->find()->where(['email' => $key])->first();

        return $profile;
    }

    //User netorks(friends)
    public function netwrks($userId) {
        $netwrk = $this->Networks->find()->where(['user_id' => $userId, 'Networks.status' => 'Connect'])->contain(['Users.Photos' => function ($q) {
                return $q->order(['id' => 'desc']);
            }, 'Users.HighSchools']);
            return $netwrk;
        }

        public function Allusers() {
            $Alluser = $this->Users->find('all');
            foreach ($Alluser as $value) {
                $users[] = $value->id;
            }
            return $users;
        }

        //User messages
        public function messages($userId) {
            $query = $this->Messages->find();
            $messages = $query->select(['reply' => 'MIN(Messages.id)', 'id' => 'MIN(Messages.id)', 'user_id' => 'MIN(Messages.user_id)', 'avatar' => 'MIN(avatar)', 'sender' => 'MIN(sender)', 'message' => 'MIN(message)',
                    'status' => 'MIN(Messages.status)', 'to_id' => 'MIN(to_id)', 'count' => $query->func()->count("Messages.status")])
                ->where(['Messages.to_id' => $userId])
                ->group(['to_id']);

            return $messages;
        }

        //User new message count
        public function userMsgcount($userId) {
            $mcount = $this->Messages->find()->where(['to_id' => $userId, 'status' => 'new'])->count('*');

            return $mcount;
        }

        public function profileInfo($userInfo) {
            $profile = $this->Profiles->find()->where(['user_id' => $userInfo])->contain(['Provinces', 'Careers'])->first();
            return $profile;
        }

        //User profile info
        public function prifileId($userId) {
            $profileId = $this->Profiles->find()->where(['user_id' => $userId]);
            return $profileId;
        }

        //User associates
        public function assoc($userId) {
            $Arrynetwrks = $this->Networks->find('all')->where(['user_id' => $userId, 'Networks.status' => 'Connect']);
            if (!$Arrynetwrks->isEmpty()) {
                foreach ($Arrynetwrks as $value) {
                    $Arrynetwrk[] = $value->network_id;
                    if (($key = array_search($userId, $Arrynetwrk)) !== FALSE) {
                        unloadModel($Arrynetwrk[$key]);
                    }
                }
            } else {
                $Arrynetwrk = [];
            }
            array_push($Arrynetwrk, $userId);
            $users = $this->Profiles->find()->where(['Profiles.user_id NOT IN' => $Arrynetwrk])->contain(['Users.Photos' => function($q) {
                    $q->order(['avatar' => 'DESC']);
                    return $q;
                }, 'Users.Tertiaries', 'Users.HighSchools']);

                return $users;
            }

            public function sendmail($transport, $template, $to, $subj, $pId = null, $name, $host) {
                $email = new Email();
                $email->viewVars(['id' => $pId, 'name' => $name, 'hash' => $to]);
                $email->transport($transport);
                $email->template($template, $template)->emailFormat('html')
                    ->from(['info@siyanontech.co.za' => 'siyanontech.co.za'])->to($to)
                    ->subject($subj)->send();
            }

            public function reloadModel_verify($id, $hash) {
                $user = $this->get_profile($hash);
                if (!empty($user)) {
                    $pId = hash('ripemd160', $user->id);
                    if ($pId === $id) {
                        return true;
                    }
                    return false;
                }
            }

        }
        