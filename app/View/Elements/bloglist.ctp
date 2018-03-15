<?php if (empty($articles)) { ?>
	<article class="article article_notfound">
		<p><?php echo __('No articles found.'); ?></p>
	</article>
<?php } else { ?>
	<?php foreach ($articles as $article): ?>
		<article class="article clear">
			<header>
				<h2 class="article_title">
					<?php echo $this->Html->link($article['Article']['title'],
						array(
							'controller' => 'blog',
							'action' => 'view',
							'slug' => $article['Article']['slug']
						)
					); ?>
				</h2>
				<div class="article_meta">
					<?php
						echo $this->Html->link($article['User']['name'],
							array(
								'controller' => 'blog',
								'action' => 'author',
								$article['User']['slug']
							)
						);
						echo __(' &#8209; ');
						echo $this->Time->format(
							'd F Y',
							$article['Article']['created'],
							null,
							'GMT+7'
						);
						echo __(' &#8209; ');
						echo $this->Html->link($article['Category']['name'],
							array(
								'controller' => 'blog',
								'action' => 'category',
								$article['Category']['slug']
							)
						);
					?>
				</div>
			</header>
			<p class="article_content">
				<?php
					$excerpt = strip_tags($article['Article']['content']);
					echo $this->Text->excerpt($excerpt, 'method', 385, '... ');
					echo $this->Html->link(' Read More', array(
						'controller' => 'blog',
						'action' => 'view',
						'slug' => $article['Article']['slug']
					));
				?>
			</p>
			<?php 
				if ($this->Session->check('Auth.User.id')) :
					if ($this->Session->read('Auth.User.group_id') == '1' || $this->Session->read('Auth.User.id') == $article['Article']['user_id']){
						echo $this->Html->link('Edit', array(
							'controller' => 'articles',
							'action' => 'edit',
							$article['Article']['id']
						), array(
							'class' => 'article_edit'
						));
					}
				endif
			?>
		</article>
	<?php endforeach; ?>
<?php } ?>
<?php echo $this->element('paginator'); ?>
