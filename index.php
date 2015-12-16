<?php require_once('templates/top.php'); 
		
		if($_GET['url']){
			$file=$_GET['url'];
		}
		else{
			$file='index';
		}
	
	$database = new Database();
	//mysql_set_charset('utf8');
	$query = "select * from maintexts where url='$file'";
	$database->query($query); 
	$rows = $database->single();
	 
   echo "<h2>".$rows['name']."</h2>"; 
   echo $rows['body'];
 
?>
<?php require_once('templates/bottom.php'); 
?>