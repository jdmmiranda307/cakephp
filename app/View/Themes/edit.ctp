<div class="themes form">
<?php echo $this->Form->create('Theme'); ?>
    <fieldset>
        <legend><?php echo __('Edit Theme'); ?></legend>
        <?php
			echo $this->Form->input('theme_name');
			echo $this->Form->input('id', array('type' => 'hidden'));
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>