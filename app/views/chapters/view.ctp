<!-- File: /app/views/chapters/view.ctp -->
<h1>
<?php echo $chapter['Chapter']['school_name']; ?> <?php echo $this->Html->link('Edit', array('controller' => 'chapters', 'action' => 'edit', $chapter['Chapter']['id'])); ?> | <?php echo $this->Html->link('Logout', array('controller' => 'chapters', 'action' => 'logout')); ?></h1>
<p>Adviser: <?php echo $chapter['Chapter']['adviser_name']; ?></p>
<p><?php echo $this->Html->link($chapter['Chapter']['adviser_email'], 'mailto:'.$chapter['Chapter']['adviser_email']); ?> </p>

<p style="font-style:italic">*Missing email address, please update</p>
<h3>Registrations</h3>
<?php echo $this->Html->link('Add Registration', array('controller' => 'registrations', 'action' => 'add', $chapter['Chapter']['id'])); ?> 
<?php
	echo $ajax->form('filter_by_event', 'post', array('update' => 'registrations'));
	echo $this->Form->input('event', array('options' => $events, 'empty' => '(select an event)'));
	echo $this->Form->input('chapter_id', array ('type' => 'hidden', 'value' => $chapter['Chapter']['id']));
	echo $this->Form->submit('View Registrations');
	echo $this->Form->end();
?>

<div id="registrations">

</div>

<div id="roster" style="display:block;">
<h3>Chapter Roster</h3>
<?php echo $this->Html->link('Hide Roster', '#hideRoster', array('onClick' => 'document.getElementById("roster").style.display = "none"')); ?>
<table>
	<tr>
		<th>Adviser Name (Last, First) </th><th>Actions</th>
	</tr>
	
	<?php 
		function adviser($var) {
			return ($var['member_type'] == 'ADV');
		}	
		foreach (array_filter($chapter['Contact'],"adviser") as $i => $contact):?>
		<tr>
			<td><?php print $this->Html->link($contact['lname'].', '.$contact['fname'], array('controller' => 'contacts', 'action' => 'view', $contact['id']));?> </td> 
			
			<td><?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['id'])); ?> | <?php echo $this->Html->link('Register', array('controller' => 'registrations', 'action' => 'add', $chapter['Chapter']['id'], $contact['id'])); ?></td>
		</tr>
	<?php endforeach; ?> 
</table>
<table>

    <tr>
            <th>Student Name (Last, First)</th>
			<th>Year in School</th>
			<th>Date Pd</th>
			<th>Actions</th>
    </tr>
    <!-- Here is where we loop through our $contacts array, printing out contact info -->    
    <?php 
		function current_member($var) {
			return ($var['last_active_year'] == '2011' && $var['member_type'] == 'PBL');
		}
			
		foreach (array_filter($chapter['Contact'], "current_member") as $i => $contact): ?>
    <tr>      
            <td>            
            	<?php echo $this->Html->link($contact['lname'].', '.$contact['fname'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); 
				if ($contact['email'] == '') echo '<span style="color:red">*</span>'; 
				?>
            </td>
            <td>            
            	<?php echo $contact['fbla_year']; ?>
            </td>
			<td>
				<?php echo $this->Time->format('m-d-Y',$contact['date_paid']); ?>
			</td>
			<td>
				<?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['id'])); ?> | <?php echo $this->Html->link('Register', array('controller' => 'registrations', 'action' => 'add', $chapter['Chapter']['id'], $contact['id'])); ?>
			</td>
     </tr>    
     <?php endforeach; ?> 
     
</table>

</div>



