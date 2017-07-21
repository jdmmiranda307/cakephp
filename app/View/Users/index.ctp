<h1>Blog Users</h1>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
<?php echo $this->Html->link('Posts', array('controller' => 'posts', 'action' => 'index')); ?>
&nbsp
<?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?>
&nbsp
<?php echo $this->Html->link('Themes', array('controller' => 'themes', 'action' => 'index')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

    <?php foreach ($users as $user): ?>
	    <tr>
	        <td><?php echo $user['User']['id']; ?></td>
	        <td>
	            <?php 
	            	echo $this->Html->link(
	            		$user['User']['username'],
						array('action' => 'view', $user['User']['id'])
					);
				?>
	        </td>
	        <td><?php echo $user['User']['role']; ?></td>
	        <td>
	        	<?php
	        		echo $this->Form->postLink(
	        			'Delete',
	        			array('action' => 'delete', $user['User']['id']),
	        			array('confirm' => 'Are you sure?')
	        		);
	        	?>
	     		&nbsp
	            <?php
	            	echo $this->Html->link(
	            		'Edit',
						array('action' => 'edit', $user['User']['id'])
					);
				?>
	        </td>
	        <td>
	        	<?php echo $user['User']['created']; ?>
	        </td>
	    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add')); ?>