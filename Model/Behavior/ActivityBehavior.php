<?php
/**
 * Activity Model Behavior
 * 
 * [Short Description]
 *
 * @package default
 * @author Dean Sofer
 * @version $Id$
 * @copyright Art Engineered
 **/
class ActivityBehavior extends ModelBehavior {

	var $user = null;
	var $UserModel = false;
	var $userIP = false;
	var $userBrowser = false;
	var $requestParameters = null;
	var $settings = array();
	var $defaults = array(
		'enabled' => true,
		'userModel' => 'User',
		'userKey' => 'user_id',
		'change' => 'list',
		'description_ids' => true,
		'skip' => array(),
		'ignore' => array(),
		'classField' => 'model',
		'foreignKey' => 'model_id',
	);

	/**
	 * Cake called intializer
	 * Config options are :
	 * 	userModel 		: 'User'. Class name of the user model you want to use (User by default), if you want to save User in activity
	 * 	userKey   		: 'user_id'. The field for saving the user to (user_id by default).
	 * 	change    		: 'list' > [name, age]. Set to 'full' for [name (alek) => (Alek), age (28) => (29)]
	 * 	description_ids : TRUE. Set to FALSE to not include model id and user id in the title field
	 * 	skip  			: array(). String array of actions to not activity
	 *  parents			: array(). String array of models this activity can affect
	 *
	 * @param Object $Model
	 * @param array $config
	 */
	function setup(&$Model, $config = array()) {
		if (!is_array($config)) {
			$config = array();
		}
		$this->settings[$Model->alias] = array_merge($this->defaults, $config);
		$this->settings[$Model->alias]['ignore'][] = $Model->primaryKey;

		$this->Activity =& ClassRegistry::init('Activity');
		$this->Activity->bindModel(array(
			'belongsTo' => array($this->settings[$Model->alias]['userModel'])
		), false);

		if ($this->settings[$Model->alias]['userModel'] != $Model->alias) {
			$this->UserModel =& ClassRegistry::init($this->settings[$Model->alias]['userModel']);
		} else {
			$this->UserModel = $Model;
		}
	}

	function settings(&$Model) {
		return $this->settings[$Model->alias];
	}

	function beforeDelete(&$Model) {
		if (!$this->settings[$Model->alias]['enabled']) {
			return true;
		}
		if (isset($this->settings[$Model->alias]['skip']['delete']) && $this->settings[$Model->alias]['skip']['delete']) {
			return true;
		}
		$Model->recursive = -1;
		$Model->read();
		return true;
	}

	function afterDelete(&$Model) {
		if (!$this->settings[$Model->alias]['enabled']) {
			return true;
		}
		if (isset($this->settings[$Model->alias]['skip']['delete']) && $this->settings[$Model->alias]['skip']['delete']) {
			return true;
		}
		$activityData = array();

		$activityData['Activity']['description'] = $Model->alias;
		if (isset($Model->data[$Model->alias][$Model->displayField]) && $Model->displayField != $Model->primaryKey) {
			$activityData['Activity']['description'] .= ' "'.$Model->data[$Model->alias][$Model->displayField].'"';
		}
		if ($this->settings[$Model->alias]['description_ids']) {
			$activityData['Activity']['description'] .= ' ('.$Model->id.') ';
		}
		$activityData['Activity']['description'] .= __('deleted');

		$activityData['Activity']['action'] = 'delete';
		$this->_saveActivity($Model, $activityData);
	}

	function beforeSave(&$Model) {
		if ($this->Activity->schema('change') && $Model->id) {
			$this->old = $Model->find('first', array('conditions' => array(
				$Model->alias .'.'. $Model->primaryKey => $Model->id),
				'recursive'=>-1
			));
		}
		return true;
	}

	function afterSave(&$Model,$created) {
		if (!$this->settings[$Model->alias]['enabled']) {
			return true;
		}
		if (isset($this->settings[$Model->alias]['skip']['add']) && $this->settings[$Model->alias]['skip']['add'] && $created) {
			return true;
		} elseif (isset($this->settings[$Model->alias]['skip']['edit']) && $this->settings[$Model->alias]['skip']['edit'] && !$created) {
			return true;
		}
		$activityData = array();
		$keys = array_keys($Model->data[$Model->alias]);
		$diff = array_diff($keys, $this->settings[$Model->alias]['ignore']);
		if (count($diff) == 0 && empty($Model->activityableAction)) {
			return false;
		}
		if ($Model->id) {
			$id = $Model->id;
		} elseif ($Model->insertId) {
			$id = $Model->insertId;
		}

		$activityData['Activity'][$this->settings[$Model->alias]['foreignKey']] = $id;

		if (!empty($activityData['Activity']['description'])) {
			$activityData['Activity']['description'] = $Model->alias.' ';
			if (isset($Model->data[$Model->alias][$Model->displayField]) && $Model->displayField != $Model->primaryKey) {
				$activityData['Activity']['description'] .= '"'.$Model->data[$Model->alias][$Model->displayField].'" ';
			}

			if ($this->settings[$Model->alias]['description_ids']) {
				$activityData['Activity']['description'] .= '('.$id.') ';
			}

			if ($created) {
				$activityData['Activity']['description'] .= __('added');
			} else {
				$activityData['Activity']['description'] .= __('updated');
			}
		}
		if ($created) {
			$activityData['Activity']['action'] = 'add';
		} else {
			$activityData['Activity']['action'] = 'edit';
		}

		if ($this->Activity->schema('change')) {
			$activityData['Activity']['change'] = '';
			$db_fields = array_keys($Model->schema());
			$changed_fields = array();
			foreach ($Model->data[$Model->alias] as $key => $value) {
				if (isset($Model->data[$Model->alias][$Model->primaryKey]) && !empty($this->old) && isset($this->old[$Model->alias][$key])) {
					$old = $this->old[$Model->alias][$key];
				} else {
					$old = '';
				}

				if ($key != 'modified'
				&& !in_array($key, $this->settings[$Model->alias]['ignore'])
				&& $value != $old && in_array($key,$db_fields)) {
					if ($this->settings[$Model->alias]['change'] == 'full') {
						$changed_fields[] = $key . ' ('.$old.') => ('.$value.')';
					} else if ($this->settings[$Model->alias]['change'] == 'serialize') {
						$changed_fields[$key] =  array('old'=>$old, 'value'=>$value);
					} else {
						$changed_fields[] = $key;
					}
				}
			}
			$changes = count($changed_fields);
			if ($changes == 0) {
				return true;
			}
			if ($this->settings[$Model->alias]['change'] == 'serialize') {
				$activityData['Activity']['change'] = serialize($changed_fields);
			} else {
				$activityData['Activity']['change'] = implode(', ', $changed_fields);
			}
			$activityData['Activity']['changes'] = $changes;
		}
		$this->_saveActivity($Model, $activityData);
	}
	

/**
 * Does the actual saving of the Activity model. Also adds the special field if possible.
 *
 * If model field in table, add the Model->alias
 * If action field is NOT in table, remove it from dataset
 * If the userKey field in table, add it to dataset
 * If userData is supplied to model, add it to the title
 *
 * @param Object $Model
 * @param array $activityData
 */
	function _saveActivity(&$Model, $activityData, $title = null) {
		if ($title !== null) {
			$activityData['Activity']['title'] = $title;
		} elseif ($Model->displayField == $Model->primaryKey) {
			$activityData['Activity']['title'] = $Model->alias . ' ('. $Model->id.')';
		} elseif (isset($Model->data[$Model->alias][$Model->displayField])) {
			$activityData['Activity']['title'] = $Model->data[$Model->alias][$Model->displayField];
		} else {
			$activityData['Activity']['title'] = $Model->field($Model->displayField);
		}

		$activityData['Activity'][$this->settings[$Model->alias]['classField']] = $Model->name;

		if (!isset($activityData['Activity'][$this->settings[$Model->alias]['foreignKey']])) {
			if ($Model->id) {
				$activityData['Activity'][$this->settings[$Model->alias]['foreignKey']] = $Model->id;
			} elseif ($Model->insertId) {
				$activityData['Activity'][$this->settings[$Model->alias]['foreignKey']] = $Model->insertId;
			}
		}

		if (!empty($Model->activityableAction)) {
			$activityData['Activity']['action'] = implode(',',$Model->activityableAction); // . ' ' . $activityData['Activity']['action'];
			unset($Model->activityableAction);
		}

		if (isset($Model->version_id)) {
			$activityData['Activity']['version_id'] = $Model->version_id;
			unset($Model->version_id);
		}

		if ($this->userIP) {
			$activityData['Activity']['ip'] = $this->userIP;
		}

		if ($this->userBrowser) {
			$activityData['Activity']['browser'] = $this->userBrowser;
		}

		if ($this->requestParameters) {
			$activityData['Activity']['request'] = serialize($this->requestParameters);
		}

		if ($this->user) {
			$activityData['Activity'][$this->settings[$Model->alias]['userKey']] = $this->user[$this->UserModel->alias][$this->UserModel->primaryKey];
		}

		if (!empty($activityData['Activity']['description'])) {
			if ($this->user && $this->UserModel) {
				$activityData['Activity']['description'] .= ' by '.$this->settings[$Model->alias]['userModel'].' "'.
						$this->user[$this->UserModel->alias][$this->UserModel->displayField].'"';
				if ($this->settings[$Model->alias]['description_ids']) {
					$activityData['Activity']['description'] .= ' ('.$this->user[$this->UserModel->alias][$this->UserModel->primaryKey].')';
				}
			} else {
				// UserModel is active, but the data hasnt been set. Assume system action.
				$activityData['Activity']['description'] .= ' by System';
			}
			$activityData['Activity']['description'] .= '.';
		}
		$this->Activity->create($activityData);
		$this->Activity->save(null, array('validate'=>false, 'callbacks' => false));
	}
}