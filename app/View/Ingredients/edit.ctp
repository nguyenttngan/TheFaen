<div class="ingredients form">
<?php echo $this->Form->create('Ingredient'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ingredient'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ingredient.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Ingredient.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index')); ?></li>
	</ul>
</div>
