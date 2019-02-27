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

	<form class="form-signin" role="form" method="POST" action="admin.php?list">
		<h2 class="form-signin-heading">تسجيل الدخول</h2><br/>
		<input type="hidden" class="form-control" placeholder="إسم المستخدم" required autofocus name="email" value="">
		<input type="text" class="form-control" placeholder="إسم المستخدم" required autofocus name="login"><br/>
		<input type="password" class="form-control" placeholder="كلمة المرور" required name="pwd">
		<button class="btn btn-lg btn-primary btn-block" type="submit">تسجيل الدخول</button>
	</form>

    </div> <!-- /container -->

</body>
</html>







