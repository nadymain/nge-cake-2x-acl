<?php
App::uses('AppHelper', 'View/Helper');

class UpdateHelper extends AppHelper {

    public $helpers = ['Form'];

    public function status($status, $id)
    {
        $published = $this->Form->postLink(__('Published'), 
            array('action' => 'yesorno', 'draft', $id), 
            array('class' => 'table-btn', 'title' => 'Change Status')
        );

        $draft = $this->Form->postLink(__('Draft'), 
            array('action' => 'yesorno', 'published', $id), 
            array('class' => 'table-btn table-btn-warning', 'title' => 'Change Status')
        );
        
        return $status == 'published' ? $published : $draft;
    }

    
}
