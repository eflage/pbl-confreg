<!-- File: /app/views/comp_events/summary.ctp -->

<h1>Individual Competitve Events Summary</h1>


<?php foreach ($indv_events as $indv_event): ?>

<h3><?php echo $indv_event['CompEvent']['name']; ?></h3>

<ol>
	<?php foreach ($registrations as $registration): ?>
	
		<?php if ($indv_event['CompEvent']['id'] == $registration['Registration']['comp_event_1_id'] OR $indv_event['CompEvent']['id'] == $registration['Registration']['comp_event_2_id'] OR $indv_event['CompEvent']['id'] == $registration['Registration']['comp_event_3_id']): ?>
		
			<li><?php echo $registration['Contact']['full_name'].' ('.$registration['Contact']['Chapter']['school_name'].')'; ?></li>
			
		<?php endif; ?>
	
	<?php endforeach; ?> 

</ol>

<?php endforeach; ?> 

<h1>Team Competitve Events Summary</h1>


<?php foreach ($team_events as $team_event): ?>

<h3><?php echo $team_event['CompEvent']['name']; ?></h3>

<ol>
	<?php foreach ($registrations as $registration): ?>
	
		<?php if ($team_event['CompEvent']['id'] == $registration['Registration']['comp_event_1_id'] OR $team_event['CompEvent']['id'] == $registration['Registration']['comp_event_2_id'] OR $team_event['CompEvent']['id'] == $registration['Registration']['comp_event_3_id']): ?>
		
			<li><?php echo $registration['Contact']['full_name'].' ('.$registration['Contact']['Chapter']['school_name'].')'; ?></li>
			
		<?php endif; ?>
	
	<?php endforeach; ?> 

</ol>

<?php endforeach; ?> 

<h1>Chapter Competitve Events Summary</h1>


<?php foreach ($chapter_events as $chapter_event): ?>

<h3><?php echo $chapter_event['CompEvent']['name']; ?></h3>

<ol>
	<?php foreach ($registrations as $registration): ?>
	
		<?php if ($chapter_event['CompEvent']['id'] == $registration['Registration']['chapter_event_id']): ?>
		
			<li><?php echo $registration['Contact']['full_name'].' ('.$registration['Contact']['Chapter']['school_name'].')'; ?></li>
			
		<?php endif; ?>
	
	<?php endforeach; ?> 

</ol>

<?php endforeach; ?> 
