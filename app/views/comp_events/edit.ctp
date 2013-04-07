<!-- File: /app/views/comp_events/edit.ctp -->        
<h1>Edit Competitive Event</h1>
<?php
	echo $this->Form->create('CompEvent', array('action' => 'edit'));
	echo $this->Form->input('name');
	echo $this->Form->input('type', array('options' => array('Individual'=>'Individual','Team'=>'Team','State'=>'State','Chapter'=>'Chapter'), 'selected' => $this->data['CompEvent']['type']));
	echo $this->Form->end('Update Event');
?>