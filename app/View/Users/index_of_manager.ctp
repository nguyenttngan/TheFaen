<div class="users index">
    <ul>
        <li><?php echo $this->Html->link(__('Quản lý nhân viên'), array('controller'=>'users', 'action'=>'listStaff')); ?></li>
        <li><?php echo $this->Html->link(__('Quản lý đồ ăn, đồ uống'), array('controller'=>'foods', 'action'=>'index')); ?></li>
        <li><?php echo $this->Html->link(__('Quản lý chương trình khuyến mại'), array('controller'=>'events', 'action'=>'index')); ?></li>
        <li><?php echo $this->Html->link(__('Quản lý tiền'), array('controller'=>'money', 'action'=>'index')); ?></li>
        <li><?php echo $this->Html->link(__('Quản lý lịch làm việc'), array('controller'=>'staff_schedule', 'action'=>'index')); ?></li>
    </ul>
</div>