<html>

	<?php 		// 登入確認
	
		ini_set("display_errors", "On");
		require_once "../method/connect.php";

		$ACC_ = $_POST['account_'];
		$PW_ = $_POST['password_'];

		$select = $connect -> prepare("SELECT * FROM member_table WHERE account = :acc AND password = :pw");
		$select -> execute(array(':acc' => $ACC_,':pw' => $PW_));

		$result = $select -> fetch(PDO::FETCH_ASSOC) ;


		if ($result['account']== $ACC_ && $result['password'] == $PW_) 
		{
			session_start();
			$_SESSION['member_table'] = $result;
			header("location:../");
		}
		elseif ($result['password']!=$PW_ || $result['account']!=$ACC_) 
		{
			header("location:./?error=帳密錯誤");
		}
		elseif ($result['password']!='' || $result['account']!='') 
		{
			header("location:./?error=輸入不完全");
		}

	?>




</html>