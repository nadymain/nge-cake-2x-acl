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

$siteTitle = Configure::read('site_title');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if (!empty($title)) : ?>
		<title><?php echo $title; ?> – Dashboard</title>
	<?php else : ?>
		<title><?php echo $this->fetch('title'); ?> – Dashboard</title>
	<?php endif ?>
    <link rel="icon" type="image/png" href="<?php echo $this->Html->url('/img/favicon.png', true) ?>">
    <link rel="apple-touch-icon" href="<?php echo $this->Html->url('/img/touch-icon-iphone.png', true) ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->Html->url('/img/touch-icon-ipad.png', true) ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->Html->url('/img/touch-icon-iphone-retina.png', true) ?>">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo $this->Html->url('/img/touch-icon-ipad-retina.png', true) ?>">
	<?php
		if (Configure::read('debug') > 0) :
			echo $this->Html->css('admin');
		else :
			echo $this->Html->css('admin.min');
		endif;
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
    <link rel="stylesheet" href="<?php echo $this->Html->url('/assets/dropit/dropit.css', true); ?>" />
</head>
<body>

	<?php echo $this->element('Admin/header'); ?>
	<?php echo $this->element('Admin/aside'); ?>

    <main id="main" class="main">
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Flash->render('auth'); ?>
		<?php echo $this->fetch('content'); ?>
	</main>

    <footer id="footer" class="footer">
        <p class="footer_p"><?php echo $siteTitle . ' | ' .$cakeVersion; ?></p>
    </footer>

    <?php echo $this->Html->script('jquery-3.2.1.min.js'); ?>
    <script src="<?php echo $this->Html->url('/assets/dropit/dropit.js', true); ?>"></script>
	<?php echo $this->Html->script('admin.script.js'); ?>
	<?php echo $this->fetch('script'); ?>

	<?php echo $this->element('sql_dump'); ?>

</body>
</html>
