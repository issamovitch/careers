<?php if(count($errors)>0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert-msg alert alert-danger"><?php echo e($error); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="alert-msg alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<?php if(session()->has('success')): ?>
    <div class="alert-msg alert alert-success"><?php echo session('success'); ?></div>
<?php endif; ?>

<?php if(session()->has('status')): ?>
    <div class="alert-msg alert alert-success"><?php echo e(session('status')); ?></div>
<?php endif; ?>