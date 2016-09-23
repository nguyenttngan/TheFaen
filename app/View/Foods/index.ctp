<!-- File: /app/View/Posts/index.ctp  (edit links added) -->
<?php $paginator = $this->Paginator; ?>
<h1>Food</h1>
<p><?php echo $this->Html->link("Thêm Món Mới", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($foods as $food): ?>
        <tr>
            <!-- display id -->
            <td><?php echo $food['Food']['id']; ?></td>

            <!-- display name -->
            <td>
                <?php
                echo $this->Html->link(
                    $food['Food']['name'],
                    array('action' => 'view', $food['Food']['id'])
                );
                ?>
            </td>

            <!-- display price -->
            <td>
                <?php echo $food['Food']['price']; ?>
            </td>

            <!-- display image -->
            <td>
                <img src="<?php echo $this->webroot.'upload/'.$food['Food']['image']; ?>" width="100" height="100"/>
            </td>


            <!-- display action -->
            <td>
                <!-- edit -->
                <?php
                    echo $this->Html->link(
                        'Edit', array('action' => 'edit', $food['Food']['id'])
                    );
                ?>

                <!-- delete -->
                <?php
                    echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $food['Food']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                ?>

            </td>

        </tr>
    <?php endforeach; ?>

</table>

<?php
echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
?>


