<div class="purchases index">
	<h2><?php echo __('Purchases'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('food_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_point'); ?></th>
			<th><?php echo $this->Paginator->sort('date_created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($purchases as $purchase): ?>
	<tr>
		<td><?php echo h($purchase['Purchase']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchase['Food']['name'], array('controller' => 'foods', 'action' => 'view', $purchase['Food']['id'])); ?>
		</td>
		<td><?php echo h($purchase['Purchase']['price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchase['User']['fullname'], array('controller' => 'users', 'action' => 'view', $purchase['User']['id'])); ?>
		</td>
		<td><?php echo h($purchase['Purchase']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($purchase['Purchase']['membership_point']); ?>&nbsp;</td>
		<td><?php echo h($purchase['Purchase']['date_created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $purchase['Purchase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $purchase['Purchase']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchase['Purchase']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchase['Purchase']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Purchase'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
