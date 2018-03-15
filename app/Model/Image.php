<?php
App::uses('AppModel', 'Model');
//App::uses('CakeText', 'Utility');
App::uses('Inflector', 'Utility');

/**
 * Image Model
 *
 * @property User $User
 */
class Image extends AppModel {
	
/**
 * actsAs
 */
	public $actsAs = array(
		'Search.Searchable',
		'Upload.Upload' => array(
			'file' => array(
				'pathMethod' => 'flat',
				'path' => '{ROOT}webroot{DS}img{DS}uploads{DS}',
				// 'fields' => array(
				// 	'dir' => 'dir',
				// 	'type' => 'type',
				// 	'size' => 'size',
				// ),
				'thumbnailMethod' => 'php',
				'thumbnailQuality' => '100',
				'thumbnailSizes' => array(
					's' => '120mw'
				),
				'thumbnailPath' => '{ROOT}webroot{DS}img{DS}uploads{DS}thumb{DS}',
				'nameCallback' => 'fileRename',
				//'deleteFolderOnDelete' => true,
			)
		)
	);

/**
 * fileRename
 */
	public function fileRename($field, $currentName) {
		// $ext = pathinfo($currentName, PATHINFO_EXTENSION);
		// $filename = CakeText::uuid() . '.' . $ext;
		// return $filename;

        $filename = pathinfo($currentName, PATHINFO_FILENAME);
        $filename = Inflector::slug($filename, '-');
		$ext = pathinfo($currentName, PATHINFO_EXTENSION);
		
        return strtolower($filename) . '-' . date('dmyHis') . '.' . $ext;
	}

/**
 * filterArgs
 */
	public $filterArgs = array(
		'file' => array(
			'type' => 'like',
			'field' => 'file'
		),
		'user_id' => array(
			'type' => 'value'
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'file' => array(
			// 'notBlank' => array(
			// 	'rule' => array('notBlank'),
			// 	'message' => 'Please fill out this field.',
			// 	//'allowEmpty' => false,
			// 	//'required' => false,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
			'isBelowMaxSize' => array(
				'rule' => array('isBelowMaxSize', 900000),
				'message' => 'File is larger than the maximum filesize 900 KB.'
			),
			'isValidExtension' => array(
				'rule' => array('isValidExtension', array('jpg', 'gif', 'png')),
				'message' => 'Image does not have a jpg, png, and gif extension.'
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'File image already taken, must be unique.'
			),
			'isUnderPhpSizeLimit' => array(
				'rule' => 'isUnderPhpSizeLimit',
				'message' => 'File exceeds upload filesize limit'
			),
		),
		// 'dir' => array(
		// 	'notBlank' => array(
		// 		'rule' => array('notBlank'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'size' => array(
		// 	'notBlank' => array(
		// 		'rule' => array('notBlank'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'type' => array(
		// 	'notBlank' => array(
		// 		'rule' => array('notBlank'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
