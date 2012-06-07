<h2>Register</h2>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('User.name');
	echo $this->Form->input('User.email');
	echo $this->Form->input('User.password');
	//echo $this->Form->input('confirmpassword');
	echo $this->Form->input('User.subdomain', array('after' => '<p id="subdomainExample"><span>[yourname]</span>.unfol.io</p>'));
	echo $this->Form->input('Setting.site_name');
	echo $this->Form->end('Register');
?>