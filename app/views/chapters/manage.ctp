<!-- File: /app/views/chapters/manage.ctp -->
<h1>Chapter Listing by State</h1>
<table>
    <tr>
            <th>Chapter Number</th>
            <th>School</th>
            <th>Adviser</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->    
    <?php foreach ($chapters as $chapter): ?>    
    <tr>
            <td><?php echo $chapter['Chapter']['id']; ?></td>        
            <td>            
            	<?php echo $this->Html->link($chapter['Chapter']['school_name'], array('controller' => 'chapters', 'action' => 'view', $chapter['Chapter']['id'])); ?>        
            </td>        
            <td>            
            	<?php echo $chapter['Chapter']['adviser_name']; ?>
            </td>
			<td>
				<?php echo $this->Html->link('Edit', array('controller' => 'chapters', 'action' => 'edit')); ?>
     </tr>    
     <?php endforeach; ?> 
     
</table>

<?php echo $this->Html->link('Add Chapter', array('controller' => 'chapters', 'action' => 'add', $chapter['Chapter']['state_id'])); ?>