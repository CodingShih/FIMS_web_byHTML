<DOCTYPE html>
<html>
	<head>   <script>  // 同homepage 和總覽的眶 但中間會有可以修改的地方</script>
		<script>
			
		
		
		</script>
	  
	  
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>FIMS 新增項目頁面</title>
	</head> 
	<body>
		
		<font face="DFKai-sb">	
		<form name="form" method="post" action="catalogue.php">
			
				<!--///////////////////////// HTML  -->
		   <div class="wrap">
				<div class="header">  <script>//上層放登入註冊首頁圖片等 </script>
						<a href="homepage.php"><img src="FIMSy.jpg" width="190" height="170" style="float:left;"></a>  <script>// 首頁圖像連結 </script>
						<img  src="FIMS_img.jpg" width="550" height="200"/> 
						<a href="logout.php">登出 </a> 
						<!--<a href="login.php">登入</a> -->
						/ <a href="register.php">註冊帳號 </a>	
				</div>
				
				
				<div class="header2">  <script>//標頭二放總覽修改等功能按鍵 </script>
					
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
				
				
			<div class="content"  >  <script>//中下層放股票等投資 </script>
				<table border="1" style="border:2px #D68B00 groove;" width="600" Height="360" align="center" cell padding="10" >
					<caption><h2>新增項目</h2></caption>
					<th style="font-size: 20px;">
						<div>項目名稱:  <input type="text" name="_item_itemname" /> </div><br/>
						<div>投資項目類型:  <input type="text" name="_item_itemtype" placeholder="最多20字" maxlength="20" /> </div> <br/>
						<div>投資日期:  <input type="text" name="_item_investtime" placeholder="ex: 2021-6-1" maxlength="10" /> </div> <br/>
						<div>投資在此項目金額: $ <input type="text" name="_item_totalmoney" /> </div><br/>
						<div>總預計回報率:  <input type="text" name="_item_returnrate" placeholder="percent%" />  </div><br/>
						<div>投資人:  <a style="margin-left:4ch"/><input type="text" name="_item_investor"> </div><br/>
						<input type="submit" name="submit_additem" value="確定" />&nbsp;&nbsp;&nbsp;
						<input type="reset" value="清除"/>
					</th>
				</table>
				<br/><br/>
				<table border="1" style="border:3px #D68B00 groove;" width="600" Height="360" align="center" cell padding="10" >
					<caption><h2>新增投資類型</h2></caption>
					<th style="font-size: 20px;">
						<div>類型名稱:  <input type="text" name="_type_typename" /> </div><br/>
						<div>投資在此類型總金額: $ <input type="text" name="_type_totalmoney" placeholder="" maxlength="20" /> </div> <br/>
						<div>此類型總預計回報率:  <input type="text" name="_type_returnrate" placeholder="percent" maxlength="10" /> %</div> <br/>

						<input type="submit" name="submit_addtype" value="確定" />&nbsp;&nbsp;&nbsp;
						<input type="reset" value="清除"/>
					</th>
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
					background-image:url("3stage.png");
					background-repeat:no-repeat;
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







