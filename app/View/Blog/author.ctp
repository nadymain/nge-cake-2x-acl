<?php 
    echo $this->Html->meta('canonical', 
        $this->Html->url(array(
            'controller' => 'blog',
            'action' => 'author',
            'slug' => $author['User']['slug']
        ), true), 
        array('rel' => 'canonical', 'type' => null, 'title' => null, 'inline' => false)
    );
?>

<div class="head_article">
    <?php if ($author['User']['photo']) : ?>
        <div class="author_photo">
            <img src="<?php echo $author['User']['photo']; ?>" alt="photo author" />
        </div>
    <?php endif ?>

    <h2>
        <?php 
            echo __('Author: ');
            echo $this->Html->link($author['User']['name'], array(
                'controller' => 'blog',
                'action' => 'author',
                'slug' => $author['User']['slug']
            )); 
        ?>
    </h2>
    
	<?php if($author['User']['description']) : ?>
        <p>
            <?php echo h($author['User']['description']); ?>
        </p>
	<?php endif ?>
</div>
<?php echo $this->element('bloglist'); ?>
