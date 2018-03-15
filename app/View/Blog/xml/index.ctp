<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $this->Html->url('/', true); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php foreach ($articles as $article) : ?>
        <?php 
            $time = strtotime($article['Article']['modified']);
            $link = array(
                'controller' => 'blog',
                'action' => 'view',
                'slug' => $article['Article']['slug']
            )
        ?>
        <url>
            <loc><?php echo $this->Html->url($link, true) ?></loc>
            <lastmod><?php echo $this->Time->toAtom($time); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
        <?php endforeach; ?>
</urlset> 
