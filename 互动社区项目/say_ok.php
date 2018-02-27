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
	$who=trim($_GET["who"]);
	$what=trim($_GET["what"]);
	if( $who == '' || $what == ''){
		echo "<script language='javascript'>alert('对不起，提交信息不能够为空!');history.back();</script>"; 
		exit; 		
	}	
?>
<?php
	if(isset($_COOKIE['id']))
	{
		$sql=new SQL_CONNECT();
		$sql->connection();
		$sql->set_laugue();
		$sql->choice();
	
		$sql_query="SELECT * FROM message";
		$result=mysql_query($sql_query,$sql->con);
		$num=1;
		while($row = mysql_fetch_array($result))
		{
			$num=$num+1;
		}
		$sql_query="INSERT INTO message (message_id,message_neirong,message_demo) VALUES ($num,'$what','$who')";
		mysql_query($sql_query);
		$id = intval($_COOKIE['id']);
		$sql_query="INSERT INTO user_message (message_id,user_id) VALUES ($num, $id)";
		mysql_query($sql_query);	
		
		$sql->disconnect();
	}
	else
	{
		echo "<script language='javascript'>alert('对不起，请登录!');</script>"; 
		exit;		
	}
?>
<script>
	location.href="index.php";
</script>
</body>     
</html>