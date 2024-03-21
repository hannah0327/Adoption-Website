<?php
	include ("configure.php");
	include ("add.php");
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>浪你不孤單 浪你有個家</title>
</head>
<body bgcolor="#FFF7E8">
	<script>alert('請記得登入帳密，才能使用認養及刊登功能!')</script>
	<div align="center">
	<img src='test.jpg' height="435">
	<div/>
	<table align="center"  border="1" width="900" height="30" bordercolor="#215868">
		<!-- 本文 --->
		<tr>
			<td height="20" width="300" align="center"> <a href="information.php"> <font color="#000080"><img src='favorite.png' width = 25> 認養/刊登須知 </font> </a> </b> </td>
			<td height="20" width="300" align="center"> <a href=""><font color="#000080"><img src='contract.png' width = 25> 我要認養 </font> </a> </b> </td>
			<td height="20" width="300" align="center"> <a href="addnote.php"> <font color="#000080"><img src='megaphone.png' width = 25> 我要刊登 </font> </a> </b> </td>
			<td height="20" width="300" align="center"> <a href="form.php"> <font color="#000080"><img src='chat.png' width = 25> 公共留言板 </font> </a> </b> </td>	
			<td height="20" width="359"><p align="center" style="line-height: 150%; margin-top: 5px; margin-bottom: 5px"><b><font face="微軟正黑體"><font color="#000080"><img src='account.png' width = 30><a href="login.php"> 登入</a>/<a href="signup.php">註冊</a></font></font></b></td>
		</tr>
		<tr>
			<td height="20" width="741" bgcolor="#215868" colspan="5">
			<p align="center" style="margin-top: 0; margin-bottom: 0"><strong>
			<span class="MsoNormal" style="line-height:150%;layout-grid-mode:char;">
			<font size="5">  
			<span style="line-height:100%; font-family:'微軟正黑體'; color:red">&nbsp; </span></font>
			<span style="line-height:100%; font-family:'微軟正黑體'; ">
			<font color="#FFFFFF" size="5">  
			<span style="line-height:125%; font-family:'微軟正黑體','sans-serif'; ">
			一起支持領養代替購買!!!!!</span></font></span></span></strong></td>
		</tr>
	<table align="center"  border="1" width="900" height="30" bordercolor="#215868">
		<tr align=center bgcolor="#FFDD88"><td width="70">編號(Id)</td><td width="100">照片(Photo)</td><td width="295">描述(Description)</td><td width="195">認養(Adopt)</td></tr>

		<?php
			
			// 建立與MySQL資料庫的連線
			$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
			
			// 取得資料
			$sql="SELECT * FROM `note2` ";
			$result = $link->query($sql);
			
			foreach ($result as $row)					
			{
				$id=$row["id"];
				// 在此例中，$row中有$row["id"]、$row["photo"]與$row["description"]欄位的值。
				echo "<tr><td><font size='5' ><div align=center>".$row["id"]."</div></font></td><td><div align=center>"."<a href='$id.jpg?".$id."'>".$row["photo"]."</div></td><td>".nl2br($row["description"])."</td><td>"."<a href='adopt.php?".$id."'><img src='contract.png' width = 23>點我填寫資料 辦理認養!</a>"."</td></tr>";
			}
			
		?>
		</table>
	</table><br />
			<?php
			//顯示現在時間
			echo"<div align=center>";
			date_default_timezone_set('Asia/Taipei');
			echo "更新網頁時間 : ".date("Y-m-d H:i:s");
			$a=rand()%10+1;
			echo"<br />";
			echo"</div>";
		?>
</body>
</html>