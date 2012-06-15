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
		$output .= '<span class="btn-group">';
		$output .= $this->Html->link('<i class="icon-trash"></i>',
			array('controller' => $controller, 'action' => 'delete', $record[$model]['id']),
			array('class' => 'btn btn-mini', 'escape' => false, 'title' => __('Delete')), __('Are you sure you want to delete this?'));
		if (!$editing) {
			$output .= $this->Html->link('<i class="icon-pencil"></i>',
				array('controller' => $controller, 'action' => 'edit', $record[$model]['id']),
				array('class' => 'ajax btn btn-mini', 'escape' => false, 'title' => __('Edit')));
		}
		$output .= $this->Html->link('<i class="icon-resize-vertical"></i>',
			array('action' => 'move', $record[$model]['id']),
			array('class' => 'btn btn-mini', 'escape' => false, 'title' => __('Move')));
		if ($record[$model]['published']) {
			$output .= $this->Html->link('<i class="icon-eye-open"></i>',
				array('controller' => $controller, 'action' => 'publish', $model, $record[$model]['id']),
				array('class' => 'btn btn-mini', 'escape' => false, 'title' => __('UnPublish')));
		} else {
			$output .= $this->Html->link('<i class="icon-eye-close"></i>',
				array('controller' => $controller, 'action' => 'publish', $model, $record[$model]['id']),
				array('class' => 'btn btn-mini', 'escape' => false, 'title' => __('Publish')));
		}
		$output .= '</span>';
		return $output;
	}
}