<?php
class Post extends AppModel {
	var $name = 'Post';
	var $displayField = 'subject';
	var $order = 'Post.created DESC';
	var $validate = array(
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid subject',
			),
		),
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => '/^[a-z0-9-\s_]{3,}$/i',
				'message' => 'Slugs must be letters, numbers, dashes and underscores only',
			),
			'isUnique'=>array(
				'rule' => 'isUnique',
				'message' => 'This slug is already taken.',
			),	
			'allowEmpty' => true,
		),
	);
	
	var $hasMany = array(
		'PostRelationship',
		'Comment' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array(
				'Comment.foreign_model' => 'Post',
			)
		)
	);
	
	var $belongsTo = array(
		'PostCategory',
		'Account',
	);
	
	var $actsAs = array(
		'Activity',
	);
	
	public function beforeValidate() {
		if (isset($this->data['Post']['slug']) && empty($this->data['Post']['slug']))
			$this->data['Post']['slug'] = Inflector::slug($this->data['Post']['subject']);
		return true;
	}

	public function beforeSave() {
		if (!empty($this->data['PostRelationship'])) {
			foreach ($this->data['PostRelationship'] as $i => $relationship) {
				if (empty($relationship['foreign_model']) || empty($relationship['foreign_key'])) {
					unset($this->data['PostRelationship'][$i]);
				} else {
					$model = $relationship['foreign_model'];
					$key = $relationship['foreign_key'];
					$related = $this->PostRelationship->{$model}->find('first', array('conditions' => array("{$model}.id" => $key)));
					if ($model == 'Resume') {
						$this->data['PostRelationship'][$i]['title'] = $related[$model]['purpose'];
					} else {
						$this->data['PostRelationship'][$i]['title'] = $related[$model]['name'];
					}
					$this->data['PostRelationship'][$i]['url'] = Router::url(array('controller' => Inflector::tableize($model), 'action' => 'view', $key));
				}
			}
		}
		return true;
	}
	
	public function scanBlog($account) {
		$this->setDataSource('rss');
		$this->feedUrl = $this->getRss($account['Account']['username']);
		$posts = $this->find('all');
		$this->setDataSource('default');
		
		$data = array();
		foreach ($posts as $i => $post) {
			$data[$i] = array(
				'subject' => $post['title'],
				'body' => $post['content:encoded'],
				'url' => $post['link'],
				'slug' => Inflector::slug($post['title'], '-'),
				'published' => $account['Account']['published'],
				'account_id' => $account['Account']['id'],
			);
			if ($post['category'] && $cat = $this->PostCategory->findByName($post['category'])) {
				$data[$i]['post_category_id'] = $cat['PostCategory']['id'];
			}
		}
		$this->saveMany($data);
	}

	/**
	 * @link http://keithdevens.com/weblog/archive/2002/Jun/03/RSSAuto-DiscoveryPHP
	 */
	function getRSS($url){
		$location = $url;
		$html = file_get_contents($location);
		#search through the HTML, save all <link> tags
		# and store each link's attributes in an associative array
		preg_match_all('/<link\s+(.*?)\s*\/?>/si', $html, $matches);
		$links = $matches[1];
		$final_links = array();
		$link_count = count($links);
		for($n=0; $n<$link_count; $n++){
			$attributes = preg_split('/\s+/s', $links[$n]);
			foreach($attributes as $attribute){
				$att = preg_split('/\s*=\s*/s', $attribute, 2);
				if(isset($att[1])){
					$att[1] = preg_replace('/([\'"]?)(.*)\1/', '$2', $att[1]);
					$final_link[strtolower($att[0])] = $att[1];
				}
			}
			$final_links[$n] = $final_link;
		}
		#now figure out which one points to the RSS file
		for($n=0; $n<$link_count; $n++){
			if(strtolower($final_links[$n]['rel']) == 'alternate'){
				if(strtolower($final_links[$n]['type']) == 'application/rss+xml'){
					$href = $final_links[$n]['href'];
				}
				if(!$href and strtolower($final_links[$n]['type']) == 'text/xml'){
					#kludge to make the first version of this still work
					$href = $final_links[$n]['href'];
				}
				if($href){
					#if it's absolute
					if (strstr($href, "http://") !== false) {
						$full_url = $href;
						#otherwise, 'absolutize' it
					} else {
						$url_parts = parse_url($location);
						#only made it work for http:// links. Any problem with this?
						$full_url = "http://$url_parts[host]";
						if(isset($url_parts['port'])){
							$full_url .= ":$url_parts[port]";
						}
						#it's a relative link on the domain
						if ($href{0} != '/') {
							$full_url .= dirname($url_parts['path']);
							if(substr($full_url, -1) != '/'){
								#if the last character isn't a '/', add it
								$full_url .= '/';
							}
						}
						$full_url .= $href;
					}
					return $full_url;
				}
			}
		}
	}
}