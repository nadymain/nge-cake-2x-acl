<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path d="M38.86 25.95c.08-.64.14-1.29.14-1.95s-.06-1.31-.14-1.95l4.23-3.31c.38-.3.49-.84.24-1.28l-4-6.93c-.25-.43-.77-.61-1.22-.43l-4.98 2.01c-1.03-.79-2.16-1.46-3.38-1.97L29 4.84c-.09-.47-.5-.84-1-.84h-8c-.5 0-.91.37-.99.84l-.75 5.3c-1.22.51-2.35 1.17-3.38 1.97L9.9 10.1c-.45-.17-.97 0-1.22.43l-4 6.93c-.25.43-.14.97.24 1.28l4.22 3.31C9.06 22.69 9 23.34 9 24s.06 1.31.14 1.95l-4.22 3.31c-.38.3-.49.84-.24 1.28l4 6.93c.25.43.77.61 1.22.43l4.98-2.01c1.03.79 2.16 1.46 3.38 1.97l.75 5.3c.08.47.49.84.99.84h8c.5 0 .91-.37.99-.84l.75-5.3c1.22-.51 2.35-1.17 3.38-1.97l4.98 2.01c.45.17.97 0 1.22-.43l4-6.93c.25-.43.14-.97-.24-1.28l-4.22-3.31zM24 31c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"/></svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Settings</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/settings/add', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
		</svg>
	</a>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th width="140">
					<?php echo __('Name'); ?>
				</th>
				<th></th>
				<th width="90"><?php echo __(''); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($settings as $setting): ?>
		<tr>
			<td><?php echo h($setting['Setting']['name'] . ': '); ?></td>
			<td>
				<?php 
				if ($setting['Setting']['name_value'] && $setting['Setting']['name_key'] === 'site_logo' ) {
					echo $this->Html->image($setting['Setting']['name_value']);
				} else {
					echo h($setting['Setting']['name_value']);
				}
				?>
			</td>
			<td>
				<?php echo $this->Html->link(__('Edit'), 
						array('action' => 'edit', $setting['Setting']['id']),
						array('class' => 'table-btn')
				); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	<?php if (!$settings): ?>
		<p class="no_content">
			<?php echo __('No settings found.'); ?>
		</p>
	<?php endif ?>
</div>
