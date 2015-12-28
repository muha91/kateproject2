<?php require_once('templates/top.php'); 
		
		/*if($_GET['url']){
			$file=$_GET['url'];
		}
		else{
			$file='index';
		}*/
	
	$database = new Database();
	//mysql_set_charset('utf8');
	$query="select * from news where user_id=".$_SESSION['id'];
	$database->query($query);
	$rows = $database->resultset();?>

	 <table class="table table-bordered">
	 <tr>
	 <th>Фото</th>
	 <th>Название</th>
	 <th>Действия</th>
	 </tr><?php
	foreach($rows as $key=>$value)
		{
			if($value['show_hide']=='show'){
				$showhide = "<a href='hide.php?id=".$value['id']."' class='link_for_hide' style='color:red'>Скрыть</a>";
			}else{
				$showhide = "<a href='show.php?id=".$value['id']."' class='link_for_show' style='color:blue'>Отобразить</a>";
			}
			if($value['files1']!=''){
				$filename = strtok($value['files1'], ";");
				if ($filename === false) {
					$filename = $value['files1'];
				} 
				$pict = "<img src = '/media/uploaded/".$value['user_id']."/".$filename."' class='pic' data_id='".$value['id']."' />";
			}
			else{
				$pict = "<img src = '/media/uploaded/no_photo.jpg' class='pic'/>";
			} 
			?>
			<tr>
			<td><?php echo $pict?></td>
			<td><?php echo "<a href=\"one_news.php?id=".$value['id']."\">".$value['title']."</a><br/>";?></td>
			<td><a href="news_dell.php?id=<?=$value['id'];?>" class="btn btn-default btn-block dell"  data_url="news_dell.php?id=<?=$value['id'];?>">Удалить</a>
				<a href="news_edit.php?id=<?=$value['id'];?>" class="btn btn-default btn-block" data_url="news_dell.php?id=<?=$value['id'];?>">Редактировать</a>
				<?php echo "<div class=\"btn btn-default btn-block\">".$showhide."</div>"; ?>
			</td>
			<!--td>Скрыть</td>
			<td>Удалить</td-->
			</tr>
	 
		
			
		<!--div class="news_list"-->
		<!--?php
			echo "<a href=\"one_news.php?id=".$value['id']."\">".$value['title']."</a><br/>";
			echo $pict; 
			echo $value['add_date']."<br/><hr>";
			//echo $value['editor1'];?-->
		<!--/div--><?php
		}?>
		</table>	

<?php require_once('templates/bottom.php');?>
<script type="text/javascript" src="media/js/cabinet.js"></script>
<script type="text/javascript" src="media/js/gallery.js"></script>