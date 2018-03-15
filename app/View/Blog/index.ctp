<?php 
    echo $this->Html->meta('canonical', 
        $this->Html->url(array(
            'controller' => 'blog',
            'action' => 'index'
        ), true), 
        array('rel' => 'canonical', 'type' => null, 'title' => null, 'inline' => false)
    );
?>
<?php echo $this->element('bloglist'); ?>
