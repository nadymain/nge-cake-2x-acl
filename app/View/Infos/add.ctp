<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M34 24H24v10h10V24zM32 2v4H16V2h-4v4h-2c-2.21 0-3.98 1.79-3.98 4L6 38c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4V10c0-2.21-1.79-4-4-4h-2V2h-4zm6 36H10V16h28v22z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Add</p>
		<h2 class="main_top-title-big">Info</h2>
	</div>
	<a class="main_top-action" title="Back" href="<?php echo $this->Html->url('/infos', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
		</svg>
	</a>
</div>
<div class="form">
	<?php echo $this->Form->create('Info', array('novalidate')); ?>
	<?php
		echo $this->Form->input('title', array('autocomplete' => 'off'));
		// echo $this->Form->input('slug');
		echo $this->Form->input('content', array('rows' => 10));
		echo $this->Form->input('description', array('rows' => 3));
		echo $this->Form->input('status', 
			array('options' => array('draft' => 'Draft', 'published' => 'Published'))
		);
	?>
	<?php 
		echo $this->Form->submit('Submit', array('class' => 'form_btn form_btn-submit'));
		echo $this->Form->end();
	?>
</div>

<?php
	echo $this->Html->script('/assets/ckeditor/ckeditor.js', array('inline' => false));
	echo $this->Html->script('/assets/select2/select2.js', array('inline' => false));
	echo $this->Html->css('/assets/select2/select2.css', array('inline' => false));
?>

<?php $this->start('script'); ?>
<script>
$(document).ready(function() {
	$('select').select2({
		placeholder: 'Select an option',
		width: '100%',
		minimumResultsForSearch: 10
	});
	CKEDITOR.replace('InfoContent', {
		filebrowserWindowWidth: '400',
		filebrowserImageBrowseUrl : '<?php echo $this->Html->url('/images/iframeindex?type=ckeditor', true) ?>',
	});
});
</script>
<?php $this->end(); ?>
