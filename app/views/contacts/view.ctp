<!-- File: /app/views/contacts/view.ctp -->
<h1>
<?php echo $contact['Contact']['fname'].' '.$contact['Contact']['lname']; ?></h1>
<p>Email Address: <?php if ($contact['Contact']['email'] == '') echo '<span style="color:red">Missing</span>'; else echo $contact['Contact']['email'];?></p>
<p>Member Type: <?php echo $contact['Contact']['member_type']?></p>
<p>PBL Year: <?php echo $contact['Contact']['fbla_year']?></p>
<p>PBL Office: <?php echo $contact['Contact']['fbla_office']?></p>
<p>Last Active Year: <?php echo $contact['Contact']['last_active_year']?></p>
<p>Date Paid: <?php echo $contact['Contact']['date_paid']?></p>

<?php echo $this->Html->link('Back to Chapter', array('controller' => 'chapters', 'action' => 'view', $contact['Contact']['chapter_id'])); ?> | <?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['Contact']['id'])); ?>
