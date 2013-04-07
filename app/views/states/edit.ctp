<!-- File: /app/views/states/edit.ctp -->
<h1>Edit State Organization</h1>
<?php    
	echo $this->Form->create('State', array('action' => 'edit'));    
	echo $this->Form->input('name');
	echo $this->Form->input('abbr');
	echo $this->Form->input('key_contact_name');
	echo $this->Form->input('key_contact_phone');
	echo $this->Form->input('key_contact_email');
	echo $this->Form->end('Save State Organization');
?>