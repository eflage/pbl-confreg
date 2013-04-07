<!-- File: /app/views/registrations/reg_summary.ctp -->

<h1><?php echo $event['Event']['name']; ?> Event Registrations</h1>
<table>
    <tr>
			<th>Contact</th>
			<th>Chapter</th>           
            <th>Competitive Event 1</th>
            <th>Competitive Event 2</th>
            <th>Competitive Event 3</th>
			<th>Chapter Event</th>
			<th>Officer Candiate?</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->    
    <?php foreach ($registrations as $registration): ?> 
    <tr>   
			<td>            
            	<?php echo $this->Html->link($registration['Contact']['fname'].' '.$registration['Contact']['lname'], array('controller' => 'contacts', 'action' => 'view', $registration['Registration']['contact_id'])); ?>        
            </td> 
			<td>
				<?php echo $this->Html->link($registration['Contact']['Chapter']['school_name'], array('controller' => 'chapters', 'action' => 'view', $registration['Contact']['chapter_id'])); ?>
            
			<td>
				<?php echo $registration['CompEvent1']['name'].' ('.substr($registration['CompEvent1']['type'],0,1).')'; ?>
			</td>
			<td>
				<?php echo $registration['CompEvent2']['name'].' ('.substr($registration['CompEvent2']['type'],0,1).')'; ?>
			</td>   
            <td>
				<?php echo $registration['CompEvent3']['name'].' ('.substr($registration['CompEvent3']['type'],0,1).')'; ?>
			</td>
			<td>
				<?php echo $registration['ChapterEvent']['name']; ?>
			</td>
			<td>
			    <input type="checkbox" selected='<?php echo $registration['Registration']['state_officer_candidate']; ?>' disabled>
			</td>
            <td>            
            	<?php echo $this->Html->link('Edit', array('controller' => 'registrations', 'action' => 'edit', $registration['Registration']['id'])); ?>
            </td>
     </tr>    
     <?php endforeach; ?> 
     
</table>