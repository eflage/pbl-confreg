<!-- File: /app/views/chapters/registrations.ctp -->    
<table>
    <tr>
            <th>Event</th>
            <th>Attendee</th>
            <th width="15%">Competitive Event 1</th>
            <th width="15%">Competitive Event 2</th>
            <th width="15%">Competitive Event 3</th>
			<th width="15%">Chapter Event</th>
			<th>Officer Candiate?</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->    
    <?php foreach ($registrations as $registration): ?>    
    <tr>
            <td><?php echo $registration['Event']['name']; ?></td>        
            <td>            
            	<?php echo $this->Html->link($registration['Contact']['full_name'], array('controller' => 'contacts', 'action' => 'view', $registration['Registration']['contact_id'])); if ($registration['Contact']['email'] == '') echo '<span style="color:red">*</span>'; ?>        
            </td> 
			<td>
				<?php if($registration['CompEvent1']['name'] != '') {echo $registration['CompEvent1']['name'].' ('.substr($registration['CompEvent1']['type'],0,1).')'; } else { echo '--'; }  ?>
			</td>
			<td>
				<?php if($registration['CompEvent2']['name'] != '') {echo $registration['CompEvent2']['name'].' ('.substr($registration['CompEvent2']['type'],0,1).')'; } else { echo '--'; } ?>
			</td>
			<td>
				<?php if($registration['CompEvent3']['name'] != '') {echo $registration['CompEvent3']['name'].' ('.substr($registration['CompEvent3']['type'],0,1).')'; } else { echo '--'; } ?>
			</td> 
			<td>
				<?php if($registration['ChapterEvent']['name'] != '') {echo $registration['ChapterEvent']['name']; } else { echo '--'; } ?>
			</td>      
			<td>
			    <input type="checkbox" selected='<?php echo $registration['Registration']['state_officer_candidate']; ?>' disabled>
			</td> 
            <td>            
            	<?php if ($registration['Event']['reg_end'] > date('Y-m-d')) { echo  $this->Html->link('Edit', array('controller' => 'registrations', 'action' => 'edit', $registration['Registration']['id'],$registration['Contact']['chapter_id'])); }?>
            </td>
     </tr>    
     <?php endforeach; ?> 
     
</table>