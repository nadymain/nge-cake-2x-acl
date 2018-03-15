<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M40 12H24l-4-4H8c-2.21 0-3.98 1.79-3.98 4L4 36c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4V16c0-2.21-1.79-4-4-4zm0 24H8V16h32v20z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Edit</p>
		<h2 class="main_top-title-big">Category</h2>
	</div>
	<a class="main_top-action" title="Back" href="<?php echo $this->Html->url('/categories/index', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
		</svg>
	</a>
</div>
<div class="form">
	<?php echo $this->Form->create('Category', array('novalidate')); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('autocomplete' => 'off'));
		//echo $this->Form->input('slug');
		echo $this->Form->input('description');
	?>
	<?php 
		echo $this->Form->submit('Update', array('class' => 'form_btn form_btn-submit'));
		echo $this->Form->end();
	?>
</div>
