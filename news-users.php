<?php require_once('templates/top.php'); 
		
		/*if($_GET['url']){
			$file=$_GET['url'];
		}
		else{
			$file='index';
		}*/
	
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="select * from news where show_hide='show'";
	$database->query($query);
	$rows = $database->resultset();?>
	<a href="#" class="google_search" style="font-size:20px;text-decoration:underline">Найти изображения</a>
		<div id="result"></div><br/><br/><br/><?php
	 
		foreach($rows as $key=>$value)
		{
			if($value['files1']!=''){
				$pict = "<img src = '/media/uploaded/".$value['user_id']."/".$value['files1']."' class='pic'/>";
			}
			else{
				$pict = "<img src = '/media/uploaded/no_photo.jpg' class='pic'/>";
			} ?>
		
		<div class="news_item"><?php
			echo "<a href=\"one_news.php?id=".$value['id']."\">".$value['title']."</a><br/>";
			echo $value['add_date']."<br/>";
			echo $pict."<hr>";
			//echo $value['editor1'];?>
		</div> <?php
		}
			
	//print_r ($rows);
 /*  echo $rows['add_date']; 
   echo "<h2>".$rows['title']."</h2>";
   echo $rows['editor1']; */
 
?>
<?php require_once('templates/bottom.php'); 
?>
<script>
	$(function(){
		$.ajaxSetup({
			url:'google_search.php',
			type:'POST',
			beforeSend:function(){
				$('#result').html("<img src='/media/img/loader.gif'/>");
			},
			success:function(data){
				$('#result').html(data);
			},
			error:function(msg){
				$('#result').html(msg);
			},
		});
		$('.google_search').click(function(){
			$.ajax({
				data:'q=1'
		});
	});
});
</script>