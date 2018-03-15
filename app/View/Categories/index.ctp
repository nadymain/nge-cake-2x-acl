<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M40 12H24l-4-4H8c-2.21 0-3.98 1.79-3.98 4L4 36c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4V16c0-2.21-1.79-4-4-4zm0 24H8V16h32v20z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Categories</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/categories/add', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
		</svg>
	</a>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('name', null, array('class' => 'table_th-a')); ?>
				</th>
				<th width="80" class="hidden_425">
					<?php echo $this->Paginator->sort('article_count', 'Count', array('class' => 'table_th-a')); ?>
				</th>
				<th width="90">
					<?php echo __(''); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td>
					<h3 class="table-title">
						<?php if ($category['Category']['article_count'] >= '1') {
							echo $this->Html->link($category['Category']['name'], array(
								'controller' => 'blog',
								'action' => 'category',
								'slug' => $category['Category']['slug']
							));
						} else {
							echo h($category['Category']['name']);
						} ?>
					</h3>
				</td>
				<td class="hidden_425">
					<p class="table-p">
						<?php echo h($category['Category']['article_count']); ?>
					</p>
				</td>
				<td>
					<?php echo $this->Html->link(__('Edit'), 
						array('action' => 'edit', $category['Category']['id']),
						array('class' => 'table-btn')
					); ?>
					<?php echo $this->Html->link(__('Delete'), '#modal-delete',
						array(
							'class' => 'table-btn table-btn-warning btn-modal-del',
							'data-title' => $category['Category']['name'],
							'data-action' => $this->Html->url(array(
								'action' => 'delete',
								$category['Category']['id']
							)),
						)
					); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php if (!$categories): ?>
		<p class="no_content">
			<?php echo __('No categories found.'); ?>
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
});
</script>
<?php $this->end(); ?>
