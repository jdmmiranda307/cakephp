<small>ID <?php echo h($theme['Theme']['id']); ?></small>

<p><h1>Theme: <?php echo $theme['Theme']['theme_name']; ?></h1></p>

<br>
<p><?php echo $this->Html->link('Voltar', array('controller' => 'themes', 'action' => 'index')); ?></p>