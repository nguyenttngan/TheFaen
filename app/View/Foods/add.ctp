
<!-- File: /app/View/Food/add.ctp -->

<h1>Add Food</h1>
<?php
echo $this->Form->create('Food',array('enctype'=>"multipart/form-data"));
echo $this->Form->input('name', array('required'=>'required'));
echo $this->Form->input('price',array('required'=>'required'));
echo $this->Form->input('image', array('type'=>'file'));
echo $this->Form->end('Save Food');
?>