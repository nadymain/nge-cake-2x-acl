<?php
App::uses('AppController', 'Controller');
/**
 * Tags Controller
 *
 * @property Tag $Tag
 * @property PaginatorComponent $Paginator
 */
class TagsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Paginator'
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tag->recursive = 0;
		$this->Paginator->settings = array(
			'order' => 'Tag.created DESC',
			'limit' => 10,
			'paramType' => 'querystring',
		);
		$this->set('tags', $this->Paginator->paginate());

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
			$this->Tag->create();
			if ($this->Tag->save($this->request->data)) {
				$this->Flash->success(__('The tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tag could not be saved. Please, try again.'));
			}
		}
		// $articles = $this->Tag->Article->find('list');
		// $this->set(compact('articles'));

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Add Tag');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tag->save($this->request->data)) {
				// clear cache
				Cache::clear(false, 'short');
				$this->Flash->success(__('The tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
			$this->request->data = $this->Tag->find('first', $options);
		}

		// $articles = $this->Tag->Article->find('list');
		// $this->set(compact('articles'));

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Edit Tag');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$tag = $this->Tag->findById($id);
		if ($tag['Tag']['id'] === '1') {
			$this->Flash->error(__('The tag with id = 1 could not be deleted.'));
			return $this->redirect(array('action' => 'index'));
		}

		if ($tag['Tag']['article_count'] !== '0') {
			$this->Flash->error(__('The tag with article count >= 1 could not be deleted.'));
			return $this->redirect(array('action' => 'index'));
		}

		$this->Tag->id = $id;
		if (!$this->Tag->exists()) {
			throw new NotFoundException(__('Invalid tag'));
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Tag->delete()) {
			$this->Flash->success(__('The tag has been deleted.'));
		} else {
			$this->Flash->error(__('The tag could not be deleted. Please, try again.'));
		}
		
		return $this->redirect(array('action' => 'index'));
	}
}
