<h1><?php echo h($post['Post']['title']); ?></h1>

<small>Created: <?php echo $post['Post']['created']; ?></small>
<p><small>Theme: <?php echo $post['Theme']['theme_name']; ?></small></p>
<p><small>Author: <?php echo $username[0]['User']['username']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>
<br>
<p><?php echo $this->Html->link('Voltar', array('controller' => 'posts', 'action' => 'index')); ?></p>
<br>
<h1>Comments</h1>
<?php foreach ($comments as $comment): ?>
<div class='comment'>
	<p><small>User: <?php echo $comment['User']['username']; ?></small></p>
	<p><?php echo $comment['Comment']['text'] ?></p>
	<small>Date: <?php echo $comment['Comment']['created']; ?></small>
</div>
<?php endforeach; ?>
<style type="text/css">
	.comment{
		width: 800px;
		border: 2px solid silver;
		padding: 25px;
		margin: 5px;
	}
</style>