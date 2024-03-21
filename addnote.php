<?php
	include ("configure.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>浪你不孤單 浪你有個家</title>
  </head>
  <body bgcolor="#FFFFC9">
	<div align=center>
		<br /><img src='megaphone.png' width = 70>
		<form action='' name='add' method='POST'>
			<font color='RED' size='5.5'>照片(photo) 連結名稱，務必依照認養頁面的數字依序往下填!<br />e.g.認養頁面編號至6的話，就填寫7.jpg<br/>認養頁面編號至8的話，就填寫9.jpg......以此類推<BR /><BR /></font>
			照片(photo) 連結名稱:<input type='text'  name='photo'><br /><br />
			描述(description):<textarea name='description'></textarea><br /><br />
			<input type='submit'  value='submit'>
		</form>
    <?php
       $a=isset($_POST["photo"])?$_POST["photo"]:"";
       $b=isset($_POST["description"])?$_POST["description"]:"";
       
	    $Keyword="登入成功";
	   
       if($a!=""&&$b!="")
       {
		   //讀取登入的紀錄比對是否登入成功
			$f=fopen("login.txt","r");
			$ff=fgets($f);
			if(stristr($ff,$Keyword))
			{
			   // 建立與MySQL資料庫的連線
			   $link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
			   
				//新增資料至資料表
				$query = "INSERT INTO `note2`(`photo` ,`description`) VALUES('".$a."','".$b."');";
				$count=$link->exec($query);
				echo"刊登成功!";
			}
			else
			{
				echo"刊登失敗，請先登入或註冊!<br />";
				echo"<a href='login.php'>馬上登入</a>/<a href='signup.php'>註冊</a>";
			}
			fclose($f);
       }
    ?>
	<br /><br /><br /><a href="new.php">回首頁</a>
	</div>
	</body>
</html>
