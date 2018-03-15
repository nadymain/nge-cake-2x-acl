<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
		<path d="M28 4H12C9.79 4 8.02 5.79 8.02 8L8 40c0 2.21 1.77 4 3.98 4H36c2.21 0 4-1.79 4-4V16L28 4zm4 32H16v-4h16v4zm0-8H16v-4h16v4zm-6-10V7l11 11H26z"
		/>
	</svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Edit</p>
		<h2 class="main_top-title-big">Article</h2>
	</div>
	<a class="main_top-action" title="Back" href="<?php echo $this->Html->url('/articles', true); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
		</svg>
	</a>
</div>
<div class="form">
	<?php echo $this->Form->create('Article', array('novalidate')); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('autocomplete' => 'off'));

		echo '<div class="input form_input_btn text">';
			echo $this->Form->input('slug', array(
				'div' => false,
				'autocomplete' => 'off',
				'id' => 'form_input_slug',
				'label' => 'Permalink',
				'readonly',
			));
			echo '<a href="#" class="form_input_btn_right form_btn_change">Change</a>';
			echo '<a href="#" class="form_input_btn_right hidden form_btn_cancel">Cancel</a>';
		echo '</div>';

		echo $this->Form->input('content', array('rows' => '15'));
		echo $this->Form->input('description', array('rows' => '3'));
		echo $this->Form->input('category_id');
		echo $this->Form->input('Tag');

		echo '<div class="input form_input_btn text">';
			echo $this->Form->input('image', array(
				'div' => false,
				'class' => 'form_input-image',
				'id' => 'input-image',
				'label' => 'Featured Image'
			));			
			echo '<a href="#modal-image" class="form_input_btn_right pick-image">Pick</a>';
			if (!empty($this->request->data['Article']['image'])) {
				echo '<div id="preview-image" class="form_preview-image">';
				echo '<img src="' .$this->request->data['Article']['image']. '" alt="thumb">';
				echo '</div>';
			} else {
				echo '<div id="preview-image" class="form_preview-image"></div>';
			}
			echo '<a class="form_remove-image" href="#">Remove Image</a>';
		echo '</div>';

		if ($this->Session->read('Auth.User.group_id') == '1') {
			echo $this->Form->input('user_id');
		}

		echo '<label>Created</label>';
		echo '<div class="input form_datetime form_flex">';
		echo $this->Form->input('created', array(
			'dateFormat' => 'DMY', 
			'timeFormat' => 24,
			'separator' => false,
			'div' => false,
			'label' => false
		));
		echo '</div>';

		echo $this->Form->input('status', 
			array('options' => array('draft' => 'Draft', 'published' => 'Published'))
		);
	?>
	<?php 
		echo $this->Form->submit('Update', array('name' => 'update', 'class' => 'form_btn form_btn-update', 'div' => false));
		echo $this->Form->submit('Submit', array('name' => 'submit', 'class' => 'form_btn form_btn-submit', 'div' => false));
		if($this->request->data['Article']['status'] == 'published') {
			echo $this->Html->link('View', array(
				'controller' => 'blog',
				'action' => 'view',
				'slug' => $this->request->data['Article']['slug']
			), array(
				'class' => 'form_btn'
			));
		}
		echo $this->Form->end();
	?>
</div>

<?php echo $this->element('Admin/modal-image') ?>

<?php
	echo $this->Html->script('/assets/ckeditor/ckeditor.js', array('inline' => false));
	echo $this->Html->script('/assets/select2/select2.js', array('inline' => false));
	echo $this->Html->css('/assets/select2/select2.css', array('inline' => false));
	echo $this->Html->script('/assets/jquery-modal/jquery.modal.js', array('inline' => false));
	echo $this->Html->css('/assets/jquery-modal/jquery.modal.css', array('inline' => false));
?>

<?php $this->start('script'); ?>
<script>
$(document).ready(function() {
	var base_url = '<?php echo $this->Html->url('/'); ?>';
	CKEDITOR.replace('ArticleContent', {
		filebrowserWindowWidth: '400',
		filebrowserImageBrowseUrl : base_url + 'images/iframeindex?type=ckeditor',
	});
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
		placeholder: 'Select an option...',
		width: '100%',
		minimumResultsForSearch: 100
	});
	$('.form_btn_change').on('click', function(e) {
		e.preventDefault();
		$("#form_input_slug").removeAttr('readonly');
		$('#form_input_slug').focus();
		$('.form_btn_change').css('display','none');
		$('.form_btn_cancel').css('display','block');
	});
	$('.form_btn_cancel').on('click', function(e) {
		e.preventDefault();
		$('.form_btn_cancel').css('display','none');
		$('.form_btn_change').css('display','block');
		$('#form_input_slug').val("<?php echo $this->request->data['Article']['slug'] ?>");
		$("#form_input_slug").attr('readonly', true);
	});
});
</script>
<?php $this->end(); ?>
