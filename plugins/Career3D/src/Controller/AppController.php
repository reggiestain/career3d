<?php

namespace Career3D\Controller;

use App\Controller\AppController as BaseController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
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
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->set('UsersTable' ,TableRegistry::get('Career3D.Users'));
        $this->UsersTable = TableRegistry::get('Career3D.Users');
        $this->ProfilesTable = TableRegistry::get('Career3D.Profiles');
        $this->set('CareersTable' ,TableRegistry::get('Career3D.Careers'));
        //$this->CareersTable = TableRegistry::get('Career3D.Careers');
        $this->PhotosTable = TableRegistry::get('Career3D.Photos');
        $this->TopicsTable = TableRegistry::get('Career3D.Topics');
        $this->PostsTable = TableRegistry::get('Career3D.Posts');
        $this->LikesTable = TableRegistry::get('Career3D.Likes');
        $this->CommentsTable = TableRegistry::get('Career3D.Comments');
        $this->CommentReplysTable = TableRegistry::get('Career3D.Comment_replies');
        $this->CommentLikesTable = TableRegistry::get('Career3D.Comment_likes');
        $this->SubjectsTable = TableRegistry::get('Career3D.Subjects');
        $this->HighSchoolsTable = TableRegistry::get('Career3D.High_schools');
        $this->HighSubjectsTable = TableRegistry::get('Career3D.High_Schools_Subjects');
        $this->ProvincesTable = TableRegistry::get('Career3D.Provinces');
        $this->AddressesTable = TableRegistry::get('Career3D.Addresses');
        $this->TertiariesTable = TableRegistry::get('Career3D.Tertiaries');
        $this->WorkExpsTable = TableRegistry::get('Career3D.Work_Experiences');
        $this->CertificatesTable = TableRegistry::get('Career3D.Certificates');
        $this->NetworksTable = TableRegistry::get('Career3D.Networks');
        $this->MessagesTable = TableRegistry::get('Career3D.Messages');
        $this->MessageReplyTable = TableRegistry::get('Career3D.Message_Reply');
        $this->ProfileCareersTable = TableRegistry::get('Career3D.Profile_Careers');
    }

    public function initialize() {

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Basic',
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ]
            /*,
            'loginRedirect' => [
                'plugin' => 'Career3D', 'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'plugin' => 'Career3D', 'controller' => 'Users',
                'action' => 'index'
            ]
             * 
             */
        ]);
    }

    protected function canvasAuth() {
        $accessToken = '7~oSlv0f2Hk09QA3OGXGzmraHnY0PWCBaNwyM3ZZaXRrdpb9YdpjZZFuJwfz8U3ZzT';
        $http = new Client([
            'headers' => ['Authorization' => 'Bearer ' . $accessToken]
        ]);
        return $http;
    }
    
    public function get_profile($key){
       $profile = $this->ProfilesTable->find()->where(['email' => $key])->first();
       
       return $profile;
    }

    //User netorks(friends)
    public function netwrks($userId) {
        $netwrk = $this->NetworksTable->find()->where(['user_id' => $userId, 'Networks.status' => 'Connect'])->contain(['Users.Photos' => function ($q) {
                return $q->order(['id' => 'desc']);
            }, 'Users.HighSchools']);
                return $netwrk;
            }

    public function Allusers() {
                $Alluser = $this->UsersTable->find('all');
                foreach ($Alluser as $value) {
                    $users[] = $value->id;
                }
                return $users;
            }

            //User messages
    public function messages($userId) {
                $query = $this->MessagesTable->find();
                $messages = $query->select(['reply' => 'MIN(Messages.id)', 'id' => 'MIN(Messages.id)', 'user_id' => 'MIN(Messages.user_id)', 'avatar' => 'MIN(avatar)', 'sender' => 'MIN(sender)', 'message' => 'MIN(message)',
                            'status' => 'MIN(Messages.status)', 'to_id' => 'MIN(to_id)', 'count' => $query->func()->count("Messages.status")])
                        ->where(['Messages.to_id' => $userId])
                        ->group(['to_id']);

                return $messages;
            }

            //User new message count
    public function userMsgcount($userId) {
                $mcount = $this->MessagesTable->find()->where(['to_id' => $userId, 'status' => 'new'])->count('*');

                return $mcount;
            }

            public function profileInfo($userInfo) {
                $profile = $this->ProfilesTable->find()->where(['user_id' => $userInfo])->contain(['Provinces', 'Careers'])->first();
                return $profile;
            }

            //User profile info
            public function prifileId($userId) {
                $profileId = $this->ProfilesTable->find()->where(['user_id' => $userId]);
                return $profileId;
            }

            //User associates
            public function assoc($userId) {
                $Arrynetwrks = $this->NetworksTable->find('all')->where(['user_id' => $userId, 'Networks.status' => 'Connect']);
                if (!$Arrynetwrks->isEmpty()) {
                    foreach ($Arrynetwrks as $value) {
                        $Arrynetwrk[] = $value->network_id;
                        if (($key = array_search($userId, $Arrynetwrk)) !== FALSE) {
                            unset($Arrynetwrk[$key]);
                        }
                    }
                } else {
                    $Arrynetwrk = [];
                }
                array_push($Arrynetwrk, $userId);
                $users = $this->ProfilesTable->find()->where(['Profiles.user_id NOT IN' => $Arrynetwrk])->contain(['Users.Photos' => function($q) {
                        $q->order(['avatar' => 'DESC']);
                        return $q;
                    }, 'Users.Tertiaries', 'Users.HighSchools']);

                        return $users;
                    }

                    public function sendmail($transport, $template, $to, $subj, $pId = null, $name) {
                        $email = new Email();
                        $email->viewVars(['id' => $pId, 'name' => $name, 'hash' => $to]);
                        $email->transport($transport);
                        $email->template($template, $template)->emailFormat('html')
                                ->from(['info@siyanontech.co.za' => 'siyanontech.co.za'])->to($to)
                                ->subject($subj)->send();
                    }

                    public function reset_verify($id, $hash) {
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
                