<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/form.js" type="text/javascript"></script>
	</head>

	<body>
		<?php include('sql_connect.php'); ?>
		<?php header("Content-Type:text/html;charset=UTF-8"); ?>
		<?php 
	$zhanghao=trim($_GET["zhanghao"]);
	$nicheng=trim($_GET["nicheng"]);
	$mima=trim($_GET["mima"]);
	if( $zhanghao == '' || $nicheng == '' || $mima == ''){
		echo "<script language='javascript'>alert('对不起，注册信息不能够为空!');history.back();</script>"; 
		exit; 		
	}
?>
		<?php
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();

	$sql_query1 = mysql_query("select user_name from user where user_name='$zhanghao' or user_nicheng='$nicheng' ",$sql->con);
	$info=mysql_fetch_array($sql_query1);
	if($info!=false){
		echo "<script language='javascript'>alert('对不起，该昵称已被其他用户使用!');history.back();</script>"; 
		exit; 
	}
	
	$sql_query2 = "SELECT * FROM user";
	$result = mysql_query($sql_query2, $sql->con);
	$num=1;
	while($row = mysql_fetch_array($result))
	{
		$num=$num+1;
	}
	$sql_query3 = "INSERT INTO user (user_id,user_name,user_nicheng,password) VALUES ($num,'$zhanghao','$nicheng','$mima')";
	mysql_query($sql_query3);
	$sql->disconnect();
?>
			<script>
				location.href = "index.php";
			</script>
	</body>

</html>