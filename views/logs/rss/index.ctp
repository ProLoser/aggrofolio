<?php
foreach ($logs as $post) {
    $postTime = strtotime($post['Log']['created']);

	$slug = null;
	if (isset($post[$post['Log']['model']]['slug'])) {
		$slug = $post[$post['Log']['model']]['slug'];
	} elseif (isset($post[$post['Log']['model']]['name'])) {
		$slug = Inflector::slug($post[$post['Log']['model']]['name']);
	}

    $postLink = array(
        'controller' => Inflector::pluralize($post['Log']['model']),
        'action' => 'view',
		$post['Log']['model_id'],
		$slug
	);
    // You should import Sanitize
    App::import('Sanitize');
    // This is the part where we clean the body text for output as the description 
    // of the rss item, this needs to have only text to make sure the feed validates
	$bodyText = '';
	if (isset($post[$post['Log']['model']]['description'])) {
		$bodyText = $post[$post['Log']['model']]['description'];
	    $bodyText = $this->Agro->truncate($bodyText);
	    $bodyText = preg_replace('=\(.*?\)=is', '', $bodyText);
	    $bodyText = $this->Text->stripLinks($bodyText);
	    $bodyText = Sanitize::stripAll($bodyText);
	}

    echo  $this->Rss->item(array(), array(
        'title' => $post['Log']['model'] . ' ' . $actions[$post['Log']['action']] . ': ' . $post['Log']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' =>  $bodyText,
        'pubDate' => $post[$post['Log']['model']]['created']
	));
}
