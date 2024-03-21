<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		<!--	使用HTML5的<meta charset="UTF-8" />亦可被大部分瀏覽器所接受	-->
		<title>浪你不孤單 浪你有個家</title>
	</head>
	<body bgcolor="#E8FFFF">
		<font size='5' color='green'>
		<div align=center>
		<br /><img src='chat.png' width = 70><br /><br />
		<?php
			$fp=fopen("information.txt","r");
			while(!feof($fp)) 
			{
				echo fgets($fp), '<br />';
			}
			fclose($fp);
		?>
		<form method='GET' action=''> 
		<br />暱稱:<input type='text' name='Test1'><br />
		<br />內文:<textarea name='Board'></textarea><br />
		<br /><input type='submit' value='send'></form>
		<?php
			//把標題和內容分別抓取到下來
			$Test1=isset($_GET["Test1"])?$_GET["Test1"]:"";
			$Board=isset($_GET["Board"])?$_GET["Board"]:"";
		   
			//看是否都有抓到內容
			IF(($Test1!="")&&($Board!=""))
			{
				//先把輸入的標題內文分別寫進content.txt
				$f=fopen("content.txt","a");
				 fwrite($f,"留言者暱稱:".$Test1."\n"."意見內文:"."\n".$Board."\n\n");
				 fclose($f);
				 
				 //讀取剛寫好的content.txt，並顯示文字
				 $f=fopen("content.txt","r");
				 while(($fp=fgets($f))!==false)
				 {
					echo nl2br($fp);
				 }
				 fclose($f);
			}
		?>
		<br /><br /><a href="new.php">回首頁</a>
		</div>
		</font>
	</body>
</html>