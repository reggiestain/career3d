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
class NetworksController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['index', 'register', 'login']);
        $this->viewBuilder()->layout('Career3D.dashboard');
        $img = $this->PhotosTable->find()->where(['user_id' => $this->Auth->user('id')])->order(['avatar' => 'DESC'])->first();
        $profile = $this->profileInfo($this->Auth->user('id'));
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
     */
    public function index() {
        $netwrk = $this->netwrks($this->Auth->user('id'));        
        $users = $this->assoc($this->Auth->user('id'));       
        $this->set('users', $users);
        $this->set('netwrk', $netwrk);
    }

    /**
     * Connect method
     *
     */
    public function connect() {
        if ($this->request->is('ajax')) {
            $netwrk = $this->NetworksTable->newEntity();
            if ($this->request->is('post')) {
                $netwrk = $this->NetworksTable->patchEntity($netwrk, $this->request->data);
                $netwrk->user_id = $this->Auth->user('id');
                if ($this->NetworksTable->save($netwrk)) {
                    $msg = $this->request->data('status');
                   }else{
                   $msg = 'error';
                   }
            }
            
            $this->set('msg', $msg);
            $this->viewBuilder()->layout(false);
        }
    }

    public function decide($id, $status) {
        if ($this->request->is('ajax')) {
            $netwrk = $this->NetworksTable->get($id);
            if ($this->request->is('post')) {
                $netwrk = $this->NetworksTable->patchEntity($netwrk, $this->request->data);
                $netwrk->status = $status;
                if ($this->NetworksTable->save($netwrk)) {
                    $this->Flash->success(__($this->request->data('status') . " successfully."));
                    //return $this->redirect(['action' => 'index']);
                }
            }
            $this->viewBuilder()->layout(false);
        }
    }

    public function dashboard() {
        $topics = $this->TopicsTable->find('list');
        $post = $this->PostsTable->find()->order(['Posts.id' => 'DESC'])->contain(['Users', 'Topics', 'Users.Photos' => function($q) {
                $q->order(['avatar' => 'DESC']);
                return $q;
            },
                    'Likes' => function($q) {
                $q->select(
                        ['Likes.post_id', 'total' => $q->func()->count('Likes.post_id')])->group(['Likes.post_id']);
                return $q;
            }, 'Comments']);

                $this->set('topics', $topics);
                $this->set('post', $post);
                $this->viewBuilder()->layout('dashboard');
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

            public function savehighschool() {
                if ($this->request->is('ajax')) {
                    if ($this->request->is('post')) {
                        $high = $this->HighSchoolsTable->newEntity();
                        $high->user_id = $this->Auth->user('id');
                        $high = $this->HighSchoolsTable->patchEntity($high, $this->request->data);
                        if (empty($high->errors())) {
                            $this->HighSchoolsTable->save($high);
                            foreach ($this->request->data('subject_id') as $subject) {
                                $highsubject = $this->HighSubjectsTable->newEntity();
                                $data = ['subject_id' => $subject, 'high_school_id' => $high->id];
                                $this->HighSubjectsTable->patchEntity($highsubject, $data);
                                $this->HighSubjectsTable->save($highsubject);
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
                        $address = $this->AddressesTable->newEntity();
                        $address->user_id = $this->Auth->user('id');
                        $$address = $this->AddressesTable->patchEntity($address, $this->request->data);
                        if (empty($address->errors())) {
                            $this->AddressesTable->save($address);
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
                        $tertiaries = $this->TertiariesTable->newEntity();
                        $tertiaries->user_id = $this->Auth->user('id');
                        $tertiaries = $this->TertiariesTable->patchEntity($tertiaries, $this->request->data);
                        if (empty($tertiaries->errors())) {
                            $this->TertiariesTable->save($tertiaries);
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
                        $workexp = $this->WorkExpsTable->newEntity();
                        $workexp->user_id = $this->Auth->user('id');
                        $workexp = $this->WorkExpsTable->patchEntity($workexp, $this->request->data);
                        if (empty($workexp->errors())) {
                            $this->WorkExpsTable->save($workexp);
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
                    $profile = $this->ProfilesTable->get($profileId);
                    if ($this->request->is(['put'])) {
                        $this->ProfilesTable->patchEntity($profile, $this->request->data);
                        if ($this->ProfilesTable->save($profile)) {
                            $status = '500';
                            $message = 'update';
                        }
                    } else {
                        $status = '200';
                        $message = '';
                    }
                    $careers = $this->CareersTable->find('list');
                    $this->set('profile', $profile);
                    $this->set('careers', $careers);
                    $this->set('status', $status);
                    $this->set('message', $message);
                    $this->viewBuilder()->layout(false);
                }
            }

            public function editaddress($addressId) {
                if ($this->request->is('ajax')) {
                    $address = $this->AddressesTable->get($addressId);
                    if ($this->request->is(['put'])) {
                        $this->AddressesTable->patchEntity($address, $this->request->data);
                        if ($this->AddressesTable->save($address)) {
                            $status = '500';
                            $message = 'update';
                        }
                    } else {
                        $status = '200';
                        $message = '';
                    }
                    $province = $this->ProvincesTable->find('list');
                    $this->set('address', $address);
                    $this->set('province', $province);
                    $this->set('status', $status);
                    $this->set('message', $message);
                    $this->viewBuilder()->layout(false);
                }
            }

            public function edithigh($highId) {
                if ($this->request->is('ajax')) {
                    $high = $this->HighSchoolsTable->get($highId, ['contain' => ['Subjects']]);
                    if ($this->request->is(['put'])) {
                        $this->HighSchoolsTable->patchEntity($high, $this->request->data, ['associated' => ['Subjects']]);
                        if ($this->HighSchoolsTable->save($high)) {
                            $status = '500';
                            $message = 'update';
                        }
                    } else {
                        $status = '200';
                        $message = '';
                    }

                    $subject = $this->SubjectsTable->find('list');
                    $this->set('high', $high);
                    $this->set('subject', $subject);
                    $this->set('status', $status);
                    $this->set('message', $message);
                    $this->viewBuilder()->layout(false);
                }
            }

            public function edittertiary($TerId) {
                if ($this->request->is('ajax')) {
                    $tertiary = $this->TertiariesTable->get($TerId);
                    if ($this->request->is(['put'])) {
                        $this->TertiariesTable->patchEntity($tertiary, $this->request->data);
                        if ($this->TertiariesTable->save($tertiary)) {
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
                    $workexp = $this->WorkExpsTable->get($exId);
                    if ($this->request->is(['put'])) {
                        $this->WorkExpsTable->patchEntity($workexp, $this->request->data);
                        if ($this->WorkExpsTable->save($workexp)) {
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
                        $comments = $this->CommentsTable->find()->where(['post_id' => $this->request->data('post_id')])->contain(['Users.Photos' => function($q) {
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
                        $comments = $this->CommentsTable->find()->where(['post_id' => $id])->count();
                        echo $comments . ' comment';
                        exit();
                    }

                    public function countreply($id) {
                        $comments = $this->CommentReplysTable->find()->where(['comment_id' => $id])->count();
                        echo $comments . ' Reply';
                        exit();
                    }

                    public function publish() {
                        if ($this->request->is('ajax')) {
                            if ($this->request->is('post')) {
                                $post = $this->PostsTable->newEntity();
                                $post = $this->PostsTable->patchEntity($post, $this->request->data);
                                $post->user_id = $this->Auth->user('id');
                                if ($this->PostsTable->save($post)) {
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
                                $likes = $this->LikesTable->newEntity();
                                $likes->user_id = $this->Auth->user('id');
                                $post = $this->LikesTable->find()->where(['user_id' => $this->Auth->user('id'), 'post_id' => $this->request->data('post_id')])->first();
                                if ($post) {
                                    $this->LikesTable->delete($post);
                                } else {
                                    $likes = $this->LikesTable->patchEntity($likes, $this->request->data);
                                    if ($this->LikesTable->save($likes)) {
                                        $status = '500';
                                        $message = 'Post was successful.';
                                    } else {
                                        $status = 'error';
                                        $message = 'An error occured, please try again.';
                                    }
                                }
                                $post = $this->PostsTable->find()->order(['Posts.id' => 'DESC'])->contain(['Users', 'Topics', 'Users.Photos' => function($q) {
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
                                        $likes = $this->CommentLikesTable->newEntity();
                                        $likes->user_id = $this->Auth->user('id');
                                        $post = $this->CommentLikesTable->find()->where(['user_id' => $this->Auth->user('id'), 'comment_id' => $this->request->data('comment_id')])->first();
                                        if ($post) {
                                            $this->CommentLikesTable->delete($post);
                                        } else {
                                            $likes = $this->CommentLikesTable->patchEntity($likes, $this->request->data);
                                            if ($this->CommentLikesTable->save($likes)) {
                                                $status = '500';
                                                $message = 'Post was successful.';
                                            } else {
                                                $status = 'error';
                                                $message = 'An error occured, please try again.';
                                            }
                                        }
                                        $comments = $this->CommentsTable->find()->where(['post_id' => $this->request->data('post_id')])->contain(['Users.Photos' => function($q) {
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
                                                $comment = $this->CommentsTable->newEntity();
                                                $comment = $this->CommentsTable->patchEntity($comment, $this->request->data);
                                                $comment->user_id = $this->Auth->user('id');
                                                if ($this->CommentsTable->save($comment)) {
                                                    $status = '500';
                                                    $message = 'Post was successful.';
                                                } else {
                                                    $status = 'error';
                                                    $message = 'An error occured, please try again.';
                                                }

                                                $comments = $this->CommentsTable->find()->where(['post_id' => $this->request->data('post_id')])->contain(['Users.Photos' => function($q) {
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
                                                        $commentreply = $this->CommentReplysTable->find()->where(['comment_id' => $this->request->data('comment_id')])
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
                                                                $commentreply = $this->CommentReplysTable->newEntity();
                                                                $commentreply = $this->CommentReplysTable->patchEntity($commentreply, $this->request->data);
                                                                $commentreply->user_id = $this->Auth->user('id');
                                                                if ($this->CommentReplysTable->save($commentreply)) {
                                                                    $status = '500';
                                                                    $message = 'Reply was successful.';
                                                                } else {
                                                                    $status = 'error';
                                                                    $message = 'An error occured, please try again.';
                                                                }
                                                                $commentreply = $this->CommentReplysTable->find()->where(['comment_id' => $this->request->data('comment_id')])
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
                                                                        $particularRecord = $this->PhotosTable->newEntity();
                                                                        $getFormvalue = $this->PhotosTable->patchEntity($particularRecord, $this->request->data);

                                                                        if (!empty($this->request->data['file']['name'])) {
                                                                            $getFormvalue->avatar = $imageFileName;
                                                                            $getFormvalue->size = $this->request->data['file']['size'];
                                                                            $getFormvalue->type = $this->request->data['file']['type'];
                                                                            //$getFormvalue->dir = $this->request->data['file']['dir'];
                                                                            $getFormvalue->user_id = $this->Auth->user('id');
                                                                        }

                                                                        if ($this->PhotosTable->save($getFormvalue)) {
                                                                            $status = 'success';
                                                                        } else {
                                                                            $status = 'error';
                                                                        }
                                                                        $img = $this->PhotosTable->find()->where(['user_id' => $this->Auth->user('id')])->first();
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
                                                                        $particularRecord = $this->CertificatesTable->newEntity();
                                                                        $getFormvalue = $this->CertificatesTable->patchEntity($particularRecord, $this->request->data);
                                                                        if (!empty($this->request->data['file']['name'])) {
                                                                            $getFormvalue->avatar = $imageFileName;
                                                                            $getFormvalue->size = $this->request->data['file']['size'];
                                                                            $getFormvalue->type = $this->request->data['file']['type'];
                                                                            //$getFormvalue->dir = $this->request->data['file']['dir'];
                                                                            $getFormvalue->user_id = $this->Auth->user('id');
                                                                        }

                                                                        if ($this->CertificatesTable->save($getFormvalue)) {
                                                                            $status = 'success';
                                                                        } else {
                                                                            $status = 'error';
                                                                        }
                                                                        $cert = $this->CertificatesTable->find()->where(['user_id' => $this->Auth->user('id')])->first();
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
                                                        