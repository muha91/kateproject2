<?php require_once('libs/query/phpQuery/phpQuery.php');
	  require_once('config/config.php');
	  require_once('class/Database.php');
	  
	  
	
	//echo "Привет!"."<br/>";

	$database = new Database();
	$query="SELECT * FROM news where files1=''";
	$database->query($query);
	$res=$database->resultset();
		
	foreach($res as $key=>$value)
	{
		$str=ereg_replace(" ","+", $value['title']);
		//echo $res['files1']."<br/><br/>";
		$url='http://www.google.by/search?q='.$str.'&biw=1280&bih=913&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjb2eDl0I_KAhUDAXMKHeAEB_kQ_AUIBigB'.$str;
		
		$hub=file_get_contents($url);
		$document=phpQuery::newDocument($hub);
		$hentry=$document->find('.images_table img:eq(0)')->attr('src');
		$dir='media/uploaded/'.$value['user_id'].'/';
		echo $dir;
		$name=time().'.jpg';
		if(!copy($hentry, $dir.$name)){
			echo "<span style=\"color:red\">Ошибка копирования $hentry</span>";
		}
		echo $hentry;
		/*$hub2=file_get_contents($hentry);
		$document2=phpQuery::newDocument($hub2);
		$hentry2=$document->find('body');*/
		echo "<hr/>";
		//echo $hentry2;
		sleep(1);
	
	$query="UPDATE news SET files1='".$name."' WHERE id='".$value['id']."'";
	$database->query($query);
	$database->execute();
		//echo $hub;
		//exit;
		//echo $url."<br/>";
	}
	
?>
