<!-- jQuery Version 1.11.0 -->
<script src="<?php echo e(asset("public/js/jquery-1.11.0.js")); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(asset("public/js/bootstrap.min.js")); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo e(asset("public/js/metisMenu/metisMenu.min.js")); ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo e(asset("public/js/jquery/jquery.dataTables.min.js")); ?>"></script>
<script src="<?php echo e(asset("public/js/bootstrap/dataTables.bootstrap.min.js")); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo e(asset("public/js/sb-admin-2.js")); ?>"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable(
            {
                language: {
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخلات",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    }
                }
                ,"pageLength": 25
                ,"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "الكل"]]
            }
        );
    });
</script>

<style>
    .page-header {
        margin-top: 20px;
        font-size: 2em;
    }
</style>

<?php $__env->startSection("scripts"); ?><?php echo $__env->yieldSection(); ?>