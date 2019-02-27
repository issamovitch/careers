<?php $__env->startSection("content"); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الحقول الإضافية</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">تعديل الحقل </span>
                    <a href="<?php echo e(route("fields")); ?>" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-reply"></i> عودة للقائمة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body row">

                    <form class="col-sm-offset-3 col-sm-6" role="form" action="<?php echo e(route("fields_update")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($field->id); ?>">
                        
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">إسم الحقل</label>
                                <input type="text" class="form-control" id="name" name="name" required value="<?php echo e($field->name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="location">مكان الحقل</label>
                                <select class="form-control" id="location" name="location" required>
                                    <option value="1" <?php if($field->location=="1"): ?> selected <?php endif; ?>>مصمم</option>
                                    <option value="2" <?php if($field->location=="2"): ?> selected <?php endif; ?>>مكود</option>
                                    <option value="3" <?php if($field->location=="3"): ?> selected <?php endif; ?>>مبرمج</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">نوع الحقل</label>
                                <select type="text" class="form-control" id="type" name="type" required>
                                    <option value="text" <?php if($field->type=="text"): ?> selected <?php endif; ?>>نص</option>
                                    <option value="textarea" <?php if($field->type=="textarea"): ?> selected <?php endif; ?>>حقل نصي</option>
                                    <option value="date" <?php if($field->type=="date"): ?> selected <?php endif; ?>>حقل تاريخ</option>
                                    <option value="time" <?php if($field->type=="time"): ?> selected <?php endif; ?>>حقل وقت</option>
                                    <option value="select" <?php if($field->type=="select"): ?> selected <?php endif; ?>>قائمة</option>
                                    <option value="multiple" <?php if($field->type=="multiple"): ?> selected <?php endif; ?>>قائمة متعددة</option>
                                </select>
                            </div>
                            <div class="form-group" id="options_wrapper">
                                <label for="options">الخيارات</label>
                                <textarea type="text" class="form-control" id="options" name="options"><?php echo e($field->options); ?></textarea>
                                <small>ضع فاصلة بين الخيارات</small>
                            </div>
                            <div class="form-group">
                                <label for="placeholder">نص المساعدة</label>
                                <input type="text" class="form-control" id="placeholder" name="placeholder" value="<?php echo e($field->placeholder); ?>">
                            </div>
                            <div class="form-group">
                                <label for="required">إجباري</label>
                                <select type="text" class="form-control" id="required" name="required" required>
                                    <option value="0" <?php if($field->required=="0"): ?> selected <?php endif; ?>>لا</option>
                                    <option value="1" <?php if($field->required=="1"): ?> selected <?php endif; ?>>نعم</option>
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
            display: <?php if($field->type=="select" or $field->type=="multiple"): ?> block <?php else: ?> none <?php endif; ?>;
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
            })
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>