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
                    <span class="pull-right">مشاهدة "<?php echo e($subscriber->firstname." ".$subscriber->lastname); ?>"</span>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="row">

                        <div class="col-sm-7">

                            <table class="table table-bordered">
                                <tr>
                                    <td rowspan="3">
                                        <?php if($subscriber->image): ?>
                                            <img src="<?php echo e(asset("storage/app/".$subscriber->image)); ?>" style="width: 160px;height: 160px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset("public/noimage.jpg")); ?>" style="width: 160px;height: 160px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php endif; ?>
                                    </td>
                                    <td><b>الإسم الشخصي : </b> <span><?php echo e($subscriber->firstname); ?></span></td>
                                </tr>
                                <tr><td><b>الإسم العائلي : </b> <span><?php echo e($subscriber->lastname); ?></span></td></tr>
                                <tr><td><b>البريد الإلكتروني : </b> <span><?php echo e($subscriber->email); ?></span></td></tr>
                                <tr>
                                    <td><b>التخصص : </b>
                                    </td>
                                    <td>
                                        <?php if($subscriber->location==1): ?>
                                            <div><i class="fa fa-paint-brush"></i> مصمم</div>
                                        <?php elseif($subscriber->location==2): ?>
                                            <div><i class="fa fa-code"></i> مكود</div>
                                        <?php elseif($subscriber->location==3): ?>
                                            <div><i class="fa fa-database"></i> مبرمج</div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr><td><b>اسم الشارع : </b></td><td><span><?php echo e($subscriber->street); ?></span></td></tr>
                                <tr><td><b>رقم الشارع : </b></td><td><span><?php echo e($subscriber->nstreet); ?></span></td></tr>
                                <tr><td><b>المدينة : </b></td><td><span><?php echo e($subscriber->city); ?></span></td></tr>
                                <tr><td><b>الدولة : </b></td><td><span><?php echo e($subscriber->country); ?></span></td></tr>
                            </table>
                            
                        </div>

                        <div class="col-sm-5">

                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2" class="text-center"><b>بيانات التخصص</b></td>
                                </tr>
                                <?php $__currentLoopData = $subscriber->metas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><b><?php echo e(@$meta->field->name); ?> : </b></td>
                                        <td>
                                            <?php if(@$meta->field->type!="multiple"): ?>
                                                <span><?php echo e($meta->value); ?></span>
                                            <?php else: ?>
                                                <ul style="padding: 0px; margin: 0px; list-style: none;">
                                                <?php $__currentLoopData = explode(";", $meta->value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($v); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>