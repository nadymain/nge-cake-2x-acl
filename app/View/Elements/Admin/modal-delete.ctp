<div id="modal-delete" class="modal modal-delete">
	<header class="modal_header">
		<svg class="modal_header-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
			<path d="M24 44c2.21 0 4-1.79 4-4h-8c0 2.21 1.79 4 4 4zm12-12V22c0-6.15-3.27-11.28-9-12.64V8c0-1.66-1.34-3-3-3s-3 1.34-3 3v1.36c-5.73 1.36-9 6.49-9 12.64v10l-4 4v2h32v-2l-4-4zm-4 2H16V22c0-4.97 3.03-9 8-9s8 4.03 8 9v12z"></path>
		</svg>
		<h3 class="modal_header-title">Delete</h3>
		<a href="#" rel="modal:close" class="modal_header-close">×</a>
	</header>
	<div class="modal_content">
		<p>Are you sure you want to delete '<span>#</span>'?</p>
	</div>
	<footer class="modal_footer">
		<?php echo $this->Form->postLink(__('Yes'), 
			array(), 
			array('class' => 'modal_footer_btn modal_footer_btn-warning')
		); ?>
		<a href="#" class="modal_footer_btn" rel="modal:close">No</a>
	</footer>
</div>
