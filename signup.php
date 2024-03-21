<?php
	include ("configure.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>浪你不孤單 浪你有個家</title>
  </head>
  <body bgcolor="#e6e6fa">
	<font size='5' color='SteelBlue'>
	<div align=center>
	<br /><img src='account.png' width = 70><br /><br />
	<form action="" method="POST">
		帳號:<input type="text" name="Value1" /> <br /> 
		密碼:<input type="text" name="Value2" /> <br />
		密碼確認:<input type="password" name="Value3" /> <br /><br />
		<input type="submit" />
	</form>
    <?php
       $a=isset($_POST["Value1"])?$_POST["Value1"]:"";
       $b=isset($_POST["Value2"])?$_POST["Value2"]:"";
       $c=isset($_POST["Value3"])?$_POST["Value3"]:"";
	   
       if($a!=""&&$b!=""&&$c!="")
       {
		   //密碼與確認密碼相同
		   if(strcmp($b,$c)==0)
		   {
			   // 建立與MySQL資料庫的連線
			   $link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
			   
				// 取得資料
				$sql="SELECT * FROM `note3` ";
				$result = $link->query($sql);
					
				foreach ($result as $row)					
				{
					$account=$row["account"];
					//如果輸入的帳號已註冊過，就註冊失敗，不會新增資料至資料表
					if((strcmp($a,$account)==0))
					{
						echo"此帳號已存在!請重新輸入帳號名稱!<br /><br />";
					}
					else
					{
						//帳號尚未註冊過，就新增資料至資料表
						$query = "INSERT INTO `note3`(`account` ,`pwd`) VALUES('".$a."','".$b."');";
						$count=$link->exec($query);
						echo"恭喜您!註冊成功囉~趕快登入看看吧!<br /><br />";
					}
				}
		   }
		   else
		   {
			   echo"兩次密碼輸入不相同，請重新輸入!<br /><br />";
		   }
       }
    ?>
	</font>
	<a href="new.php">回首頁</a>
	</div>
	</body>
</html>
