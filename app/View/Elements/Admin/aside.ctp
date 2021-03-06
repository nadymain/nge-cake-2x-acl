<aside id="aside" class="aside">
	<nav class="aside_nav">
		<h2 class="hidden_element">Menu</h2>
		<ul class="aside_ul">
			<li class="aside_ul_li <?php echo $this->Menu->admin('articles') ?>">
				<?php echo $this->Html->link('Articles', 
					array('controller' => 'articles', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Menu->admin('categories') ?>">
				<?php echo $this->Html->link('Categories', 
					array('controller' => 'categories', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Menu->admin('tags') ?>">
				<?php echo $this->Html->link('Tags', 
					array('controller' => 'tags', 'action' => 'index')
				); ?>
			</li>
			<?php if ($this->Session->read('Auth.User.group_id') == '1') : ?>
			<li class="aside_ul_li <?php echo $this->Menu->admin('infos') ?>">
				<?php echo $this->Html->link('Infos', 
					array('controller' => 'infos', 'action' => 'index')
				); ?>
			</li>
			<?php endif ?>
			<li class="aside_ul_li <?php echo $this->Menu->admin('images') ?>">
				<?php echo $this->Html->link('Images', 
					array('controller' => 'images', 'action' => 'index')
				); ?>
			</li>
			<?php if ($this->Session->read('Auth.User.group_id') == '1') : ?>
			<li class="aside_ul_li <?php echo $this->Menu->admin('menus') ?>">
				<?php echo $this->Html->link('Menus', 
					array('controller' => 'menus', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Menu->admin('settings') ?>">
				<?php echo $this->Html->link('Settings', 
					array('controller' => 'settings', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Menu->admin('groups') ?>">
				<?php echo $this->Html->link('Groups', 
					array('controller' => 'groups', 'action' => 'index')
				); ?>
			</li>
			<li class="aside_ul_li <?php echo $this->Menu->admin('users') ?>">
				<?php echo $this->Html->link('Users', 
					array('controller' => 'users', 'action' => 'index')
				); ?>
			</li>
			<?php endif ?>
		</ul>
	</nav>
</aside>
