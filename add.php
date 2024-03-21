<?php
	include ("configure.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>浪你不孤單 浪你有個家</title>
  </head>
  <body>
    <?php
		// 建立與MySQL資料庫的連線
		$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);

		// 取得note2資料
		$sql="SELECT * FROM `note2` ";
		$result = $link->query($sql);
			
		// 獲得資料筆數
		$count = $result->rowCount();
			
		//測試資料表是否已有六個預設的編碼，若沒有才新增，若以建立好，則不會重複建立了
		if($count<6)
		{
			//新增資料至資料表
			$query = "INSERT INTO `note2`(`photo` ,`description`) VALUES('1.jpg','品種:巴哥，性別:女，個性:溫順乖巧。');";
			$count=$link->exec($query);
			
			$query = "INSERT INTO `note2`(`photo` ,`description`) VALUES('2.jpg','品種:吉娃娃，性別:男，個性:調皮搗蛋。');";
			$count=$link->exec($query);		
			
			$query = "INSERT INTO `note2`(`photo` ,`description`) VALUES('3.jpg','品種:薩摩耶，性別:女，個性:活潑外向、善於社交。');";
			$count=$link->exec($query);	
			
			$query = "INSERT INTO `note2`(`photo` ,`description`) VALUES('4.jpg','品種:柴犬，性別:男，個性:天然呆萌。');";
			$count=$link->exec($query);	
			
			$query = "INSERT INTO `note2`(`photo` ,`description`) VALUES('5.jpg','品種:貓咪，性別:男，個性:溫柔婉約。');";
			$count=$link->exec($query);	
			
			$query = "INSERT INTO `note2`(`photo` ,`description`) VALUES('6.jpg','品種:哈士奇，性別:女，個性:自我中心、傲嬌。');";
			$count=$link->exec($query);	
		}
		
		// 取得note3的已註冊資料
		$sql="SELECT * FROM `note3` ";
		$result = $link->query($sql);
			
		// 獲得資料筆數
		$count = $result->rowCount();
			
		//測試資料表是否已有預設的帳密，若沒有才新增，若以建立好，則不會重複建立了
		if($count<1)
		{
		//新增一筆預設好已完成註冊的帳密
			$query = "INSERT INTO `note3`(`account` ,`pwd`) VALUES('hannah','1234');";
			$count=$link->exec($query);
		}
    ?>
	</body>
</html>
