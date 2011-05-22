<?php
class Post extends AppModel {
	var $name = 'Post';
	var $displayField = 'subject';
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
				'rule' => '/^[a-zA-Z0-9-\s_]+$/i',
				'message' => 'Slugs must be letters, numbers, dashes and underscores only',
			),
			'unique'=>array(
				'rule' => 'unique',
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
	);
	
	var $actsAs = array(
		'Log.Logable',
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
					$related = $this->{$model}->find('first', array('conditions' => array("$model.id" => $key)));
					$this->data['PostRelationship'][$i]['title'] = ($model == 'Resume') ? $related[$model]['purpose'] : $related[$model]['name'];
					$this->data['PostRelationship'][$i]['url'] = Router::url(array('controller' => Inflector::tabelize($model), 'action' => 'view', $key));
				}
			}
		}
		return true;
	}
}