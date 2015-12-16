<?php require_once('templates/top.php');
?>

<?php

if($_POST){
		$database = new Database();
		$query="SELECT * FROM forms WHERE login = '".trim($_POST['login'])."' AND password = '".trim($_POST['password'])."'";
		$database->query($query);
		$row = $database->single();
		
		if($row){
			$_SESSION['id'] = $row['id'];
			?>
		<script>
			document.location.href='index.php?url=authgood';
		</script>
		<?php
		}
		else{
			echo "Логин или пароль указаны неверно";
		}
		
 }
 ?>
 
<form method="post" action="login.php">
<h2>Авторизация</h2>

  <div class="form-group">
    <label for="exampleInputLogin1">Login</label>
    <input type="login" class="form-control" id="exampleInputLogin1" name="login" placeholder="login">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Войти</button>
</form>

<?php require_once('templates/bottom.php');
?>
