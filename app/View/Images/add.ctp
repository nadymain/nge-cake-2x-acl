<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M42 38V10c0-2.21-1.79-4-4-4H10c-2.21 0-4 1.79-4 4v28c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4zM17 27l5 6.01L29 24l9 12H10l7-9z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Add</p>
		<h2 class="main_top-title-big">Image</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/images', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
		</svg>
	</a>
</div>
<div class="form">
	<?php echo $this->Form->create('Image', array('type' => 'file', 'novalidate')); ?>
	<?php
		//echo $this->Form->input('user_id');
		echo __('<div class="input file form_upload">');
		echo $this->Form->input('file', array('type' => 'file', 'div' => false, 'label' => false));
		echo __('<div class="form_upload_preview"><p class="form_upload_preview-no-image">Choose a image.</p></div>');
		echo __('</div>');

		echo $this->Form->input('dir', array('type' => 'hidden'));
		echo $this->Form->input('size', array('type' => 'hidden'));
		echo $this->Form->input('type', array('type' => 'hidden'));
	?>
	<?php 
		echo $this->Form->submit('Submit', array('class' => 'form_btn form_btn-submit'));
		echo $this->Form->end();
	?>
</div>

<?php $this->start('script'); ?>
<script>
$(document).ready(function () {
	$("#ImageFile").on('change', function () {
		var countFiles = $(this)[0].files.length;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
		var image_holder = $(".form_upload_preview");
		image_holder.empty();
		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			for (var i = 0; i < countFiles; i++) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("<img />", {
						"src": e.target.result,
						"class": "form_upload_preview-img",
						"alt": "dummy"
					}).appendTo(image_holder);
				}
				image_holder.show();
				reader.readAsDataURL($(this)[0].files[i]);
			}
		} else {
			image_holder.show();
			image_holder.append(
				"<p class='form_upload_preview-no-image'>Oops! Please select image.</p>");
		}
	});
});
</script>
<?php $this->end(); ?>
