<h2>Register</h2>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('name');
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	//echo $this->Form->input('confirmpassword');
	echo $this->Form->input('subdomain');
	echo $this->Form->end('Register');
?>