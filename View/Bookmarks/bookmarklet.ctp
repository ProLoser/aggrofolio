<?php echo $this->Form->create('Bookmark', array('url' => array('url' => true)));?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('domain_only', array('type' => 'checkbox'));
		echo $this->Form->input('description');
		echo $this->Form->input('account_id', array('empty' => '-- None --'));
		echo $this->Form->input('bookmark_category_id', array('empty' => '-- Select One --'));
	?>
	<button type="submit">Submit</button>
	<button onclick="self.close()">Cancel</button>
<?php echo $this->Form->end();?>
