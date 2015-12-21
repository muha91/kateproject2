<?php require_once('templates/top.php'); 
	
if($_GET && $_GET['id'])
{
				
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="select * from news where id=".$_GET['id'];
	$database->query($query);
	$value = $database->single();
	 
		
			if($value['files1']!=''){
				$pict = "<img src = '/media/uploaded/".$value['user_id']."/".$value['files1']."' class='pic'/>";
			}
			else{
				$pict = "<img src = '/media/uploaded/no_photo.jpg' class='pic'/>";
			} ?>
			
		<div class="one_news"><?php
			echo $value['title']."<br/>";
			echo $pict."<br/><br/>";
			echo $value['add_date']."<br/><br/>";
			echo $value['editor1'];?>
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