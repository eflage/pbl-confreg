<!-- File: /app/views/chapters/index.ctp -->
<h1>All Chapters</h1>
<p><em>Click on a chapter name to view details about the chapter</em></p>
<table>
    <tr>
            <th>Chapter Number</th>
            <th>School</th>
            <th>Adviser</th>
			<th>Number of Students</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->    
    <?php 
		function current_member($var) {
			return ($var['last_active_year'] == '2011');
		}
		foreach ($chapters as $chapter): 
	?>    
    <tr>
            <td><?php echo $chapter['Chapter']['id']; ?></td>        
            <td>            
            	<?php echo $this->Html->link($chapter['Chapter']['school_name'], array('controller' => 'chapters', 'action' => 'view', $chapter['Chapter']['id'])); ?>        
            </td>        
            <td>            
            	<?php echo $chapter['Chapter']['adviser_name']; ?>
            </td>
			<td>            
            	<?php echo count(array_filter($chapter['Contact'], "current_member")); ?>
            </td>
			<td>
				<?php echo $this->Html->link('Edit', array('controller' => 'chapters', 'action' => 'edit', $chapter['Chapter']['id'])); ?>
			</td>
     </tr>    
     <?php endforeach; ?> 
     
</table>

<?php echo $this->Html->link('Add Chapter', array('controller' => 'chapters', 'action' => 'add')); ?>