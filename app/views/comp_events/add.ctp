<!-- File: /app/views/comp_events/add.ctp -->        
<h1>Add Competitive Event</h1>
<?php
	echo $this->Form->create('CompEvent');
	echo $this->Form->input('name');
	echo $this->Form->input('type', array('options' => array('Individual'=>'Individual','Team'=>'Team','State'=>'State','Chapter'=>'Chapter')));
	echo $this->Form->end('Add Event');
?>