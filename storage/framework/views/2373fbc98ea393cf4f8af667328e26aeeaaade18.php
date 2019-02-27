<?php $__env->startSection("content"); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">قائمة المسجلین</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">مشاهدة</span>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="row">

                        <div class="col-sm-7">

                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2">
                                        <?php if($subscriber->image): ?>
                                            <img src="<?php echo e(asset("storage/app/".$subscriber->image)); ?>" style="width: 160px;height: 160px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset("public/noimage.jpg")); ?>" style="width: 160px;height: 160px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $__currentLoopData = $subscriber->metas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$meta->field->location==0): ?>
                                        <tr>
                                            <td><b><?php echo e(@$meta->field->name); ?> : </b></td>
                                            <td>
                                                <?php if(@$meta->field->type=="multiple"): ?>
                                                    <ul style="padding: 0px; margin: 0px; list-style: none;">
                                                        <?php $__currentLoopData = explode(";", $meta->value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($v); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php elseif(@$meta->field->type=="file"): ?>
                                                    <a href="<?php echo e(asset("storage/app/".$meta->value)); ?>" target="_blank">الملف المرفق</a>
                                                <?php else: ?>
                                                    <span><?php echo e($meta->value); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </table>
                            
                        </div>

                        <div class="col-sm-5">

                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2" class="text-center"><b>بيانات الوظيفة</b></td>
                                </tr>
                                <?php $__currentLoopData = $subscriber->metas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$meta->field->location==1): ?>
                                        <tr>
                                            <td><b><?php echo e(@$meta->field->name); ?> : </b></td>
                                            <td>
                                                <?php if(@$meta->field->type=="multiple"): ?>
                                                    <ul style="padding: 0px; margin: 0px; list-style: none;">
                                                        <?php $__currentLoopData = explode(";", $meta->value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($v); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php elseif(@$meta->field->type=="file"): ?>
                                                    <a href="<?php echo e(asset("storage/app/".$meta->value)); ?>" target="_blank">الملف المرفق</a>
                                                <?php else: ?>
                                                    <span><?php echo e($meta->value); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                        </div>

                        <?php if($subscriber->nominated==1): ?>
                            <div class="col-sm-12">

                                <table class="table table-bordered">
                                    <tr>
                                        <td width="10%"><b>الحالة :</b></td>
                                        <td>تم ترشيحه</td>
                                    </tr>
                                    <tr>
                                        <td><b>الملاحظة :</b></td>
                                        <td><?php if(!$subscriber->note or $subscriber->note==""): ?> <span>لا توجد</span> <?php else: ?> <?php echo e($subscriber->note); ?> <?php endif; ?></td>
                                    </tr>
                                </table>

                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>