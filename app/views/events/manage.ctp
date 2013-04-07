<!-- File: /app/views/chapters/manage.ctp -->
<h1>Event Listing by State</h1>
<table>
    <tr>
            <th>Event Name</th>
            <th>Dates</th>
            <th>Location</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $events array, printing out event info -->    
    <?php foreach ($events as $event): ?>    
    <tr>
            <td><?php echo $this->Html->link($event['Event']['name'], array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?></td>        
            <td>            
            	<?php echo $event['Event']['date_start'].' to '.$event['Event']['date_end']; ?>        
            </td>
			<td>
				<?php echo $event['Event']['location']; ?>
			</td>       
            <td>            
            	<?php echo $this->Html->link('Edit', array('controller' => 'events', 'action' => 'edit', $event['Event']['id'])); ?> | <?php echo $this->Html->link('View Registrations',array('controller' => 'registrations', 'action' => 'index', $event['Event']['id'])); ?>
            </td>
     </tr>    
     <?php endforeach; ?> 
     
</table>

<?php echo $this->Html->link('Add Event', array('controller' => 'events', 'action' => 'add')); ?>