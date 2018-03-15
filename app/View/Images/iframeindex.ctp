<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M42 38V10c0-2.21-1.79-4-4-4H10c-2.21 0-4 1.79-4 4v28c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4zM17 27l5 6.01L29 24l9 12H10l7-9z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Images</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/images/iframeadd?type='.($this->request->query('type') === 'modal' ? 'modal' : 'ckeditor&CKEditorFuncNum='.$this->request->query('CKEditorFuncNum')), true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
		</svg>
	</a>
</div>
<div class="main_filter clear">
	<ul class="main_filter_list">
		<li class="main_filter_list_li">
			<?php echo $this->Html->link('All ('. $total . ')', array(
					'controller' => 'images',
					'action' => 'iframeindex?type='.($this->request->query('type') === 'modal' ? 'modal' : 'ckeditor&CKEditorFuncNum='.$this->request->query('CKEditorFuncNum'))
				), array (
					'class' => (empty($this->request->query('file'))) ? 'main_filter_list-active' : 'inactive'
				)
			); ?>
		</li>
	</ul>
	<?php
		echo $this->Form->create('Image', array(
			'url' => array_merge(
				array('action' => 'iframeindex?type='.($this->request->query('type') === 'modal' ? 'modal' : 'ckeditor&CKEditorFuncNum='.$this->request->query('CKEditorFuncNum'))),
				$this->params['named']
			),
			'class' => 'main_filter_search hidden_425'
		));
		echo $this->Form->input('file', array(
			'label' => false, 
			'div' => false, 
			'class' => 'main_filter_search_input',
			'autocomplete' => 'off',
			'Placeholder' => 'File...'
		));
		echo $this->Form->submit(__('Search'), 
			array('class' => 'main_filter_search_input', 'div' => false)
		);
		echo $this->Form->end();
	?>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('file', null, array('class' => 'table_th-a')); ?>
				</th>
				<th width="90">
					<?php echo __(''); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($images as $image): ?>
			<tr>
				<td>
					<?php echo $this->Html->image(
						'uploads/thumb/s_'.$image['Image']['file']
					); ?>
					<div class="table-div">
						<?php echo h($image['Image']['file']); ?>
					</div>	
				</td>
				<td>
					<?php echo $this->Html->link(__('Select'), '#', array(
						'class' => 'table-btn btn_select_image',
						'data-url' => $this->Html->url('/', true) . 'img/uploads/' . $image['Image']['file']
					)); ?>
					<?php echo $this->Html->link(__('Delete'), '#modal-delete', array(
						'class' => 'table-btn table-btn-warning btn-modal-del',
						'data-title' => $image['Image']['file'],
						'data-action' => $this->Html->url(array(
							'action' => 'delete',
							$image['Image']['id']
						)),
					)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php if (!$images): ?>
		<p class="no_content">
			<?php echo __('No images found.'); ?>
		</p>
	<?php endif ?>
</div>

<?php echo $this->element('Admin/paginator'); ?>
<?php echo $this->element('Admin/modal-delete'); ?>

<?php
	echo $this->Html->script('/assets/jquery-modal/jquery.modal.js', array('inline' => false));
	echo $this->Html->css('/assets/jquery-modal/jquery.modal.css', array('inline' => false));
?>

<?php $this->start('script'); ?>
<script>
$(document).ready(function(){
	if (document.location.search.indexOf('type=ckeditor') >= 0) {
		function getUrlParam( paramName ) {
			var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
			var match = window.location.search.match( reParam );
			return ( match && match.length > 1 ) ? match[1] : null;
		}
		$('.btn_select_image').click(function(){
			var funcNum = getUrlParam( 'CKEditorFuncNum' );
			var fileUrl = $(this).data('url');
			window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
			window.top.close() ;
		});
	}
	if (document.location.search.indexOf('type=modal') >= 0) {
		$('.btn_select_image').on('click', function(e) {
			e.preventDefault();
			parent.document.getElementById('input-image').value = $(this).data('url');
			parent.document.getElementById('preview-image').innerHTML = '<img src=' + $(this).data('url') + '>';
			parent.$('.form_remove-image').css('display','block');
			parent.$.modal.close();
		});
	}
	// modal
    $('.btn-modal-del').on('click',function(e){
        e.preventDefault();
		$('#modal-delete').find('span').text($(this).data('title'));
        $('#modal-delete').find('form').attr('action', $(this).data('action'));
        $(this).modal();
	});
	// searchTitle
	function loadPageVar(sVar) {
		return unescape(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + escape(sVar).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
	}
	var searchTitle = loadPageVar('file');
	if (!!searchTitle) {
		$(".main_filter_list").after("<span class='search_result'>Search results for &#8220;" + searchTitle + "&#8221;</span>");
	}
});
</script>
<?php $this->end(); ?>
