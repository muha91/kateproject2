<?php require_once('templates/top.php'); 
		
		/*if($_GET['url']){
			$file=$_GET['url'];
		}
		else{
			$file='index';
		}*/
	
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="select * from news order by id";
	$database->query($query);
	$rows = $database->resultset();
	 
		foreach($rows as $key=>$value)
		{
			if($value['files1']!=''){
				$pict = "<img src = '/media/uploaded/".$value['user_id']."/".$value['files1']."' class='pic'/>";
			}
			else{
				$pict = "<img src = '/media/uploaded/no_photo.jpg' class='pic'/>";
			} ?>
			
		<div class="one_news"><?php
			echo $pict;
			echo $value['add_date'];
			echo "<h4>".$value['title']."</h4>";
			echo $value['editor1'];?>
		</div> <?php
		}
			
	//print_r ($rows);
 /*  echo $rows['add_date']; 
   echo "<h2>".$rows['title']."</h2>";
   echo $rows['editor1']; */
 
?>
<?php require_once('templates/bottom.php'); 
?>