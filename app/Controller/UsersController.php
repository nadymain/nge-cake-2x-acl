<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Paginator'
	);

/**
 * beforeFilter
 */
    public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('login');
		// $this->Auth->allow('initDB'); // We can remove this line after we're finished
    }

/**
 * login
 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->User->id = $this->Auth->user('id');
				$this->User->saveField('last_login', date('Y-m-d H:i:s'));
				$this->Flash->success(__('You have been successfully logged in.'));
				return $this->redirect($this->Auth->redirectUrl());
			} 
			$this->Flash->error('Oops! It looks like something went wrong.');
		} 

		if ($this->Auth->loggedIn()) {
			$this->Flash->success('You are logged in!');
			
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

/**
 * logout
 */
	public function logout() {
		$this->Flash->success('You have been logged out successfully.');
		
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());

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
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Add User');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$user = $this->User->findById($id);
		if ($this->Auth->user('group_id') !== '1') {
			if ($this->Auth->user('id') !== $user['User']['id']){
				throw new NotFoundException();
			}
		}

		if (!$this->User->exists($id)) {
			throw new NotFoundException();
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				// clear cache
				Cache::clear(false, 'short');

				// update auth
				$data = $this->User->read(null, $this->Auth->user('id'))['User'];
				unset($data['password']);
				unset($data['article_count']);
				$this->Auth->login($data);

				$this->Flash->success(__('The user has been updated.'));
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}

		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));

		// custom
		$this->layout = 'admin';
		$this->set('title', 'Edit User');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$user = $this->User->findById($id);
		if ($user['User']['id'] === '1') {
			$this->Flash->error(__('The user with id = 1 could not be deleted.'));
			return $this->redirect($this->referer());
		}

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException();
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}

		return $this->redirect(array('action' => 'index'));
	}

/**
 * initDB
 */
	// public function initDB() {
	// 	$group = $this->User->Group;
	// 	// Allow admins to everything
	// 	$group->id = 1;
	// 	$this->Acl->allow($group, 'controllers');
	// 	// allow author 
	// 	$group->id = 2;
	// 	$this->Acl->deny($group, 'controllers');
	// 	$this->Acl->allow($group, 'controllers/Articles');
	// 	$this->Acl->allow($group, 'controllers/Categories');
	// 	$this->Acl->allow($group, 'controllers/Tags');
	// 	$this->Acl->allow($group, 'controllers/Images');	
	// 	$this->Acl->allow($group, 'controllers/Users/edit');
	// 	// allow basic users to log out
	// 	$this->Acl->allow($group, 'controllers/users/logout');
	// 	// we add an exit to avoid an ugly "missing views" error message
	// 	echo "all done";
	// 	exit;
	// }

}
