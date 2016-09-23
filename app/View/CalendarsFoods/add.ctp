<div class="calendarsFoods form">
<?php echo $this->Form->create('CalendarsFood'); ?>
	<fieldset>
		<legend><?php echo __('Add Calendars Food'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('food_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Calendars Foods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
	</ul>
</div>
