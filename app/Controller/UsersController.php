<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController{

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout
		$this->Auth->allow('add', 'logout');
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password. Try Again'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function view($id = null) {
		$this->User->id = $id;
		if(!$this->User->exists()) {
			throw new NotFoundException(__("Invalid User"));
		}
		$this->set('user', $this->User->findById($id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('User created'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('User could not be created. Try Again'));
		}
	}

	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()){
			throw new NotFoundException(__('Invalid User'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)){
				$this->Flash->success(__('User updated'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('User could not be updated. Try Again'));
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}

	public function delete($id = null) {
		$this->request->allowMethod('post');

		$this->User->id = $id;
		if (!$this->User->exists()){
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Flash->success(__('User deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Flash->error(__('User could not be deleted. Try Again'));
		return $this->redirect(array('action' => 'index'));
	}

}
?>