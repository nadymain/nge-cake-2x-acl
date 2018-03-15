<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M42 38V10c0-2.21-1.79-4-4-4H10c-2.21 0-4 1.79-4 4v28c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4zM17 27l5 6.01L29 24l9 12H10l7-9z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Images</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/images/add', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
		</svg>
	</a>
</div>
<div class="main_filter clear">
	<ul class="main_filter_list">
		<li class="main_filter_list_li">
			<a class="<?php echo(empty($this->request->query)) ? 'main_filter_list-active' : 'inactive' ?>" href="<?php echo $this->Html->url('/images', true) ?>">
				All <span>(<?php echo h($total); ?>)</span>
			</a>
		</li>
	</ul>
	<?php
		echo $this->Form->create('Image', array(
			'url' => array_merge(
				array('action' => 'index'),
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
				<th width="145">
					<?php echo $this->Paginator->sort('file', null, array('class' => 'table_th-a')); ?>
				</th>
				<th class="hidden_425">
					<?php echo __(''); ?>
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
				</td>
				<td class="hidden_425">
					<h3 class="table-title">
						<?php echo h($image['Image']['file']); ?>
					</h3>
					<div class="table-div">
						<?php 
							echo $this->Paginator->sort('user_id', 'User: ', 
								array('title' => 'Sort User')
							);
							echo $this->Html->link($image['User']['name'], 
								array('controller' => 'images', '?' => 'user_id='.$image['User']['id']),
								array('title' => 'Filter User', 'class' => 'table-div-color')
							);
						?>
					</div>
					<div class="table-div">
						<?php 
							echo $this->Paginator->sort('size', 'Size: ', 
								array('title' => 'Sort Size')
							); 
							echo $this->Number->toReadableSize($image['Image']['size']);
						?>
					</div>
					<div class="table-div">
						<?php 
							echo $this->Paginator->sort('type', 'Type: ', 
								array('title' => 'Sort Type')
							);  
							echo h($image['Image']['type']);
						?>
					</div>
					<div class="table-div">
						<?php 
							echo $this->Paginator->sort('created', 'Created: ',
								array('title' => 'Sort Created')
							);
							echo $this->Time->format(
								'd F Y',
								$image['Image']['created'],
								null,
								'GMT+7'
							);
						?>
					</div>
				</td>
				<td>
				<?php echo $this->Html->link(__('Delete'), '#modal-delete',
						array(
							'class' => 'table-btn table-btn-warning btn-modal-del',
							'data-title' => $image['Image']['file'],
							'data-action' => $this->Html->url(array(
								'action' => 'delete',
								$image['Image']['id']
							)),
						)
					); ?>
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
