<!-- File: /app/views/registrations/reg_summary.ctp -->
<?php if (isset($chapter)): ?>
	<h3><?php echo $chapter['Chapter']['school_name']; ?></h3>
	<p><strong><?php echo $chapter['Chapter']['adviser_name']; ?></strong><br />
	<?php echo $chapter['Chapter']['address_line_1']; ?><br />
	<?php if ($chapter['Chapter']['address_line_2']) echo $chapter['Chapter']['address_line_2'].'<br />'; ?>
	<?php echo $chapter['Chapter']['address_city'].', '.$chapter['Chapter']['address_state'].' '.$chapter['Chapter']['zip_code']; ?><br />
	<?php echo $chapter['Chapter']['phone_number']; ?></p>
<?php endif;?>


<h2><?php echo $event['Event']['name']; ?></h2>
<h3>Registration Summary</h3>
<table style="width: 75%;">
<tr>
	<th>Student Name</th><th>Amount Due</th>
</tr>
<?php 
	foreach ($registrations as $registration) {
		print '<tr><td>'.$registration['Contact']['full_name'].'</td><td> $55.00 </td></tr>'; 
	}
?>
<tr>
	<th style="text-align:right;">Total due</th><th>$<?php print count($registrations)*55.00; ?></th>
</tr>
</table>

<p>Make checks payable to <strong>Iowa Phi Beta Lambda</strong> - mail to Ryan Steines, 320 35th Ave N, Clinton, IA 52732</p>