<!DOCTYPE html>     
<html>     
<head>     
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<!--框架-->
<link rel="stylesheet" href="css/jquery.mobile.min.css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="js/jquery.mobile.min.js" ></script>  
<script src="js/form.js" type="text/javascript"></script> 
</head>               
<body>  
  
<div data-role="page">
	<div data-role="header" data-position="fixed">
		<h1>
 		<?php
		if(isset($_COOKIE['id']))
		{
			echo $_COOKIE['username'];
			echo " 要说 ......";			
		}
		else
		{
			echo "说啥呢";
		}
		?>          
        </h1>
	</div>
	<div data-role="content">
        <form action="say_ok.php" method="get">
            <label for="who">对谁说:</label>
            <select name="who" id="who" data-native-menu="false">
            	<option value='所有人'>所有人</option>
			<?php include('sql_connect.php'); ?> 
            <?php header("Content-Type:text/html;charset=UTF-8"); ?>
            <?php
                $sql=new SQL_CONNECT();
                $sql->connection();
                $sql->set_laugue();
                $sql->choice();
                if(isset($_COOKIE['id']))
                {
                    $sql_query="SELECT * FROM user";
                    $result=mysql_query($sql_query,$sql->con);
                    while($row = mysql_fetch_array($result))
                    {
						$name=$row['user_name'];
						$nicheng=$row['user_nicheng'];
						echo "<option value='$nicheng'>$nicheng</option>";
                    }
                }
				$sql->disconnect();
            ?>             
        	</select>
            <label for="what">说什么:</label>
            <textarea rows="20" name="what" id="what">
			</textarea>
            <input type="submit" value="发布" >
        </form>
	</div>
	<div data-role="footer" data-position="fixed">
		<div  data-role="navbar" data-position="fixed">    
			<ul>        
					<li><a href="index.php" data-ajax="false" rel="external">闺蜜说</a></li>
					<li><a href="exit.php" data-ajax="false" rel="external">退出</a></li>
         
			</ul>    
		</div>
	</div>
</div>
</body>     
</html>
