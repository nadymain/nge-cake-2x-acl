<div class="main_top clear">
	<svg class="main_top-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
		<path d="M28 4H12C9.79 4 8.02 5.79 8.02 8L8 40c0 2.21 1.77 4 3.98 4H36c2.21 0 4-1.79 4-4V16L28 4zm4 32H16v-4h16v4zm0-8H16v-4h16v4zm-6-10V7l11 11H26z"
		/>
	</svg>
	<div class="main_top-title">
		<p class="main_top-title-small">Index</p>
		<h2 class="main_top-title-big">Articles</h2>
	</div>
	<a class="main_top-action" title="Add New" href="<?php echo $this->Html->url('/articles/add', true) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
			<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
		</svg>
	</a>
</div>
<div class="main_filter clear">
	<ul class="main_filter_list">
		<?php $status = $this->request->query('status'); ?>
		<li class="main_filter_list_li">
			<a class="<?php echo(empty($this->request->query)) ? 'main_filter_list-active' : 'inactive' ?>" href="<?php echo $this->Html->url('/articles', true) ?>">
				All	<span>(<?php echo h($total); ?>)</span>
			</a>
		</li>
		<li class="main_filter_list_li">
			<a class="<?php echo (!empty($status) && ($status === 'published')) ? 'main_filter_list-active' : 'inactive' ?>" href="<?php echo $this->Html->url('/articles?status=published', true) ?>">
				Published <span>(<?php echo h($published); ?>)</span>
			</a>
		</li>
		<li class="main_filter_list_li">
			<a class="<?php echo (!empty($status) && ($status === 'draft')) ? 'main_filter_list-active' : 'inactive' ?>" href="<?php echo $this->Html->url('/articles?status=draft', true) ?>">
				Draft <span>(<?php echo h($draft); ?>)</span>
			</a>
		</li>
	</ul>
	<?php
		echo $this->Form->create('Article', 
			array(
				'url' => array_merge(
					array('action' => 'index'),
					$this->params['named']
				),
				'class' => 'main_filter_search hidden_425'
			)
		);
		echo $this->Form->input('title', array(
				'label' => false, 
				'div' => false, 
				'class' => 'main_filter_search_input', 
				'autocomplete' => 'off',
				'Placeholder' => 'Title...'
			)
		);
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
					<?php echo $this->Paginator->sort('title', null, array('class' => 'table_th-a')); ?>
				</th>
				<th width="110" class="hidden_425">
					<?php echo $this->Paginator->sort('category_id', null, array('class' => 'table_th-a')); ?>
				</th>
				<th width="110" class="hidden_425">
					<?php echo __('Tags'); ?>
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
		<?php foreach ($articles as $article): ?>
			<tr>
				<td>
					<h3 class="table-title">
						<?php if ($article['Article']['status'] == 'published') {
							echo $this->Html->link($article['Article']['title'], array(
								'controller' => 'blog',
								'action' => 'view',
								'slug' => $article['Article']['slug']
							));
						} else {
							echo h($article['Article']['title']);
						} ?>
					</h3>
					<div class="table-div">
						<?php echo $this->Paginator->sort('user_id', null, array('title' => 'Sort User')); ?>:
						<?php echo $this->Html->link($article['User']['name'], 
							array('controller' => 'articles', '?' => 'user_id='.$article['User']['id']),
							array('class' => 'table-div-color','title' => 'Filter User')
						); ?>
					</div>
					<div class="table-div">
						<?php echo $this->Paginator->sort('created', null, array('title' => 'Sort Created')); ?>: 
						<?php echo $this->Time->timeAgoInWords($article['Article']['created'], array(
							'format' => 'd/m/Y',
							'end' => '+1 month'
						)); ?>
					</div>
					<div class="table-div">
						<?php echo $this->Paginator->sort('modified', null, array('title' => 'Sort Modified')); ?>: 
						<?php echo $this->Time->format(
							'd/m/Y H:i',
							$article['Article']['modified']
							// null,
							// 'GMT+7'
						); ?>
					</div>
				</td>
				<td class="hidden_425">
					<p class="table-p">
						<?php echo $this->Html->link($article['Category']['name'], 
							array('controller' => 'articles', '?' => 'category_id='.$article['Category']['id']),
							array('title' => 'Sort Category')
						); ?>
					</p>
				</td>
				<td class="hidden_425">
					<?php if (!empty($article['Tag'])): ?>
					<ul class="table-ul">
						<?php foreach ($article['Tag'] as $tags) : ?>
						<li>
							&#8209;
							<?php echo $this->Html->link($tags['name'], 
								array('controller' => 'articles', '?' => 'tag_id='.$tags['id']),
								array('title' => 'Sort Tag')
							); ?>
						</li>
						<?php endforeach ?>
					</ul>
					<?php endif ?>
				</td>
				<td class="hidden_425">
					<?php echo $this->Update->status($article['Article']['status'], $article['Article']['id']) ?>
				</td>
				<td>
					<?php echo $this->Html->link(__('Edit'), 
						array('action' => 'edit', $article['Article']['id']),
						array('class' => 'table-btn')
					); ?>
					<?php echo $this->Html->link(__('Delete'), '#modal-delete',
						array(
							'class' => 'table-btn table-btn-warning btn-modal-del',
							'data-title' => $article['Article']['title'],
							'data-action' => $this->Html->url(array(
								'action' => 'delete',
								$article['Article']['id']
							)),
						)
					); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php if (!$articles): ?>
		<p class="no_content">
			<?php echo __('No articles found.'); ?>
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
	var searchTitle = loadPageVar('title');
	if (!!searchTitle) {
		$(".main_filter_list").after("<span class='search_result'>Search results for &#8220;" + searchTitle + "&#8221;</span>");
	}
});
</script>
<?php $this->end(); ?>
