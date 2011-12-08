<?php echo $this->Form->create('Bookmark', array('url' => array('url' => true)));?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('domain_only', array('type' => 'checkbox'));
		echo $this->Form->input('description');
		echo $this->Form->input('account_id', array('empty' => '-- None --'));
		echo $this->Form->input('bookmark_category_id', array('empty' => '-- Select One --'));
		echo $this->Form->button('Submit', array('type' => 'submit', 'label' => false));
		echo $this->Form->button('Cancel', array('label' => false, 'onclick' => 'self.close()'));
	?>
<?php echo $this->Form->end();?>