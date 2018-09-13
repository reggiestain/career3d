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
class MentorsController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['index', 'register', 'login']);

        $this->viewBuilder()->layout('Career3D.Mentor');
        $this->viewBuilder()->layout('Career3D.mentor-default');
        $this->set('img',$this->Photos->find()->where(['user_id' => $this->Auth->user('id')])->order(['avatar' => 'DESC'])->first());
        $this->set('profile',$this->Profiles->find()->where(['user_id' => $this->Auth->user('id')])->contain(['Careers', 'Provinces'])->first());
        $this->set('user' , $this->Users->get($this->Auth->user('id')));        
        $this->set('mcount', $this->userMsgcount($this->Auth->user('id')));
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

    public function listTests() {
        $test = $this->Tests->find('all')->where(['user_id'=>$this->Auth->user('id')]);
        $this->set('test',$test);
    }
    
    public function createTest() {
        
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
    }
    
    public function editTest() {
        
    }
    
    public function deleteTests() {
        
    }
    
    

    public function savehighschool() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $high = $this->HighSchools->newEntity();
                $high->user_id = $this->Auth->user('id');
                $high = $this->HighSchools->patchEntity($high, $this->request->data);
                if (empty($high->errors())) {
                    $this->HighSchools->save($high);
                    foreach ($this->request->data('subject_id') as $subject) {
                        $highsubject = $this->HighSubjects->newEntity();
                        $data = ['subject_id' => $subject, 'high_school_id' => $high->id];
                        $this->HighSubjects->patchEntity($highsubject, $data);
                        $this->HighSubjects->save($highsubject);
                    }
                    $status = '500';
                    $message = 'High school was successfully saved.';
                } else {
                    $error_msg = [];
                    foreach ($high->errors() as $errors) {
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

    public function saveaddress() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $address = $this->Addresses->newEntity();
                $address->user_id = $this->Auth->user('id');
                $$address = $this->Addresses->patchEntity($address, $this->request->data);
                if (empty($address->errors())) {
                    $this->Addresses->save($address);
                    $status = '500';
                    $message = 'Address was successfully saved.';
                } else {
                    $error_msg = [];
                    foreach ($address->errors() as $errors) {
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

    public function savetertiary() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $tertiaries = $this->Tertiaries->newEntity();
                $tertiaries->user_id = $this->Auth->user('id');
                $tertiaries = $this->Tertiaries->patchEntity($tertiaries, $this->request->data);
                if (empty($tertiaries->errors())) {
                    $this->Tertiaries->save($tertiaries);
                    $status = '500';
                    $message = 'Address was successfully saved.';
                } else {
                    $error_msg = [];
                    foreach ($tertiaries->errors() as $errors) {
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

    public function saveworkex() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $workexp = $this->WorkExps->newEntity();
                $workexp->user_id = $this->Auth->user('id');
                $workexp = $this->WorkExps->patchEntity($workexp, $this->request->data);
                if (empty($workexp->errors())) {
                    $this->WorkExps->save($workexp);
                    $status = '500';
                    $message = 'Address was successfully saved.';
                } else {
                    $error_msg = [];
                    foreach ($workexp->errors() as $errors) {
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

    public function editpersonal($profileId) {
        if ($this->request->is('ajax')) {
            $profile = $this->Profiles->get($profileId);
            if ($this->request->is(['put'])) {
                $this->Profiles->patchEntity($profile, $this->request->data);
                if ($this->Profiles->save($profile)) {
                    $status = '500';
                    $message = 'update';
                }
            } else {
                $status = '200';
                $message = '';
            }
            $careers = $this->Careers->find('list');
            $this->set('profile', $profile);
            $this->set('careers', $careers);
            $this->set('status', $status);
            $this->set('message', $message);
            $this->viewBuilder()->layout(false);
        }
    }

    public function editaddress($addressId) {
        if ($this->request->is('ajax')) {
            $address = $this->Addresses->get($addressId);
            if ($this->request->is(['put'])) {
                $this->Addresses->patchEntity($address, $this->request->data);
                if ($this->Addresses->save($address)) {
                    $status = '500';
                    $message = 'update';
                }
            } else {
                $status = '200';
                $message = '';
            }
            $province = $this->Provinces->find('list');
            $this->set('address', $address);
            $this->set('province', $province);
            $this->set('status', $status);
            $this->set('message', $message);
            $this->viewBuilder()->layout(false);
        }
    }

    public function edithigh($highId) {
        if ($this->request->is('ajax')) {
            $high = $this->HighSchools->get($highId, ['contain' => ['Subjects']]);
            if ($this->request->is(['put'])) {
                $this->HighSchools->patchEntity($high, $this->request->data, ['associated' => ['Subjects']]);
                if ($this->HighSchools->save($high)) {
                    $status = '500';
                    $message = 'update';
                }
            } else {
                $status = '200';
                $message = '';
            }

            $subject = $this->Subjects->find('list');
            $this->set('high', $high);
            $this->set('subject', $subject);
            $this->set('status', $status);
            $this->set('message', $message);
            $this->viewBuilder()->layout(false);
        }
    }

    public function edittertiary($TerId) {
        if ($this->request->is('ajax')) {
            $tertiary = $this->Tertiaries->get($TerId);
            if ($this->request->is(['put'])) {
                $this->Tertiaries->patchEntity($tertiary, $this->request->data);
                if ($this->Tertiaries->save($tertiary)) {
                    $status = '500';
                    $message = 'update';
                }
            } else {
                $status = '200';
                $message = '';
            }
            $this->set('tertiary', $tertiary);
            $this->set('status', $status);
            $this->set('message', $message);
            $this->viewBuilder()->layout(false);
        }
    }

    public function editworkex($exId) {
        if ($this->request->is('ajax')) {
            $workexp = $this->WorkExps->get($exId);
            if ($this->request->is(['put'])) {
                $this->WorkExps->patchEntity($workexp, $this->request->data);
                if ($this->WorkExps->save($workexp)) {
                    $status = '500';
                    $message = 'update';
                }
            } else {
                $status = '200';
                $message = '';
            }
            $this->set('workexp', $workexp);
            $this->set('status', $status);
            $this->set('message', $message);
            $this->viewBuilder()->layout(false);
        }
    }

    public function showcomment() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $comments = $this->Comments->find()->where(['post_id' => $this->request->data('post_id')])->contain(['Users.Photos' => function($q) {
                        $q->order(['avatar' => 'DESC']);
                        return $q;
                    }, 'CommentReplies', 'CommentLikes']);
                        $this->set('comments', $comments);
                        $this->set('postId', $this->request->data('post_id'));
                    }
                    $this->viewBuilder()->layout(false);
                }
            }

            public function countcomment($id) {
                $comments = $this->Comments->find()->where(['post_id' => $id])->count();
                echo $comments . ' comment';
                exit();
            }

            public function countreply($id) {
                $comments = $this->CommentReplys->find()->where(['comment_id' => $id])->count();
                echo $comments . ' Reply';
                exit();
            }

            public function publish() {
                if ($this->request->is('ajax')) {
                    if ($this->request->is('post')) {
                        $post = $this->Posts->newEntity();
                        $post = $this->Posts->patchEntity($post, $this->request->data);
                        $post->user_id = $this->Auth->user('id');
                        if ($this->Posts->save($post)) {
                            $status = '500';
                            $message = 'Post was successful.';
                        } else {
                            $status = 'error';
                            $message = 'An error occured, please try again.';
                        }
                        $this->set('status', $status);
                        $this->set('_serialize', ['status', 'message']);
                        $this->viewBuilder()->layout(false);
                    }
                }
            }

            public function like() {
                if ($this->request->is('ajax')) {
                    if ($this->request->data) {
                        $likes = $this->Likes->newEntity();
                        $likes->user_id = $this->Auth->user('id');
                        $post = $this->Likes->find()->where(['user_id' => $this->Auth->user('id'), 'post_id' => $this->request->data('post_id')])->first();
                        if ($post) {
                            $this->Likes->delete($post);
                        } else {
                            $likes = $this->Likes->patchEntity($likes, $this->request->data);
                            if ($this->Likes->save($likes)) {
                                $status = '500';
                                $message = 'Post was successful.';
                            } else {
                                $status = 'error';
                                $message = 'An error occured, please try again.';
                            }
                        }
                        $post = $this->Posts->find()->order(['Posts.id' => 'DESC'])->contain(['Users', 'Topics', 'Users.Photos' => function($q) {
                                $q->order(['avatar' => 'DESC']);
                                return $q;
                            },
                                    'Likes' => function($q) {
                                $q->select(
                                        ['Likes.post_id', 'total' => $q->func()->count('Likes.post_id')])->group(['Likes.post_id']);
                                return $q;
                            }, 'Comments']);

                                $this->set('post', $post);
                                $this->viewBuilder()->layout(false);
                            }
                        }
                    }

                    public function likecomment() {
                        if ($this->request->is('ajax')) {
                            if ($this->request->data) {
                                $likes = $this->CommentLikes->newEntity();
                                $likes->user_id = $this->Auth->user('id');
                                $post = $this->CommentLikes->find()->where(['user_id' => $this->Auth->user('id'), 'comment_id' => $this->request->data('comment_id')])->first();
                                if ($post) {
                                    $this->CommentLikes->delete($post);
                                } else {
                                    $likes = $this->CommentLikes->patchEntity($likes, $this->request->data);
                                    if ($this->CommentLikes->save($likes)) {
                                        $status = '500';
                                        $message = 'Post was successful.';
                                    } else {
                                        $status = 'error';
                                        $message = 'An error occured, please try again.';
                                    }
                                }
                                $comments = $this->Comments->find()->where(['post_id' => $this->request->data('post_id')])->contain(['Users.Photos' => function($q) {
                                        $q->order(['avatar' => 'DESC']);
                                        return $q;
                                    }, 'CommentReplies', 'CommentLikes']);
                                        $this->set('comments', $comments);

                                        $this->viewBuilder()->layout(false);
                                    }
                                }
                            }

                            public function comment() {
                                if ($this->request->is('ajax')) {
                                    if ($this->request->is('post')) {
                                        $comment = $this->Comments->newEntity();
                                        $comment = $this->Comments->patchEntity($comment, $this->request->data);
                                        $comment->user_id = $this->Auth->user('id');
                                        if ($this->Comments->save($comment)) {
                                            $status = '500';
                                            $message = 'Post was successful.';
                                        } else {
                                            $status = 'error';
                                            $message = 'An error occured, please try again.';
                                        }

                                        $comments = $this->Comments->find()->where(['post_id' => $this->request->data('post_id')])->contain(['Users.Photos' => function($q) {
                                                $q->order(['avatar' => 'DESC']);
                                                return $q;
                                            }, 'CommentReplies', 'CommentLikes']);

                                                $this->set('status', $status);
                                                $this->set('comments', $comments);
                                                $this->viewBuilder()->layout(false);
                                            }
                                        }
                                    }

                                    public function showcommentreply() {
                                        if ($this->request->is('ajax')) {
                                            if ($this->request->is('post')) {
                                                $commentreply = $this->CommentReplys->find()->where(['comment_id' => $this->request->data('comment_id')])
                                                        ->contain(['Users.Photos' => function($q) {
                                                        $q->order(['avatar' => 'DESC']);
                                                        return $q;
                                                    }]);
                                                        $this->set('commentreply', $commentreply);
                                                        $this->set('commentId', $this->request->data('comment_id'));
                                                    }
                                                    $this->viewBuilder()->layout(false);
                                                }
                                            }

                                            public function addreply() {
                                                if ($this->request->is('ajax')) {
                                                    if ($this->request->is('post')) {
                                                        $commentreply = $this->CommentReplys->newEntity();
                                                        $commentreply = $this->CommentReplys->patchEntity($commentreply, $this->request->data);
                                                        $commentreply->user_id = $this->Auth->user('id');
                                                        if ($this->CommentReplys->save($commentreply)) {
                                                            $status = '500';
                                                            $message = 'Reply was successful.';
                                                        } else {
                                                            $status = 'error';
                                                            $message = 'An error occured, please try again.';
                                                        }
                                                        $commentreply = $this->CommentReplys->find()->where(['comment_id' => $this->request->data('comment_id')])
                                                                ->contain(['Users.Photos' => function($q) {
                                                                $q->order(['avatar' => 'DESC']);
                                                                return $q;
                                                            }]);
                                                                $this->set('status', $status);
                                                                $this->set('commentreply', $commentreply);
                                                                $this->set('commentId', $this->request->data('comment_id'));
                                                                $this->viewBuilder()->layout(false);
                                                            }
                                                        }
                                                    }

                                                    public function upload() {
                                                        if (!empty($this->request->data['file']['name'])) {
                                                            $file = $this->request->data['file']; //put the data into a var for easy use
                                                            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                                                            $arr_ext = array('jpg', 'jpeg', 'gif', 'pdf'); //set allowed extensions
                                                            $setNewFileName = time() . "_" . rand(000000, 999999);
                                                            //only process if the extension is valid
                                                            if (in_array($ext, $arr_ext)) {
                                                                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                                                //where we are putting it
                                                                $path = ROOT . DS . 'plugins' . DS . 'Career3D' . DS . 'webroot' . DS . 'img' . DS . 'upload' . DS . 'avatar';
                                                                move_uploaded_file($file['tmp_name'], $path . DS . $setNewFileName . '.' . $ext);

                                                                //prepare the filename for database entry 
                                                                $imageFileName = $setNewFileName . '.' . $ext;
                                                            }
                                                        }
                                                    }

                                                    public function fileupload() {
                                                        if ($this->request->is('ajax')) {
                                                            if (!empty($this->request->data)) {
                                                                if (!empty($this->request->data['file']['name'])) {
                                                                    $file = $this->request->data['file']; //put the data into a var for easy use
                                                                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                                                                    $arr_ext = array('jpg', 'jpeg', 'gif', 'pdf'); //set allowed extensions
                                                                    $setNewFileName = time() . "_" . rand(000000, 999999);
                                                                    //only process if the extension is valid
                                                                    if (in_array($ext, $arr_ext)) {
                                                                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                                                        //where we are putting it
                                                                        $path = ROOT . DS . 'plugins' . DS . 'Career3D' . DS . 'webroot' . DS . 'img' . DS . 'upload' . DS . 'avatar';
                                                                        move_uploaded_file($file['tmp_name'], $path . DS . $setNewFileName . '.' . $ext);

                                                                        //prepare the filename for database entry 
                                                                        $imageFileName = $setNewFileName . '.' . $ext;
                                                                    }
                                                                }
                                                                $particularRecord = $this->Photos->newEntity();
                                                                $getFormvalue = $this->Photos->patchEntity($particularRecord, $this->request->data);

                                                                if (!empty($this->request->data['file']['name'])) {
                                                                    $getFormvalue->avatar = $imageFileName;
                                                                    $getFormvalue->size = $this->request->data['file']['size'];
                                                                    $getFormvalue->type = $this->request->data['file']['type'];
                                                                    //$getFormvalue->dir = $this->request->data['file']['dir'];
                                                                    $getFormvalue->user_id = $this->Auth->user('id');
                                                                }

                                                                if ($this->Photos->save($getFormvalue)) {
                                                                    $user = $this->Users->get($this->Auth->user('id'));
                                                                    $user->pic = $imageFileName;
                                                                    $this->Users->save($user);

                                                                    $message = $this->Messages->find()->where(['avatar' => $this->Auth->user('pic')])->first();
                                                                    $message->pic = $imageFileName;
                                                                    $this->Messages->save($message);

                                                                    $status = 'success';
                                                                } else {
                                                                    $status = 'error';
                                                                }
                                                                $img = $this->Photos->find()->where(['user_id' => $this->Auth->user('id')])->first();
                                                                $this->set("img", $img);
                                                                $this->set("status", $status);
                                                                $this->set('_serialize', ['status', 'img']);
                                                            }
                                                            $this->viewBuilder()->layout(false);
                                                        }
                                                    }

                                                    public function certificateupload() {
                                                        if ($this->request->is('ajax')) {
                                                            if (!empty($this->request->data)) {
                                                                if (!empty($this->request->data['file']['name'])) {
                                                                    $file = $this->request->data['file']; //put the data into a var for easy use
                                                                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                                                                    $arr_ext = array('pdf'); //set allowed extensions
                                                                    $setNewFileName = time() . "_" . rand(000000, 999999);
                                                                    //only process if the extension is valid
                                                                    if (in_array($ext, $arr_ext)) {
                                                                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                                                        //where we are putting it
                                                                        $path = ROOT . DS . 'plugins' . DS . 'Career3D' . DS . 'webroot' . DS . 'img' . DS . 'upload' . DS . 'avatar';
                                                                        move_uploaded_file($file['tmp_name'], $path . DS . $setNewFileName . '.' . $ext);
                                                                        //prepare the filename for database entry 
                                                                        $imageFileName = $setNewFileName . '.' . $ext;
                                                                    }
                                                                }
                                                                $particularRecord = $this->Certificates->newEntity();
                                                                $getFormvalue = $this->Certificates->patchEntity($particularRecord, $this->request->data);
                                                                if (!empty($this->request->data['file']['name'])) {
                                                                    $getFormvalue->avatar = $imageFileName;
                                                                    $getFormvalue->size = $this->request->data['file']['size'];
                                                                    $getFormvalue->type = $this->request->data['file']['type'];
                                                                    //$getFormvalue->dir = $this->request->data['file']['dir'];
                                                                    $getFormvalue->user_id = $this->Auth->user('id');
                                                                }

                                                                if ($this->Certificates->save($getFormvalue)) {
                                                                    $status = 'success';
                                                                } else {
                                                                    $status = 'error';
                                                                }
                                                                $cert = $this->Certificates->find()->where(['user_id' => $this->Auth->user('id')])->first();
                                                                $this->set("cert", $cert);
                                                                $this->set("status", $status);
                                                                $this->set('_serialize', ['status', 'img']);
                                                            }
                                                            $this->viewBuilder()->layout(false);
                                                        }
                                                    }

                                                    public function assessment() {

                                                        $DataApi = new DataApi();
                                                        $response = $DataApi->request(
                                                                'https://data.learnosity.com/v1/itembank/items', [
                                                            'consumer_key' => 'yis0TYCu7U9V4o7M',
                                                            'domain' => 'localhost'
                                                                ], 'superfragilisticexpialidocious', [
                                                            'limit' => 20
                                                                ], 'get' // optional, will default to 'get' in the backend if unspecified
                                                        );
                                                        var_dump($response);
                                                        exit();


                                                        $Init = new Init(
                                                                'questions', [
                                                            'consumer_key' => 'yis0TYCu7U9V4o7M',
                                                            'domain' => 'localhost',
                                                            'user_id' => 'demo_student'
                                                                ], 'superfragilisticexpialidocious', [
                                                            'type' => 'local_practice',
                                                            'state' => 'initial',
                                                            'questions' => [
                                                                [
                                                                    'response_id' => '60005',
                                                                    'type' => 'association',
                                                                    'stimulus' => 'Match the cities to the parent nation.',
                                                                    'stimulus_list' => ['London', 'Dublin', 'Paris', 'Sydney'],
                                                                    'possible_responses' => ['Australia', 'France', 'Ireland', 'England'],
                                                                    'validation' => [
                                                                        'valid_responses' => [
                                                                            ['England'], ['Ireland'], ['France'], ['Australia']
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                                ]
                                                        );

                                                        // Call the generate() method to retrieve a JavaScript object
                                                        $request = $Init->generate();

                                                        $this->set('request', $request);
                                                    }

                                                    /**
                                                     * View method
                                                     *
                                                     * @param string|null $id User id.
                                                     * @return \Cake\Network\Response|null
                                                     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
                                                     */
                                                    public function view($id = null) {
                                                        $user = $this->Users->get($id, [
                                                            'contain' => []
                                                        ]);

                                                        $this->set('user', $user);
                                                        $this->set('_serialize', ['user']);
                                                    }

                                                    /**
                                                     * Add method
                                                     *
                                                     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
                                                     */
                                                    public function add() {
                                                        $user = $this->Users->newEntity();
                                                        if ($this->request->is('post')) {
                                                            $user = $this->Users->patchEntity($user, $this->request->data);
                                                            if ($this->Users->save($user)) {
                                                                $this->Flash->success(__('The user has been saved.'));

                                                                return $this->redirect(['action' => 'index']);
                                                            }
                                                            $this->Flash->error(__('The user could not be saved. Please, try again.'));
                                                        }
                                                        $this->set(compact('user'));
                                                        $this->set('_serialize', ['user']);
                                                    }

                                                    /**
                                                     * Edit method
                                                     *
                                                     * @param string|null $id User id.
                                                     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
                                                     * @throws \Cake\Network\Exception\NotFoundException When record not found.
                                                     */
                                                    public function edit($id = null) {
                                                        $user = $this->Users->get($id, [
                                                            'contain' => []
                                                        ]);
                                                        if ($this->request->is(['patch', 'post', 'put'])) {
                                                            $user = $this->Users->patchEntity($user, $this->request->data);
                                                            if ($this->Users->save($user)) {
                                                                $this->Flash->success(__('The user has been saved.'));

                                                                return $this->redirect(['action' => 'index']);
                                                            }
                                                            $this->Flash->error(__('The user could not be saved. Please, try again.'));
                                                        }
                                                        $this->set(compact('user'));
                                                        $this->set('_serialize', ['user']);
                                                    }

                                                    /**
                                                     * Delete method
                                                     *
                                                     * @param string|null $id User id.
                                                     * @return \Cake\Network\Response|null Redirects to index.
                                                     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
                                                     */
                                                    public function delete($id = null) {
                                                        $this->request->allowMethod(['post', 'delete']);
                                                        $user = $this->Users->get($id);
                                                        if ($this->Users->delete($user)) {
                                                            $this->Flash->success(__('The user has been deleted.'));
                                                        } else {
                                                            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
                                                        }

                                                        return $this->redirect(['action' => 'index']);
                                                    }

                                                    public function logout() {
                                                        $this->set('title', 'Login');
                                                        return $this->redirect($this->Auth->logout());
                                                    }

                                                }
                                                