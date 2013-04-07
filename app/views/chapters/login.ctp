<!-- File: /app/views/chapters/login.ctp -->
<h1>Chapter Login</h1>

<?php
	echo $this->Form->create('Chapter', array('action' => 'login'));    
	echo $this->Form->input('id', array('type' => 'text'));
	echo $this->Form->end('Login');
?>