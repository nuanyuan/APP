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
        <h1>注册为闺蜜</h1>
    </div>
    <!--内容栏，用来填写注册信息-->
    <div data-role="content">
        <form>
            <label for="zhanghao">真名（请尽量使用真实姓名）:</label>
            <input name="zhanghao" id="zhanghao" value="" type="text">
            <label for="nicheng">昵称:</label>
            <input name="nicheng" id="nicheng" value="" type="text">
            <label for="zhanghao">密码:</label>
            <input name="mima" id="mima" value="" type="text">
            <a data-role="button" onclick="register()">注册</a>
            <!--<input type="submit" value="注册" data-role="button" >-->
        </form>
    </div>
    <div data-role="footer" data-position="fixed">
        <div  data-role="navbar" data-position="fixed">
            <ul>
                <li><a href="index.php" data-ajax="false" rel="external">闺蜜说</a></li>
                <li><a href="login.html" data-ajax="false" rel="external">登录</a></li>
                <li><a href="register.php" data-ajax="false" rel="external">注册</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>