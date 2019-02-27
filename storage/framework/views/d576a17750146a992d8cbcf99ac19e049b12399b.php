<?php $__env->startSection("content"); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">المستخدمون</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">إضافة مستخدم</span>
                    <a href="<?php echo e(route("users")); ?>" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-reply"></i> عودة للقائمة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form role="form" action="<?php echo e(route("update_user")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($user->id); ?>" name="id">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">الإسم</label>
                                <input type="text" class="form-control" id="name" name="name" required value="<?php echo e($user->name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="email" name="email" required value="<?php echo e($user->email); ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة المرور</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small>اترك هذا الحقل فارغا إذا كنت لا تريد تغيير كلمة المرور</small>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>