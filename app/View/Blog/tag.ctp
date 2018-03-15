<?php 
    if ($tag['Tag']['description']) {
        echo $this->Html->meta('description', 
            $tag['Tag']['description'], 
            array('inline' => false)
        );
    } 
    
    echo $this->Html->meta('canonical', 
        $this->Html->url(array(
            'controller' => 'blog',
            'action' => 'tag',
            'slug' => $tag['Tag']['slug']
        ), true), 
        array('rel' => 'canonical', 'type' => null, 'title' => null, 'inline' => false)
    );
?>

<div class="head_article">
    <h2>
        <?php 
            echo __('Tag: ');
            echo $this->Html->link($tag['Tag']['name'], array(
                'controller' => 'blog',
                'action' => 'tag',
                'slug' => $tag['Tag']['slug']
            )); 
        ?>
    </h2>
    
	<?php if($tag['Tag']['description']) : ?>
        <p>
            <?php echo h($tag['Tag']['description']); ?>
        </p>
	<?php endif ?>
</div>
<?php echo $this->element('bloglist'); ?>
