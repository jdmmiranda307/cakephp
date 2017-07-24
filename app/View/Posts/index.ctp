<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
<?php echo $this->Html->link('Posts', array('controller' => 'posts', 'action' => 'index')); ?>
&nbsp
<?php 
	if ($userRole === 'admin') {
		 echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'));
		 echo '&nbsp&nbsp';
		 echo $this->Html->link('Themes', array('controller' => 'themes', 'action' => 'index'));
		}
	?>
<table>
    <tr>
        <th>Title</th>
        <th>Theme</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
	    <tr>
	        <td>
	            <?php 
	            	echo $this->Html->link(
	            		$post['Post']['title'],
						array('action' => 'view', $post['Post']['id'])
					);
				?>
	        </td>
	        <td><?php echo $post['Theme']['theme_name']; ?></td>
	        <td>
	        	<?php
	        		echo $this->Form->postLink(
	        			'Delete',
	        			array('action' => 'delete', $post['Post']['id']),
	        			array('confirm' => 'Are you sure?')
	        		);
	        	?>
	     		&nbsp
	            <?php
	            	echo $this->Html->link(
	            		'Edit',
						array('action' => 'edit', $post['Post']['id'])
					);
				?>
	        </td>
	        <td>
	        	<?php echo $post['Post']['created']; ?>
	        </td>
	    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>