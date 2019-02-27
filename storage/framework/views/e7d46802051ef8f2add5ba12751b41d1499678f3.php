<?php $__env->startSection("content"); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الحسابات المسجلة</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">قائمة الحسابات المسجلة</span>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsiveeee">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th></th>
                                <th>التخصص</th>
                                <th>الصورة</th>
                                <th>الإسم الشخصي</th>
                                <th>الإسم العائلي</th>
                                <th>البريد الإلكتروني</th>
                                <th>المدينة</th>
                                <th>الدولة</th>
                                <th>التاريخ</th>
                                <th>الأوامر</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX">
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <?php if($s->location==1): ?>
                                            <div style="background: #eb718e; color: #fff;text-align: center;padding: 1px;"><i class="fa fa-paint-brush"></i> مصمم</div>
                                        <?php elseif($s->location==2): ?>
                                            <div style="background: dodgerblue; color: #fff;text-align: center;padding: 1px;"><i class="fa fa-code"></i> مكود</div>
                                        <?php elseif($s->location==3): ?>
                                            <div style="background: #15df0f; color: #fff;text-align: center;padding: 1px;"><i class="fa fa-database"></i> مبرمج</div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($s->image): ?>
                                            <img src="<?php echo e(asset("storage/app/".$s->image)); ?>" style="width: 60px;height: 60px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset("public/noimage.jpg")); ?>" style="width: 60px;height: 60px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($s->firstname); ?></td>
                                    <td><?php echo e($s->lastname); ?></td>
                                    <td><?php echo e($s->email); ?></td>
                                    <td><?php echo e($s->city); ?></td>
                                    <td><?php echo e($s->country); ?></td>
                                    <td><?php echo e($s->created_at->diffForhumans()); ?></td>
                                    <td class="center">
                                        <a href="<?php echo e(route("show_sub", $s->id)); ?>" class="btn btn-info btn-xs btn-block"><i class="fa fa-eye"></i> عرض</a>
                                        <!--<a href="<?php echo e(route("edit_user", $s->id)); ?>" class="btn btn-success btn-xs btn-block"><i class="fa fa-edit"></i> تعدل</a>-->
                                        <a href="<?php echo e(route("delete_sub", $s->id)); ?>" onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash"></i> حذف</a>
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