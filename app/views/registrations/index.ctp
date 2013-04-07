<!-- File: /app/views/registrations/index.ctp -->
<h1>Event Registrations</h1>

<?php echo $this->Html->link('Add Registration', array('controller' => 'registrations', 'action' => 'add')); ?>

<?php
	echo $ajax->form('get_by_event', 'post', array('update' => 'registrations'));
	echo $this->Form->input('event', array('options' => $events, 'empty' => '(select an event)'));
	echo $this->Form->submit('View Registrations');
	echo $this->Form->end();
?>

<div id="registrations">

</div>

