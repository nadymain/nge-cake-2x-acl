<header id="header" class="header">
	<h1 class="header_dashboard hidden_425">
		<?php echo $this->Html->link('Dashboard', 
			array('controller' => 'articles', 'action' => 'index'),
			array('class' => 'header_dashboard-a')
		); ?>
	</h1>
	<div class="header_menu">
		<a href="#" title="Toggle Menu">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
			</svg>
		</a>
	</div>
	<ul class="header_add dropit">
		<li>
			<a href="#" title="Toggle Add">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
				</svg>
			</a>
			<ul>
				<li>
					<a href="<?php echo $this->Html->url('/articles/add', true); ?>">Add Article</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url('/categories/add', true); ?>">Add Category</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url('/tags/add', true); ?>">Add Tag</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url('/images/add', true); ?>">Add Image</a>
				</li>
			</ul>
		</li>
	</ul>
	<ul class="header_user dropit">
		<li>
			<a href="#" title="Toggle User Action">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M9 8c1.66 0 2.99-1.34 2.99-3S10.66 2 9 2C7.34 2 6 3.34 6 5s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V16h14v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
				<?php if ($this->Session->check('Auth.User.name')): ?>
					Hi. <?php echo h($this->Session->read('Auth.User.name')); ?>
				<?php endif ?>
			</a>
			<ul>
				<li>
					<?php echo $this->Html->link('Visit Site', '/'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Edit Profile', array(
						'controller' => 'users',
						'action' => 'edit',
						$this->Session->read('Auth.User.id')
					)); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Logout', array(
						'controller' => 'users',
						'action' => 'logout'
					)); ?>
				</li>
			</ul>
		</li>
	</ul>
</header>
