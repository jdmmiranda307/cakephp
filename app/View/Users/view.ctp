<small>ID <?php echo h($user['User']['id']); ?></small>

<p><h1>Username: <?php echo $user['User']['username']; ?></h1></p>

<p>Created in: <?php echo $user['User']['created']; ?></p>
<br>
<p><?php echo $this->Html->link('Voltar', array('controller' => 'users', 'action' => 'index')); ?></p>