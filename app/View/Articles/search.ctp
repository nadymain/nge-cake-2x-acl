<?php 
    echo $this->Html->meta(
			array(
				'name' => 'robots', 
				'content' => 'noindex, nofollow'
			), 
			null, 
			array('inline' => false)
    );
?>
<?php echo $this->element('bloglist'); ?>