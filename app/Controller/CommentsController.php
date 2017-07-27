<?php
App::uses('AppController', 'Controller');

class CommentsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
                'Comment.created' => 'asc'
        )
    );

    public function add() {
        if ($this->request->is('post')) {
            $this->Comment->create();
            $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
            $this->request->data['Comment']['post_id'] = $this->Post->find('id');
            if ($this->Comment->save($this->request->data)) {
                $this->Flash->success(__('Your Comment has been saved.'));
                return $this->redirect(array('controller' => 'posts', 'action' => 'view'));
            }
            $this->Flash->error(__('Unable to add your comment.'));
        }
    }

    // public function edit($id = null){
    //     $this->set('themes',$this->Post->Theme->find('list', array('fields' => array('theme_name'))));
    // 	if(!$id){
    // 		throw new NotFoundException(__('Invalid Post'));
    // 	}

    // 	$post = $this->Post->findById($id);
    // 	if(!$post){
    // 		throw new NotFoundException(__('Invalid Post'));
    // 	}

    // 	if($this->request->is(array('post', 'put'))){
    // 		$this->Post->id = $id;
    // 		if($this->Post->save($this->request->data)){
    // 			$this->Flash->success(__('Your post has been updatade.'));
    // 			return $this->redirect(array('action' => 'index'));
    // 		}
    // 		$this->Flash->error(__('Unable to update post'));
    // 	}

    // 	if(!$this->request->data){
    // 		$this->request->data = $post;
    // 	}
    // }

    // public function delete($id){
    // 	if ($this->request->is('get')){
    // 		throw new MethodNotAllowedException();
    // 	}

    // 	if ($this->Post->delete($id)){
    // 		$this->Flash->success(__('Post deleted'));
    // 	} else{
    // 		$this->Flash->error(__('Post cannot be deleted'));
    // 	}
    // 	return $this->redirect(array('action' => 'index'));
    // }

    // public function isAuthorized($user){
    // 	if ($this->action === 'add')
    // 		return true;
    // 	if (in_array($this->action, array('edit', 'delete'))) {
    // 		$postId = (int) $this->request->params['pass'][0];
    // 		if ($this->Post->isOwnedBy($postId, $user['id'])) {
    // 			return true;
    // 		}
    // 	}

    // 	return parent::isAuthorized($user);
    // }
}
?>