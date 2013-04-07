<!-- File: /app/views/contacts/edit.ctp -->
<h1>Edit Contact</h1>
<?php    
	echo $this->Form->create('Contact', array('action' => 'edit'));    
	echo $this->Form->input('fname', array('label' => 'First Name'));
	echo $this->Form->input('lname', array('label' => 'Last Name'));
	echo $this->Form->input('email', array('type' => 'text'));
	echo $this->Form->input('chapter_id', array('disabled' => true));
	echo $this->Form->input('member_type');
	echo $this->Form->input('fbla_year',array('label' => 'PBL Year'));
	echo $this->Form->input('fbla_office',array('label' => 'PBL Office'));
	echo $this->Form->input('last_active_year');
	echo $this->Form->input('date_paid');
	echo $this->Form->submit('Save Changes', array('div' => false, 'before' => '<div class="submit">'));
	echo $this->Form->button('Cancel', array('type' => 'button', 'onClick' => 'window.history.back()', 'after' => '</div>'));
	echo $this->Form->end();

?>