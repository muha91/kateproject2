<?php require_once('templates/top.php');?>
<?php
if ($_SESSION['id'])
{
	$user = $_SESSION['id']; 
	if ($_FILES)
	{
		$tmp_name = $_FILES['files1']['tmp_name'];
		$name = $_FILES['files1']['name'];
		$dir = $_SERVER['DOCUMENT_ROOT'].'/media/uploaded/';
		//echo $dir;
		//echo "<pre>";
		//print_r($_FILES);
		//echo "</pre>";
		
		if(is_uploaded_file($tmp_name))
		{
			move_uploaded_file($tmp_name, $dir.$name);
			
			$handle = fopen($dir.$name, 'r');
			$data = array();
			
			for($i=0;!feof($handle);$i++)
			{
				$data[$i] = fgetcsv($handle, 1000, ";");

			
			}
			print_r($data);
			unset($data[0]);
			
			foreach($data as $key=>$array)
			{ 
				//print_r($value);
				//echo $key;
				//echo "<hr/>";

				$array_value = explode(';', $array[0]);
				
				if(count($array_value) == 5){
					$vv0 = $array_value[0];
					$vv1 = $array_value[1];
					$vv2 = $array_value[2];
					$vv3 = $array_value[3];
					$vv4 = $array_value[4];
					
					$database = new Database();

					$sel = "SELECT * FROM notice WHERE categoria = '$vv0'";
					$database->query($sel);
					$row = $database->single();
					
					if ($row['categoria']==$vv0)
					{ 
						echo "Объявление с категорией"."$vv0"."уже существует и не добавлена в базу";?><hr/><?php	
					}
					
					else
					{
						$query = "INSERT INTO notice (user_id, categoria, small_desc, medium_desc, price, contacts, show_hide, add_time) VALUES('$user', '$vv0', '$vv1', '$vv2', '$vv3', '$vv4', 'show', NOW()) ";
						
						$database->query($query);
						
						$database->execute();
						echo "Объявление с категорией"."$vv0"."добавлено";
					}
					
				}
				
			}
			
		}
		else{
			echo "ошибка загрузки файла";
		}
	}
	
	?>
	
	<form method="POST" action='parse_csv.php' enctype='multipart/form-data'>
	<div> 
	<label>Выберите файл с расширением .csv</label>
	<input type="file" name='files1'>
	</div>
	<button type="submit" class="btn btn-default">Загрузить</button>
	</form>
	<?php
}

else
{ 
	echo "ошибка входа"; 
}
?> 		 

<?php require_once('templates/bottom.php');?>