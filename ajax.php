<?php require_once('config/config.php');
	require_once('class/Database.php');
	/*print_r($_POST);*/
	$id = (int)$_POST['id'];
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="select * from news where id=".$_POST['id'];
	$database->query($query);
	//echo $query;
	$rows = $database->single();
	if($rows['files1']!=''){
				$filename = strtok($rows['files1'], ";");
				if ($filename === false) {
					$filename = $rows['files1'];
				} 
				$pict = "<img src = '/media/uploaded/".$rows['user_id']."/".$filename."' class='pic'/>";
			}
			else{
				$pict = "<img src = '/media/uploaded/no_photo.jpg' class='pic'/>";
			} 
	echo "<h3 style=\"color:#2E2B57\">".$rows['title']."</h3><br/>";
	echo $pict."<br/>";
	echo $rows['editor1'];
	
