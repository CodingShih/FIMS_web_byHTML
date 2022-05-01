<html>
	<font face="DFKai-sb">	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>成員表刪除頁面</title>
		<a href="homepage.php"><img src="FIMS.jpg" width="150" height="100">回到首頁 </a>
		<br/><br/><br/>
		
	</head>
	
	<?php
		include("connect_mysql.php");
		$SEL="SELECT * FROM member_table";
        $RESULT = mysqli_query($link,$SEL);
	?>
	
	<body>
		<!--用表格框起來 查出來的成員表 -->
		<div align="center">
			<h2>
				<a href="member.php">回上頁 成員中心</a>
			</h2>
				<table border="1"  style= "border:10px #FFF0D4 groove;" width="" height="" cellpadding="10" >
					<thead>
						<caption>
							<div style="text-align:left;">
								<h2>
									(原) - 成員表
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
								echo $ROW['username'];
								for ($i=0;$i <= $total_FIELDS-1;$i++)
								{
									echo "<td><span style=font-size:20px;>" . $ROW[$i] . "</span></td>";
								}
								echo "</tr>";
								
							}	
						?>	
					</tbody>
				</table>

			
			<form name="form" method="post" action="save_delete_member.php">
				<table border="3" style="border:8px #FF5959 groove;" width="500" Height="300" cell padding="10">	
					<caption><h2><span style="color:red;">欲刪除的成員</span></h2></caption>
		
					<th align="center" >
						<span style="font-size:20px;">
						<div>欲刪除的成員名稱: <input type="text" name="wantdelete_username" size="10" placeholder="username" /> </div><br/>
						<input type="submit" name="submit" value="確定刪除" />&nbsp;&nbsp;&nbsp;
						<input type="reset" value="清除"/>
						</span>
					</th>
				</table>
		</form>
			
	
			
		</div>
	</body>
</html>