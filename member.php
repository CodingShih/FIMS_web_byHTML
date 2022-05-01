<html>
	<?php 
		session_start(); 
	?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
	<font face="DFKai-sb">		
	<head>
		<title>成員中心</title>
		<a href="homepage.php"><img src="FIMS.jpg" width="150" height="100">回到首頁 </a>
		<br/><br/><br/>
		
	</head>
	
	<!-- echo '<a href="logout.php">登出</a>  <br/><br/>'; -->
	
	
	<?php
		include("connect_mysql.php");//連結資料庫
		
		$SEL="SELECT * FROM member_table";
        $RESULT = mysqli_query($link,$SEL);
	?>

	
	<body>
		<br/><br/><br/><br/> <!--用表格框起來 查出來的成員表 -->
		<div align="center">
			<table border="1"  style= "border:10px #FFF0D4 groove;" width="" height="" cellpadding="10" >
				<thead>
					<caption>
							<h2 style="text-align:right;">
								<a href="modify_member.php">修改成員表</a>
							</h2>
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
			<h2 ">
				<a href="delete_member.php">刪除成員表</a>
			</h2>
		</div>
	</body>



	<font face="DFKai-sb">	
</html>
    <!--
		//此判斷為判定觀看此頁有沒有權限
		//說不定是路人或不相關的使用者，因此要給予排除
		if($_SESSION['account'] != null)
		{
				echo '<a href="register.php">新增</a> <br/><br/>   ';
				echo '<a href="modify_member.php">修改</a>  <br/><br/>  ';
				echo '<a href="delete_member.php">刪除</a>  <br/><br/>';
    
				//將資料庫裡的所有會員資料顯示在畫面上
		
			
			echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage.php>';
		}
	-->	

