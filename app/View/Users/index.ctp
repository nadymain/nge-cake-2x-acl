<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M6 10v28c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4V10c0-2.21-1.79-4-4-4H10c-2.21 0-4 1.79-4 4zm24 8c0 3.32-2.69 6-6 6s-6-2.68-6-6c0-3.31 2.69-6 6-6s6 2.69 6 6zM12 34c0-4 8-6.2 12-6.2S36 30 36 34v2H12v-2z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Users</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/users/add', true) ?>">
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
				<th width="115" class="hidden_425">
					<?php echo $this->Paginator->sort('group_id', null, array('class' => 'table_th-a')); ?>
				</th>
				<th width="80" class="hidden_425">
					<?php echo $this->Paginator->sort('article_count', 'Count', array('class' => 'table_th-a')); ?>
				</th>
				<th width="90"><?php echo __(''); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td>
					<h3 class="table-title">
						<?php if ($user['User']['article_count'] >= '1') {
							echo $this->Html->link($user['User']['name'], array(
								'controller' => 'blog',
								'action' => 'author',
								'slug' => $user['User']['slug']
							));
						} else {
							echo h($user['User']['name']);
						} ?>
					</h3>
					<div class="table-div">
						<?php echo __('Created: '); ?>
						<?php echo $this->Time->format(
							'd F Y',
							$user['User']['created'],
							null,
							'GMT+7'
						); ?>
					</div>
					<div class="table-div">
						<?php echo __('Last Login: '); ?>
						<?php echo $this->Time->format(
							'd F Y H:i:s',
							$user['User']['last_login'],
							null,
							'GMT+7'
						); ?>
					</div>
				</td>
				<td class="hidden_425">
					<?php echo h($user['Group']['name']); ?>
				</td>
				<td class="hidden_425">
					<?php echo h($user['User']['article_count']); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), 
						array('action' => 'edit', $user['User']['id']),
						array('class' => 'table-btn')
					); ?>
					<?php echo $this->Html->link(__('Delete'), '#modal-delete',
						array(
							'class' => 'table-btn table-btn-warning btn-modal-del',
							'data-title' => $user['User']['name'],
							'data-action' => $this->Html->url(array(
								'action' => 'delete',
								$user['User']['id']
							)),
						)
					); ?>				
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php if (!$users): ?>
		<p class="no_content">
			<?php echo __('No users found.'); ?>
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
