<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make("layouts/head", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

<div id="wrapper">

    <?php echo $__env->make("layouts/navbar", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div id="page-wrapper">

        <?php echo $__env->make("layouts/messages", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php $__env->startSection("content"); ?><?php echo $__env->yieldSection(); ?>

    </div>
    <!-- /#page-wrapper -->

</div>

<?php echo $__env->make("layouts/foot", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <script>
        $(function () {
            setTimeout(function () {
                $(".alert-msg").fadeOut();
            }, 4000);
        });
    </script>
<style>
    .alert-msg{
        margin-bottom: 0px;
    }
</style>


</body>

</html>
