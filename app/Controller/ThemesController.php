<?php
App::uses('AppController', 'Controller');

class ThemesController extends AppController{

	public function index() {
		$this->Theme->recursive = 0;
		$this->set('themes', $this->paginate());
	}

	public function view($id = null) {
		$this->Theme->id = $id;
		if(!$this->Theme->exists()) {
			throw new NotFoundException(__("Invalid Theme"));
		}
		$this->set('theme', $this->Theme->findById($id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Theme->create();
			if ($this->Theme->save($this->request->data)) {
				$this->Flash->success(__('Theme created'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Theme could not be created. Try Again'));
		}
	}

	public function edit($id = null) {
		$this->Theme->id = $id;
		if (!$this->Theme->exists()){
			throw new NotFoundException(__('Invalid Theme'));
		}
		if ($this->request->is('post', 'put')) {
			if ($this->Theme->save($this->request->data)){
				$this->Flash->success(__('Theme updated'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Theme could not be updated. Try Again'));
		} else {
			$this->request->data = $this->Theme->findById($id);
		}
	}

	public function delete($id = null) {
		$this->request->allowMethod('post');

		$this->Theme->id = $id;
		if (!$this->Theme->exists()){
			throw new NotFoundException(__('Invalid theme'));
		}
		if ($this->Theme->delete()) {
			$this->Flash->success(__('Theme deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Flash->error(__('Theme could not be deleted. Try Again'));
		return $this->redirect(array('action' => 'index'));
	}

}
?>