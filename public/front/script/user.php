
<div class="container myform">
  <h3>تعديل البيانات</h3>
  <form method="POST" action="admin.php?update" class="form-horizontal" role="form">
    <input type='hidden' name='id' value='<?php echo $user->attributes()->id;?>'/>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">الإسم الشخصي</label>
      <div class="col-sm-5">
        <input class="form-control" type='text' name='Firstname' value='<?php echo $user->Firstname;?>' />
      </div>
    </div>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">الإسم العائلي</label>
      <div class="col-sm-5">
        <input class="form-control" type='text' name='Lastname' value='<?php echo $user->Lastname;?>' />
      </div>
    </div>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">البريد الإلكتروني</label>
      <div class="col-sm-5">
        <input class="form-control" type='email' name='Email' value='<?php echo $user->Email;?>' />
      </div>
    </div>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">العمل</label>
      <div class="col-sm-5">
        <input class="form-control" type='text' name='Job1' value='<?php echo $user->Job1;?>' />
        <input class="form-control" type='text' name='Job2' value='<?php echo $user->Job2;?>' />
        <input class="form-control" type='text' name='Job3' value='<?php echo $user->Job3;?>' />
      </div>
    </div>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">إسم الشارع</label>
      <div class="col-sm-5">
        <input class="form-control" type='text' name='Street' value='<?php echo $user->Street;?>' />
      </div>
    </div>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">رقم الشارع</label>
      <div class="col-sm-5">
        <input class="form-control" type='text' name='Nstreet' value='<?php echo $user->Nstreet;?>' />
      </div>
    </div>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">المدينة</label>
      <div class="col-sm-5">
        <input class="form-control" type='text' name='City' value='<?php echo $user->City;?>' />
      </div>
    </div>
    <div class="form-group">
      <label for="input" class="col-sm-2 control-label">الدولة</label>
      <div class="col-sm-5">
        <input class="form-control" type='text' name='Country' value='<?php echo $user->Country;?>' />
      </div>
    </div>
    <input class="form-control" type='hidden' name='Date' value='<?php echo $user->Date;?>' />
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10" >
        <input type="submit" class="btn btn-default" value="حفظ"/>
      </div>
    </div>
  </form>
</div>
