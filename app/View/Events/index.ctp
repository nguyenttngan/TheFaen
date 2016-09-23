<!-- File: /app/View/Events/index.ctp  (edit links added) -->

<h1>Event</h1>
<p><?php echo $this->Html->link("Add Event", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Body</th>
        <th>Started_date</th>
        <th>End_date</th>
        <th>Action</th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($events as $event): ?>
        <tr>
            <!-- display id -->
            <td><?php echo $event['Event']['id']; ?></td>

            <!-- display name -->
            <td>
                <?php
                echo $this->Html->link(
                    $event['Event']['name'],
                    array('action' => 'view', $event['Event']['id'])
                );
                ?>
            </td>

            <!--display body -->
            <td>
                <?php echo $event['Event']['body']; ?>
            </td>

            <!-- display started_date -->
            <td>
                <?php echo $event['Event']['started_date']; ?>
            </td>

            <!-- display end_date -->
            <td>
                <?php echo $event['Event']['end_date']; ?>
            </td>

            <!-- display action -->
            <td>
               <!-- edit -->
                <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $event['Event']['id'])
                );
                ?>
                <!-- delete -->
                <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $event['Event']['id']),
                    array('confirm' => 'Are you sure?')
                );
                ?>
            </td>

        </tr>
    <?php endforeach; ?>

</table>