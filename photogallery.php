<?php require_once('templates/top.php'); 
	
if($_GET && $_GET['id'])
{
				
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="select * from news where id=".$_GET['id'];
	$database->query($query);
	$value = $database->single();
	 ?>	<div class="photo_list">
	 <?php
			echo "<h3 style=\"color:blue\">".$value['title']."</h3><br/>";
			
			
				//for($i = 0; $i < count($arrayStr); $i++){
				$arrayStr = strtok($value['files1'], ";");
				do{
					
					if($arrayStr!=''){
						$pict = "<img src = '/media/uploaded/".$value['user_id']."/".$arrayStr."' class='pic' data_id='".$value['id']."' />";
						$arrayStr = strtok(";");
					}
					else{
						$pict = "<img src = '/media/uploaded/no_photo.jpg' class='pic'/>";
					}
				
					echo $pict."<br/><br/>";				
				}while($arrayStr)
		
			?>
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
<script type="text/javascript" src="media/js/gallery.js"></script>