<?php
class DB {
var $user = 'root';
var $password = 'root';
var $db;
public function db(){
try {
$this->db = new PDO('mysql:host=localhost;port=3307;dbname=kateproject',$this->user,$this->password);
return $this->db;
} catch (PDOException $e){
echo $e->getMessage();
}
}
//define('USER', 'root');
//define('PASSWORD', '');


}
?>