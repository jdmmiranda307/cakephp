<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
        $this->set('userRole', $this->Auth->user('role')); 
    }

   	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
    }

    public function edit($id = null){
    	if(!$id){
    		throw new NotFoundException(__('Invalid Post'));
    	}

    	$post = $this->Post->findById($id);
    	if(!$post){
    		throw new NotFoundException(__('Invalid Post'));
    	}

    	if($this->request->is(array('post', 'put'))){
    		$this->Post->id = $id;
    		if($this->Post->save($this->request->data)){
    			$this->Flash->success(__('Your post has been updatade.'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Flash->error(__('Unable to update post'));
    	}

    	if(!$this->request->data){
    		$this->request->data = $post;
    	}
    }

    public function delete($id){
    	if ($this->request->is('get')){
    		throw new MethodNotAllowedException();
    	}

    	if ($this->Post->delete($id)){
    		$this->Flash->success(__('Post deleted'));
    	} else{
    		$this->Flash->error(__('Post cannot be deleted'));
    	}
    	return $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user){
    	if ($this->action === 'add')
    		return true;
    	if (in_array($this->action, array('edit', 'delete'))) {
    		$postId = (int) $this->request->params['pass'][0];
    		if ($this->Post->isOwnedBy($postId, $user['id'])) {
    			return true;
    		}
    	}

    	return parent::isAuthorized($user);
    }
}
?>