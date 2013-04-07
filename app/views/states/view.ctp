<!-- File: /app/views/states/view.ctp -->

<h1><?php echo $state['State']['name'].' ('.$state['State']['abbr'].')'; ?></h1>

<h3>Key Contact:</h3>
<p><?php echo $state['State']['key_contact_name']; ?></p>
<p><?php echo $this->Html->link($state['State']['key_contact_email'],'mailto:'.$state['State']['key_contact_email']); ?></p>
<p><?php echo $state['State']['key_contact_phone']; ?></p>

<h3>Actions</h3>
<?php echo $this->Html->link('Edit', array('controller' => 'states', 'action' => 'edit', $state['State']['id'])); ?> | <?php echo $this->Html->link('Manage Chapters (Add/Edit)',array('controller' => 'chapters', 'action' => 'manage', $state['State']['id'])); ?> | <?php echo $this->Html->link('Manage Events (Add/Edit)',array('controller' => 'events', 'action' => 'manage', $state['State']['id'])); ?>