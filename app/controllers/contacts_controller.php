<?php
class ContactsController extends AppController {
    var $helpers = array ('Html','Form','Time');
    var $name = 'Contacts';
    function index() {
        $this->set('contacts', $this->Contact->find('all', array('conditions' => array('Contact.last_active_year' => '2011'))));
    }
    function view($id = null) {
    	$this->Contact->id = $id;
    	$this->set('contact', $this->Contact->read());
    }
    function add() {
		$this->set('chapters', $this->Contact->Chapter->find('list', array('fields' => array('Chapter.id', 'Chapter.school_name'))));
    	if (!empty($this->data)) {         
    	   if ($this->Contact->save($this->data)) {            
    	       $this->Session->setFlash('Contact has been added.');                
    	       $this->redirect(array('action' => 'index'));            
    	   }        
    	}
    }
	function edit($id=null) {
		$this->Contact->id = $id;
		$this->set('chapters', $this->Contact->Chapter->find('list', array('fields' => array('Chapter.id', 'Chapter.school_name'))));
		if (empty($this->data)) {        
			$this->data = $this->Contact->read();    
		} else {        
			if ($this->Contact->save($this->data)) {            
				$this->Session->setFlash('Your changes have been saved.');            
				$this->redirect(array('controller' => 'chapters', 'action' => 'view', $this->data['Contact']['chapter_id']));        
			}    
		}
	}
	function manage($state_id = null) {
		$this->Chapter->chapter_id = $chapter_id;
		$this->set('contacts', $this->Contact->findAllByChapterId($chapter_id));
	}
	function import() {
		if (!empty($this->data)) {
			$tmpName = $this->data['Contacts']['File']['tmp_name'];
			$this->Contact->query("TRUNCATE TABLE `contacts_load`");
			$this->Contact->query("LOAD DATA LOCAL INFILE '$tmpName' REPLACE INTO TABLE `contacts_load` FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\\r\\n'");
			$this->Contact->query("INSERT INTO `contacts` (ind_id,fname,lname,chapter_id,member_type,fbla_year,fbla_office,last_active_year,date_paid) SELECT * FROM `contacts_load` ON DUPLICATE KEY UPDATE fbla_year=contacts_load.fbla_year, fbla_office=contacts_load.fbla_office, last_active_year=contacts_load.last_active_year, date_paid=contacts_load.date_paid");
			$this->Session->setFlash('Contacts loaded successfully.');
			$this->redirect(array('controller' => 'contacts', 'action' => 'index'));
		}
	}
}
?>