<!-- File: /app/views/events/view.ctp -->

<h1><?php echo $event['Event']['name'].' ('.$event['State']['abbr'].')'; ?></h1>

<p>Dates: <?php echo $this->Time->format('D, M d',$event['Event']['date_start']).' to '.$this->Time->format('D, M d, Y',$event['Event']['date_end']); ?> </p>
<p>Location: <?php echo $event['Event']['location']; ?></p>
<p>Registration begins: <?php echo $event['Event']['reg_begin']; ?></p>
<p>Registration ends: <?php echo $event['Event']['reg_end']; ?></p>

<h3>Actions</h3>
<?php echo $this->Html->link('Edit', array('controller' => 'events', 'action' => 'edit', $event['Event']['id'])); ?> | <?php echo $this->Html->link('View Registrations',array('controller' => 'registrations', 'action' => 'manage', $event['Event']['id'])); ?>