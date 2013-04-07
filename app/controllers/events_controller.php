<?php
class EventsController extends AppController {
	var $helpers = array ('Html','Form','Time','Text','Session','Krumo');
    var $name = 'Events';
    function index() {
        $this->set('events', $this->Event->find('all'));
    }
    function view($id = null) {
    	$this->Event->id = $id;
    	$this->set('event', $this->Event->read());
    }
    function add() {
    	if (!empty($this->data)) {         
    	   if ($this->Event->save($this->data)) {            
    	       $this->Session->setFlash('Event has been added.');                
    	       $this->redirect(array('action' => 'index'));            
    	   }        
    	}
    }
	function edit($id=null) {
		$this->Event->id = $id;
		if (empty($this->data)) {        
			$this->data = $this->Event->read();    
		} else {        
			if ($this->Event->save($this->data)) {            
				$this->Session->setFlash('Your changes have been saved.');            
				$this->redirect(array('action' => 'index'));        
			}    
		}
	}
	function manage($state_id = null) {
		$this->Event->state_id = $state_id;
		$this->set('events', $this->Event->findAllByStateId($state_id));
	}
	
	function view_reg($id=null) {
		$this->Event->id = $id;
		$this->set('event', $this->Event->read());
		$this->loadModel('Registration');
		$this->set('registrations',$this->Registration->find('all', array('conditions' => array('Registration.event_id' => $id), 'group' => 'Registration.chapter_id')));
	}
}
?>