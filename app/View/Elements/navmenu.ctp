<a href="#" class="navmenu_btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path d="M4 27h28v-3H4v3zm0-8h28v-3H4v3zM4 8v3h28V8H4z"/></svg>
</a>
<nav class="navmenu clear">
    <h3 class="hidden_element">Blog Menu</h3>
	
    <ul class="dropit">
	<?php 
		$mainmenu = $this->requestAction('/menus/navmenu');	
		foreach ($mainmenu as $menu) : 
	?>
        <?php if (!empty($menu['children'])) : ?>
            <li>
                <?= $this->Html->link($menu['Menu']['name'], $menu['Menu']['link']) ?>
                <ul>
                <?php foreach ($menu['children'] as $child) : ?>
                    <li>
                        <?= $this->Html->link($child['Menu']['name'], $child['Menu']['link']) ?>
                    </li>
                <?php endforeach ?>
                </ul>
            </li>
        <?php else : ?>
            <li class="<?php echo $this->Menu->main($menu['Menu']['link'])?>">
                <?= $this->Html->link($menu['Menu']['name'], $menu['Menu']['link']) ?>
            </li>
        <?php endif ?>
    <?php endforeach ?>
    </ul>
	
	<?php
		echo $this->Form->create('Article', 
			array(
				'url' => array_merge(
					array(
                        'controller' => 'articles',
						'action' => 'search',
						'plugin' => false
                    ),
					$this->params['named']
                )
			)
		);
		echo $this->Form->input('q', array(
				'label' => false, 
				'div' => false, 
				'autocomplete' => 'off',
				'Placeholder' => 'Search...'
			)
		);
		echo $this->Form->end();
	?>
</nav>
