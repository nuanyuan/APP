<?php include('sql_connect.php'); ?> 
<?php header("Content-Type:text/html;charset=UTF-8"); 
?>
<?php 
	$replay_text=trim($_GET["replay_text"]);
	$bianhao=trim($_GET["bianhao"]);
	if( $replay_text == '' || $bianhao == ''){
		echo "0"; 
		exit; 		
	}	
?>
<?php
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
	mysql_query("set names utf8");//设置编码
	
	//字符编码
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET CHARACTER SET utf8"); 
	mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'"); 
		
	$sql_query1="SELECT * FROM replay";
	$result=mysql_query($sql_query1,$sql->con);
	$num=1;
	while($row = mysql_fetch_array($result))
	{
		$num=$num+1;
	}
	if(isset($_COOKIE['id']))
	{
		$id = intval($_COOKIE['id']);
		$sql_query2="INSERT INTO replay_info (message_id,replay_id) VALUES ($bianhao, $num)";
		mysql_query($sql_query2);
		//$replay_text1 = iconv('UTF-8','gb2312',$replay_text);
		$sql_query3="INSERT INTO replay (replay_id, user_id, replay_neirong) VALUES ($num,  $id, '$replay_text')";
		mysql_query($sql_query3);
		echo "1";
	}
	else
	{
		echo "0";
	}
	$sql->disconnect();
?>