<!-- File: /app/views/chapters/add.ctp -->        
<h1>Add Chapter</h1>
<?php
	echo $this->Form->create('Chapter');
	echo $this->Form->input('id', array ('type' => 'text'));
	echo $this->Form->input('school_name');
	echo $this->Form->input('address_line_1');
	echo $this->Form->input('address_line_2');
	echo $this->Form->input('address_city');
	echo $this->Form->input('address_state');
	echo $this->Form->input('zip_code');
	echo $this->Form->input('phone_number');
	echo $this->Form->input('fax_number');
	echo $this->Form->input('adviser_name');
	echo $this->Form->input('adviser_email');
	echo $this->Form->input('state_id');
	echo $this->Form->end('Save Chapter');
?>