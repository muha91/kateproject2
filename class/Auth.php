<?php 

class Auth{
 var $err = array();
 var $login;
 var $email;
 var $password;
 var $password2;
 
 public function __construct($login, $email, $password, $password2){
 
 $this->login = $login;
 $this->email = $email;
 $this->password = $password;
 $this->password2 = $password2;

 
	if(empty ($login)){
	$this->err[] = 'Не введен login';
	 }
	 
	 if(empty ($email)){
	$this->err[] = 'Не введен email';
	 }
	 
	  if(empty ($password)){
	$this->err[] = 'Не введен password';
	 }
	 
	  if(empty ($password2)){
	$this->err[] = 'Повторите пароль';
	 }
	 
	 if(count($this->err)>0){
	 return false;
	 }else{
	 return true;
	 }	 
}
public function reg(){
$query = "INSERT INTO forms VALUES(Null,'".$this->email."', '".$this->login."', '".$this->password."', NOW(),NOW(),'unblock')";
return $query;
}

}