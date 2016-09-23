<div class="ingredients form">
<?php echo $this->Form->create('Ingredient'); ?>
	<fieldset>
		<legend><?php echo __('Add Ingredient'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('quantity');
		echo $this->Form->input('cost');
		echo $this->Form->input('date_bought');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index')); ?></li>
	</ul>
</div>
