<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
// $options = array('M' => 'Male', 'F' => 'Female');
// echo $this->Form->select('Theme.theme_name', $options);
echo $this->Form->input('themes');
echo $this->Form->end('Save Post');
?>