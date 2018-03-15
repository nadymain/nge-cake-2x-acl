<?php
App::uses('AppController', 'Controller');
/**
 * Infos Controller
 *
 * @property Info $Info
 * @property PaginatorComponent $Paginator
 */
class InfosController extends AppController {
/**
 * beforeFilter
 */
	public function beforeFilter() {
		parent::beforeFilter();
		// allow
		$this->Auth->allow('show');
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * show method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function show($slug = null) {
        $info = $this->Info->find('first', array(
            'conditions' => array (
                'Info.slug' => $slug
			),
			'cacher' => true
		));
		
        if(!$info) {
            throw new NotFoundException();
		}
		
		$this->set('info', $info);

		// custom
		$this->set('title', $info['Info']['title']);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Info->recursive = 0;
		$this->Paginator->settings = array(
			'order' => 'Info.created DESC',
			'limit' => 10,
			'paramType' => 'querystring',
		);
		$this->set('infos', $this->Paginator->paginate());

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
			$this->Info->create();
			if ($this->Info->save($this->request->data)) {
				$this->Flash->success(__('The info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The info could not be saved. Please, try again.'));
			}
		}

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Add Info');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Info->exists($id)) {
			throw new NotFoundException();
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Info->save($this->request->data)) {
				$this->Flash->success(__('The info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
			$this->request->data = $this->Info->find('first', $options);
		}

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Edit Info');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Info->id = $id;
		if (!$this->Info->exists()) {
			throw new NotFoundException();
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Info->delete()) {
			$this->Flash->success(__('The info has been deleted.'));
		} else {
			$this->Flash->error(__('The info could not be deleted. Please, try again.'));
		}
		
		return $this->redirect(array('action' => 'index'));
	}

/**
 * yesorno method
 *
 */
	public function yesorno($field = null, $id = null) {
		$data = array('status' => $field, 'id' => $id);
		$this->Info->save($data);
		$this->Flash->success(__('The info has been update.'));
		return $this->redirect($this->referer());
	}

}
