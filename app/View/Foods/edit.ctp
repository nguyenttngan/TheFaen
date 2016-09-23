<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Food</h1>
<?php
echo $this->Form->create('Food');
echo $this->Form->input('name');
echo $this->Form->input('price');
echo $this->Form->input('image',array('type'=>'file'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Food');
?>