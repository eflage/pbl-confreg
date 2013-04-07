<!-- File: /app/views/contacts/index.ctp -->
<h1>All Contacts</h1>
<?php echo $this->Html->link('Import contacts', array('controller' => 'contacts', 'action' => 'import')); ?>
<table>
    <tr>
            <th>Contact Name (Last, First)</th>
			<th>School</th>
			<th>Year in School</th>
			<th>Date Pd</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $contacts array, printing out contact info -->    
    <?php foreach ($contacts as $contact): ?>    
    <tr>      
            <td>            
            	<?php echo $this->Html->link($contact['Contact']['fname'].' '.$contact['Contact']['lname'], array('controller' => 'contacts', 'action' => 'view', $contact['Contact']['id'])); ?>        
            </td>
			<td><?php echo $contact['Chapter']['school_name']; ?></td>  
            <td>            
            	<?php echo $contact['Contact']['fbla_year']; ?>
            </td>
			<td>
				<?php echo $this->Time->format('m-d-Y',$contact['Contact']['date_paid']); ?>
			</td>
			<td>
				<?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['Contact']['id'])); ?>
			</td>
     </tr>    
     <?php endforeach; ?> 
     
</table>
