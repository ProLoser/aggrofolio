<?php
class Comment extends AppModel {
	public $name = 'Comment';
	public $validate = array(
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a subject',
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify your name',
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('email'),
				'message' => 'Please specify a valid email',
			),
		),
		'website' => array(
			'notempty' => array(
				'rule' => array('url'),
				'message' => 'This is an invalid url',
				'allowEmpty' => true,
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'human' => array(
			'rule' => array('equalTo', '1'),
			'message' => 'Check the damn box.',
			'required' => true,
		),
		'inhuman' => array(
			'rule' => array('equalTo', ''),
			'message' => "I can't let you do that Dave.",
		)
	);

	public $belongsTo = array(
		'User',
		'Post' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('foreign_model' => 'Post'),
		),
	);
	
/**
 * Strips garbage before saving. I could do it on display but I decided to just reduce overhead in exchange for later versatility
 *
 * @param string $value 
 * @return true
 */
	public function beforeSave($options = array()) {
		if (!parent::beforeSave($options)) {
			return false;
		}
		if (isset($this->data['Comment']['body'])) {
			App::uses('Sanitize', 'Utility');
			$this->data['Comment']['body'] = Sanitize::html($this->data['Comment']['body']);
		}
		return true;
	}
	
	public function afterSave($created) {
		parent::afterSave($created);
		if ($created) {
			$related = $this->{$this->data['Comment']['foreign_model']}->findById($this->data['Comment']['foreign_key']);
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail();
			$email->from(array($this->data['Comment']['email'] => $this->data['Comment']['name']))
				->sender('no-reply@deansofer.com', 'Aggrofolio')
			    ->to('deansofer+aggropholio@gmail.com')
			    ->subject($this->data['Comment']['subject'])
				->template('comment')
			    ->emailFormat('html')
				->viewVars(array('comment' => $this->data, 'related' => $related))
			    ->send();			
		}
	}
}