<?php
class Comment extends AppModel{
  public $belongsTo = array(
      'Post',
      'User'
    );

	public $validate = array(
       'text' => array(
           'rule' => 'notBlank'
       )
   	);

   	public function isOwnedBy($comment, $user) {
   		return $this->field('id', array('id' => $comment, 'user_id' => $user)) !== false;
   	}
}
?>