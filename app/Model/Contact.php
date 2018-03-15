<?php
App::uses('AppModel', 'Model');

class Contact extends AppModel {

    public $useTable = false;

    protected $_schema = array(
        'name' => array(
            'type' => 'string',
        ),
        'email' => array(
            'type' => 'string',
        ),
        'website' => array(
            'type' => 'string',
        ),
        'message' => array(
            'type' => 'text',
        )
    );

    public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please fill out this field.',
            ),
            'minLength' => array(
                'rule' => array('minLength', '3'),
                'message' => 'Minimum 3 characters long'
            ),
        ),
		'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please insert your email address.'
            )
        ),
		'message' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please fill out this field.',
            ),
            'minLength' => array(
                'rule' => array('minLength', '10'),
                'message' => 'Minimum 10 characters long'
            ),
        )
    );

}
