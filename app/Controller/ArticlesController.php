<?php
App::uses('AppController', 'Controller');

/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 */
class ArticlesController extends AppController {

/**
 * beforeFilter
 */
	public function beforeFilter() {
		parent::beforeFilter();
		// allow
		$this->Auth->allow('search');
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Paginator',
		'Search.Prg'
	);

/**
 * search method
 *
 * @return void
 */
	public function search() {
		$this->Article->recursive = 0;
		$this->Prg->commonProcess();
		$this->Paginator->settings = array(
			'order' => 'Article.created DESC',
			'limit' => 10,
			'paramType' => 'querystring',
			'conditions' => array(
				'Article.status' => 'published',
				$this->Article->parseCriteria($this->Prg->parsedParams())
			)
		);
		$this->set('articles', $this->Paginator->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Article->recursive = 1;
		$this->Prg->commonProcess();
		if ($this->Auth->user('group_id') === '1') {
			$this->Paginator->settings = array(
				'order' => 'Article.created DESC',
				'limit' => 10,
				'paramType' => 'querystring',
				'conditions' => array(
					$this->Article->parseCriteria($this->Prg->parsedParams())
				)
			);
		} else {
			$this->Paginator->settings = array(
				'order' => 'Article.created DESC',
				'limit' => 10,
				'paramType' => 'querystring',
				'conditions' => array(
					'Article.user_id' => $this->Auth->user('id'),
					$this->Article->parseCriteria($this->Prg->parsedParams())
				)
			);
		}
		$this->set('articles', $this->Paginator->paginate());

		// $total
		if ($this->Auth->user('group_id') === '1') {
			$total = $this->Article->find('count');
		} else {
			$total = $this->Article->find('count', array (
				'conditions' => array(
					'Article.user_id' => $this->Auth->user('id')
				)
			));
		}
		$this->set('total', $total);

		// $published
		if ($this->Auth->user('group_id') === '1') {
			$published = $this->Article->find('count', array(
				'conditions' => array('Article.status' => 'published')
			));
		} else {
			$published = $this->Article->find('count', array(
				'conditions' => array(
					'Article.status' => 'published',
					'Article.user_id' => $this->Auth->user('id')
				)
			));
		}
		$this->set('published', $published);

		// $draft
		if ($this->Auth->user('group_id') === '1') {
			$draft = $this->Article->find('count', array(
				'conditions' => array('Article.status' => 'draft')
			));
		} else {
			$draft = $this->Article->find('count', array(
				'conditions' => array(
					'Article.status' => 'draft',
					'Article.user_id' => $this->Auth->user('id')
				)
			));
		}
		$this->set('draft', $draft);

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
			$this->Article->create();
			// authorization
			$this->request->data['Article']['user_id'] = $this->Auth->user('id');
			if ($this->Article->save($this->request->data)) {
				$this->Flash->success(__('The article has been saved.'));
				return $this->redirect(array('action' => 'edit', $this->Article->id));
			} else {
				$this->Flash->error(__('The article could not be saved. Please, try again.'));
			}
		}

		$categories = $this->Article->Category->find('list');
		$users = $this->Article->User->find('list');
		$tags = $this->Article->Tag->find('list');
		$this->set(compact('categories', 'users', 'tags'));

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Add Article');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$article = $this->Article->findById($id);
		if ($this->Auth->user('group_id') !== '1') {
			if ($this->Auth->user('id') !== $article['Article']['user_id']){
				throw new NotFoundException();
			}
		}

		if (!$this->Article->exists($id)) {
			throw new NotFoundException();
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Article->save($this->request->data)) {
				$this->Flash->success(__('The article has been saved.'));
                if (isset($this->request->data['update'])) {
                    return $this->redirect(array('action' => 'edit', $this->Article->id));
                } elseif (isset($this->request->data['submit'])){
                    return $this->redirect(array('action' => 'index'));
                }
			} else {
				$this->Flash->error(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
			$this->request->data = $this->Article->find('first', $options);
		}
		
		$categories = $this->Article->Category->find('list');
		$users = $this->Article->User->find('list');
		$tags = $this->Article->Tag->find('list');
		$this->set(compact('categories', 'users', 'tags'));

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Edit Article');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$article = $this->Article->findById($id);
		if ($this->Auth->user('group_id') !== '1') {
			if ($this->Auth->user('id') !== $article['Article']['user_id']){
				throw new NotFoundException();
			}
		}

		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException();
		}
		
		$this->request->allowMethod('post', 'delete');
		if ($this->Article->delete()) {
			$this->Flash->success(__('The article has been deleted.'));
		} else {
			$this->Flash->error(__('The article could not be deleted. Please, try again.'));
		}
		
		return $this->redirect(array('action' => 'index'));
	}

/**
 * yesorno method
 *
 */
	public function yesorno($field = null, $id = null) {
		$article = $this->Article->findById($id);
		if ($this->Auth->user('group_id') !== '1') {
			if ($this->Auth->user('id') !== $article['Article']['user_id']){
				throw new NotFoundException();
			}
		}
		
		$data = array('status' => $field, 'id' => $id);
		$this->Article->save($data);
		$this->Flash->success(__('The article has been update.'));
		return $this->redirect($this->referer());
	}

}
