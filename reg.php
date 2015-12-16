<?php require_once('templates/top.php');
?>


<?php
if($_POST){
	$database = new Database();
	
	$err = array();
	if(empty($_POST['email'])){
		$err[] = 'Не указан e-mail';
	}
	if(empty($_POST['login'])){
		$err[] = 'Не указан login';
	}
	if(empty($_POST['password'])){
		$err[] = 'Не указан password';
	}
	if(empty($_POST['password2'])){
		$err[] = 'Не указан password';
	}
	if($_POST['password']!=$_POST['password2']){
		$err[] = "Введенные пароли не совпадают!";
	}

	$query = "SELECT * FROM forms WHERE login = '".$_POST['login']."'";
		
	$reg = $database->query($query);
	$res = $database->single(PDO::FETCH_ASSOC);
	if($res){
		$err[] = "Такой login уже существует!";
	}
		
	$query = "SELECT * FROM forms WHERE email = '".$_POST['email']."'";
		
	$reg = $database->query($query);
	$res = $database->single(PDO::FETCH_ASSOC);
	if($res){
		$err[] = "Такой email уже существует!";
	}
	
	if(count($err)>0){
		echo "<pre>";
		print_r($err);
		echo "</pre>";
	}
	else{
		$database->query("INSERT INTO forms (email, login, password,lastvisit,datereg) VALUES(:email, :login, :password, NOW(), NOW())");
	
		$database->bind(':email',$_POST['email']);
		$database->bind(':login',$_POST['login']);
		$database->bind(':password',$_POST['password']);
	
		$database->execute();
	

	
	?>
		<script>
			document.location.href='index.php?url=thankyoupage';
		</script>
		<?php
	}
 }
 ?>
 
<form method="post" action="reg.php">
<h2>Регистрация</h2>
<div class="form-group">
    <label for="exampleInputEmail1">E-mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email">
  </div>
  <div class="form-group">
    <label for="exampleInputLogin1">Login</label>
    <input type="login" class="form-control" id="exampleInputLogin1" name="login" placeholder="login">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repeat Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password2" placeholder="Password">
  </div>
   <button type="submit" class="btn btn-default">Регистрация</button>
</form>
<?php require_once('templates/bottom.php');
?>
