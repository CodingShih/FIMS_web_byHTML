<?php
			session_start();  // 啟用交談期
			$account = "";  $password = "";
			// 取得表單欄位值
			if ( isset($_POST["account_"]) )
				$account = $_POST["account_"];
			if ( isset($_POST["password_"]) )
				$password = $_POST["password_"];
			
			
			// 檢查是否輸入使用者名稱和密碼
			if ($account != "" && $password != "") 
			{
				// 建立MySQL的資料庫連接 
				$link=mysqli_connect("localhost","root","nuuadmin","fims")
				or die ("無法開啟MySQL資料庫連接!<br/>");
				//送出UTF8編碼的MySQL指令
				mysqli_query($link, 'SET NAMES utf8'); 
				// 建立SQL指令字串
				$SELECT = "SELECT * FROM member_table WHERE password='";
				$SELECT.= $password."' AND account='".$account."'";
				
				
				
				// 執行SQL查詢
				
				$RESULT=mysqli_query($link,$SELECT);//執行

				$total_records = mysqli_num_rows($RESULT);
				// 是否有查詢到使用者記錄
				if ( $total_records > 0 ) 
				{
					// 成功登入, 指定Session變數
					$_SESSION["login_session"] = true;
					header("Location: homepage.php");
				} 
				else 
				{  // 登入失敗
					echo "<center><font color='red'>";
					echo "使用者名稱或密碼錯誤!<br/>";
					echo "</font>";
					$_SESSION["login_session"] = false;
				}
				mysqli_close($link);  // 關閉資料庫連接  
			}
		?>

<DOCTYPE html>
<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>FIMS 登入頁面</title>
	</head>
	
	
	
	
	 
	<body>
		<a href="homepage.php"><img src="FIMS.jpg" width="150" height="100" style="float:left;"></a>
		<h1 style="font-size: 40px">F I M S <font face="DFKai-sb">  成員登入</h1>
		<hr/>
		
		<font face="DFKai-sb">	
			<form method="post" action="login.php">

				<table border="3" style="border:8px #E69500 groove;" width="500" Height="400" cell padding="10">	
					<caption><h2>登入</h2></caption>
				
					<tr>
						<th>
							<div class="box">
								帳號:  <input type="text" name="account_" placeholder="輸入帳號" maxlength="20" /> 
							</div>
							
							<div class="box">
								
								密碼:  <input type="password" id="pwd" name="password_" placeholder="(建議英文+數字，最多16字)" maxlength="16" />
								<label for="">
									<img src="eye_close.png" id="eye" />
								</label>
							</div>
							
							
							<input type="submit" name="button" value="確定登入" />
							&nbsp;  	
							<a href="register.php">還沒註冊嗎?</a>
						</th>
					</tr>

				</table>
			</form>
			
			
		<style>
			.box 
			{
				position: relative;
				width: 350px;
				margin: 100px auto;
				border-bottom: 1px solid #ccc;
			}
			
			.box input 
			{
				width: 370px;
				height: 30px;
				border: 0;
				outline: none;
			}
			
			.box img 
			{
				position: absolute;						
				right: 2px;
				top: 2px;
				width: 30px;
				height: 24px;
			}
			
		</style>	
			
			
		<script>
			//1.獲取元素，圖片和密碼
			var eye = document.getElementById('eye');
			var pwd = document.getElementById('pwd');
			//2.註冊事件
			var flag = 0;
			eye.onclick = function () 
						  {
							if (flag == 0) 
							{
								pwd.type = 'text';
								eye.src = 'eye_open.png';
								flag = 1;

							} 
							else 
							{
								pwd.type = 'password';
								eye.src = 'eye_close.png';
								flag = 0;
							}

						  }
						  
		</script>

		</font>
	</body>
	  
	  
	  
</html>	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  