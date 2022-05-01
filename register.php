<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FIMS 註冊頁面</title>
	</head>
	
	<body>
		<a href="homepage.php"><img src="FIMS.jpg" width="150" height="100" style="float:left;"></a>
		<h1 style="font-size: 40px">F I M S <font face="DFKai-sb">  成員註冊</h1>
		<hr/>
		
		<font face="DFKai-sb">
			<form name="form" method="post" action="save_add_member.php">
				<table border="3" style="border:8px #ADADFF groove;" width="500" Height="400" cell padding="10">	
					<caption><h2>註冊</h2></caption>
		
					<th>
						<div>名稱:  <input type="text" name="_username" /> </div><br/>
						<div>帳號:  <input type="text" name="_account" placeholder="最多20字" maxlength="20" /> </div> <br/>
						<div>密碼:  <input type="password" name="_password" placeholder="建議英文+數字，最多16字" maxlength="20" /> </div> <br/>
						<div>再一次輸入密碼:  <input type="password" name="_password2" /> </div><br/>
						<div>電子信箱:  <input type="text" name="_email" /> </div><br/>
						<div>聯絡電話:  <input type="text" name="_phonenumber" /> </div><br/>
						<div>身分:  <a style="margin-left:4ch"/><input type="text" name="_identity"> </div><br/>
						<a href="login.php">有帳號了? 快來登入</a>
						<br/><br/>
						<input type="submit" name="submit" value="確定" />&nbsp;&nbsp;&nbsp;
						<input type="reset" value="清除"/>
					</th>
				</table>
			</form>
		</font>	
	</body>
</html>