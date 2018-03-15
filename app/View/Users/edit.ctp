<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M6 10v28c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4V10c0-2.21-1.79-4-4-4H10c-2.21 0-4 1.79-4 4zm24 8c0 3.32-2.69 6-6 6s-6-2.68-6-6c0-3.31 2.69-6 6-6s6 2.69 6 6zM12 34c0-4 8-6.2 12-6.2S36 30 36 34v2H12v-2z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Edit</p>
		<h2 class="main_top-title-big">Users</h2>
	</div>
	<?php if ($this->Session->read('Auth.User.group_id') == '1') : ?>
	<a class="main_top-action" title="Back" href="<?php echo $this->Html->url('/users/index', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
		</svg>
	</a>
	<?php endif; ?>
</div>

<div class="users form">
	<?php echo $this->Form->create('User', array('novalidate')); ?>
	<?php
		echo $this->Form->input('id');
		if ($this->Session->read('Auth.User.group_id') == '1') {
			echo $this->Form->input('group_id');
		}
		echo $this->Form->input('name', array('autocomplete' => 'off'));
		//echo $this->Form->input('slug');
		echo $this->Form->input('username', array('autocomplete' => 'off'));

		echo '<div class="input form_input_btn text">';
			echo $this->Form->input('new_password', array(
				'div' => false,
				'label' => 'Change Password',
				'id' => 'form_input_pass',
				'readonly',
				'class' => 'form_input_pass',
				'autocomplete' => 'new-password'
			));
			echo '<a href="#" class="form_input_btn_right form_btn_change">Change</a>';
			echo '<a href="#" class="form_input_btn_right hidden form_btn_cancel">Cancel</a>';
		echo '</div>';
		
		echo $this->Form->input('description', array('rows' => '3'));

		echo '<div class="input form_input_btn text">';
			echo $this->Form->input('photo', array(
				'div' => false,
				'class' => 'form_input-image',
				'id' => 'input-image'
			));
			echo '<a href="#modal-image" class="form_input_btn_right pick-image">Pick</a>';
			if (!empty($this->request->data['User']['photo'])) {
				echo '<div id="preview-image" class="form_preview-image">';
				echo $this->Html->image($this->request->data['User']['photo']);
				echo '</div>';
			} else {
				echo '<div id="preview-image" class="form_preview-image"></div>';
			}
			echo '<a class="form_remove-image" href="#">Remove Image</a>';
		echo '</div>';

		//secho $this->Form->input('article_count');
		//echo $this->Form->input('last_login');
	?>
	<?php 
		echo $this->Form->submit('Update', array('class' => 'form_btn form_btn-submit'));
		echo $this->Form->end();
	?>
</div>

<?php echo $this->element('Admin/modal-image') ?>

<?php
	echo $this->Html->script('/assets/select2/select2.js', array('inline' => false));
	echo $this->Html->css('/assets/select2/select2.css', array('inline' => false));
	echo $this->Html->script('/assets/jquery-modal/jquery.modal.js', array('inline' => false));
	echo $this->Html->css('/assets/jquery-modal/jquery.modal.css', array('inline' => false));
?>

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
	$('select').select2({
		placeholder: 'Select an option',
		width: '100%',
		minimumResultsForSearch: 10
	});
	$('.form_btn_change').on('click', function(e) {
		e.preventDefault();
		$("#form_input_pass").removeAttr('readonly');
		$('#form_input_pass').focus();
		$('.form_btn_change').css('display','none');
		$('.form_btn_cancel').css('display','block');
	});
	$('.form_btn_cancel').on('click', function(e) {
		e.preventDefault();
		$('.form_btn_cancel').css('display','none');
		$('.form_btn_change').css('display','block');
		$('#form_input_pass').val("");
		$("#form_input_pass").attr('readonly', true);
	});
});
</script>
<?php $this->end(); ?>
