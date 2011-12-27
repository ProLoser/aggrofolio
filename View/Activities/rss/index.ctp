<?php
$this->set('documentData', array(
    'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'
));

$this->set('channelData', array(
    'title' => __('DeanSofer.com Activity Feed'),
    'link' => $this->Html->url('/', true),
    'description' => __('A live web presence feed of Deans activity online.'),
    'language' => 'en-us'
));

App::uses('Sanitize', 'Utility');
foreach ($activities as $post) {
    $postTime = strtotime($post['Activity']['created']);

	$slug = null;
	if (isset($post[$post['Activity']['model']]['slug'])) {
		$slug = $post[$post['Activity']['model']]['slug'];
	} elseif (isset($post[$post['Activity']['model']]['name'])) {
		$slug = Inflector::slug($post[$post['Activity']['model']]['name']);
	}

    $postLink = array(
        'controller' => Inflector::pluralize($post['Activity']['model']),
        'action' => 'view',
		$post['Activity']['model_id'],
		$slug
	);
    // This is the part where we clean the body text for output as the description 
    // of the rss item, this needs to have only text to make sure the feed validates
	$bodyText = '';
	if (isset($post[$post['Activity']['model']]['description'])) {
		$bodyText = $post[$post['Activity']['model']]['description'];
	    $bodyText = $this->Agro->truncate($bodyText);
	    $bodyText = preg_replace('=\(.*?\)=is', '', $bodyText);
	    $bodyText = $this->Text->stripLinks($bodyText);
	    $bodyText = Sanitize::stripAll($bodyText);
	}

    echo  $this->Rss->item(array(), array(
        'title' => $post['Activity']['model'] . ' ' . $actions[$post['Activity']['action']] . ': ' . $post['Activity']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' =>  $bodyText,
        'pubDate' => $post[$post['Activity']['model']]['created']
	));
}
