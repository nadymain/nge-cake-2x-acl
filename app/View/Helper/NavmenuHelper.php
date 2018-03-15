<?php
App::uses('AppHelper', 'View/Helper');

class NavmenuHelper extends AppHelper {
    
    public $helpers = ['Html'];

	public function active($link) {
        $url = $this->Html->url($link);
        $here = $this->request->here;

		return $url === $here ? 'active' : 'unactive';
    }
    
}
