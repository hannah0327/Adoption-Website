<?php
	include ("configure.php");	
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>浪你不孤單 浪你有個家</title>
</head>
<body bgcolor="#EDEDED">
	<div align=center>
	<font size='5' color='green'>
	<br /><img src='contract.png' width = 70><br /><br />
	<?php
		//顯示剛剛點擊的編號，讓使用者確認
		$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
		$id=$_SERVER['QUERY_STRING'];

		echo"您要認養的寵物編號: ".$id."<br /><br />";
		
		// 取得資料
		$sql="SELECT * FROM `note` where `id` =$id";
		$result = $link->query($sql);
			
		// 獲得資料筆數
		$count = $result->rowCount();
		echo"前面有 ".$count." 位想領養這隻小可愛了!您將成為第 ".$count+1 ." 順位認養者<br />請耐心等待我們的篩選結果與回覆...<br /><br />";
	?>
    <form action="" name="add" method="POST">
      您的姓名:<input type="text"  style="font-size:13px;color:blue;" name="name"><br /><br />
	  手機號碼:<input type="text"  style="font-size:13px;color:blue;" name="phone"><br /><br />
	  居住地址:<input type="text"  style="font-size:13px;color:blue;" name="address"><br /><br />
	  身分字號:<input type="text"  style="font-size:13px;color:blue;" name="personalid"><br /><br />
      認養原因:<textarea name="content"  style="font-size:13px;color:blue;"	></textarea><br /><br />
      <input type="submit"  value="submit">
    </form>
    <?php

       $a=isset($_POST["name"])?$_POST["name"]:"";
       $b=isset($_POST["phone"])?$_POST["phone"]:"";
	   $c=isset($_POST["address"])?$_POST["address"]:"";
	   $d=isset($_POST["personalid"])?$_POST["personalid"]:"";
	   $e=isset($_POST["content"])?$_POST["content"]:"";
       
	   $Keyword="登入成功";
	   
       if($a!=""&&$b!=""&&$c!=""&&$d!=""&&$e!="")
       {
		    //讀取登入的紀錄比對是否登入成功
			$f=fopen("login.txt","r");
			$ff=fgets($f);
			if(stristr($ff,$Keyword))
			{
				// 建立與MySQL資料庫的連線
				$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
				$id=$_SERVER['QUERY_STRING'];
				  
				//分別把表單內容寫入note資料表
				$query = "INSERT INTO `note`(`name`, `phone`, `address` , `personalid` , `reason`, `id`) VALUES('".$a."','".$b."','".$c."','".$d."','".$e."','".$id."');";
				$count=$link->exec($query);
				echo"填寫完成!";
			}
			else
			{
				echo"填寫失敗，請先登入!";
				echo"<a href='login.php'>馬上登入</a>/<a href='signup.php'>註冊</a>";
			}
			fclose($f);
       }
    ?>
	<br /><br /><a href="new.php">回首頁</a>
	</font>
	</div>
</body>
</html>
