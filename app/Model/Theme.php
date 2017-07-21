<?php
class Theme extends AppModel{
	public $validate = array(
       'theme_name' => array(
           'rule' => 'notBlank'
       )
   	);
}
?>