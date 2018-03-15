<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

 /**
 * parseExtensions
 */
	Router::parseExtensions('xml', 'rss');

	Router::connect('/sitemap', array('controller' => 'blog', 'action' => 'index', 'ext' => 'xml'));
	Router::connect('/feed', array('controller' => 'blog', 'action' => 'index', 'ext' => 'rss'));

/**
 * blog view
 */
	Router::connect('/blog/:slug',
		array('controller' => 'blog', 'action' => 'view'),
		array('pass' => array('slug'))
	);

/**
 * blog category
 */
	Router::connect('/blog/category/:slug',
		array('controller' => 'blog', 'action' => 'category'),
		array('pass' => array('slug'))
	);

/**
 * blog tag
 */
	Router::connect('/blog/tag/:slug',
		array('controller' => 'blog', 'action' => 'tag'),
		array('pass' => array('slug'))
	);

/**
 * blog author
 */
	Router::connect('/blog/author/:slug',
		array('controller' => 'blog', 'action' => 'author'),
		array('pass' => array('slug'))
	);

/**
 * blog author
 */
	Router::connect('/info/:slug',
		array('controller' => 'infos', 'action' => 'show'),
		array('pass' => array('slug'))
	);

/**
 * search page
 */
	Router::connect('/search', array('controller' => 'articles', 'action' => 'search'));

/**
 * login page
 */
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));

/**
 * error page
 */
	Router::connect('/oops', array('controller' => 'pages', 'action' => 'display', 'oops'));

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */	
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
