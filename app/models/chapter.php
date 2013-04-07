<?php
class Chapter extends AppModel {
    var $name = 'Chapter';
	var $belongsTo = 'State';
	var $hasMany = 'Contact';
	var $exists = 'false';
}
?>