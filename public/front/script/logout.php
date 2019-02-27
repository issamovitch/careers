<?php

	session_start();
	if (isset($_SESSION['session_id']))
		session_unset($_SESSION['session_id']);
	if (isset($_SESSION['logged']))
		session_unset($_SESSION['logged']);
	if (isset($_SESSION['login']))
		session_unset($_SESSION['login']);
	if (isset($_SESSION['pwd']))
		session_unset($_SESSION['pwd']);
	session_destroy();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>لوحة التحكم</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/favicon.ico" />
	
	<link rel="stylesheet" href="css/script/bootstrap.min.css">
	<link rel="stylesheet" href="css/script/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/script/bootstrap-rtl.css">
	
	<script src="js/script/jquery.min.js"></script>	
	<script src="js/script/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="css/script/custom.css">
	<script src="js/script/custom.js"></script>


</head>
<body>
	<br /><br /><br />
	<div class="container">
		<div class="col-sm-offset-3 col-sm-5 alert alert-success" role="alert">لقد تم قطع اتصالك بنجاح. <a href="admin.php" class="alert-link">تسجيل الدخول مرة أخرى</a></div>
    </div>


</body>
</html>







