
<h1>Edit Post</h1>
<?php
echo $this->Form->create('Theme');
echo $this->Form->input('theme_name');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Theme');
?>