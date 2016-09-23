<div class="purchases view">
<h2><?php echo __('Purchase'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Food'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchase['Food']['name'], array('controller' => 'foods', 'action' => 'view', $purchase['Food']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchase['User']['fullname'], array('controller' => 'users', 'action' => 'view', $purchase['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Point'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['membership_point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Created'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['date_created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase'), array('action' => 'edit', $purchase['Purchase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase'), array('action' => 'delete', $purchase['Purchase']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchase['Purchase']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
