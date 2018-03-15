<?php 
    if ($category['Category']['description']) {
        echo $this->Html->meta('description', 
            $category['Category']['description'], 
            array('inline' => false)
        );
    } 
    
    echo $this->Html->meta('canonical', 
        $this->Html->url(array(
            'controller' => 'blog',
            'action' => 'category',
            'slug' => $category['Category']['slug']
        ), true), 
        array('rel' => 'canonical', 'type' => null, 'title' => null, 'inline' => false)
    );
?>

<div class="head_article">
    <h2>
        <?php 
            echo __('Category: ');
            echo $this->Html->link($category['Category']['name'], array(
                'controller' => 'blog',
                'action' => 'category',
                'slug' => $category['Category']['slug']
            )); 
        ?>
    </h2>
    
	<?php if($category['Category']['description']) : ?>
        <p>
            <?php echo h($category['Category']['description']); ?>
        </p>
	<?php endif ?>
</div>
<?php echo $this->element('bloglist'); ?>
