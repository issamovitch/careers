<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>إدارة التوظيف</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset("public/favicon.ico")); ?>" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Said Asebbane">
    <link href="<?php echo e(asset("public/front/css/bootstrap.min.css")); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset("public/front/css/paper-bootstrap-wizard.css")); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset("public/front/css/font-awesome.min.css")); ?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Cairo:400,300' rel='stylesheet' type='text/css'>
</head>

<body>

<div class="image-container set-full-height" style="background-image: url('<?php echo e(asset("storage/app/". @$settings["bg"]->value)); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <script>var uurl = "<?php echo e(route('add')); ?>";</script>

                        <form id="Form" name="form" method="post" action="<?php echo e(route("add")); ?>" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <div class="wizard-header text-center">
                                <h3 class="wizard-title"><?php echo e(@$settings["title0"]->value); ?></h3>
                                <p class="category"><?php echo e(@$settings["text0"]->value); ?></p>
                            </div>
                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div id="wid" class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                </div>
                                <ul>
                                    <li> <a href="#about" data-toggle="tab" id="firstt">
                                            <div class="icon-circle"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                                            <?php echo e(@$settings["title1"]->value); ?> </a> </li>
                                    <li> <a href="#account" data-toggle="tab">
                                            <div class="icon-circle"> <i class="fa fa-briefcase" aria-hidden="true"></i> </div>
                                            <?php echo e(@$settings["title2"]->value); ?> </a> </li>
                                    
                                </ul>
                            </div>
                            <div class="tab-content" id="loader">

                                <div class="row">
                                    <div style="text-align:center; padding-top:20px"><img width="100" src="<?php echo e(asset("storage/app/". @$settings["loading_image"]->value)); ?>" /></div>
                                </div>

                            </div>
                            <div class="tab-content result">

                                <div class="row">
                                    <div style="text-align:center; padding-top:20px"><img width="100" src="<?php echo e(asset("storage/app/". @$settings["success_image"]->value)); ?>"></div>
                                    <h4 class="info-text gren"><?php echo e(@$settings["success_message"]->value); ?></h4>
                                </div>

                            </div>

                            <div class="tab-content sender">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h5 class="info-text"> <?php echo e(@$settings["text1"]->value); ?></h5>
                                        <?php if(@$settings["upload_photo"]->value==1): ?>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                                <div class="picture-container">
                                                    <div class="picture"> <img src="<?php echo e(asset("public/front/images/default-avatar.jpg")); ?>" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input class="file" id="wizard-picture" name="monfichier" type="file" >
                                                        <!--<input type="hidden" name="MAX_FILE_SIZE" value="100000" />-->
                                                    </div>
                                                    <h6>اختر صورة</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                        <?php endif; ?>
                                    </div>

                                    <?php echo $__env->make("fields2", ["fields2"=>$fields2, "location"=>0], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                        
                                </div>

                                <div class="tab-pane" id="account">
                                    <h5 class="info-text"> <?php echo e(@$settings["text2"]->value); ?> </h5>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <input type="hidden" id="location" name="location" value="0">
                                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" data-val="<?php echo e($job->id); ?>">
                                                        <div class="card card-checkboxes card-hover-effect"> <i class="fa <?php echo e($job->icon); ?>" aria-hidden="true"></i>
                                                            <p><?php echo e($job->name); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="col-sm-12">
                                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-sm-12 fields" id="fields<?php echo e($job->id); ?>">
                                                    <?php echo $__env->make("fields", ["location"=>$job->id], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="address">
                                    <h5 class="info-text"> <?php echo e(@$settings["text3"]->value); ?> </h5>
                                </div>

                            </div>
                            <div class="wizard-footer sender">
                                <div class="pull-right" style="float:left !important">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='التالي' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value="إرسال" />
                                </div>
                                <div class="pull-left" style="float:right !important">
                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='السابق' />
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script src="<?php echo e(asset("public/front/js/jquery-2.2.4.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/ajax.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/bootstrap.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/jquery.bootstrap.wizard.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/paper-bootstrap-wizard.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/jquery.validate.min.js")); ?>" type="text/javascript"></script>

<script>
    $(document).ready(function() {

        $(".choice").on("click", function (e) {
            e.preventDefault();
            var val = $(this).data("val");
            $("#location").val(val);
            $(".fields").fadeOut();
            $("#fields"+val).fadeIn();
        });


        // Selectors Vars
        var sender				= $(".sender"),
            result				= $(".result")

        // Fading Time
        var fadingTime			= 1000,
            resultShowTime		= 3000;

        // Send Mail with Ajax
        $('#Form').submit( function(e) {
            //e.preventDefault();
            if($("#location").val()==0){
                alert("يجب إختيار التخصص !");
                return;
            }
            var loc = $("#location").val();

            var close=true;
            $('#fields'+loc+' .form-control[required]').each(function () {
                if(!this.value || this.value=="")
                    close = false;
            });

            if(close==false){
                alert("يجب تعبئة جميع بيانات التخصص !");
                $("#myModal"+loc).modal("show");
                return false;
            }
            return true;
            var data = new FormData(this);
            $.ajax({
                url: uurl,
                type: "post",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.sender').hide(1000);
                    $('#loader').fadeIn(1000);

                },
                complete: function(){
                    $('#loader').hide();
                },
                success: function(data){
                    console.log(data);
                    console.log(data.status);
                    return;
                    if(data.status=="ok"){
                        sender.fadeOut(fadingTime, function(){
                            result.fadeIn(fadingTime, function() {
                                location.reload();
                                $(this).delay(resultShowTime).fadeOut(fadingTime, function(){
                                    sender.fadeIn();
                                    //$("#firstt").trigger("click");

                                });
                            });
                            $("#Form").trigger("reset");
                        });
                    }
                    else if(data.status=="DUPLICATED"){
                        alert("عذرا البريد الإلكتروني مستعمل !");
                        $("#firstt").trigger("click");
                        sender.fadeIn();
                    }

                },
                error: function(){

                }
            });
        });

    });

    $(function(){
        $(".btn-finish").click(function(){
            document.getElementById("wid").style.width = "100%";
        });
    });

</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script>

    (function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2&&jQuery.fn.select2.amd)var e=jQuery.fn.select2.amd;return e.define("select2/i18n/ar",[],function(){return{errorLoading:function(){return"لا يمكن تحميل النتائج"},inputTooLong:function(e){var t=e.input.length-e.maximum;return"الرجاء حذف "+t+" عناصر"},inputTooShort:function(e){var t=e.minimum-e.input.length;return"الرجاء إضافة "+t+" عناصر"},loadingMore:function(){return"جاري تحميل نتائج إضافية..."},maximumSelected:function(e){return"تستطيع إختيار "+e.maximum+" بنود فقط"},noResults:function(){return"لم يتم العثور على أي نتائج"},searching:function(){return"جاري البحث…"}}}),{define:e.define,require:e.require}})();

    $(function () {

        $('.datepicker').datepicker({format: 'yyyy-mm-dd', rtl: true, language: 'ar'});

        $(".timepicker").timepicker({ showMeridian:false, icons:{up: 'fa fa-chevron-up', down: 'fa fa-chevron-down'}});

        $(".select2x").select2({dir: "rtl", language: "ar"});

    });
</script>

<style>
    span.red{
        color: crimson;
    }
    .modal .form-control{
        border-radius: 0px;
    }
    .modal .input-group-addon{
        border-left: 1px solid #e8e7e3 !important;
        border-radius: 0px;
    }
    .modal .input-group .form-control{
        border-right: 1px solid #e8e7e3 !important;
        border-left: none !important;
        border-radius: 0px;
    }
    .datepicker{
        text-align: right;
    }
    .bootstrap-timepicker-widget{
        direction: ltr !important;
        right: auto !important;
    }
    .select2-selection{
        padding: 1px !important;
        border-color: #eee;
    }
    .select2-container, .selection, .select2-selection {
        display: block;
        width: 100% !important;
    }
    .select2-selection{
        border-radius: 0px !important;
        padding: 3px !important;
        background: #F3F2EE !important;
        border: 1px solid #e8e7e3 !important;
    }
    .select2-container .select2-selection--single {
        height: 35px!important;
    }
    .modal-backdrop{
        display: none;
    }
    .modal-header, .modal-body, .modal-footer{
        padding: 10px 15px;
    }
    .form-group {
        margin-bottom: 10px;
    }
    .fields{
        display: none;
    }
    .jconfirm-title-c.jconfirm-hand{
        display: none;
    }
</style>

<style>
    .wizard-card[data-color="orange"] .nav-pills > li.active > a:after,
    .wizard-card[data-color="orange"] .wizard-navigation .progress-bar,
    .navbar .navbar-nav > li > a.btn.btn-warning.btn-fill, .btn-warning.btn-fill,
    .navbar .navbar-nav > li > a.btn.btn-warning.btn-fill:hover, .btn-warning.btn-fill:hover{
        background-color: <?php echo e(@$settings["color"]->value); ?> !important;
    }
    .wizard-card[data-color="orange"] .nav-pills .icon-circle.checked,
    .wizard-card[data-color="orange"] .picture:hover,
    .navbar .navbar-nav > li > a.btn.btn-warning.btn-fill, .btn-warning.btn-fill,
    .navbar .navbar-nav > li > a.btn.btn-warning.btn-fill:hover, .btn-warning.btn-fill:hover{
        border-color: <?php echo e(@$settings["color"]->value); ?> !important;
    }
    .wizard-card[data-color="orange"] .choice.active .card-checkboxes,
    .wizard-card[data-color="orange"] .nav-pills > li.active > a,
    .info-text.gren{
        color: <?php echo e(@$settings["color"]->value); ?> !important;
    }
    .wizard-card .icon-circle{
        font-size: 40px;
        width: 90px;
        height: 90px;
    }
    .nav-pills > li > a [class*="fa"]{
        font-size: 36px;
    }
    .nav-pills > li.active > a [class*="fa"], .nav-pills > li.active > a:hover [class*="fa"], .nav-pills > li.active > a:focus [class*="fa"]{
        font-size: 34px;
    }
    .nav-pills > li.active > a:after{
        width: 90px;
        height: 90px;
        right: 3px;
    }
    .nav-pills > li > a{
        max-width:100px;
    }
    jconfirm-content{
        min-height: 30px;
        font-size: 1.3em;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script>
    $(function () {

        <?php if(Session::has('error')): ?>
        $.alert({
            backgroundDismiss: true,
            title: 'خطأ',
            icon: 'icon-warning-sign',
            type: 'red',
            content: '<?php echo e(Session::get('error')); ?>',
            buttons: {
                heyThere: {
                    text: 'إغلاق',
                    btnClass: 'btn-red',
                },
            }
        });
        <?php endif; ?>

        <?php if(Session::has('success')): ?>
        $.alert({
            backgroundDismiss: true,
            title: 'نجاح',
            icon: 'icon-ok-circle',
            type: 'green',
            content: '<?php echo e(Session::get('success')); ?>',
            buttons: {
                heyThere: {
                    text: 'إغلاق',
                    btnClass: 'btn-success',
                },
            }
        });
        <?php endif; ?>

    });
</script>

</html>
