<html>
	<?php 
		session_start(); 
	?>
	<font face="DFKai-sb">	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>成員表刪除完成頁面</title>
		<a href="homepage.php"><img src="FIMS.jpg" width="150" height="100">回到首頁 </a>
		<br/><br/><br/>
		
	</head>
	
	<?php
		include("connect_mysql.php");
		if(!isset($_POST['submit']))//判斷是否有submit操作
		{	
			exit("錯誤執行");
		}	

	 
		$WANTDELETE_USERNAME=$_POST['wantdelete_username']; 
			
		if($WANTDELETE_USERNAME != null || $WANTDELETE_USERNAME != "" )
		{	//判斷是否有這個使用者名稱可以刪除

			mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼	 
			//刪除語法
			$DEL ="DELETE FROM member_table WHERE `username`=\"$WANTDELETE_USERNAME\"";  //刪除資料

			$DELETE_RESULT=mysqli_query($link,$DEL);//執行sql     
			mysqli_query($link,$DEL);
		
			if (!$DELETE_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<h1 align=center><span style=color:blue;>『" . $WANTDELETE_USERNAME . "』 此人已被刪除 ! 請對照下面確認是否刪除正確~~</span></h1><br/><br/>";
			}
		
		

			//header( "location:index.php");  //回index.php 
    	}
		else
		{
			echo "<h4 style=text-align:center;><a href=delete_member.php>想要繼續刪成員請按這</a></h4>";
			echo "<h1 align=center><span style=color:red;>沒有這個人可以刪哦!</span></h1>";	
		}
		
		
		//查詢語法
		$SEL="SELECT * FROM member_table";
        $RESULT = mysqli_query($link,$SEL);
	?>
	

	
	<body>
		<!--用表格框起來 查出來的成員表 -->
		<div align="center">
			<h2 ">
				<a href="member.php">回成員中心</a>
			</h2>
			<form name="form" method="post" action="save_delete_member.php">
				<table border="1"  style= "border:10px #00B2B2 groove;" width="" height="" cellpadding="10" >
					<thead>
						<caption>
							<div style="text-align:left;">
								<caption><h2><span style="color:#009E9E;">刪除後剩餘的成員</span></h2></caption>
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
			</form>
		
		</div>
	</body>
</html>





