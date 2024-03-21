<?php
	include ("configure.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>浪你不孤單 浪你有個家</title>
  </head>
  <body bgcolor="#e0ffff">
  	<font size='5' color='SteelBlue'>
	<div align=center>
	<br /><img src='account.png' width = 70><br /><br />
	<form action="" method="GET">
		帳號:<input type="text" name="Value1" /> <br /> 
		密碼:<input type="text" name="Value2" /> <br /><br />
		<input type="submit" />
	</form>
    <?php
		//建立與MySQL資料庫的連線
       $link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
       
		// 取得資料
		$sql="SELECT * FROM `note3` ";
		$result = $link->query($sql);
		
		//以下進行帳號密碼比對
		$a=isset($_GET["Value1"])?$_GET["Value1"]:"";
		$b=isset($_GET["Value2"])?$_GET["Value2"]:"";
		
		if($a!=''&&$b!='')
		{
			// 取得資料
			$sql="SELECT * FROM `note3` ";
			$result = $link->query($sql);
				
			foreach ($result as $row)					
			{
				$account=$row["account"];
				$pwd=$row["pwd"];
				//如果輸入的帳號密碼都和資料庫內資料相同=>登入成功
				if((strcmp($a,$account)==0)&&(strcmp($b,$pwd)==0))
				{
					$login=0;
					break;
				}
				else if(strcmp($a,$account)==0)
				{
					$login=1;
					break;
				}
				else if(strcmp($a,$account)!=0&&strcmp($b,$pwd)!=0)
				{
					$login=2;
				}
			}
			if($login==0)
			{
				echo"哈囉!".$a."您已登入成功囉~<br /><br />";
				//作為是否已登入的紀錄
				$f=fopen("login.txt","w");
				fputs($f,"登入成功"); 
				fclose($f);
			}
			else if($login==1)
			{
				echo"密碼錯誤<br /><br />";
				
				$f=fopen("login.txt","w");
				fputs($f,"登入失敗"); 
				fclose($f);
			}
			else
			{
				echo"查無此帳號，請先註冊!<br /><br /><a href='signup.php'>馬上註冊</a><br /><br />";
				$f=fopen("login.txt","w");
				fputs($f,"登入失敗"); 
				fclose($f);
			}

		}
    ?>
	</font>
	<a href="new.php">回首頁</a>
	</div>
	</body>
</html>
