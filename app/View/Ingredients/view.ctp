<div class="ingredients view">
<h2><?php echo __('Ingredient'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cost'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Bought'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['date_bought']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ingredient'), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ingredient'), array('action' => 'delete', $ingredient['Ingredient']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ingredient['Ingredient']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('action' => 'add')); ?> </li>
	</ul>
</div>
