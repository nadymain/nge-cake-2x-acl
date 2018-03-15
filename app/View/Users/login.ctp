<?php 
    $this->set('title', 'Login');
    echo $this->Html->meta(
		array(
			'name' => 'robots', 
			'content' => 'noindex, follow'
		), 
		null, 
		array('inline' => false)
	);
?>
<article class="article">
	<?php echo $this->Form->create('User', array(
		'class' => 'box_form'
	));?>
	<legend>Login</legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->button('Submit');
		echo $this->Form->end();
	?>
</article>
