<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Setting->recursive = 0;
		$this->set('settings', $this->Setting->find('all'));

		// custom
		$this->layout = 'admin';
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if ($this->Setting->save($this->request->data)) {
				Cache::delete('settings', 'long');
				$this->Flash->success(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The setting could not be saved. Please, try again.'));
			}
		}
		
		// custom
		$this->layout = 'admin';
		$this->set('title', 'Add Setting');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException();
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Setting->save($this->request->data)) {
				// clear delete
				Cache::delete('settings', 'long');
				$this->Flash->success(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
		}
		
		$this->set('setting', $this->Setting->findById($id));
		
		// custom
		$this->layout = 'admin';
		$this->set('title', 'Edit Setting');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function delete($id = null) {
	// 	$this->Setting->id = $id;
	// 	if (!$this->Setting->exists()) {
	// 		throw new NotFoundException();
	// 	}

	// 	$this->request->allowMethod('post', 'delete');
	// 	if ($this->Setting->delete()) {
	// 		// clear delete
	// 		Cache::delete('settings', 'long');
	// 		$this->Flash->success(__('The setting has been deleted.'));
	// 	} else {
	// 		$this->Flash->error(__('The setting could not be deleted. Please, try again.'));
	// 	}
		
	// 	return $this->redirect(array('action' => 'index'));
	// }
}
