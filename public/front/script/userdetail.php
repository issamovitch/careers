
<div class="container myform">
<h3>التفاصيل</h3>

<form method="POST" action="admin.php?detail" class="form-horizontal" role="form">
	
	<div class="form-group">	
		<div class="col-sm-5">
			<label class="control-label">
            <img src="./pics/<?php echo $user->monfichier;?>" width="100" height="100" style="border-radius:50%" />
            <label/>
		</div>
	</div>

	<div class="form-group">	
		<label for="input" class="col-sm-2 control-label">الإسم الشخصي</label>
		<div class="col-sm-5">
			<label class="control-label"><?php echo $user->Firstname;?><label/>
		</div>
	</div>
	<div class="form-group">	
		<label for="input" class="col-sm-2 control-label">الإسم العائلي</label>
		<div class="col-sm-5">
			<label class="control-label"><?php echo $user->Lastname;?><label/>
		</div>
	</div>
	
	<div class="form-group">	
		<label for="input" class="col-sm-2 control-label">البريد الإلكتروني</label>
		<div class="col-sm-5">
			<label class="control-label"><?php echo $user->Email;?><label/>
		</div>
	</div>
    
    <div class="form-group">	
		<label for="input" class="col-sm-2 control-label">العمل</label>
		<div class="col-sm-5">
			
            <label class="control-label"><?php echo $user->Job1, "&nbsp;",  $user->Job2, "&nbsp;", $user->Job3;?><label/>
		</div>
	</div>
    
    <div class="form-group">	
		<label for="input" class="col-sm-2 control-label">العنوان</label>
		<div class="col-sm-8">
			<label class="control-label"><?php echo $user->Street, "&nbsp;",  $user->Nstreet, "&nbsp;",  $user->City;?><label/>
		</div>
	</div>
    
    <div class="form-group">	
		<label for="input" class="col-sm-2 control-label">الدولة</label>
		<div class="col-sm-8">
			<label class="control-label"><?php echo $user->Country;?><label/>
		</div>
	</div>
    
	
    <div class="form-group">	
		<label for="input" class="col-sm-2 control-label">التاريخ</label>
		<div class="col-sm-5">
			<label class="control-label"><?php echo $user->Date;?><label/>
		</div>
	</div>
    
</form>
</div>	
