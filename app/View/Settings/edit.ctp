<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M38.86 25.95c.08-.64.14-1.29.14-1.95s-.06-1.31-.14-1.95l4.23-3.31c.38-.3.49-.84.24-1.28l-4-6.93c-.25-.43-.77-.61-1.22-.43l-4.98 2.01c-1.03-.79-2.16-1.46-3.38-1.97L29 4.84c-.09-.47-.5-.84-1-.84h-8c-.5 0-.91.37-.99.84l-.75 5.3c-1.22.51-2.35 1.17-3.38 1.97L9.9 10.1c-.45-.17-.97 0-1.22.43l-4 6.93c-.25.43-.14.97.24 1.28l4.22 3.31C9.06 22.69 9 23.34 9 24s.06 1.31.14 1.95l-4.22 3.31c-.38.3-.49.84-.24 1.28l4 6.93c.25.43.77.61 1.22.43l4.98-2.01c1.03.79 2.16 1.46 3.38 1.97l.75 5.3c.08.47.49.84.99.84h8c.5 0 .91-.37.99-.84l.75-5.3c1.22-.51 2.35-1.17 3.38-1.97l4.98 2.01c.45.17.97 0 1.22-.43l4-6.93c.25-.43.14-.97-.24-1.28l-4.22-3.31zM24 31c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Edit</p>
		<h2 class="main_top-title-big">Setting</h2>
	</div>
	<a class="main_top-action" title="Back" href="<?php echo $this->Html->url('/settings', true); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
		</svg>
	</a>
</div>
<div class="form">
<?php echo $this->Form->create('Setting', array('novalidate')); ?>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('name', array('autocomplete' => 'off'));
		//echo $this->Form->input('name_key', array('autocomplete' => 'off'));
		if ($setting['Setting']['name_key'] === 'site_logo') {
			echo '<div class="input form_input_btn text">';
				echo $this->Form->input('name_value', array(
					'div' => false,
					'type' => 'text',
					'class' => 'form_input-image',
					'id' => 'input-image', 
					'label' => $setting['Setting']['name']
				));	
				echo '<a href="#modal-image" class="form_input_btn_right pick-image">Pick</a>';
				if (!empty($setting['Setting']['name_value'])) {	
					echo '<div id="preview-image" class="form_preview-image">';
					echo '<img src="' .$setting['Setting']['name_value']. '" alt="thumb">';
					echo '</div>';
				} else {
					echo '<div id="preview-image" class="form_preview-image"></div>';
				}
				echo '<a class="form_remove-image" href="#">Remove Image</a>';
			echo '</div>';
		} elseif ($setting['Setting']['input_type'] === 'textarea') {
			echo $this->Form->input('name_value', array(
				'label' => $setting['Setting']['name'], 
				'type' => $setting['Setting']['input_type'],
				'rows' => '3'
			));
		} else {
			echo $this->Form->input('name_value', array(
				'label' => $setting['Setting']['name'], 
				'type' => $setting['Setting']['input_type'],
				'autocomplete' => 'off'
			));
		}
		//echo $this->Form->input('input_type');
	?>
	<?php 
		echo $this->Form->submit('Update', array('class' => 'form_btn form_btn-submit'));
		echo $this->Form->end();
	?>
</div>

<?php
	if ($setting['Setting']['name_key'] === 'site_logo') {
		echo $this->element('Admin/modal-image');
		echo $this->Html->script('/assets/jquery-modal/jquery.modal.js', array('inline' => false));
		echo $this->Html->css('/assets/jquery-modal/jquery.modal.css', array('inline' => false));
	}
?>

<?php if ($setting['Setting']['name_key'] === 'site_logo') : ?>
	<?php $this->start('script'); ?>
	<script>
	$(document).ready(function() {
		var base_url = '<?php echo $this->Html->url('/'); ?>';
		$('.pick-image').on('click',function(e){
			e.preventDefault();
			$('#modal-image').find('.modal_image_content').html('<iframe src="' + base_url + 'images/iframeindex?type=modal"></iframe>');
			$(this).modal();
		});
		$('.form_remove-image').on('click', function(e) {
			e.preventDefault();
			$('#preview-image img').remove();
			$('#input-image').val('');
			$('.form_remove-image').hide();
		});
		if ($('#input-image').val().length) {
			$('.form_remove-image').css('display','block');
		}
	});
	</script>
	<?php $this->end(); ?>
<?php endif ?>
