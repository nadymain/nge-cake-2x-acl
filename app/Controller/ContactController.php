<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContactController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // allow
        $this->Auth->allow('index');
    }
    
    public function index() {
        if ($this->request->is('post')){
            // fake
            if (!empty($this->request->data['Contact']['website'])){
                $this->Flash->success('Thanks.');
                return $this->redirect(array('action' => 'index'));
            }

            if ($this->_execute($this->request->data['Contact'])){
                $this->Flash->success('Contact form was submitted successfully.');
            } else {
                $this->Flash->error('Oops! It looks like something went wrong.');
            }
        }
    }

    protected function _execute($data)
    {
        $this->Contact->set($data);
        if ($this->Contact->validates()){
            $email = new CakeEmail();
            $email
                ->to(Configure::read('site_email'))
                ->subject('Contact form submission')
                ->from($data['email'])
                ->viewVars($data)
                ->template('contact', 'default')
                ->emailFormat('text')
                ->send();
                
            return true;
        }
    }

}
