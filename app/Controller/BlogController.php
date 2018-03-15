<?php
App::uses('AppController', 'Controller');
/**
 * Blog Controller
 *
 */
class BlogController extends AppController {
/**
 * beforeFilter
 */
    public function beforeFilter() {
        parent::beforeFilter();
        // allow
        $this->Auth->allow(
            'index', 
            'view', 
            'category', 
            'tag',
            'author'
        );
    }

/**
 * components
 */
    public $components = array(
        'Paginator',
		'RequestHandler'
    );

/**
 * paginate
 */
    public $paginate = array(
        'order' => 'Article.created DESC',
        'recursive' => 0,
        'paramType' => 'querystring',
        'fields' => array(
            'Article.id',
            'Article.title',
            'Article.slug',
            'Article.content',
            'Article.created',
            'Article.user_id',
            'Category.slug',
            'Category.name',
            'User.slug',
			'User.name',
        ),
        'cacher' => true
    );

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->loadModel('Article');
		// sitemap
		if ($this->RequestHandler->isXml() ) {
			$articles = $this->Article->find('all', array(
				'recursive' => -1,
				'conditions' => array(
					'Article.status' => 'published'
				),
				'order' => 'Article.created DESC'
            ));
            
			return $this->set(compact('articles'));
		}
		// feed
		if ($this->RequestHandler->isRss() ) {
			$articles = $this->Article->find('all', array(
				'recursive' => -1,
				'limit' => 5,
				'conditions' => array(
					'Article.status' => 'published'
				),
				'order' => 'Article.created DESC'
            ));
            
			return $this->set(compact('articles'));
		} else {
            $this->Paginator->settings = $this->paginate;
            $this->Paginator->settings['conditions'] = array(
                'Article.status' => 'published'
            );
            $this->Paginator->settings['limit'] = Configure::read('articles_page');
            
            $articles = $this->Paginator->paginate('Article');
            $this->set('articles', $articles);
        }
    }

/**
 * view method
 *
 * @return void
 */
    public function view($slug = null) {
        $this->loadModel('Article');
        $article = $this->Article->find('first', array(
            'conditions' => array (
                'Article.slug' => $slug,
                'Article.status' => 'published'
            ),
            'cacher' => true
        ));

        if(!$article) {
            throw new NotFoundException();
        }

        $this->set('article', $article);

		// prevnext
		$prevnext = $this->Article->find('neighbors', array(
			'conditions' => array(
				'Article.status' => 'published'
            ),
			'recursive' => -1,
			'field' => 'Article.created',
            'value' => $article['Article']['created'],
            'cacher' => true
		));
        $this->set('prevnext', $prevnext);
        
        // custom
        $this->set('title', $article['Article']['title']);
    }

/**
 * category method
 *
 * @return void
 */
    public function category($slug = null) {
        $this->loadModel('Category');
        $category = $this->Category->find('first', array(
            'conditions' => array (
                'Category.slug' => $slug
            ),
            'recursive' => -1,
            'cacher' => true
        ));

        if(!$category) {
            throw new NotFoundException();
        }

        $this->set('category', $category);

        // article
        $this->loadModel('Article');
        $this->Paginator->settings = $this->paginate;
        $this->Paginator->settings['conditions'] = array(
            'Category.slug' => $slug,
            'Article.status' => 'published'
        );
        $this->Paginator->settings['limit'] = Configure::read('articles_page');
        $articles = $this->Paginator->paginate('Article');
        $this->set('articles', $articles);

        // custom
        $this->set('title', $category['Category']['name']);
    }

/**
 * tag method
 *
 * @return void
 */
    public function tag($slug = null) {
        $this->loadModel('Tag');
        $tag = $this->Tag->find('first', array(
            'conditions' => array (
                'Tag.slug' => $slug
            ),
            'recursive' => -1,
            'cacher' => true
        ));

        if(!$tag) {
            throw new NotFoundException();
        }

        $this->set('tag', $tag);

        // article
        $this->loadModel('Article');
        $this->Paginator->settings = $this->paginate;
        $this->Paginator->settings['joins'] = array(
            array(
                'table' => 'articles_tags',
                'alias' => 'ArticleTag',
                'conditions' => 'ArticleTag.article_id = Article.id',
            ),
            array(
                'table' => 'tags',
                'alias' => 'Tag',
                'conditions' => 'ArticleTag.tag_id = Tag.id',
            ),
        );
        $this->Paginator->settings['conditions'] = array(
            'Tag.slug' => $slug,
            'Article.status' => 'published'
        );
        $this->Paginator->settings['limit'] = Configure::read('articles_page');
        $articles = $this->Paginator->paginate('Article');
        $this->set('articles', $articles);

        // custom
        $this->set('title', $tag['Tag']['name']);
    }

/**
 * author method
 *
 * @return void
 */
    public function author($slug = null) {
        $this->loadModel('User');
        $author = $this->User->find('first', array(
            'conditions' => array (
                'User.slug' => $slug
            ),
            'recursive' => -1,
            'cacher' => true
        ));

        if(!$author) {
            throw new NotFoundException();
        }

        $this->set('author', $author);

        // article
        $this->loadModel('Article');
        $this->Paginator->settings = $this->paginate;
        $this->Paginator->settings['conditions'] = array(
            'User.slug' => $slug,
            'Article.status' => 'published'
        );
        $this->Paginator->settings['limit'] = Configure::read('articles_page');
        $articles = $this->Paginator->paginate('Article');
        $this->set('articles', $articles);
        
        // custom
        $this->set('title', $author['User']['name']);
    }

}