<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $hasMany = 'Comment';
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Username required' 
			)
		),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Password required'
			)
		),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('admin', 'author')),
				'message' => 'Enter a valid role',
				'allowEmpty' => false
			)
		)
	);

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher-> hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}
?>