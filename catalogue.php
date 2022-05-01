<DOCTYPE html>
<?php
	include("connect_mysql.php");//連結資料庫
	 //$SEL_item="SELECT * FROM invest_item_table";  // 查項目表全部
	$SEL_item_stock="SELECT * FROM invest_item_table WHERE `typename`=\"股票\" ORDER BY `investtime`";  // 查項目表裡 類型是股票的
	$SEL_item_save="SELECT * FROM invest_item_table WHERE `typename`=\"定存\" ORDER BY `investtime`";  // 查項目表裡 類型是定存的
	$SEL_item_coins="SELECT * FROM invest_item_table WHERE `typename`=\"紀念幣\" ORDER BY `investtime`";  // 查項目表裡 類型是紀念幣的
	$SEL_item_fund="SELECT * FROM invest_item_table WHERE `typename`=\"基金\" ORDER BY `investtime`";  // 查項目表裡 類型是基金的
	
	//$SEL_type="SELECT * FROM invest_itemtype_table"; // 查類型表全部
	$SEL_type_stock="SELECT * FROM invest_itemtype_table WHERE `typename`=\"股票\"";
	$SEL_type_save="SELECT * FROM invest_itemtype_table WHERE `typename`=\"定存\"";
	$SEL_type_coins="SELECT * FROM invest_itemtype_table WHERE `typename`=\"紀念幣\"";
	$SEL_type_fund="SELECT * FROM invest_itemtype_table WHERE `typename`=\"基金\"";
	
	
	
    $SEL_stock_RESULT = mysqli_query($link,$SEL_item_stock); // 股票結果
	$SEL_save_RESULT = mysqli_query($link,$SEL_item_save);	// 定存結果
	$SEL_coins_RESULT = mysqli_query($link,$SEL_item_coins);	// 紀念幣結果
	$SEL_fund_RESULT = mysqli_query($link,$SEL_item_fund);	// 基金結果
	
	
	
	$SEL_type_stock_RESULT = mysqli_query($link,$SEL_type_stock);	// 股票類型結果
	$SEL_type_save_RESULT = mysqli_query($link,$SEL_type_save);	// 定存類型結果
	$SEL_type_coins_RESULT = mysqli_query($link,$SEL_type_coins);	// 紀念幣類型結果
	$SEL_type_fund_RESULT = mysqli_query($link,$SEL_type_fund);	// 基金類型結果
	
	
	$_ITEM_ITEMNAME = $_POST['_item_itemname'];//post獲取表單裡的 itemname
	$_ITEM_ITEMTYPE = $_POST['_item_itemtype'];
	$_ITEM_INVESTTIME = $_POST['_item_investtime'];
	$_ITEM_TOTALMONEY = $_POST['_item_totalmoney'];
	$_ITEM_RETURNRATE =$_POST['_item_returnrate'];
	$_ITEM_INVESTOR = $_POST['_item_investor'];
		
		
	$_TYPE_TYPENAME = $_POST['_type_typename'];
	$_TYPE_TOTALMONEY = $_POST['_type_totalmoney'];
	$_TYPE_RETURNRATE = $_POST['_type_returnrate'];
	
	
			

if(!isset($_POST['submit_additem']))//判斷是否有submit操作
{
}
else
{	
	if($_ITEM_ITEMNAME != null && $_ITEM_ITEMTYPE != null && $_ITEM_INVESTTIME != null && $_ITEM_TOTALMONEY != null &&
			$_ITEM_RETURNRATE != null  && $_ITEM_INVESTOR != null ) 	
	{
		
		//插入項目
		$insertinto_item="INSERT INTO invest_item_table(`itemname`, `typename`, `investtime`, `totalitemmoney`, `totalitemreturnrate`, `investor`) 
		VALUES (\"$_ITEM_ITEMNAME\",\"$_ITEM_ITEMTYPE\",\"$_ITEM_INVESTTIME\",\"$_ITEM_TOTALMONEY\",\"$_ITEM_RETURNRATE\",\"$_ITEM_INVESTOR\")";//向資料庫插入表單傳來的值的sql
		mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
		$INSERT_RESULT=mysqli_query($link,$insertinto_item);//執行sql
		mysqli_query($link,$insertinto_item);
		
		if (!$INSERT_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				
				echo "<script language=javascript>";
				echo	"alert('成功!~ 已加入此項目!')"; 	
				echo "</script>";
			}
		
	}
	else 
	{	
		echo "<h2>新增投資項目失敗...! 請重來!</h2>"; 
		echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
		//echo "<script language=javascript>";
		//echo	"alert('插入失敗，請重來!')"; 
		//echo "</script>";
		//echo "<h1 align=center><span style=color:red;>表單填寫不完全，插入失敗，請重填!</span></h1>";	
	}
}		
	

if(!isset($_POST['submit_addtype']))//判斷是否有submit操作
{	
}
else
{	
	if($_TYPE_TYPENAME != null && $_TYPE_TOTALMONEY != null && $_TYPE_RETURNRATE != null )
	{
		
		//插入類型
		$insertinto_type="INSERT INTO invest_itemtype_table(`typename`, `totaltypemoney`, `totaltypereturnrate`) 
		VALUES (\"$_TYPE_TYPENAME\",\"$_TYPE_TOTALMONEY\",\"$_TYPE_RETURNRATE\")";//向資料庫插入表單傳來的值的sql
		mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
		$INSERT_TYPE_RESULT=mysqli_query($link,$insertinto_type);//執行sql
		mysqli_query($link,$insertinto_item);
		
		if (!$INSERT_TYPE_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<script language=javascript>";
				echo	"alert('成功!~ 已加入此類型!')"; 	
				echo "</script>";

			}
	}
	else
	{
		echo "<h2>新增投資類型失敗...! 請重來!</h2>"; 
		echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
	}
}	

	// 接住修改項目
	$ORI_ITEM_ITEMNAME = $_POST['original_item_itemname'];  
	$NEW_ITEM_ITEMNAME = $_POST['new_item_itemname'];
	$NEW_ITEM_ITEMTYPE = $_POST['new_item_itemtype'];
	$NEW_INVESTTIME = $_POST['new_investtime'];
	$NEW_ITEM_TOTALMONEY = $_POST['new_item_totalmoney'];
	$NEW_ITEM_RETURNRATE = $_POST['new_item_returnrate'];
	$NEW_ITEM_INVESTOR = $_POST['new_item_investor'];
	
	// 接住修改類型
	$ORI_TYPE_TYPENAME = $_POST['original_type_typename'];
	$NEW_TYPE_TYPENAME = $_POST['new_type_typename'];
	$NEW_TYPE_TOTALMONEY = $_POST['new_type_totalmoney'];
	$NEW_TYPE_RETURNRATE = $_POST['new_type_returnrate'];
	
if(!isset($_POST['submit_modifyitem']))//判斷是否有submit操作
{	
	
}
else
{	
	if($ORI_ITEM_ITEMNAME != null && $NEW_ITEM_ITEMNAME != null && $NEW_ITEM_ITEMTYPE != null && $NEW_ITEM_RETURNRATE != null && 
		$NEW_INVESTTIME != null && $NEW_ITEM_TOTALMONEY != null && $NEW_ITEM_INVESTOR != null)
		{	//判斷是否有這個項目名稱可以修改
			mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
			//更新資料庫資料語法
			$UPD_ITEM = "UPDATE invest_item_table SET `itemname`=\"$NEW_ITEM_ITEMNAME\",
			`typename`=\"$NEW_ITEM_ITEMTYPE\",`investtime`=\"$NEW_INVESTTIME\",
			`totalitemmoney`=\"$NEW_ITEM_TOTALMONEY\",`totalitemreturnrate`=\"$NEW_ITEM_RETURNRATE\", 
			`investor`=\"$NEW_ITEM_INVESTOR\"  WHERE `itemname`=\"$ORI_ITEM_ITEMNAME\"";
			
			$UPDATE_ITEM_RESULT=mysqli_query($link,$UPD_ITEM);//執行sql   
			mysqli_query($link,$UPD_ITEM);
		 
			if(!$UPDATE_ITEM_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<script language=javascript>";
				echo	"alert('修改項目成功!')"; 	
				echo "</script>";
			}
		}	
		else
		{
			echo "<h2>修改投資項目失敗...! 請重來!</h2>"; 
			echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
		}
}



if(!isset($_POST['submit_modifytype']))//判斷是否有submit操作
{		
}
else
{	
	if($ORI_TYPE_TYPENAME != null && $NEW_TYPE_TYPENAME != null && $NEW_TYPE_TOTALMONEY != null && $NEW_TYPE_RETURNRATE != null )
	{	//判斷是否有這個類型名稱可以修改
		mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
		//更新資料庫資料語法   
		$UPD_TYPE = "UPDATE invest_itemtype_table SET `typename`=\"$NEW_TYPE_TYPENAME\", 
		`totaltypemoney`=\"$NEW_TYPE_TOTALMONEY\",`totaltypereturnrate`=\"$NEW_TYPE_RETURNRATE\" 
		WHERE `typename`=\"$ORI_TYPE_TYPENAME\"";
			
		$UPDATE_TYPE_RESULT=mysqli_query($link,$UPD_TYPE);//執行sql   
		mysqli_query($link,$UPD_TYPE);
		 
		if(!$UPDATE_TYPE_RESULT)
		{	
			die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
		}	
		else
		{
			echo "<script language=javascript>";
			echo	"alert('修改類型成功!')"; 	
			echo "</script>";
		}
	}	
	else
	{
		echo "<h2>修改投資類型失敗...! 請重來!</h2>"; 
		echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
	}
}		

			
?>





<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>FIMS 家庭投資管理系統</title>
	</head> 
	<body>
		
		
		<font face="DFKai-sb">	
		<form name="form" method="post" action="connect.php">
			
		<!--  HTML  -->
		
		   <div class="wrap">
				<div class="header">  <!--  上層放登入註冊首頁圖片等 -->
						<a href="homepage.php"><img src="FIMSy.jpg" width="190" height="170" style="float:left;"></a>  <script>// 首頁圖像連結 </script>
						<img  src="FIMS_img.jpg" width="550" height="200"/> 
						<a href="logout.php">登出 </a> 
						/ <a href="register.php">註冊帳號 </a>	
				</div>
				
				
				<div class="header2">  <!--  標頭二放總覽修改等功能按鍵 -->
					
					<div class="left">
						<br/>
						<table border="1" style="border:5px #FFA1A1 groove;" bgcolor="#FFD4FF" width="110" height="60" align="center">
							<tbody>
									<td align="center"><span style="font-size:20px;"><a href="member.php">成員中心</a></span></td>	
							</tbody>
						</table> 	
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
				
				
			<div class="content"  >  <!-- 中下層放股票等投資 -->
					
					<table border="3" style="border:1px #FFA1A1 groove;" width="900" height="100" >
						<tr >
							<th width="25%"><span style="font-size:20px;">投資類型</span></th>
							<th width="25%"><span style="font-size:20px;">投資總額</span></th>
							<th width="25%"><span style="font-size:20px;">總預計回報率(%)</span></th>
							<th width="25%"><span style="font-size:20px;">淨賺</span></th>
						</tr>
					
					</table>
					<br/><br/>
				
					<table border="3" style="border:5px #D68B00 groove;" cell padding="10" width="900" >
						
						<thead>
							<script type="text/javascript" 
									src="http://code.jquery.com/jquery-1.10.0.min.js">
							</script>
						</thead>
						
						<tbody>
							<tr width="900" align='center'>
								<?php
									$total_FIELDS=mysqli_num_fields($SEL_type_stock_RESULT);
									while ($ROW = mysqli_fetch_row($SEL_type_stock_RESULT))
									{
										// 顯示每一筆紀錄的欄位值
										for ($i=0;$i <= $total_FIELDS-1;$i++)
											echo "<th width=25%>" . $ROW[$i] . "</th>";
									}		
								?>
								<th width="25%" >8800</th>
							</tr>	
							
							<tr>
								<td colspan="5" class="entry">
									<a href="#expand"><b>項目細項表 </b><img src="arrow.png" width="15" height="15"></a>
									<div class="description">
										<table border="3" style="border:0px #D68B00 groove;" width="880">
											<tr style="background-color:BurlyWood">
												<th width="22%"><a href="#expand">項目名稱</a></th>
												<th width="12%">項目類型</th>
												<th width="12%">投資時間</th>
												<th width="12%">投資總額</th>
												<th width="12%">總預計回報率</th>
												<th width="12%">投資人</th>
												<th width="12%">淨賺</th>
											</tr>
											
											<?php //類型是股票的 投資資料
												$total_FIELDS=mysqli_num_fields($SEL_stock_RESULT);
												while ($ROW = mysqli_fetch_row($SEL_stock_RESULT))
												{
													echo "<tr align='center'>";  // 顯示每一筆紀錄的欄位值
													for ($i=0;$i <= $total_FIELDS-1;$i++)
														echo "<td>" . $ROW[$i] . "</td>";
													echo "</tr>";
												}	
											?>
										</table>
									<div>
								</td>
							</tr>
							
						</tbody>
					</table>
					
					<br/><br/><br/>
					
					<table border="1" style="border:5px #D68B00 groove;" cell padding="10"  width="900">
						<thead>
							<script type="text/javascript" 
									src="http://code.jquery.com/jquery-1.10.0.min.js">
							</script>
						</thead>
						
						<tbody>
							<tr width="900" align='center'>
								<?php
									$total_FIELDS=mysqli_num_fields($SEL_type_save_RESULT);
									while ($ROW = mysqli_fetch_row($SEL_type_save_RESULT))
									{
										// 顯示每一筆紀錄的欄位值
										for ($i=0;$i <= $total_FIELDS-1;$i++)
											echo "<th width=25%>" . $ROW[$i] . "</th>";
									}		
								?>
								<th width="25%" >497</th>
							</tr>	
							
							<tr>
								<td colspan="5" class="entry">
									<a href="#expand"><b>項目細項表 </b><img src="arrow.png" width="15" height="15"></a>
									<div class="description">
										<table border="3" style="border:0px #D68B00 groove;" width="880">
											<tr style="background-color:#FFABAB">
												<th width="22%"><a href="#expand">項目名稱</a></th>
												<th width="12%">項目類型</th>
												<th width="12%">投資時間</th>
												<th width="12%">投資總額</th>
												<th width="12%">總預計回報率</th>
												<th width="12%">投資人</th>
												<th width="12%">淨賺</th>
											</tr>
											
											<?php //類型是定存的 投資資料					
												$total_FIELDS=mysqli_num_fields($SEL_save_RESULT);
												while ($ROW = mysqli_fetch_row($SEL_save_RESULT))
												{
													echo "<tr align='center'>";  // 顯示每一筆紀錄的欄位值
													for ($i=0;$i <= $total_FIELDS-1;$i++)
														echo "<td>" . $ROW[$i] . "</td>";
													echo "</tr>";
												}	
											?>
										</table>
									<div>
								</td>
							</tr>
						</tbody>
					</table>
					
					<br/><br/><br/>
					
					<table border="1" style="border:5px #D68B00 groove;" cell padding="10"  width="900">
						<thead>
							<script type="text/javascript" 
									src="http://code.jquery.com/jquery-1.10.0.min.js">
							</script>
						</thead>
						
						<tbody>
							<tr width="900" align='center'>
								<?php
									$total_FIELDS=mysqli_num_fields($SEL_type_coins_RESULT);
									while ($ROW = mysqli_fetch_row($SEL_type_coins_RESULT))
									{
										// 顯示每一筆紀錄的欄位值
										for ($i=0;$i <= $total_FIELDS-1;$i++)
											echo "<th width=25%>" . $ROW[$i] . "</th>";
									}		
								?>
								<th width="25%" >10000</th>
							</tr>	
							
							<tr>
								<td colspan="5" class="entry">
									<a href="#expand"><b>項目細項表 </b><img src="arrow.png" width="15" height="15"></a>
									<div class="description">
										<table border="3" style="border:0px #D68B00 groove;" width="880">
											<tr style="background-color:#FFC863"  >
												<th width="22%"><a href="#expand">項目名稱</a></th>
												<th width="12%">項目類型</th>
												<th width="12%">投資時間</th>
												<th width="12%">投資總額</th>
												<th width="12%">總預計回報率</th>
												<th width="12%">投資人</th>
												<th width="12%">淨賺</th>
											</tr>
											
											<?php //類型是紀念幣的 投資資料
												$total_FIELDS=mysqli_num_fields($SEL_coins_RESULT);
												while ($ROW = mysqli_fetch_row($SEL_coins_RESULT))
												{
													echo "<tr align='center'>";  // 顯示每一筆紀錄的欄位值
													for ($i=0;$i <= $total_FIELDS-1;$i++)
														echo "<td>" . $ROW[$i] . "</td>";
													echo "</tr>";
												}	
											?>
										</table>
									<div>
								</td>
							</tr>
						</tbody>
					</table>
					
					<br/><br/><br/>
					
					<table border="1" style="border:5px #D68B00 groove;" cell padding="10"  width="900">
						<thead>
							<script type="text/javascript" 
									src="http://code.jquery.com/jquery-1.10.0.min.js">
							</script>
						</thead>
						
						<tbody>
							<tr width="900" align='center'>
								<?php
									$total_FIELDS=mysqli_num_fields($SEL_type_fund_RESULT);
									while ($ROW = mysqli_fetch_row($SEL_type_fund_RESULT))
									{
										// 顯示每一筆紀錄的欄位值
										for ($i=0;$i <= $total_FIELDS-1;$i++)
											echo "<th width=25%>" . $ROW[$i] . "</th>";
									}		
								?>
								<th width="25%" >8200</th>
							</tr>	
							
							<tr>
								<td colspan="5" class="entry">
									<a href="#expand"><b>項目細項表 </b><img src="arrow.png" width="15" height="15"></a>
									<div class="description">
										<table border="3" style="border:0px #D68B00 groove;" width="880">
											<tr style="background-color:#A3A3FF" >
												<th width="22%"><a href="#expand">項目名稱</a></th>
												<th width="12%">項目類型</th>
												<th width="12%">投資時間</th>
												<th width="12%">投資總額</th>
												<th width="12%">總預計回報率</th>
												<th width="12%">投資人</th>
												<th width="12%">淨賺</th>
											</tr>
											
											<?php //類型是基金的 投資資料
												$total_FIELDS=mysqli_num_fields($SEL_fund_RESULT);
												while ($ROW = mysqli_fetch_row($SEL_fund_RESULT))
												{
													echo "<tr align='center'>";  // 顯示每一筆紀錄的欄位值
													for ($i=0;$i <= $total_FIELDS-1;$i++)
														echo "<td>" . $ROW[$i] . "</td>";
													echo "</tr>";
												}	
											?>
										</table>
									<div>
								</td>
							</tr>
						</tbody>	
					</table>		
					
					
					<?php  // 如果新類型 新增成功，就會再新增一個新類型的收縮 table
								
								if (!$INSERT_TYPE_RESULT)
								{	
								}	
								else
								{
									$SEL_type_newtype="SELECT * FROM invest_itemtype_table WHERE `typename`=\"$_TYPE_TYPENAME\"";
									$SEL_type_newtype_RESULT = mysqli_query($link,$SEL_type_newtype);	//  新類型 類型結果
									
									
									$SEL_item_newtype="SELECT * FROM invest_item_table WHERE `typename`=\"$_TYPE_TYPENAME\" ORDER BY `investtime`";
									$SEL_newtype_RESULT = mysqli_query($link,$SEL_item_newtype);
									
									
									echo"<br/><br/><br/>";
									echo "<table border=1 style='border:5px #D68B00 groove;' cell padding=10  width=900>";
									echo	"<thead>";
									echo		"<script type='text/javascript'>";									
									echo 		"	src='http://code.jquery.com/jquery-1.10.0.min.js'>";
									echo		"</script>";					
									echo	"</thead>";
						
									echo	"<tbody>";
									echo		"<tr width=900 align='center'>";
													
														$total_FIELDS=mysqli_num_fields($SEL_type_newtype_RESULT);
														while ($ROW = mysqli_fetch_row($SEL_type_newtype_RESULT))
														{
															// 顯示每一筆紀錄的欄位值
															for ($i=0;$i <= $total_FIELDS-1;$i++)
																echo "<th width=25%>" . $ROW[$i] . "</th>";
														}		
													
									echo				"<th width=25% >8200</th>";
									echo		"</tr>";	
							
									
									
									
									echo 		"<tr>";
									echo 			"<td colspan=5 class=entry>";
									echo 				"<a href='#expand'><b>項目細項表 </b><img src='arrow.png' width=15 height=15></a>";
									echo 				"<div class='description'>";
									echo 					"<table border=3 style='border:0px #D68B00 groove;' width=880>";
									echo 						"<tr style='background-color:#A3A3FF' >";
									echo							"<th width=22%><a href='#expand'>項目名稱</a></th>";
									echo							"<th width=12%>項目類型</th>";
									echo							"<th width=12%>投資時間</th>";
									echo							"<th width=12%>投資總額</th>";
									echo							"<th width=12%>總預計回報率</th>";
									echo							"<th width=12%>投資人</th>";
									echo							"<th width=12%>淨賺</th>";
									echo						"</tr>";
																
																	//類型是 新增 的投資資料
																	$total_FIELDS=mysqli_num_fields($SEL_newtype_RESULT);
																	while ($ROW = mysqli_fetch_row($SEL_newtype_RESULT))
																	{
																		echo "<tr align='center'>";  // 顯示每一筆紀錄的欄位值
																		for ($i=0;$i <= $total_FIELDS-1;$i++)
																			echo "<td>" . $ROW[$i] . "</td>";
																		echo "</tr>";
																	}	
																
											
									echo 					"</table>";
									echo 				"</div>";
									echo 			"</td>";
									echo 		"</tr>";
								}
							
							
									echo	"</tbody>";
									echo "</table>";
					?>		
				</div>	
			</div>
			
			
			
			
			<script type="text/javascript">  // 摺疊動起來
				
				$(document).ready(function()
								{
									$(".entry a").click(function() 
									{
										$(this).parents('.entry').find('.description').slideToggle(1000);
										return false;
									} );
								} );


			</script>
		   
		   
		   
		   
		   <!--	// CSS			
						//	背景模板的 CSS		-->
		   
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
					height: 1500px;
					background: ;
					background-image:url("3stage.png");
					background-repeat:repeat;  <!--  no-repeat; -->
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
					width: 300px;
					
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
		</font>
												
	  
	  
	</body>
</html>