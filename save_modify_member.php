<html>
	<?php 
		session_start(); 
	?>
	<font face="DFKai-sb">	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>成員表修改完成頁面</title>
		<a href="homepage.php"><img src="FIMS.jpg" width="150" height="100">回到首頁 </a>
		<br/><br/><br/>
		
	</head>
	
	<?php
		include("connect_mysql.php");
		if(!isset($_POST['submit']))//判斷是否有submit操作
		{	
			exit("錯誤執行");
		}	 
		
		
	?>
	
	<?php		
		$ORI_USERNAME = $_POST['original_username'];
		$NEW_USERNAME = $_POST['new_username'];
		$NEW_ACC = $_POST['new_account'];
		$NEW_PW = $_POST['new_password'];
		$NEW_PW2 = $_POST['new_password2'];
		$NEW_EMAIL = $_POST['new_email'];
		$NEW_PHONENUMBER = $_POST['new_phonenumber'];
		$NEW_IDENTITY = $_POST['new_identity'];
		
		if($ORI_USERNAME != null && $NEW_USERNAME != null && $NEW_ACC != null && $NEW_PW != null &&
			$NEW_PW2 != null && $NEW_PW == $NEW_PW2 && $NEW_EMAIL != null && $NEW_PHONENUMBER != null 
			&& $NEW_IDENTITY != null)
		{	//判斷是否有這個使用者名稱可以修改
			//判斷要修改的資料有沒有填入
			//確認密碼輸入的正確性
			
			mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
		
			//更新資料庫資料語法
			$UPD = "UPDATE member_table SET `username`=\"$NEW_USERNAME\", `account`=\"$NEW_ACC\",`password`=\"$NEW_PW\", `email`=\"$NEW_EMAIL\", `phonenumber`=\"$NEW_PHONENUMBER\", `identity`=\"$NEW_IDENTITY\" WHERE `username`=\"$ORI_USERNAME\"";
			$UPDATE_RESULT=mysqli_query($link,$UPD);//執行sql     問題可能在這!!!!
			mysqli_query($link,$UPD);
			
			 
			
			
			
			if (!$UPDATE_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<h1 align=center><span style=color:blue;> 修改成功 ! 請對照下面確認是否修改正確~~</span></h1><br/><br/>";
			}
		}
		else 
		{	
			echo "<h4 style=text-align:center;><a href=modify_member.php>想要重新修改按這個</a></h4>";
			echo "<h1 align=center><span style=color:red;>修改失敗... 一定是沒有填對!</span></h1>";	
		}
		
		
		$SEL="SELECT * FROM member_table WHERE `username`=\"$NEW_USERNAME\"";  // 有條件的查詢
		$RESULT = mysqli_query($link,$SEL);
		mysqli_query($link,$SEL);		
		
  
		/*else
		{
			echo '您無權限觀看此頁面!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage.php>';
		}*/
	?>
	
	<body>
		<!--用表格框起來 查出來被修改過的的成員表 -->
		<div align="center">
			<table border="1"  style= "border:10px #B8B8FF groove;" width="" height="" cellpadding="10" >
				<thead>
					<caption>
						<div style="text-align:left;">
							<h2>
								剛剛調整的欄位	
							</h2>
						</div>	
					</caption>
				</thead>
				<tbody>
					<tr>
						<?php 
							
							while( $META= mysqli_fetch_field($RESULT))
								echo "<th><span style=font-size:20px;>" . $META->name . "</span></th>";
						?>
					</tr>
				
					<?php
						$total_FIELDS=mysqli_num_fields($RESULT);
						while ($ROW = mysqli_fetch_row($RESULT))
						{
							echo "<tr align='center'>";  // 顯示每一筆紀錄的欄位值
							for ($i=0;$i <= $total_FIELDS-1;$i++)
								echo "<td><span style=font-size:20px;>" . $ROW[$i] . "</span></td>";
							echo "</tr>";
						}	
					?>
				</tbody>
			</table>	
		</div>
	</body>
	</font>
</html>