<?php $__env->startSection("content"); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الرئيسية</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">الإحصائيات</span>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-star fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <div class="huge"><?php echo e($num1); ?></div>
                                            <div>عدد المسجلين الإجمالي</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route("subs")); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">التفاصيل</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-thumbs-up fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <div class="huge"><?php echo e($num2); ?></div>
                                            <div>عدد المسجلين المرشحين</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route("subs")); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">التفاصيل</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-thumbs-down fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <div class="huge"><?php echo e($num3); ?></div>
                                            <div>عدد الغير مرشحين</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route("subs")); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">التفاصيل</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <div class="huge"><?php echo e($num4); ?></div>
                                            <div>عدد الوظائف</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route("settings")); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">التفاصيل</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-8">

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> آخر المرشحين
                                    <div class="pull-left">
                                        <a href="<?php echo e(route("subs")); ?>" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> التفاصيل</a>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>الوظيفة</th>
                                                        <th>الصورة</th>
                                                        <th>الإسم الشخصي</th>
                                                        <th>الإسم العائلي</th>
                                                        <th>البريد الإلكتروني</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $last; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="odd gradeX">
                                                            <td>
                                                                <i class="fa <?php echo e(@$s->job->icon); ?>"></i>
                                                                <?php echo e(@$s->job->name); ?>

                                                            </td>
                                                            <td>
                                                                <?php if($s->image): ?>
                                                                    <img src="<?php echo e(asset("storage/app/".$s->image)); ?>" style="width: 25px;height: 25px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                                                <?php else: ?>
                                                                    <img src="<?php echo e(asset("public/noimage.jpg")); ?>" style="width: 25px;height: 25px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e($s->firstname); ?></td>
                                                            <td><?php echo e($s->lastname); ?></td>
                                                            <td><?php echo e($s->email); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> قائمة الوظائف
                                    <div class="pull-left">
                                        <a href="<?php echo e(route("settings")); ?>" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> التفاصيل</a>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>إسم الوظيفة</th>
                                                        <th>النماذج</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="odd gradeX">
                                                            <td><i class="fa <?php echo e(@$j->icon); ?>"></i> <?php echo e(@$j->name); ?></td>
                                                            <td>
                                                                <ul style="padding: 0px; margin: 0px; list-style: none">
                                                                    <?php $__currentLoopData = @$j->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li><?php echo e($f->name); ?></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>