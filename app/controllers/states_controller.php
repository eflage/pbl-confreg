<?php
class StatesController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'States';
    function index() {
        $this->set('states', $this->State->find('all'));
    }
    function view($id = null) {
    	$this->State->id = $id;
    	$this->set('state', $this->State->read());
    }
    function add() {
    	if (!empty($this->data)) {         
    	   if ($this->State->save($this->data)) {            
    	       $this->Session->setFlash('State has been added.');                
    	       $this->redirect(array('action' => 'index'));            
    	   }        
    	}
    }
	function edit($id=null) {
		$this->State->id = $id;
		if (empty($this->data)) {        
			$this->data = $this->State->read();    
		} else {        
			if ($this->State->save($this->data)) {            
				$this->Session->setFlash('Your changes have been saved.');            
				$this->redirect(array('action' => 'index'));        
			}    
		}
	}
}
?>