<?php

class Contact extends AppModel {
    var $name = 'Contact';
	var $belongsTo = array('Chapter');
	var $virtualFields = array(
		'full_name' => 'CONCAT(Contact.fname, " ", Contact.lname)'
	);
}
?>