<!-- File: /app/views/registrations/add.ctp -->        
<h1>Add Event Registration</h1>
<!--<h2 style="color:red">Registration is now closed.  Please contact Ryan Steines or Marie Jeanblanc with any questions.</h2>
-->
<?php 
	echo $this->Form->create('Registration');
	echo $this->Form->input('event_id');
	echo $this->Form->input('contact_id', array('selected' => $contact_id));
	echo $this->Form->input('comp_event_1_id', array ('options' => $comp_events,'empty' => '(choose one)'));
	echo $this->Form->input('comp_event_2_id', array ('options' => $comp_events,'empty' => '(choose one)'));
	echo $this->Form->input('comp_event_3_id', array ('options' => $comp_events,'empty' => '(choose one)'));
	echo $this->Form->input('chapter_event_id', array ('options' => $chapter_events,'empty' => '(choose one)'));
	echo $this->Form->input('state_officer_candidate');
	echo $this->Form->input('Contact.chapter_id', array ('type' => 'hidden', 'value' => $chapter_id));
	echo $this->Form->end('Add Registration');
	
	print_r ($this->data['Registration']);
?>