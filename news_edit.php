<?php require_once('templates/top.php');
if($_SESSION['id']){
	$database = new Database();
	$query = "SELECT*FROM forms WHERE id = ".$_SESSION['id'];
	$database->query($query);
	$row = $database->single();?>
	<a style="color:blue" href="user_news.php">Ваши новости</a><br/><?php
		}
else{
	echo "Ошибка входа";
}

if($_POST && $_SESSION){
		//echo "<pre>";
		//print_r($_FILES);
		//echo "</pre>";
		if($_FILES)
		{
			
			
			$fan = explode('.', $_FILES['files1']['name']);
				
				echo end($fan)."<br/>";
			if(end($fan) == 'jpg'|| end($fan) == 'txt' || end($fan) == 'doc' || end($fan) == 'docx' || end($fan) == 'png'){
			
				$real_name = date('y.m.d.h.i.s').'.'.end($fan);
				$dir = $_SERVER['DOCUMENT_ROOT'].'/media/uploaded/'.$_SESSION['id'].'/';
				$path = $dir.$real_name;
				if(!is_file($dir)){
					@mkdir($dir, 0777, true);
				}
				move_uploaded_file($_FILES['files1']['tmp_name'],$path);
				
			} 
			
			else
			{
				$real_name = '';
				echo "Файл не отправлен! (недопустимый формат файла)";
			}
			
			
		}
		$err = array();
		if(empty($_POST['title'])){
			$err[] = 'Не указан заголовок!';
		}
		if(empty($_POST['editor1'])){
			$err[] = 'Заполните поле "Текст"!';
		}
	if(count($err)<1){
	
		
		$database = new Database();
		$database->query("UPDATE news SET title='".$_POST['title']."', editor1='".$_POST['editor1']."', update1 = NOW() WHERE id=".$_GET['id']);
		
			$result = $database->execute();
		if($result){
			?>
		<script>
			document.location.href='user_news.php';
		</script>
		<?php
		}
	}
		else{
		print_r($err);	
		}
}

if($_GET && $_GET['id']){
	$database = new Database();
	$query = "SELECT*FROM news WHERE id = ".$_GET['id']."";
	$database->query($query);
	$result = $database->single();?>
	
	<div class="news-user"><h2>Форма редактирования новости</h2>
<form method="post" action="news_edit.php?id=<?=$_GET['id'];?>" enctype='multipart/form-data'>
<div class="form-group1">
    <label for="exampleInputTitle1">Название новости</label>
    <input type="title" class="form-control" id="exampleInputTitle1" name="title" placeholder="title" value="<?php echo $result['title'];?>"/>
  </div><br/>
    <div class="form-group1">
    <label for="exampleInputTextarea1">Текст новости</label>
   <textarea  class="ckeditor" name="editor1" placeholder="text"><?php echo $result['editor1'];?></textarea>
  </div><br/>
  <div class="form-group1">
    <label for="exampleInputFile">Прикрепить файл</label>
    <input type="file" id="exampleInputFile" name="files1" multiple="multiple">
    </div><br/>  
	<!--div class="form-group1">
    <label for="exampleInputImage">Прикрепить фотографию/Изображение</label>
    <input type="file" id="exampleInputImage">
    </div--><br/>  
   <button type="submit" class="btn btn-default">Обновить</button><br/>
</form>
</div><?php
}
?>


<?php require_once('templates/bottom.php');?>
<script type="text/javascript" src="media/ckeditor_4.5.6_standard/ckeditor/ckeditor.js"></script>
