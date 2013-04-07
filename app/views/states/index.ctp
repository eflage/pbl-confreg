<!-- File: /app/views/states/index.ctp -->
<h1>State Organizations</h1>
<table>
    <tr>
            <th>Id</th>
            <th>State</th>
            <th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->    
    <?php foreach ($states as $state): ?>    
    <tr>
            <td><?php echo $state['State']['id']; ?></td>        
            <td>            
            	<?php echo $this->Html->link($state['State']['name'], array('controller' => 'states', 'action' => 'view', $state['State']['id'])); ?>        
            </td>        
            <td>            
            	<?php echo $this->Html->link('Edit', array('controller' => 'states', 'action' => 'edit', $state['State']['id'])); ?> | <?php echo $this->Html->link('Manage Chapters (Add/Edit)',array('controller' => 'chapters', 'action' => 'manage', $state['State']['id'])); ?> | <?php echo $this->Html->link('Manage Events (Add/Edit)',array('controller' => 'events', 'action' => 'manage', $state['State']['id'])); ?>
            </td>
     </tr>    
     <?php endforeach; ?> 
     
</table>

<?php echo $this->Html->link('Add State Organization', array('controller' => 'states', 'action' => 'add')); ?> 