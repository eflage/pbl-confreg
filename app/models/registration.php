<?php

class Registration extends AppModel {
	var $name = 'Registration';
	var $belongsTo = array('Event','Contact',
	   'CompEvent1' => array (
		  'className' => 'CompEvent',
		  'foreignKey' => 'comp_event_1_id'
		),
	   'CompEvent2' => array (
		  'className' => 'CompEvent',
		  'foreignKey' => 'comp_event_2_id'
		),
	   'CompEvent3' => array (
		  'className' => 'CompEvent',
		  'foreignKey' => 'comp_event_3_id'
		),
	   'ChapterEvent' => array (
		  'className' => 'CompEvent',
		  'foreignKey' => 'chapter_event_id'
		)
	);
	var $recursive = 2;
}

?>