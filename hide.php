<?php require_once('config/config.php'); 
	  require_once('class/Database.php');
		
		/*if($_GET['url']){
			$file=$_GET['url'];
		}
		else{
			$file='index';
		}*/
	
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="UPDATE news SET show_hide='hide' WHERE id=".$_GET['id'];
	$database->query($query);
	$rows = $database->execute();
	header('location:user_news.php');
	 
	 
	//print_r ($rows);
 /*  echo $rows['add_date']; 
   echo "<h2>".$rows['title']."</h2>";
   echo $rows['editor1']; */
 
