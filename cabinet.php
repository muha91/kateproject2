<?php require_once('templates/top.php');
if($_SESSION['id']){
	$database = new Database();
	$query = "SELECT*FROM forms WHERE id = ".$_SESSION['id']."";
	$database->query($query);
	$row = $database->single();?>
	<h3>Информация о пользователе</h3>
	<h4 style="text-decoration:underline">Ваш e-mail:</h4><?php echo "<h5>".$row['email']."</h5>";?>
	<h4 style="text-decoration:underline">Ваш логин:</h4><?php echo "<h5>".$row['login']."</h5>";
		}
else{
	echo "Ошибка входа";
}

if($_POST){
		$err = array();
		if(empty($_POST['title'])){
			$err[] = 'Не указан заголовок!';
		}
		if(empty($_POST['editor1'])){
			$err[] = 'Заполните поле "Текст"!';
		}
	if(count($err)<1){
		$database = new Database();
		$database->query("INSERT INTO news (user_id, title, editor1, add_date) VALUES(:user_id, :title, :editor1, NOW())");
		
		$database->bind(':user_id',$_SESSION['id']);
		$database->bind(':title',$_POST['title']);
		$database->bind(':editor1',$_POST['editor1']);
			
		$result = $database->execute();
		if($result){
			echo "Новость успешно отправлена!";
		}
		else{
			echo "Новость не добавилась!";
		}
	}
		else{
		print_r($err);	
		}
}
	
?>

<div class="news-user"><h2>Форма добавления новости</h2>
<form method="post" action="cabinet.php">
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
    <input type="file" id="exampleInputFile">
    </div><br/>  
	<div class="form-group1">
    <label for="exampleInputImage">Прикрепить фотографию/Изображение</label>
    <input type="file" id="exampleInputImage">
    </div><br/>  
   <button type="submit" class="btn btn-default">Отправить</button>
</form>
</div>
<?php require_once('templates/bottom.php');?>
<script type="text/javascript" src="media/ckeditor_4.5.6_standard/ckeditor/ckeditor.js"></script>