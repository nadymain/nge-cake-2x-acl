<?php
$this->set('channelData', array(
	'title' => __("Most Recent Article"),
	'link' => $this->Html->url('/', true),
	'description' => __("Most recent articles."),
	//'language' => 'en-us'
));
foreach ($articles as $article) {
    $articleTime = strtotime($article['Article']['created']);
    $articleLink = array(
        'controller' => 'blog',
        'action' => 'view',
        'slug' => $article['Article']['slug']
    );
    // Remove & escape any HTML to make sure the feed content will validate.
    $bodyText = h(strip_tags($article['Article']['content']));
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact' => true,
        'html' => true,
    ));
    echo $this->Rss->item(array(), array(
        'title' => $article['Article']['title'],
        'link' => $articleLink,
        'guid' => array('url' => $articleLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $article['Article']['created']
    ));
}
