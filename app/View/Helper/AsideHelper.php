<?php
App::uses('AppHelper', 'View/Helper');

class AsideHelper extends AppHelper {

    public function active($controller) {
        $params = $this->request->params['controller'];

        return  $params === $controller ? 'active' : null;
    }
    
}
