<header>
	<h2>Admin Login</h2>
</header>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>
