
<!-- File: /app/View/Event/add.ctp -->

<h1>Add Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('name', array('required'=>'required'));
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('started_date');
echo $this->Form->input('end_date');
echo $this->Form->end('Save Event');
?>