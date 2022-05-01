<html>
	<?php 
		session_start(); 
	?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
	
	<head>
		<a href="homepage.php"><img src="FIMS.jpg" width="150" height="100">回到首頁 </a>
		<br/><br/><br/><br/><br/><br/>
		
	</head>
	
	
	<?php 
		header("Content-Type: text/html; charset=utf8");
		if(!isset($_POST['submit']))//判斷是否有submit操作
		{	
			exit("錯誤執行");
		}
		
		
		$NAME = $_POST['_username'];//post獲取表單裡的name
		$ACC = $_POST['_account'];
		$PW = $_POST['_password'];//post獲取表單裡的password
		$PW2 = $_POST['_password2'];
		$EMAIL=$_POST['_email'];
		$PHONENUMBER = $_POST['_phonenumber'];
		$IDENTITY = $_POST['_identity'];
		
		
		
		include("connect_mysql.php");//連結資料庫
		
		if($ACC != null && $PW != null && $PW2 != null && $PW == $PW2)
		{	//判斷帳號密碼是否為空值 
			//確認密碼輸入的正確性
			$INSERT_INTO="INSERT INTO member_table(`username`, `account`, `password`, `photo`, `email`, `phonenumber`, `identity`) VALUES (\"$NAME\",\"$ACC\",\"$PW\",\"\",\"$EMAIL\",\"$PHONENUMBER\",\"$IDENTITY\")";//向資料庫插入表單傳來的值的sql
		
			mysqli_query($link, 'SET NAMES utf8'); 
		
			$RESULT=mysqli_query($link,$INSERT_INTO);//執行sql
			mysqli_query($link,$INSERT_INTO);
		
		
			if (!$RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<b> 註冊成功!~ 可以回到首頁進行登入囉! </b><br/><br/>";
			}
		}
		else 
		{	
			echo "<h4 style=text-align:center;><a href=register.php>重填註冊表單</a></h4>";
			echo "<h1 align=center><span style=color:red;>註冊表單填寫不完全，請重填!</span></h1>";	
		}
		
		$SEL="SELECT * FROM member_table";
        $RESULT = mysqli_query($link,$SEL);
		
	?>
	
	
	
	
	<body>
		<br/><br/><br/><br/> <!--用表格框起來 查出來的成員表 -->
		<div align="center">
			<table border="1"  style= "border:10px #FFF0D4 groove;" width="" height="" cellpadding="10" >
				<tr>
					<?php 
						while( $META= mysqli_fetch_field($RESULT))
							echo "<th><span style=font-size:20px;>" . $META->name . "</span></th>";
					?>
					</span>
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
			</table>
		</div>
	</body>
	<?php 
		
		mysqli_free_result($SELECT_RESULT);
		mysqli_free_result($RESULT);
		//mysql_close($link);//關閉資料庫
		

		
		
	?>
	
	
</html>