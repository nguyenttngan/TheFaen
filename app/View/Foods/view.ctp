<h1><?php echo h($food['Food']['name']); ?></h1>

<p><small>Price: <?php echo $food['Food']['price']; ?></small></p>

<p><?php
    $upload_dir = 'http://localhost/ISD_PROJECT/cakephp/app/webroot/upload/'. $food['Food']['image'];
    echo "<img src='$upload_dir' alt='menu' width='200' height='200' />";
    ?>
</p>

<?php echo $this->Html->link(
    'Thêm Món Mới',
    array('controller' => 'foods', 'action' => 'add')
); ?>