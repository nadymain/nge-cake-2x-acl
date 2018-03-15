<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

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
		$this->Category->recursive = 0;
		$this->Paginator->settings = array(
			'order' => 'Category.created DESC',
			'limit' => 10,
			'paramType' => 'querystring',
		);
		$this->set('categories', $this->Paginator->paginate());

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
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		}
		
		// custom
		$this->layout = 'admin';
		$this->set('title', 'Add Category');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException();
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				// clear cache
				Cache::clear(false, 'short');
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Edit Category');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$category = $this->Category->findById($id);
		if ($category['Category']['id'] === '1') {
			$this->Flash->error(__('The category with id = 1 could not be deleted.'));
			return $this->redirect(array('action' => 'index'));
		}

		if ($category['Category']['article_count'] !== '0') {
			$this->Flash->error(__('The category with article count >= 1 could not be deleted.'));
			return $this->redirect(array('action' => 'index'));
		}

		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException();
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Flash->success(__('The category has been deleted.'));
		} else {
			$this->Flash->error(__('The category could not be deleted. Please, try again.'));
		}

		return $this->redirect(array('action' => 'index'));
	}
}
