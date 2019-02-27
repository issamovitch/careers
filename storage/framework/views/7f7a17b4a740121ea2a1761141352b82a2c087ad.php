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
                    <span class="pull-right">قائمة المستخدمين</span>
                    <a href="<?php echo e(route("add_user")); ?>" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-plus"></i> إضافة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsiveeee">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الإسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td class="center">
                                            <a href="<?php echo e(route("edit_user", $user->id)); ?>" class="btn btn-success btn-xs btn-block"><i class="fa fa-edit"></i> تعدل</a>
                                        </td>
                                        <td class="center">
                                            <a href="<?php echo e(route("delete_user", $user->id)); ?>" onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash"></i> حذف</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>