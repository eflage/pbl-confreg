<!-- File: /app/views/contacts/index.ctp -->
<h1>Import Contacts</h1>
<?php
	echo $form->create('Contacts', array('action' => 'import', 'type' => 'file'));
	echo $form->file('File');
	echo $form->submit('Import contacts');
    echo $form->end();
?>