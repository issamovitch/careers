<?php
	session_start();
	
	if( isset($_POST['email']) && !empty($_SESSION['email']) ){
		//Honey Pot : This field must not be set or filled
		header("Location:index.php");
	} 
	else if( !(isset($_SESSION['logged']) && $_SESSION['logged']) && (!isset($_POST['login']) || empty($_POST['login']) || !isset($_POST['pwd']) || empty($_POST['pwd'])) ) {
		//login empty or not set
		header("Location:index.php");
	}
	
	$loginInput = $passInput = null;
	
	if (isset($_POST['login']))
		$loginInput = $_POST['login'];
	if (isset($_POST['pwd']))
		$passInput = $_POST['pwd'];
		
	$users = simplexml_load_file("data/users.xml");
	foreach ($users as $user){
		$validated = ($user->pseudo == $loginInput && $user->pwd == $passInput);
	}
	
	if ($validated){
		session_regenerate_id();
		$_SESSION['session_id'] = session_id();
		$_SESSION['logged'] = true;
		$_SESSION['login'] = $loginInput;
		$_SESSION['pwd'] = $passInput;
	}
	
	if (!isset($_SESSION['session_id']) || empty($_SESSION['session_id']) || !isset($_SESSION['logged']) || !$_SESSION['logged']){
		header("Location:index.php");
	}

	
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>خطوات</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="icon" type="image/png" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/script/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/script/bootstrap-rtl.css">
<link rel="stylesheet" type="text/css" href="css/script/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/script/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/script/custom.css">
<link rel="stylesheet" type="text/css" href="css/script/btn-xlsx.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet"> 


<script type="text/javascript" src="js/script/jquery.min.js"></script>
<script type="text/javascript" src="js/script/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script/custom.js"></script>


<!------------Table Sort-------------->
<script type="text/javascript" src="js/script/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/script/dataTables.bootstrap.min.js"></script>  
    <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
  </script>
  
<!------------Export Excel-------------->  
<script type="text/javascript" src="js/script/xlsx.core.min.js"></script>
<script type="text/javascript" src="js/script/Blob.js"></script>
<script type="text/javascript" src="js/script/FileSaver.js"></script>
<script type="text/javascript" src="js/script/tableexport.min.js"></script>
<script type="text/javascript" src="js/script/main.min.js"></script>
</head>
<body>
<div class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Nav</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="admin.php?list">الرئيسية</a> </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="excel.php?excel">التفريع إلى Excel</a></li>
        <li><a href="../index.html" target="_blank">صفحة الفورم</a></li>
        <li><a href="logout.php">خروج</a></li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
<div class="container"> </div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">تأكيد الحذف</h4>
      </div>
      <div class="modal-body">
        <p>أنت على وشك حذف بيانات, هذا الإجراء لا رجعة فيه. هل تريد تفعيله؟</p>
        <p class="debug-url"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
        <a href="#" class="btn btn-danger danger">حذف</a> </div>
    </div>
  </div>
</div>
