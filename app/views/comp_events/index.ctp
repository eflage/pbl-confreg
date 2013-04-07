<!-- File: /app/views/comp_events/index.ctp -->
<h1>Competitive Events</h1>
<table>
    <tr>
            <th>Name</th>
            <th>Type</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->    
    <?php foreach ($comp_events as $comp_event): ?>    
    <tr>
            <td><?php echo $comp_event['CompEvent']['name']; ?></td>        
            <td>            
      			<?php echo $comp_event['CompEvent']['type']; ?>
            </td>        
            <td>            
            	<?php echo $this->Html->link('Edit', array('controller' => 'comp_events', 'action' => 'edit', $comp_event['CompEvent']['id'])); ?>
            </td>
     </tr>    
     <?php endforeach; ?> 
     
</table>

<?php echo $this->Html->link('Add Competitive Event', array('controller' => 'comp_events', 'action' => 'add')); ?>