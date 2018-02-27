<!DOCTYPE html>     
<html>     
<head>     
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<script src="js/form.js" type="text/javascript"></script> 
</head>               
<body>   
<?php 
setcookie("id", "", time()-1);
setcookie("username", "",  time()-1);
setcookie("name",  "", time()-1);
setcookie("password", "",  time()-1);


?>
<script>
location.href="index.php";
</script>
</body>     
</html>