<?php $__env->startSection("content"); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">النماذج</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">إضافة نموذج</span>
                    <a href="<?php echo e(route("fields")); ?>" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-reply"></i> عودة للقائمة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body row">

                    <form class="col-sm-offset-3 col-sm-6" role="form" action="<?php echo e(route("fields_save")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">إسم الحقل</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="job_id">الوظيفة</label>
                                <select class="form-control" id="job_id" name="job_id" required>
                                    <option value="">إختر</option>
                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($job->id); ?>"><?php echo e($job->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="job_id">المكان</label>
                                <select class="form-control" id="location" name="location" required>
                                    <option value="">إختر</option>
                                    <option value="0">المرحلة الأولى</option>
                                    <option value="1">المرحلة الثانية</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">نوع الحقل</label>
                                <select  class="form-control" id="type" name="type" required>
                                    <option value="text">نص</option>
                                    <option value="name">الإسم</option>
                                    <option value="email">البريد الإلكتروني</option>
                                    <option value="country">الدولة</option>
                                    <option value="textarea">حقل نصي</option>
                                    <option value="date">حقل تاريخ</option>
                                    <option value="time">حقل وقت</option>
                                    <option value="select">قائمة</option>
                                    <option value="multiple">قائمة متعددة</option>
                                    <option value="file">ملف مرفق</option>
                                </select>
                            </div>
                            <div class="form-group" id="options_wrapper">
                                <label for="options">الخيارات</label>
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-sm-11"><input type="text" class="form-control" id="options" name="options[]" ></div>
                                    <div class="col-sm-1"><a class="btn-delete btn btn-danger btn-xs">حذف</a></div>
                                </div>
                                <div class="put_here"></div>
                                <div class="clearfix" style="margin-top: 10px"></div>
                                <a class="btn-add btn btn-primary btn-xs">إضافة خيار</a>
                                <div class="clearfix" style="margin-top: 10px"></div>
                            </div>
                            <div class="form-group">
                                <label for="placeholder">نص المساعدة</label>
                                <input type="text" class="form-control" id="placeholder" name="placeholder">
                            </div>
                            <div class="form-group">
                                <label for="required">إجباري</label>
                                <select type="text" class="form-control" id="required" name="required" required>
                                    <option value="0">لا</option>
                                    <option value="1">نعم</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <style>
        select.form-control{
            padding: 3px !important;
        }
        #options_wrapper{
            display: none;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>

    <script>
        $(function () {

            $("#type").on("change", function () {
                var val = $(this).val();
                if(val=="select" || val=="multiple"){
                    $("#options_wrapper").slideDown();
                    $("#options").prop("required", true);
                }else{
                    $("#options_wrapper").slideUp();
                    $("#options").prop("required", false);
                }
            });

            $(document).on("click", ".btn-delete", function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                console.log($(this).parent().parent());
            });

            $(document).on("click", ".btn-add", function (e) {
                e.preventDefault();
                $(".put_here").append('<div class="row" style="margin-bottom: 15px;">\n' +
                    '                                    <div class="col-sm-11"><input type="text" class="form-control" id="options" name="options[]" ></div>\n' +
                    '                                    <div class="col-sm-1"><a class="btn-delete btn btn-danger btn-xs">حذف</a></div>\n' +
                    '                                </div>');
            });

        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>