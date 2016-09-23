<div class="users view">
    <h2><?php echo __('Manager'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fullname'); ?></dt>
        <dd>
            <?php echo h($user['User']['fullname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Password'); ?></dt>
        <dd>
            <?php echo h($user['User']['password']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Dob'); ?></dt>
        <dd>
            <?php echo h($user['User']['dob']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Phone Number'); ?></dt>
        <dd>
            <?php echo h($user['User']['phone_number']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Address'); ?></dt>
        <dd>
            <?php echo h($user['User']['address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Role'); ?></dt>
        <dd>
            <?php echo h($user['User']['role']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($user['User']['created']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Manager'), array('action' => 'listManager')); ?> </li>
        <li><?php echo $this->Html->link(__('List Staff'), array('action' => 'indexOfManager')); ?> </li>
        <li><?php echo $this->Html->link(__('New Manager'), array('action' => 'addManager')); ?> </li>
    </ul>
</div>
