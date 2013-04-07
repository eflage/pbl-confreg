<?php

class CompEventsController extends AppController {
	var $helpers = array('Html','Form');
	var $name = 'CompEvents';

	function index() {
		$this->set('comp_events', $this->CompEvent->find('all', array('order' => array('CompEvent.name ASC'))));
	}

	//additional functions (view, edit, add, etc)
	function add() {
		if (!empty($this->data)) {         
    	   if ($this->CompEvent->save($this->data)) {            
    	       $this->Session->setFlash('Event has been added.');                
    	       $this->redirect(array('action' => 'index'));            
    	   }        
    	}
		
	}
	
	function edit($id = null) {
    	$this->CompEvent->id = $id;
		if (empty($this->data)) {        
			$this->data = $this->CompEvent->read();    
		} else {        
			if ($this->CompEvent->save($this->data)) {            
				$this->Session->setFlash('Your changes have been saved.');            
				$this->redirect(array('action' => 'index'));        
			}    
		}
    }
	function summary($event_id = null) {
		$this->loadModel('Registration');
		if ($event_id <> null) {
			$this->set('registrations', $this->Registration->findAllByEventId($event_id));
		} else {
			$this->set('registrations', $this->Registration->find('all'));
		}
		$this->set('indv_events', $this->CompEvent->find('all', array('conditions' => array('CompEvent.type' => 'Individual'), 'order' => array('CompEvent.name ASC'))));
		$this->set('team_events', $this->CompEvent->find('all', array('conditions' => array('CompEvent.type' => 'Team'), 'order' => array('CompEvent.name ASC'))));
		$this->set('chapter_events', $this->CompEvent->find('all', array('conditions' => array('CompEvent.type' => 'Chapter'), 'order' => array('CompEvent.name ASC'))));
	}
	
	
}
?>