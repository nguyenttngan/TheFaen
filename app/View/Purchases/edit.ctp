<div class="purchases form">
<?php echo $this->Form->create('Purchase'); ?>
	<fieldset>
		<legend><?php echo __('Edit Purchase'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('food_id');
		echo $this->Form->input('price');
		echo $this->Form->input('user_id');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('membership_point');
		echo $this->Form->input('date_created');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Purchase.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Purchase.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
