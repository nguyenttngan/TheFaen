<div class="calendarsFoods view">
<h2><?php echo __('Calendars Food'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarsFood['CalendarsFood']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($calendarsFood['CalendarsFood']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Food'); ?></dt>
		<dd>
			<?php echo $this->Html->link($calendarsFood['Food']['name'], array('controller' => 'foods', 'action' => 'view', $calendarsFood['Food']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendars Food'), array('action' => 'edit', $calendarsFood['CalendarsFood']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendars Food'), array('action' => 'delete', $calendarsFood['CalendarsFood']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $calendarsFood['CalendarsFood']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendars Foods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendars Food'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
	</ul>
</div>
