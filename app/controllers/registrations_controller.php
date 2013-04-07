<?php
class RegistrationsController extends AppController {
    var $helpers = array ('Html','Form','Session','Krumo','Ajax');
    var $name = 'Registrations';
	
	// Include the RequestHandler, it makes sure the proper layout and views files are used 
    var $components = array('RequestHandler'); 
	
    function index() {
       $this->set('registrations', $this->Registration->find('all', array('order' => 'Contact.chapter_id ASC')));
		
	$this->loadModel('Event');
	$this->set('events',$this->Event->find('list',array('fields' => array('Event.id','Event.name'),'conditions' => array('Event.state_id' => '1'))));
    }
    function view($id = null) {
    	$this->Registration->id = $id;
    	$this->set('registration', $this->Registration->read());
    }
    function add($chapter_id = null, $contact_id = null, $event_id = null) {
    	
	$this->set('contact_id', $contact_id);
	$this->set('chapter_id', $chapter_id);
	$this->set('events', $this->Registration->Event->find('list', array('conditions' => array('Event.reg_end >=' => date('Y-m-d'), time()))));
	
	
		if ($chapter_id <> null)
			$this->set('contacts', $this->Registration->Contact->find('list', array( 'fields' => array('Contact.id', 'Contact.full_name'), 'conditions' => array ('Contact.chapter_id' => $chapter_id))));
		else
			$this->set('contacts', $this->Registration->Contact->find('list', array( 'fields' => array('Contact.id', 'Contact.full_name', 'Contact.chapter_id'))));
		$this->loadModel('CompEvent');
		$this->set('comp_events', $this->CompEvent->find('list', array ('fields' => array ('CompEvent.id', 'CompEvent.name','CompEvent.type'), 'conditions' => array('CompEvent.type <>' => 'Chapter'))));
		$this->set('chapter_events', $this->CompEvent->find('list', array ('fields' => array ('CompEvent.id', 'CompEvent.name'), 'conditions' => array('CompEvent.type' => 'Chapter'))));		
	    	if (!empty($this->data)) {         
	    	   if ($this->Registration->save($this->data)) { 
	    	       $this->Session->setFlash('Registration has been added.');
				if ($this->data['Contact']['chapter_id'] > 0)
					$this->redirect('/chapters/view/'.$this->data['Contact']['chapter_id']);
				else
				   	$this->redirect('/registrations');	
					
	    	   }        
	    	}

    }
	function edit($id=null, $chapter_id = null) {
		$this->Registration->id = $id;
		$this->set('chapter_id', $chapter_id);
		$this->set('events', $this->Registration->Event->find('list', array('conditions' => array('Event.reg_end >=' => date('Y-m-d'), time()))));
		$this->set('contacts', $this->Registration->Contact->find('list', array( 'fields' => array('Contact.id', 'Contact.full_name'))));
		$this->loadModel('CompEvent');
		$this->set('comp_events', $this->CompEvent->find('list', array ('fields' => array ('CompEvent.id', 'CompEvent.name','CompEvent.type'), 'conditions' => array('CompEvent.type <>' => 'Chapter'))));
		$this->set('chapter_events', $this->CompEvent->find('list', array ('fields' => array ('CompEvent.id', 'CompEvent.name'), 'conditions' => array('CompEvent.type' => 'Chapter'))));
		if (empty($this->data)) {        
			$this->data = $this->Registration->read();    
		} else {        
			if ($this->Registration->save($this->data)) {            
				$this->Session->setFlash('Your changes have been saved.');           
				$this->redirect(array('controller' => 'chapters', 'action' => 'view', $this->data['Contact']['chapter_id'])); 
				
			}    
		}
	}
	function get_by_event() {
		$this->loadModel('Registration');
		$this->set('registrations',$this->Registration->find('all', array('conditions' => array('Registration.event_id' => $this->data['event']),'order' => 'Contact.chapter_id ASC')));
		$this->render('registrations', 'ajax');	
	}
	function summary($event_id = null, $chapter_id = null) {
		$this->set('registrations', $this->Registration->find('all'));
		
		if ($event_id <> null) {
			$this->loadModel('Event');
			$this->set('event', $this->Event->findbyId($event_id));
			$this->set('registrations', $this->Registration->Event->findbyId($event_id));
		}
		
		if ($chapter_id <> null) {
			$this->loadModel('Chapter');
			$this->set('chapter', $this->Chapter->findById($chapter_id));
			$this->set('registrations', $this->Registration->find('all', array('conditions' => array('Event.id' => $event_id, 'Contact.chapter_id' => $chapter_id), 'order' => 'Contact.lname ASC')));
		} 		
	}
	function export(){
		// Stop Cake from displaying action's execution time 
        Configure::write('debug',0); 
        // Find fields needed without recursing through associated models 
		$data = $this->Registration->find('all', array('conditions' => array('Event.id' => 2), 'contain' => false));
		// Make the data available to the view (and the resulting CSV file) 
        $this->set(compact('data')); 	

	}
}
?>