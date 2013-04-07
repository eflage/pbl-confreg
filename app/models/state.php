<?php
class State extends AppModel {
    var $name = 'State';
	var $hasMany = array ('Chapter','Event');
}
?>