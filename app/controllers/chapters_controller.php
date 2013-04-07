<?php

class ChaptersController extends AppController {
	public $components = array('RequestHandler');
	var $helpers = array ('Html','Form','Time','Text','Session','Krumo','Ajax');
    var $name = 'Chapters';
    function index() {
        $this->set('chapters', $this->Chapter->find('all', array('order' => 'Chapter.school_name ASC')));
    }
    function view($id = null) {
    	$this->Chapter->id = $id;
		$this->set('chapter', $this->Chapter->read());
		
		$this->loadModel('Event');
		$this->set('events',$this->Event->find('list',array('fields' => array('Event.id','Event.name'),'conditions' => array('Event.state_id' => '1'))));
    	
    }
    function add($state_id = null) {
		$this->Chapter->state_id = $state_id;
		$this->set('states', $this->Chapter->State->find('list', array('fields' => array('State.id', 'State.name'))));
    	if (!empty($this->data)) {         
    	   if ($this->Chapter->save($this->data)) {            
    	       $this->Session->setFlash('Chaper information has been added.');                
    	       $this->redirect(array('action' => 'index'));            
    	   }        
    	}
    }
	function edit($id=null) {
		$this->Chapter->id = $id;
		$this->set('states', $this->Chapter->State->find('list', array('fields' => array('State.id', 'State.name'))));
		if (empty($this->data)) {        
			$this->data = $this->Chapter->read();    
		} else {        
			if ($this->Chapter->save($this->data)) {            
				$this->Session->setFlash('Your changes have been saved.');            
				$this->redirect(array('action' => 'index'));        
			}    
		}
	}
	function manage($state_id = null) {
		$this->Chapter->state_id = $state_id;
		$this->set('chapters', $this->Chapter->findAllByStateId($state_id));
	}
	function filter_by_event() {
		
		$this->loadModel('Registration');
		$this->set('registrations',$this->Registration->find('all', array('conditions' => array('Contact.chapter_id' => $this->data['chapter_id'], 'Registration.event_id' => $this->data['event']))));
		$this->render('registrations', 'ajax');
	}
	function login() {
		if ($this->data) {
			$results = $this->Chapter->findById($this->data['Chapter']['id']);
			if ($results) {
				$this->Session->write('chapter', $this->data['Chapter']['id']);
				$this->redirect(array('action' => 'view', $this->data['Chapter']['id']));
			} else {
				$this->set('error', true);
			}
		}
	}
	function logout()
    {
		$this->Session->delete('chapter');
		$this->redirect(array('action' => 'login'), null, true);
    }
}

?>