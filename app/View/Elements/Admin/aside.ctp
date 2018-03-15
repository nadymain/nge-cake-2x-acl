<aside id="aside" class="aside">
	<nav class="aside_nav">
		<h2 class="hidden_element">Menu</h2>
		<ul class="aside_ul">
			<li class="aside_ul_li <?php echo $this->Aside->active('articles') ?>">
				<?php echo $this->Html->link('Articles', 
					array('controller' => 'articles', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Aside->active('categories') ?>">
				<?php echo $this->Html->link('Categories', 
					array('controller' => 'categories', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Aside->active('tags') ?>">
				<?php echo $this->Html->link('Tags', 
					array('controller' => 'tags', 'action' => 'index')
				); ?>
			</li>
			<?php if ($this->Session->read('Auth.User.group_id') == '1') : ?>
			<li class="aside_ul_li <?php echo $this->Aside->active('infos') ?>">
				<?php echo $this->Html->link('Infos', 
					array('controller' => 'infos', 'action' => 'index')
				); ?>
			</li>
			<?php endif ?>
			<li class="aside_ul_li <?php echo $this->Aside->active('images') ?>">
				<?php echo $this->Html->link('Images', 
					array('controller' => 'images', 'action' => 'index')
				); ?>
			</li>
			<?php if ($this->Session->read('Auth.User.group_id') == '1') : ?>
			<li class="aside_ul_li <?php echo $this->Aside->active('menus') ?>">
				<?php echo $this->Html->link('Menus', 
					array('controller' => 'menus', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Aside->active('settings') ?>">
				<?php echo $this->Html->link('Settings', 
					array('controller' => 'settings', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Aside->active('groups') ?>">
				<?php echo $this->Html->link('Groups', 
					array('controller' => 'groups', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Aside->active('users') ?>">
				<?php echo $this->Html->link('Users', 
					array('controller' => 'users', 'action' => 'index')
				); ?>
			</li>
			<?php endif ?>
		</ul>
	</nav>
</aside>
