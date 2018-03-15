<?php 
    if ($info['Info']['description']) {
        echo $this->Html->meta('description', 
            $info['Info']['description'], 
            array('inline' => false)
        );
    } 
    echo $this->Html->meta('canonical', 
        $this->Html->url(array(
            'controller' => 'infos',
            'action' => 'show',
            'slug' => $info['Info']['slug']
        ), true), 
        array('rel' => 'canonical', 'type' => null, 'title' => null, 'inline' => false)
    );
?>
<article class="article clear">
    <header>
        <h2 class="article_title">
            <?php echo $this->Html->link($info['Info']['title'],
                array(
                    'controller' => 'infos',
                    'action' => 'show',
                    'slug' => $info['Info']['slug']
                )
            ); ?>
        </h2>
	</header>
    <div class="article_content">
        <?php echo $info['Info']['content']; ?>
    </div>
    <?php 
        if ($this->Session->check('Auth.User.group_id')) :
			if ($this->Session->read('Auth.User.group_id') == '1') {
                echo $this->Html->link('Edit', array(
                    'controller' => 'infos',
                    'action' => 'edit',
                    $info['Info']['id']
                ), array(
                    'class' => 'article_edit'
                ));
			}
        endif
    ?>
</article>
