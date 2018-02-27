<!DOCTYPE html>     
<html>     
<head>     
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<!--框架-->
<link rel="stylesheet" href="css/jquery.mobile.min.css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="js/jquery.mobile.min.js" ></script>  
<script>
$( "#mypanel" ).trigger( "updatelayout" );  
</script> 
<script type="text/javascript">
$(document).ready(function(){
	$("div").bind("swiperight", function(event) {
		$( "#mypanel" ).panel( "open" );
	});  
});
</script>
<script src="js/form.js" type="text/javascript"></script> 
<style type="text/css">
.red { text-decoration:underline; font-weight:bold;}
.blue {font-weight:bold;}
</style>
</head>               
<body>   
<?php include('sql_connect.php'); ?> 
<?php header("Content-Type:text/html;charset=UTF-8"); ?>
<?php
	$is_login=0;
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
	if(isset($_GET['zhanghao']) && isset($_GET['mima']))
	{
		$zhanghao = trim($_GET['zhanghao']);
		$mima = trim($_GET['mima']);
		if( $zhanghao == '' || $mima == ''){
			echo "<script language='javascript'>alert('对不起，提交信息不能够为空!');history.back();</script>"; 
			exit; 		
		}		
		$sql_query="SELECT * FROM user WHERE user_name='".$zhanghao."'";
		$result=mysql_query($sql_query,$sql->con);
		while($row = mysql_fetch_array($result))
		{
			if($mima==$row['password'])
			{
				$is_login=1;
				$id=$row['user_id'];
				$username=$row['user_name'];
				$name=$row['user_nicheng'];
				$password=$row['password'];
				setcookie("id", $id, time()+3600);
				setcookie("username", $username, time()+3600);
				setcookie("name", $name, time()+3600);
				setcookie("password", $password, time()+3600);
			}
		}
	}
	if(isset($_COOKIE['id']))
	{
		$is_login=1;
		$id=$_COOKIE['id'];
		$username=$_COOKIE['username'];
		$name=$_COOKIE['name'];
		$password=$_COOKIE['password'];
	}
?>  
<div data-role="page">
	<div data-role="panel" id="mypanel">
	<?php
		if(0==$is_login)
		{
			echo "<form>";
			echo "<label for='zhanghao'>真名:</label>";
			echo "<input name='zhanghao' id='zhanghao' value='' type='text'>";
			echo "<label for='zhanghao'>密码:</label>";
			echo "<input name='mima' id='mima' value='' type='text'>";
			echo "<fieldset class='ui-grid-a'>";
			echo "<div class='ui-block-a'>";
			echo "<a data-role='button' onclick='login();'>登录</a>";
			echo "</div>";
			echo "<div class='ui-block-b'>";
			echo "<a href='register.php' data-role='button'>注册</a>";
			echo "</div>";
			echo "</fieldset>";
			echo "</form>";
		}
		else
		{
			echo "<h4>已登录</h4>";
			echo "<p>真名：";
			echo $username;
			echo "</p>";
			echo "<p>昵称：";
			echo $name;
			echo "</p>";
		}
	?>
	</div>
	<div data-role="header" data-position="fixed">
		<h1>
 		<?php
		if(0==$is_login)
		{
			echo "闺蜜说";
		}
		else
		{

			echo "[". $name . "]";
			echo "的闺蜜说";
		}
		?>       
        </h1>
	</div>
	<div data-role="content">
		<div data-role="collapsible-set">
		<?php
			$sql_query="SELECT * FROM message,user_message,user 
			WHERE user_message.message_id=message.message_id 
			AND user_message.user_id=user.user_id";
			$result=mysql_query($sql_query,$sql->con);
		?>
		<?php
			$num = 1;
			while($row = mysql_fetch_array($result))
			{
				echo "<div data-role='collapsible'>";
				echo "<h4>";
				echo "<span class='red'>".$row['user_nicheng']."</span>对<span class='red'>".$row['message_demo']."</span>说";
				echo "</h4>";
				echo "<h4>";
				echo $row["message_neirong"];
				echo "</h4>";
				$message_id = $row['message_id'];
				$sql_query="SELECT * FROM replay,replay_info,user WHERE replay.replay_id=replay_info.replay_id AND user.user_id=replay.user_id AND replay_info.message_id=".$row['message_id'];
				$result1=mysql_query($sql_query,$sql->con);
				
				while($row1 = mysql_fetch_array($result1))
				{
					echo "<p><span class='blue'>";
					echo $row1['user_nicheng'];
					echo "</span>：";
					echo $row1['replay_neirong'];
					echo "</p>";
					

				}
				if(1==$is_login)
				{
					echo "<form id='frm".$num."'>";
					echo "<input type='text' id='replay_text'>";
					echo "<input type='hidden' id='bianhao' value='";
					echo $message_id;
					echo "'>";
					echo "<input type='hidden' id='nicheng' value='";
					echo $name;
					echo "'>";						
					echo "<a href='' data-role='button' onclick='replay(".$num.");'>跟说</a>";
					echo "</form>";
				}
				$num = $num + 1;			
				echo "</div>";
			}
		?>
		</div>
	</div>
	<div data-role="footer" data-position="fixed">
		<div  data-role="navbar" data-position="fixed">    
			<ul>
				<?php
                if(0==$is_login)
                {
                    echo '<li><a href="index.php" data-ajax="false" rel="external">闺蜜说</a></li>';
					echo '<li><a href="login.html" data-ajax="false" rel="external">登录</a></li>';
					echo '<li><a href="register.php" data-ajax="false" rel="external">注册</a></li>';
                }
                else
                {
					echo '<li><a href="index.php" data-ajax="false" rel="external">闺蜜说</a></li>';
                    echo '<li><a href="say.php" data-ajax="false" rel="external">我要说</a></li>';
					echo '<li><a href="exit.php" data-ajax="false" rel="external">退出</a></li>';
                }
                ?>                
			</ul>    
		</div>
	</div>
</div>
</body>     
</html>
