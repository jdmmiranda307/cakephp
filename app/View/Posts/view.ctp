<h1><?php echo h($post['Post']['title']); ?></h1>

<small>Created: <?php echo $post['Post']['created']; ?></small>
<p><small>Theme: <?php echo $post['Theme']['theme_name']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>
<br>
<p><?php echo $this->Html->link('Voltar', array('controller' => 'posts', 'action' => 'index')); ?></p>