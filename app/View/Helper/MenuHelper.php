<?php
App::uses('AppHelper', 'View/Helper');

class MenuHelper extends AppHelper {
    
    public $helpers = ['Html'];

	public function main($link) {
        $url = $this->Html->url($link);
        $here = $this->request->here;

		return $url === $here ? 'active' : 'inactive';
    }

    public function admin($controller) {
        $params = $this->request->params['controller'];

        return  $params === $controller ? 'active' : null;
    }
    
}