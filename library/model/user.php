<?php 

class User extends model{ 
  
  public $tablename = "user";
  public function connection() {
    return 'conf'; 
  }
  
  public function attributes() {
    return array(
		'id'=>'userId', 
		'userNama',
		'userPassword', 
		'userGroup', 
	);
  }  
}
?>