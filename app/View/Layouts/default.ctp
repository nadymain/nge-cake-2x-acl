<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$site_title = Configure::read('site_title');
$site_tagline = Configure::read('site_tagline');
$site_description = Configure::read('site_description');
$site_logo = Configure::read('site_logo');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if ($this->request->here === $this->request->webroot) : ?>
		<title><?php echo $site_title; ?></title>
		<meta name="description" content="<?php echo h($site_description); ?>"/>
		<link href="<?php echo $this->Html->url('/', true); ?>" rel="canonical"/>
	<?php elseif (!empty($title)) : ?>
		<title><?php echo $title . ' – ' .  $site_title; ?></title>
	<?php else : ?>
		<title><?php echo $this->fetch('title') . ' – ' . $site_title; ?></title>
	<?php endif ?>
    <link rel="icon" type="image/png" href="<?php echo $this->Html->url('/img/favicon.png', true) ?>">
    <link rel="apple-touch-icon" href="<?php echo $this->Html->url('/img/touch-icon-iphone.png', true) ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->Html->url('/img/touch-icon-ipad.png', true) ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->Html->url('/img/touch-icon-iphone-retina.png', true) ?>">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo $this->Html->url('/img/touch-icon-ipad-retina.png', true) ?>">
	<?php
		echo $this->Html->meta('Blog', '/feed.rss',	array('type' => 'rss'));
		if (Configure::read('debug') > 0) :
			echo $this->Html->css('main');
		else :
			echo $this->Html->css('main.min');
		endif;
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<?php if ($this->Session->check('Auth.User.name')): ?>
		<?php echo $this->element('topbar'); ?>
	<?php endif ?>
	<div class="container">
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Flash->render('auth'); ?>
		<?php echo $this->element('navmenu'); ?>
		<header id="header" class="header">
			<?php if ($site_logo) : ?> 
				<img src="<?php echo $site_logo ?>" alt="logo" class="header_logo"/>
			<?php endif ?>
			<h1 class="header_title"><?php echo $this->Html->link($site_title, '/'); ?></h1>
			<?php if ($site_tagline) : ?> 
				<p class="header_tagline"><?php echo h($site_tagline); ?></p>
			<?php endif ?>
		</header>
		<main id="main" class="main clear">
			<?php echo $this->fetch('content'); ?>
		</main>
		<footer id="footer" class="footer">
			<p><?php echo __('&copy; ' . $this->Html->link($site_title, '/') . date(' Y')); ?></p>
		</footer>
	</div>
    <?php echo $this->Html->script('jquery-3.2.1.min.js'); ?>
    <script src="<?php echo $this->Html->url('/assets/dropit/dropit.js', true); ?>"></script>
	<?php echo $this->Html->script('script.js'); ?>
	<?php echo $this->fetch('script'); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
