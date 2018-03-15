<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M5.06 39.31l2.69 1.11V22.37L2.9 34.08c-.84 2.03.13 4.38 2.16 5.23zm39-7.42L34.14 7.96c-.62-1.5-2.08-2.43-3.61-2.46-.53-.01-1.07.09-1.6.3L14.2 11.9c-1.5.62-2.42 2.07-2.46 3.6-.01.54.08 1.08.3 1.61l9.91 23.93c.63 1.52 2.1 2.44 3.66 2.46.52 0 1.04-.09 1.55-.3l14.73-6.1c2.03-.84 3.01-3.18 2.17-5.21zM15.75 17.5c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm-4 22c0 2.2 1.8 4 4 4h2.91l-6.91-16.68V39.5z"/></svg>	
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Tags</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/tags/add', true) ?>">
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
				<th width="90"><?php echo __(''); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($tags as $tag): ?>
			<tr>
				<td>
				<h3 class="table-title">
						<?php if ($tag['Tag']['article_count'] >= '1') {
							echo $this->Html->link($tag['Tag']['name'], array(
								'controller' => 'blog',
								'action' => 'tag',
								'slug' => $tag['Tag']['slug']
							));
						} else {
							echo h($tag['Tag']['name']);
						} ?>
					</h3>
				</td>
				<td class="hidden_425">
					<p class="table-p">
						<?php echo h($tag['Tag']['article_count']); ?>
					</p>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), 
						array('action' => 'edit', $tag['Tag']['id']),
						array('class' => 'table-btn')
					); ?>
					<?php echo $this->Html->link(__('Delete'), '#modal-delete',
						array(
							'class' => 'table-btn table-btn-warning btn-modal-del',
							'data-title' => $tag['Tag']['name'],
							'data-action' => $this->Html->url(array(
								'action' => 'delete',
								$tag['Tag']['id']
							)),
						)
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php if (!$tags): ?>
		<p class="no_content">
			<?php echo __('No tags found.'); ?>
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

