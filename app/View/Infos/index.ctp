<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M34 24H24v10h10V24zM32 2v4H16V2h-4v4h-2c-2.21 0-3.98 1.79-3.98 4L6 38c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4V10c0-2.21-1.79-4-4-4h-2V2h-4zm6 36H10V16h28v22z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Infos</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/infos/add', true) ?>">
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
				<?php echo $this->Paginator->sort('title', null, array('class' => 'table_th-a')); ?>
			</th>
			<th width="100" class="hidden_425">
				<?php echo $this->Paginator->sort('status', null, array('class' => 'table_th-a')); ?>
			</th>
			<th width="90">
				<?php echo __(''); ?>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($infos as $info): ?>
			<tr>
				<td>
					<h3 class="table-title">
						<?php if ($info['Info']['status'] == 'published') {
							echo $this->Html->link($info['Info']['title'], array(
								'controller' => 'infos',
								'action' => 'show',
								'slug' => $info['Info']['slug']
							));
						} else {
							echo h($info['Info']['title']);
						} ?>
					</h3>
				</td>
				<td class="hidden_425">
					<?php echo $this->Update->status($info['Info']['status'], $info['Info']['id']) ?>
				</td>
				<td>
					<?php echo $this->Html->link(__('Edit'), 
						array('action' => 'edit', $info['Info']['id']),
						array('class' => 'table-btn')
					); ?>
					<?php echo $this->Html->link(__('Delete'), '#modal-delete',
						array(
							'class' => 'table-btn table-btn-warning btn-modal-del',
							'data-title' => $info['Info']['title'],
							'data-action' => $this->Html->url(array(
								'action' => 'delete',
								$info['Info']['id']
							)),
						)
					); ?>			
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php if (!$infos): ?>
		<p class="no_content">
			<?php echo __('No infos found.'); ?>
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
