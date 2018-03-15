<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property Category $Category
 * @property User $User
 * @property Tag $Tag
 */
class Article extends AppModel {

/**
 * actsAs
 */
	public $actsAs = array(
		'Slugomatic.Slugomatic' => array(
			'fields' => array('title'),
			//'overwrite' => true,
		),
		'Search.Searchable',
		'HabtmCounterCache' => array(
			'Tag' => array( 
				'counterCache' => 'article_count', 
				'counterScope' => array(
					'Article.status' => 'published',
				),
			)
		)
	);

/**
 * filterArgs
 */
	public $filterArgs = array(
		'title' => array(
			'type' => 'like',
			'field' => 'title'
		),
		'status' => array(
			'type' => 'value'
		),
		'user_id' => array(
			'type' => 'value'
		),
		'category_id' => array(
			'type' => 'value'
		),
		'tag_id'   => array(
			'type'  => 'subquery',
			'field'     => 'Article.id',
			'method'    => 'findByTags'
		),
		'q' => array(
			'type' => 'like',
			'field' => array(
				'Article.title',
				'Article.content'
			)
		),
	);

/**
 * findByTags
 */
	public function findByTags($data = array()){
		$this->ArticlesTag->Behaviors->attach('Search.Searchable');
		$query = $this->ArticlesTag->getQuery('all', array(
				'conditions' => array('tag_id'  => $data['tag_id']),
				'fields' => array('article_id'),
				'contain' => array(
					'Tag',
					'ArticlesTag'
				)
		));
		return $query;
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please fill out this field.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Title already taken, must be unique.'
			),
		),
		'slug' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please fill out this field.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Permalink already taken, must be unique.'
			),
		),
		'content' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please fill out this field.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'status' => array(
			'valid' => array(
				'rule' => array('inList', array('draft', 'published')),
				//'message' => 'Please enter a valid status',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created' => array(
			'valid' => array(
				'rule' => array('datetime'),
				'message' => 'Please enter a valid date and time.'
			),
		)
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'counterCache' => true,
			'counterScope' => array(
				'Article.status' => 'published'
			),
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'counterCache' => true,
			'counterScope' => array(
				'Article.status' => 'published'
			),
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'articles_tags',
			'foreignKey' => 'article_id',
			'associationForeignKey' => 'tag_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
