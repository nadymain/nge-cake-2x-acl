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
		echo $this->Html->css('admin');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body class="body_iframe">

    <main id="main" class="main">
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Flash->render('auth'); ?>
		<?php echo $this->fetch('content'); ?>
	</main>

	<?php //echo $this->element('sql_dump'); ?>

    <?php echo $this->Html->script('jquery-3.2.1.min.js'); ?>
	<?php echo $this->fetch('script'); ?>

	<script>
	$(document).ready(function () {	
		$('.message, .error-message').delay(800).slideDown('fast', function() {
			setTimeout(function() {
				$('.message, .error-message').slideUp('fast');
			}, 10000);
		});
		$('.message').on('click', function() {
			$('.message').slideUp('fast');
		});
	});
	</script>

</body>
</html>
