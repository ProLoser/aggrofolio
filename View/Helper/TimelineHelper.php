<?php
/**
 * TimelineHelper
 *
 * [Short Description]
 *
 * @package Unfolio
 * @author Dean Sofer
 * @version $Id$
 * @copyright Art Engineered
 **/
App::uses('AppHelper', 'View/Helper');
class TimelineHelper extends AppHelper {

	/**
	 * An array containing the names of helpers this controller uses. The array elements should
	 * not contain the "Helper" part of the classname.
	 *
	 * @var mixed A single name as a string or a list of names as an array.
	 * @access protected
	 */
	var $helpers = array('Html');

	public function buttons($record, $model, $editing = false) {
		$controller = Inflector::tableize($model);
		$output = '';
		$output .= $this->Html->link('',
			array('controller' => $controller, 'action' => 'delete', $record[$model]['id']),
			array('class' => 'icon-trash', 'escape' => false, 'title' => __('Delete')), __('Are you sure you want to delete this?'));
		if (!$editing) {
			$output .= $this->Html->link('',
				array('controller' => $controller, 'action' => 'edit', $record[$model]['id']),
				array('class' => 'ajax icon-pencil', 'escape' => false, 'title' => __('Edit')));
		}
		$output .= $this->Html->link('',
			array('action' => 'move', $record[$model]['id']),
			array('class' => 'icon-resize-vertical', 'escape' => false, 'title' => __('Move')));
		if ($record[$model]['published']) {
			$output .= $this->Html->link('',
				array('controller' => $controller, 'action' => 'publish', $record[$model]['id']),
				array('class' => 'icon-eye-open', 'escape' => false, 'title' => __('UnPublish')));
		} else {
			$output .= $this->Html->link('',
				array('controller' => $controller, 'action' => 'publish', $record[$model]['id']),
				array('class' => 'icon-eye-close', 'escape' => false, 'title' => __('Publish')));
		}
		return $output;
	}
}