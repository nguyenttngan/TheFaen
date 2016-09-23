<h1><?php echo h($event['Event']['name']); ?></h1>

<p><small>Price: <?php echo $event['Event']['body']; ?></small></p>

<p><small>Started_date: <?php echo h($event['Event']['started_date']); ?></small></p>

<p><small>End_date: <?php echo h($event['Event']['end_date']); ?></small></p>

<?php echo $this->Html->link(
    'Add Event',
    array('controller' => 'events', 'action' => 'add')
); ?>