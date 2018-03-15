<?php if ($this->Paginator->hasPage(null, 2)) : ?>
<nav class="paginator">
	<h3 class="hidden_element">Paginator</h3>
	<ul class="paginator_ul">
		<?php 
			echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('first' => 1, 'last' => 1, 'separator' => '', 'tag' => 'li', 'modulus' => '3', 'ellipsis' => ' - '));
			echo $this->Paginator->next(__('Next'), array('tag' => 'li'), null, array('class' => 'next disabled'));
		?>
	</ul>
	<p class="paginator_p">
		<?php
			echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}')
			));
		?>
	</p>
</nav>
<?php endif ?>
