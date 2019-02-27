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
                    <span class="pull-right">الحقول الإضافية</span>
                    <a href="<?php echo e(route("fields_add")); ?>" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-plus"></i> إضافة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsiveeee">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>المكان</th>
                                    <th>الإسم</th>
                                    <th>النوع</th>
                                    <th>النص المساعد</th>
                                    <th>إجباري</th>
                                    <th>الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <?php if($field->location==1): ?>
                                                <div style="background: #eb718e; color: #fff;text-align: center;padding: 1px;"><i class="fa fa-paint-brush"></i> مصمم</div>
                                            <?php elseif($field->location==2): ?>
                                                <div style="background: dodgerblue; color: #fff;text-align: center;padding: 1px;"><i class="fa fa-code"></i> مكود</div>
                                            <?php elseif($field->location==3): ?>
                                                <div style="background: #15df0f; color: #fff;text-align: center;padding: 1px;"><i class="fa fa-database"></i> مبرمج</div>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($field->name); ?></td>
                                        <td>
                                            <?php switch($field->type):
                                                case ("text"): ?><span>نص</span><?php break; ?>
                                                <?php case ("textarea"): ?><span>حقل نصي</span><?php break; ?>
                                                <?php case ("date"): ?><span>حقل تاريخ</span><?php break; ?>
                                                <?php case ("time"): ?><span>حقل وقت</span><?php break; ?>
                                                <?php case ("select"): ?><span>قائمة</span><?php break; ?>
                                                <?php case ("multiple"): ?><span>قائمة متعددة</span><?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td><?php echo e($field->placeholder); ?></td>
                                        <td class="text-center">
                                            <?php if($field->required==0): ?>
                                                <span>لا</span>
                                            <?php else: ?>
                                                <span>نعم</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-success" href="<?php echo e(route("fields_edit", $field->id)); ?>"><i class="fa fa-edit"></i> <span>نعديل</span></a>
                                            <a onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-xs btn-danger" href="<?php echo e(route("fields_delete", $field->id)); ?>"><i class="fa fa-trash"></i> <span>حذف</span></a>
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