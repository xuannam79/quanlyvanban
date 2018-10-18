<?php
   require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="text" name="sql">
		<input type="submit" name="submit">
	</form>
		<?php
                  if(isset($_POST['submit'])){
                  	$name = $_POST['sql'];
                  	
                  	$resultLogin = $mysqli->query($name);
                  	$arLogin = mysqli_fetch_assoc($resultLogin);
                  	
                  	if($arLogin){
                  		echo "aaaaaaaaaaaaa";
                  	}else {
                  		echo "bbbbbbbbbb";
                  	}
                  }
                  
                  ?>
</body>
</html>