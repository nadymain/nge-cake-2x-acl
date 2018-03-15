<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M42 6L6 21.07v1.97l13.67 5.3L24.97 42h1.97L42 6z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Edit</p>
		<h2 class="main_top-title-big">Menu</h2>
	</div>
	<a class="main_top-action" title="Back" href="<?php echo $this->Html->url('/menus', true); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
		</svg>
	</a>
</div>
<div class="form">
	<?php echo $this->Form->create('Menu', array('novalidate')); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('autocomplete' => 'off'));
		echo $this->Form->input('link');
		echo $this->Form->input('parent_id', array('empty' => 'None'));
	?>
	<?php 
		echo $this->Form->submit('Update', array('class' => 'form_btn form_btn-submit'));
		echo $this->Form->end();
	?>
</div>

<?php
	echo $this->Html->script('/assets/select2/select2.js', array('inline' => false));
	echo $this->Html->css('/assets/select2/select2.css', array('inline' => false));
?>

<?php $this->start('script'); ?>
<script>
$(document).ready(function() {
	$('select').select2({
		width: '100%',
		minimumResultsForSearch: 10
	});
});
</script>
<?php $this->end(); ?>
