<?php 
    $this->set('title', 'Contact Us');
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
    <?php echo $this->form->create('Contact', array('novalidate', 'class' => 'box_form')); ?>
    <legend>Contact Us</legend>
    <?php
        echo $this->form->input('name');
        echo $this->form->input('email', array('type' => 'email'));
        echo $this->form->input('website', array('label' => false, 'type' => 'url', 'class' => 'hidden'));
        echo $this->form->input('message', array('type' => 'textarea'));
        echo $this->Form->button('Send');
        echo $this->Form->end();
    ?>
</article>
