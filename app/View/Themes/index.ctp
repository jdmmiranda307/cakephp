<h1>Blog Themes</h1>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
<?php echo $this->Html->link('Posts', array('controller' => 'posts', 'action' => 'index')); ?>
&nbsp
<?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?>
&nbsp
<?php echo $this->Html->link('Themes', array('controller' => 'themes', 'action' => 'index')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($themes as $theme): ?>
	    <tr>
	        <td><?php echo $theme['Theme']['id']; ?></td>
	        <td>
	            <?php 
	            	echo $this->Html->link(
	            		$theme['Theme']['theme_name'],
						array('action' => 'view', $theme['Theme']['id'])
					);
				?>
	        </td>
	        <td>
	        	<?php
	        		echo $this->Form->postLink(
	        			'Delete',
	        			array('action' => 'delete', $theme['Theme']['id']),
	        			array('confirm' => 'Are you sure?')
	        		);
	        	?>
	     		&nbsp
	            <?php
	            	echo $this->Html->link(
	            		'Edit',
						array('action' => 'edit', $theme['Theme']['id'])
					);
				?>
	        </td>
	    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Html->link('Add Theme', array('controller' => 'themes', 'action' => 'add')); ?>