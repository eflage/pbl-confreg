<!-- File: /app/views/registrations/edit.ctp -->
<h1>Edit Registration</h1>
<!--<h2 style="color:red">Registration is now closed.  Please contact Erich Heneke with any questions.</h2>
-->
<?php
	echo $this->Form->create('Registration', array('action' => 'edit'));    
	echo $this->Form->input('event_id');
	echo $this->Form->input('contact_id', array ('selected' => $this->data['Registration']['contact_id']));
	echo $this->Form->input('comp_event_1_id', array ('options' => $comp_events, 'selected' => $this->data['Registration']['comp_event_1_id'],'empty' => '(choose one)'));
	echo $this->Form->input('comp_event_2_id', array ('options' => $comp_events, 'selected' => $this->data['Registration']['comp_event_2_id'],'empty' => '(choose one)'));
	echo $this->Form->input('comp_event_3_id', array ('options' => $comp_events, 'selected' => $this->data['Registration']['comp_event_3_id'],'empty' => '(choose one)'));
	echo $this->Form->input('chapter_event_id', array ('options' => $chapter_events,'empty' => '(choose one)'));
	echo $this->Form->input('state_officer_candidate');
	echo $this->Form->input('Contact.chapter_id', array ('type' => 'hidden', 'value' => $chapter_id));
	echo $this->Form->end('Update Registration');
?>