<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 * @property PaginatorComponent $Paginator
 */
class ImagesController extends AppController {

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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Image->recursive = 0;
		$this->Prg->commonProcess();
		if ($this->Auth->user('group_id') === '1') {
			$this->Paginator->settings = array(
				'order' => 'Image.created DESC',
				'limit' => 10,
				'paramType' => 'querystring',
				'conditions' => array(
					$this->Image->parseCriteria($this->Prg->parsedParams())
				)
			);
		} else {
			$this->Paginator->settings = array(
				'order' => 'Image.created DESC',
				'limit' => 10,
				'paramType' => 'querystring',
				'conditions' => array(
					'Image.user_id' => $this->Auth->user('id'),
					$this->Image->parseCriteria($this->Prg->parsedParams())
				)
			);
		}
		$this->set('images', $this->Paginator->paginate());

		// $total
		if ($this->Auth->user('group_id') === '1') {
			$total = $this->Image->find('count');
		} else {
			$total = $this->Image->find('count', array (
				'conditions' => array(
					'Image.user_id' => $this->Auth->user('id')
				)
			));
		}
		$this->set('total', $total);

		// custom
		$this->layout = 'admin';
	}

/**
 * iframe method
 *
 * @return void
 */
	public function iframeindex() {
		$this->Image->recursive = 0;
		$this->Prg->commonProcess();
		if ($this->Auth->user('group_id') === '1') {
			$this->Paginator->settings = array(
				'order' => 'Image.created DESC',
				'limit' => 10,
				'paramType' => 'querystring',
				'conditions' => array(
					$this->Image->parseCriteria($this->Prg->parsedParams())
				)
			);
		} else {
			$this->Paginator->settings = array(
				'order' => 'Image.created DESC',
				'limit' => 10,
				'paramType' => 'querystring',
				'conditions' => array(
					'Image.user_id' => $this->Auth->user('id'),
					$this->Image->parseCriteria($this->Prg->parsedParams())
				)
			);
		}
		$this->set('images', $this->Paginator->paginate());

		// $total
		if ($this->Auth->user('group_id') === '1') {
			$total = $this->Image->find('count');
		} else {
			$total = $this->Image->find('count', array (
				'conditions' => array(
					'Image.user_id' => $this->Auth->user('id')
				)
			));
		}
		$this->set('total', $total);

		// custom
		$this->layout = 'iframe';
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Image->create();
			// authorization
			$this->request->data['Image']['user_id'] = $this->Auth->user('id');
			if ($this->Image->save($this->request->data)) {
				$this->Flash->success(__('The image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The image could not be saved. Please, try again.'));
			}
		}
		$users = $this->Image->User->find('list');
		$this->set(compact('users'));

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Add Image');
	}

/**
 * iframeadd method
 *
 * @return void
 */
public function iframeadd() {
	if ($this->request->is('post')) {
		$this->Image->create();
		// authorization
		$this->request->data['Image']['user_id'] = $this->Auth->user('id');
		if ($this->Image->save($this->request->data)) {
			$this->Flash->success(__('The image has been saved.'));
			if ($this->request->query('type') === 'modal') {
				return $this->redirect(array('action' => 'iframeindex?type=modal'));
			} else {
				return $this->redirect(array('action' => 'iframeindex?type=ckeditor&CKEditorFuncNum='.$this->request->query('CKEditorFuncNum')));
			}
		} else {
			$this->Flash->error(__('The image could not be saved. Please, try again.'));
		}
	}
	$users = $this->Image->User->find('list');
	$this->set(compact('users'));

	// custom
	$this->layout = 'iframe';
	$this->set('title', 'Add Image');
}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$image = $this->Image->findById($id);
		if ($this->Auth->user('group_id') !== '1') {
			if ($this->Auth->user('id') !== $image['Image']['user_id']){
				throw new NotFoundException();
			}
		}

		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException();
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Image->delete()) {
			$this->Flash->success(__('The image has been deleted.'));
		} else {
			$this->Flash->error(__('The image could not be deleted. Please, try again.'));
		}

		return $this->redirect($this->referer());
	}
}
