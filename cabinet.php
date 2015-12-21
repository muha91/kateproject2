<?php require_once('templates/top.php');
if($_SESSION['id']){
	$database = new Database();
	$query = "SELECT*FROM forms WHERE id = ".$_SESSION['id']."";
	$database->query($query);
	$row = $database->single();?>
	<h3 style="color:blue">Информация о пользователе</h3>
	<h4 style="text-decoration:underline;color:red">Ваш e-mail:</h4><?php echo "<h5>".$row['email']."</h5>";?>
	<h4 style="text-decoration:underline;color:red">Ваш логин:</h4><?php echo "<h5>".$row['login']."</h5>";?>
	<a style="color:blue" href="user_news.php">Ваши новости</a><?php
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
				
				echo end($fan);
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
		$database->query("INSERT INTO news (user_id, title, editor1, add_date, files1) VALUES(:user_id, :title, :editor1, NOW(), :files1)");
		
		$database->bind(':user_id',$_SESSION['id']);
		$database->bind(':title',$_POST['title']);
		$database->bind(':editor1',$_POST['editor1']);
		$database->bind(':files1',$real_name);
		
			
		$result = $database->execute();
		if($result){
			echo "Новость успешно отправлена!";
		}
		else{
			echo "Новость не добавилась!!";
		}
	}
		else{
		print_r($err);	
		}
}
	
?>

<div class="news-user"><h2>Форма добавления новости</h2>
<form method="post" action="cabinet.php" enctype='multipart/form-data'>
<div class="form-group1">
    <label for="exampleInputTitle1">Название новости</label>
    <input type="title" class="form-control" id="exampleInputTitle1" name="title" placeholder="title"/>
  </div><br/>
    <div class="form-group1">
    <label for="exampleInputTextarea1">Текст новости</label>
   <textarea  class="ckeditor" name="editor1" placeholder="text"></textarea>
  </div><br/>
  <div class="form-group1">
    <label for="exampleInputFile">Прикрепить файл</label>
    <input type="file" id="exampleInputFile" name="files1">
    </div><br/>  
	<!--div class="form-group1">
    <label for="exampleInputImage">Прикрепить фотографию/Изображение</label>
    <input type="file" id="exampleInputImage">
    </div--><br/>  
   <button type="submit" class="btn btn-default">Отправить</button>
</form>
</div>
<?php require_once('templates/bottom.php');?>
<script type="text/javascript" src="media/ckeditor_4.5.6_standard/ckeditor/ckeditor.js"></script>
