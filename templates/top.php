<?php session_start();?>
<?php require_once('config/config.php');?>
<?php require_once('class/Database.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Интернет-газета "Сегодня и завтра"</title>
<meta name="description" content="Интернет-газета" >
<meta name="keywords" content="новости, политика, спорт, культура, газета" >
<meta name="author" content="purum_p91@mail.ru" >
<link type="text/css" rel="stylesheet" href="media/bootstrap/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="media/bootstrap/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="media/css/styles.css" />
<script type="text/javascript" src="media/js/jquery-1.11.3.min.js"></script>
<!--script type="text/javascript" src="media/js/my.js"></script-->
</head>
<body>
<div class="all">
<div class="header" id="header">
<div class="logotype"><img src="media/img/logotype.jpg" title="Логотип сайта" /></div>
<div class="title"><h1><a href="index.php?url=index">Интернет-газета "Сегодня и завтра"</a></h1></div>
</div>
<?php
if($_SESSION['id']){
?>
<div class="user"><a href="logout.php">Выход</a></div>
<div class="user"><a href="cabinet.php">Личный кабинет</a></div>
<?php
}
else{
?>
<div class="vhod"><a href="reg.php">Регистрация</a></div>
<div class="login"><a href="login.php">Авторизация</a></div>
<?php
}
?>
<div class="content">
<div class="top_menu">
<div class="menu_item"><a href="#">Политика</a>
<div class="menu_second">
<ul>
<li><a href="#">Президент</a></li>
<li><a href="#">Беларусь</a></li>
<li><a href="#">В мире</a></li>
</ul>
</div>
</div>
<div class="menu_item">
	<a href="#">Экономика</a>
		<div class="menu_second">
			<ul>
				<li><a href="#">Нацбанк</a></li>
				<li><a href="#">Минэкономики</a></li>
			</ul>
		</div>
</div>
<div class="menu_item"><a href="#">Культура</a>
		<div class="menu_second">
			<ul>
				<li><a href="#">Театр</a></li>
				<li><a href="#">Кино</a></li>
				<li><a href="#">Выставки</a></li>
			</ul>
		</div>
</div>
<div class="menu_item"><a href="#">Спорт</a>
		<div class="menu_second">
			<ul>
				<li><a href="#">Футбол</a></li>
				<li><a href="#">Хоккей</a></li>
				<li><a href="#">Биатлон</a></li>
			</ul>
		</div>
</div>
<div class="menu_item"><a href="#">Калейдоскоп</a>
		<div class="menu_second">
			<ul>
				<li><a href="#">О звездах</a></li>
				<li><a href="#">Премьеры</a></li>
			</ul>
		</div>
</div>
<div class="menu_item"><a href="#">Обращение</a>
		<div class="menu_second">
			<ul>
				<li><a href="#">Для физических лиц</a></li>
				<li><a href="#">Для юридических лиц</a></li>
			</ul>
		</div>
</div>
<div class="menu_item"><a href="news-users.php">Статьи читателей</a></div>
<!--<div class="menu_item"><a href="index.php?url=about">О газете</a>
		<div class="menu_second"></div>
</div>
<div class="menu_item"><a href="index.php?url=contacts">Контакты</a>

</div>-->
</div>
<?php 
if ($_SESSION['id']){
	//echo $_SESSION['id'];
}
else{?>
	<h3 style="text-align:center;color:blue"><?php echo "Авторизация не прошла!";?></h3><?php
}
?>
<div class="vrezka"></div>
<div class="col-md-3">
<!--<a href="index.php?url=zhurnalisty" class="btn btn-primary block">Наши журналисты</a>
<a href="index.php?url=partners" class="btn btn-primary block">Наши партнеры</a>
<a href="index.php?url=dostizheniya" class="btn btn-primary block">Наши достижения</a>-->

<!--<a href="index.php?url=spravka" class="btn btn-primary block">Справочная информация</a>-->

<?php

$database = new Database();
$database->query("select * from maintexts where active='yes'");
$rows = $database->resultset();
foreach ($rows as $key=>$value){
?>
<a href="index.php?url=<?=$value['url']?>" class="btn btn-primary block"><?=$value['name']?></a>
<?php
}
/*$res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
while($row=$res->fetch(PDO::FETCH_ASSOC))*/{
}
?>
</div>
<div class="col-md-5">
