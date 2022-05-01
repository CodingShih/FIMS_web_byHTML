<html>
	<?php 
		session_start(); 
	?>
	<font face="DFKai-sb">	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>成員表修改頁面</title>
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
			<h2 ">
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
				</tbody>
			</table>
			
			
			<form name="form" method="post" action="save_modify_member.php">
				<table border="3" style="border:8px #CE8CFF groove;" width="800" Height="600" cell padding="10">	
					<caption><h2>欲修改欄位</h2></caption>
		
					<th align="center" >
						<span style="font-size:20px;">
						<div>欲修改的成員名稱:  <input type="text" name="original_username" size="10"/> </div><br/>
						<div>新名稱:	<input type="text" name="new_username" size="10"/></div><br/>
						<div>新帳號:  <input type="text" name="new_account" size="20" placeholder="最多20字" maxlength="20" /> </div> <br/>
						<div>新密碼:  <input type="password" name="new_password" size="20" placeholder="建議英文+數字，最多16字" maxlength="20" /> </div> <br/>
						<div>再一次輸入新密碼:  <input type="password" name="new_password2" size="20" /> </div><br/>
						<div>新電子信箱:  <input type="text" name="new_email" size="25" /> </div><br/>
						<div>新聯絡電話:  <input type="text" name="new_phonenumber" size="20" /> </div><br/>
						<div>新身分:  <a style="margin-left:4ch"/><input type="text" name="new_identity" size="10"> </div><br/>
						<input type="submit" name="submit" value="確定" />&nbsp;&nbsp;&nbsp;
						<input type="reset" value="清除"/>
						</span>
					</th>
				</table>
		</form>
			
			
		</div>
	</body>
</html>