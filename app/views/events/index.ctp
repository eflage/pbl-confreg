<!-- File: /app/views/events/index.ctp -->
<h1>All Events</h1>
<table>
    <tr>
            <th>State</th>
			<th>Event Name</th>
            <th>Dates</th>
            <th>Location</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $events array, printing out event info -->    
    <?php foreach ($events as $event): ?>    
    <tr>
            <td><?php echo $event['State']['name']; ?>
			<td><?php echo $this->Html->link($event['Event']['name'], array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?></td>        
            <td>            
            	<?php echo $this->Time->format('D, M d',$event['Event']['date_start']).' to '.$this->Time->format('D, M d, Y',$event['Event']['date_end']); ?>  
            </td>
			<td>
				<?php echo $event['Event']['location']; ?>
			</td>       
            <td>            
            	<?php echo $this->Html->link('Edit', array('controller' => 'events', 'action' => 'edit', $event['Event']['id'])); ?> | <?php echo $this->Html->link('View Registrations',array('controller' => 'events', 'action' => 'view_reg', $event['Event']['id'])); ?>
            </td>
     </tr>    
     <?php endforeach; ?> 
     
</table>

<?php echo $this->Html->link('Add Event', array('controller' => 'events', 'action' => 'add')); ?>