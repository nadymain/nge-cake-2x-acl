<?php 
    if ($article['Article']['description']) {
        echo $this->Html->meta('description', 
            $article['Article']['description'], 
            array('inline' => false)
        );
    } 
    echo $this->Html->meta('canonical', 
        $this->Html->url(array(
            'controller' => 'blog',
            'action' => 'view',
            'slug' => $article['Article']['slug']
        ), true), 
        array('rel' => 'canonical', 'type' => null, 'title' => null, 'inline' => false)
    );
?>
<article class="article clear">
    <header>
        <?php if ($article['Article']['image']) : ?>
            <div class="article_image">
                <img src="<?php echo $article['Article']['image']; ?>" alt="Featured Image" />
            </div>
        <?php endif ?>
        <h2 class="article_title">
            <?php echo $this->Html->link($article['Article']['title'],
                array(
                    'controller' => 'blog',
                    'action' => 'view',
                    'slug' => $article['Article']['slug']
                )
            ); ?>
        </h2>
        <div class="article_meta">
            <?php
                echo $this->Html->link($article['User']['name'],
                    array(
                        'controller' => 'blog',
                        'action' => 'author',
                        'slug' => $article['User']['slug']
                    )
                );
                echo __(' &#8209; ');
                echo $this->Time->format(
                    'd F Y',
                    $article['Article']['created'],
                    null,
                    'GMT+7'
                );
                echo __(' &#8209; ');
                echo $this->Html->link($article['Category']['name'],
                    array(
                        'controller' => 'blog',
                        'action' => 'category',
                        'slug' => $article['Category']['slug']
                    )
                );
            ?>
        </div>
    </header>
    <div class="article_content">
        <?php echo $article['Article']['content']; ?>
    </div>
    <footer>
        <div class="article_tag">
            <?php if (!empty($article['Tag'])): ?>
                Tag:
                <?php
                    $total = count($article['Tag']);
                    $i=0;
                    foreach ($article['Tag'] as $tag) {
                        $i++;
                        echo $this->Html->link($tag['name'], array(
                            'controller' => 'blog',
                            'action' => 'tag',
                            'slug' => $tag['slug']
                        ));
                        if ($i != $total) {
                            echo ', ';
                        }
                    }
                ?>
            <?php endif; ?>
        </div>
    </footer>
    <?php 
        if ($this->Session->check('Auth.User.id')) :
            if ($this->Session->read('Auth.User.group_id') == '1' || $this->Session->read('Auth.User.id') == $article['Article']['user_id']){
                echo $this->Html->link('Edit', array(
                    'controller' => 'articles',
                    'action' => 'edit',
                    $article['Article']['id']
                ), array(
                    'class' => 'article_edit'
                ));
            }
        endif
    ?>
</article>
<?php echo $this->element('prevnext'); ?>
