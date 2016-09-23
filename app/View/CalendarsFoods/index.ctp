<div class="calendarsFoods index">
	<h2><?php echo __('Calendars Foods'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('food_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($calendarsFoods as $calendarsFood): ?>
	<tr>
		<td><?php echo h($calendarsFood['CalendarsFood']['id']); ?>&nbsp;</td>
		<td><?php echo h($calendarsFood['CalendarsFood']['date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($calendarsFood['Food']['name'], array('controller' => 'foods', 'action' => 'view', $calendarsFood['Food']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $calendarsFood['CalendarsFood']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calendarsFood['CalendarsFood']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calendarsFood['CalendarsFood']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $calendarsFood['CalendarsFood']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Calendars Food'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
	</ul>
</div>
