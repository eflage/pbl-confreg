<!-- File: /app/views/posts/add.ctp -->        
<h1>Add State Organization</h1>

<?php 
	echo $this->Form->create('State');
	echo $this->Form->input('name');
	echo $this->Form->input('abbr');
	echo $this->Form->input('key_contact_name');
	echo $this->Form->input('key_contact_phone');
	echo $this->Form->input('key_contact_email');
	echo $this->Form->end('Save State Organization');
?>