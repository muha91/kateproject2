<?php require_once('templates/top.php'); 
	
if($_GET && $_GET['id'])
{
				
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="select * from news where id=".$_GET['id'];
	$database->query($query);
	$value = $database->single();
	 
		
			if($value['files1']!=''){
				$filename = strtok($value['files1'], ";");
				if ($filename === false) {
					$filename = $value['files1'];
				} 
				$pict = "<img src = '/media/uploaded/".$value['user_id']."/".$filename."' class='pic'/>";
			}
			else{
				$pict = "<img src = '/media/uploaded/no_photo.jpg' class='pic'/>";
			} ?>
			
		<div class="one_news"><?php
			echo "<h3 style=\"color:#2E2B57\">".$value['title']."</h3>";
			echo $value['add_date']."<br/><br/>";?>
			<a href="photogallery.php?id=<?=$value['id'];?>"><?php echo $pict?></a><?php "<br/><br/>";
			echo $value['editor1']."<br/>";?>
		</div> <?php
		
}	
else{
	echo "Page not found!";
}
	//print_r ($rows);
 /*  echo $rows['add_date']; 
   echo "<h2>".$rows['title']."</h2>";
   echo $rows['editor1']; */
 
?>
<?php require_once('templates/bottom.php'); 
?>