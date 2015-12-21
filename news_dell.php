<?php require_once('config/config.php'); 
	  require_once('class/Database.php');
		
if($_GET['id']){
	$id = (int)$_GET['id'];
	$database = new Database();
	$query="SELECT * FROM news WHERE id = '$id'";
	$database->query($query);
	$value = $database->single();
		if(file_exists('media/uploaded/'.$value['user_id']."/".$value['files1']))
		{
			@unlink('media/uploaded/'.$value['user_id']."/".$value['files1']);
		}
else
{
 echo "Изображение не удалено!";
}
	$database = new Database();
	$query="DELETE FROM news WHERE id = '$id'";
	$database->query($query);

	$database->execute();
	
	header('location:cabinet.php'); 
}
		

