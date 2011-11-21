<header>
	<h2>Admin Login</h2>
</header>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('email');
    echo $this->Form->input('password');
	echo $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => 'Remember Me?'));
    echo $this->Form->end('Login');
?>
