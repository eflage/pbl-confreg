<!-- File: /app/views/events/add.ctp -->        
<h1>Add Event</h1>

<?php 
	echo $this->Form->create('Event');
	echo $this->Form->input('name');
	echo $this->Form->input('state_id');
	echo $this->Form->input('date_start');
	echo $this->Form->input('date_end');
	echo $this->Form->input('reg_begin');
	echo $this->Form->input('reg_end');
	echo $this->Form->end('Add New Event');
?>