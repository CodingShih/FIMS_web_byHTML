<DOCTYPE html>
<html>
	<?php
		session_start();
		include("connect_mysql.php");
		 
		$WANTDELETE_ITEMNAME=$_POST['wantdelete_itemname']; 
		$WANTDELETE_TYPENAME=$_POST['wantdelete_typename']; 
		
	
	if(!isset($_POST['submit_deleteitem']))//判斷是否有submit操作 	
	{
	}
	else
	{
		if($WANTDELETE_ITEMNAME != null || $WANTDELETE_ITEMNAME != "" )
		{	//判斷是否有這個項目名稱可以刪除

			mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼	 
			//刪除語法
			$DEL_ITEM ="DELETE FROM invest_item_table WHERE `itemname`=\"$WANTDELETE_ITEMNAME\"";  //刪除資料
			$DELETE_ITEM_RESULT=mysqli_query($link,$DEL_ITEM);//執行sql     
			mysqli_query($link,$DEL_ITEM);
		
			if (!$DELETE_ITEM_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<script language=javascript>";
				echo	"alert('已刪除此投資項目!')"; 	
				echo "</script>";
			}
			
		}
		else
		{
			echo "<h2>沒有這個項目可以刪哦!</h2>"; 
			echo '<meta http-equiv=REFRESH CONTENT=1;url=modify_invest.php>';
		}
	}
	
	if(!isset($_POST['submit_deletetype']))//判斷是否有submit操作 	
	{
	}
	else
	{
		if($WANTDELETE_TYPENAME != null || $WANTDELETE_TYPENAME != "" )
		{	//判斷是否有這個類型名稱可以刪除

			mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼	 
			//刪除語法
			$DEL_TYPE="DELETE FROM invest_itemtype_table WHERE `typename`=\"$WANTDELETE_TYPENAME\"";  //刪除資料
			$DELETE_TYPE_RESULT=mysqli_query($link,$DEL_TYPE);//執行sql     
			mysqli_query($link,$DEL_TYPE);
		
			if (!$DELETE_TYPE_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<script language=javascript>";
				echo	"alert('已刪除此投資類型!')"; 	
				echo "</script>";
			}
		}
		else
		{
			echo "<h2>沒有這個類型可以刪哦!</h2>"; 
			echo '<meta http-equiv=REFRESH CONTENT=1;url=modify_invest.php>';
		}
	}
			
	?>	
	
	<head>   <!-- 同homepage 和總覽的眶 但中間會有可以修改的地方-->
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>FIMS 管理投資頁面</title>
	</head> 
	<body>
		
		<font face="DFKai-sb">	
		<form name="form" method="post" action="catalogue.php">
			
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
				<div style="text-align:right;">
					<span style="font-size:30px;"><a href="delete_invest.php"><font color="red">刪除投資細項或類型</font></a></span>
				</div>
				<table border="1" style="border:2px #EDD4FF groove;" width="600" Height="360" align="center" cell padding="10" >
					<caption>
						<h2><span style="color:white;">欲修改項目</span></h2>
					</caption>
						<th style="font-size: 20px;" >
						<span style="color:white;">
							<div>欲修改項目的名稱:  <input type="text" name="original_item_itemname" /> </div><br/>
							<div>項目新名稱:  <input type="text" name="new_item_itemname" placeholder="最多20字" maxlength="20" /> </div> <br/>
							<div>項目類型:  <input type="text" name="new_item_itemtype"  maxlength="10" /> </div> <br/>
							<div>項目投資日期:  <input type="text" name="new_investtime" placeholder="ex: 2021-6-1" /> </div><br/>
							<div>項目投資金額:  $ <input type="text" name="new_item_totalmoney"  />  </div><br/>
							<div>項目投資預計回報率:  <input type="text" name="new_item_returnrate" placeholder="percent%" /></div><br/>
							<div>項目投資人:  <a style="margin-left:4ch"/><input type="text" name="new_item_investor"> </div><br/>
							<input type="submit" name="submit_modifyitem" value="確定修改" />&nbsp;&nbsp;&nbsp;
							<input type="reset" value="清除"/>
						</span>
						</th>
				</table>
				<br/><br/>
				<table border="1" style="border:3px #EDD4FF groove;" width="600" Height="360" align="center" cell padding="10" >
					<span style="color:white;">
						<caption><h2><span style="color:white;">欲修改類型</span></h2></caption>
						<th style="font-size: 20px;">
						<span style="color:white;">
							<div>欲修改類型的名稱:  <input type="text" name="original_type_typename" /> </div><br/>
							<div>類型新名稱:  <input type="text" name="new_type_typename"  maxlength="10" /></div> <br/>
							<div>投資在此類型總金額: $ <input type="text" name="new_type_totalmoney" placeholder="" maxlength="20" /> </div> <br/>
							<div>此類型總預計回報率:  <input type="text" name="new_type_returnrate" placeholder="percent%" maxlength="10" /></div> <br/>

							<input type="submit" name="submit_modifytype" value="確定修改" />&nbsp;&nbsp;&nbsp;
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







