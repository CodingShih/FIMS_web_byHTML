<DOCTYPE html>
<html>
	<head>   <script>  // 同homepage 和總覽的眶 但中間會有可以修改的地方</script>
		<script>
			
		
		
		</script>
	  
	  
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>FIMS 管理投資頁面(刪除)</title>
	</head> 
	<body>
		
		<font face="DFKai-sb">	
		<form name="form" method="post" action="modify_invest.php">
			
				<!--///////////////////////// HTML  -->
		   <div class="wrap">
				<div class="header">  <!--//上層放登入註冊首頁圖片等 -->
						<a href="homepage.php"><img src="FIMSy.jpg" width="190" height="170" style="float:left;"></a>  <script>// 首頁圖像連結 </script>
						<img  src="FIMS_img.jpg" width="550" height="200"/> 
						<a href="logout.php">登出 </a>  
						/ <a href="register.php">註冊帳號 </a>	
				</div>
				
				
				<div class="header2">  <!--//標頭二放總覽修改等功能按鍵 -->
					
					<div class="left">
						
					</div>
					
					
					
					<div class="right">
						<table border="1" style="border:5px #FFA1A1 groove;" width="565" height="100" >
							<tbody>
									<td align="center"><span style="font-size:30px;"><a href="catalogue.php">目錄總覽</a></span></td>
									<td align="center"><span style="font-size:30px;"><a href="add_invest.php">新增項目</a></span></td>
									<td align="center"><span style="font-size:30px;"><a href="modify_invest.php">管理投資</a></span></td>	
							</tbody>
						</table>
					</div>
				
				</div>
				
		
				<div class="clearfix"></div>
				
				
			<div class="content" >  <script>//中下層放股票等投資 </script>
				<table border="1" style="border:2px #FFABAB groove;" width="600" Height="160" align="center" cell padding="10" >
					<caption><h2><span style="color:red;">欲刪除項目</span></h2></caption>
						<th style="font-size: 20px;" >
						<span style="color:white;">
							<div>想刪除的項目名稱:  <input type="text" name="wantdelete_itemname" /> </div><br/>
							<input type="submit" name="submit_deleteitem" value="確定刪除" />&nbsp;&nbsp;&nbsp;
							<input type="reset" value="清除"/>
						</span>
						</th>
				</table>
				<br/><br/>
				<table border="1" style="border:3px #FFABAB groove;" width="600" Height="160" align="center" cell padding="10" >
					<span style="color:white;">
						<caption><h2><span style="color:red;">欲刪除類型</span></h2></caption>
						<th style="font-size: 20px;">
						<span style="color:white;">
							<div>想刪除的類型名稱:  <input type="text" name="wantdelete_typename" /> </div><br/>
							<input type="submit" name="submit_deletetype" value="確定刪除" />&nbsp;&nbsp;&nbsp;
							<input type="reset" value="清除"/>
						</span>
						</th>
					</span>
				</table>
						
				
			</div>
			
			
		   
		   
		   
		   
		   <script>  	// CSS			
						//	背景模板的 CSS		</script>
		   
			<style>	
				
				.clearfix
				{
					clear:both;
				}
				
				
				.wrap
				{
					width: 930px;
					margin: 0 auto;
				}
				
				

				.header,.content,.header2
				{
					margin-bottom: 1px;  <?php // header、content表格之間的距離?>
					padding: 6px;
					font-size:18px;
					border:8px	#A86E00 groove;
					
				
				}

				.header
				{
					height: 200px;
					background: #FFFFB5;
					color:blue;
					margin-top:10px; <?php // 離網頁最頂端的距離 #FFF0D4  #D6D6FF?>
				}
				
				.header2
				{
					height: 105px;
					background: ;
					background-image:url("star2.jpg");
					background-repeat:repeat;
					color:black;
					padding: 3px;
				}

				.content
				{
					height: 1100px;
					background: ;
					background-image:url("starSsS.png");
					background-repeat:repeat; <!--no-repeat-->
					color:purple;
				}
			
				
				
				
				.left,.center,.right
				{
					
		
					float:left;
					margin:2px;
					padding:px;
					
					
				}

				.left
				{
					
					border:0 px;
					width: 330px;
				}
				.center
				{
					width: 200px;
				}
				.right
				{
					width: 565px;
					background: ;
					background-image:url("3stage3.jpeg");
					background-repeat:no-repeat;
				}


				
		   
		   </style>
	
	
			<style type="text/css" media="screen">  
		   
				a{
					text-decoration: none; 
					color: black; 
				}
				
				#expand      
				{
					background-color: black;
				}
				
				.description 
				{
					display: none;    
				}
				
				.entry       
				{
					margin: 0; 
					padding: 0px;
				}
			</style>	

			
		   
		</form>
	  
												
	  
	  
	</body>
</html>








