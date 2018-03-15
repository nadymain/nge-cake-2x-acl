<div class="main_top clear">
 	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M42 6L6 21.07v1.97l13.67 5.3L24.97 42h1.97L42 6z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Menus</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/menus/add', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
		</svg>
	</a>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th width="160">
					<?php echo __('Name'); ?>
				</th>
				<th class="hidden_425">
					<?php echo __('Link'); ?>
				</th>
				<th width="90" class="hidden_425"><?php echo __('Move'); ?></th>
				<th width="90"><?php echo __(''); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($menus as $menu): ?>
			<tr>
				<td>
					<h3 class="table-title">
						<?php if ($menu['ParentMenu']['name']) {
							echo __('— ') . $this->Html->link($menu['Menu']['name'], $menu['Menu']['link']);
						} else {
							echo $this->Html->link($menu['Menu']['name'], $menu['Menu']['link']);
						} ?>
					</h3>
				</td>
				<td class="hidden_425">
					<?php echo h($menu['Menu']['link']); ?>
				</td>
				<td class="hidden_425">
					<?php echo $this->Html->link('Up ', 
						array('action' => 'moveup', $menu['Menu']['id'], 1),
						array('class' => 'table-btn')
					); ?>
					<?php echo $this->Html->link(' Down', 
						array('action' => 'movedown', $menu['Menu']['id'], 1),
						array('class' => 'table-btn')
					); ?>
				</td>
				<td>
					<?php echo $this->Html->link(__('Edit'), 
							array('action' => 'edit', $menu['Menu']['id']),
							array('class' => 'table-btn')
					); ?>
					<?php echo $this->Html->link(__('Delete'), '#modal-delete',
						array(
							'class' => 'table-btn table-btn-warning btn-modal-del',
							'data-title' => $menu['Menu']['name'],
							'data-action' => $this->Html->url(array(
								'action' => 'delete',
								$menu['Menu']['id']
							)),
						)
					); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php if (!$menus): ?>
		<p class="no_content">
			<?php echo __('No menus found.'); ?>
		</p>
	<?php endif ?>
</div>

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