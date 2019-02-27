<?php $__env->startSection("content"); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">قائمة المسجلین</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <span class="pull-right">قائمة المسجلین</span>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body" style="min-height: 600px;">
                    <div class="table-responsiveeee">

                        <div class="col-sm-6">
                            <ul style="padding: 0px; margin: 0px; list-style: none;">
                                <li>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">الوظيفة : </div>
                                    <div class="col-sm-7">
                                        <select id="job" class="form-control filtermah">
                                            <option value="0">الكل</option>
                                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($j->id); ?>"><?php echo e($j->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">الدولة : </div>
                                    <div class="col-sm-7">
                                        <select id="country" class="form-control filtermah">
                                            <option value="0">الكل</option>
                                            <?php $__currentLoopData = $registered_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->country); ?>"><?php if($c->country): ?><?php echo e($c->country); ?><?php else: ?> لا توجد <?php endif; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </select>
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">المدينة : </div>
                                    <div class="col-sm-7">
                                        <select id="city" class="form-control filtermah">
                                            <option value="0">الكل</option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($city->city): ?>
                                                    <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">الحالة : </div>
                                    <div class="col-sm-7">
                                        <select id="nominated" class="form-control filtermah">
                                            <option value="all">الكل</option>
                                            <option value="0">جديد</option>
                                            <option value="1">مرشح</option>
                                            <option value="2">مستبعد</option>
                                        </select>
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">التاريخ من : </div>
                                    <div class="col-sm-7">
                                        <input type="text" id="date1" class="form-control datepicker filtermah" style="text-align: right;">
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">التاريخ إلى : </div>
                                    <div class="col-sm-7">
                                        <input type="text" id="date2" class="form-control datepicker filtermah" style="text-align: right;">
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix" style="margin-bottom: 15px"></div>

                        

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الوظيفة</th>
                                <th>الصورة</th>
                                <th>الإسم الشخصي</th>
                                <th>الإسم العائلي</th>
                                <th>البريد الإلكتروني</th>
                                <th>التاريخ</th>
                                <th>الأوامر</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX helloo" <?php if($s->nominated==1): ?> style="background: #c2f5ff;" <?php endif; ?> <?php if($s->nominated==2): ?> style="background: rgba(255,132,107,0.52);" <?php endif; ?>
                                data-job="<?php echo e($s->job_id); ?>" data-country="<?php echo e($s->country); ?>" data-nominated="<?php echo e($s->nominated); ?>" data-date="<?php echo e($s->created_at->format("Y-m-d")); ?>" data-city="<?php echo e($s->city); ?>">
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <i class="fa <?php echo e(@$s->job->icon); ?>"></i>
                                        <?php echo e(@$s->job->name); ?>

                                    </td>
                                    <td>
                                        <?php if($s->image): ?>
                                            <img src="<?php echo e(asset("storage/app/".$s->image)); ?>" style="width: 50px;height: 50px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset("public/noimage.jpg")); ?>" style="width: 50px;height: 50px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($s->firstname); ?></td>
                                    <td><?php echo e($s->lastname); ?></td>
                                    <td><?php echo e($s->email); ?></td>
                                    <td><?php echo e($s->created_at->format("Y-m-d")); ?></td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-default btn-block btn-xs dropdown-toggle" type="button" data-toggle="dropdown">الأوامر <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo e(route("show_sub", $s->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> عرض</a></li>
                                                <li><a href="<?php echo e(route("edit_sub", $s->id)); ?>" class="btn btn-purple btn-xs"><i class="fa fa-edit"></i> تعديل</a></li>
                                                <li><a href="<?php echo e(route("delete_sub", $s->id)); ?>" onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a></li>
                                                <li><hr style="margin: 10px auto;"></li>
                                                <?php if($s->nominated==0): ?>
                                                    <a href="<?php echo e(route("nominate", $s->id)); ?>" class="btn btn-success btn-block btn-xs"><i class="fa fa-thumbs-up"></i> ترشيح</a>
                                                    <a href="<?php echo e(route("denominate", $s->id)); ?>" class="btn btn-danger btn-block btn-xs"><i class="fa fa-thumbs-down"></i> إستبعاد</a>
                                                <?php elseif($s->nominated==1): ?>
                                                    <a href="<?php echo e(route("unnominate", $s->id)); ?>" class="btn btn-warning btn-block btn-xs"><i class="fa fa-thumbs-down"></i> إلغاء الترشيح</a>
                                                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo e($s->id); ?>" class="btn btn-primary btn-block btn-xs"><i class="fa fa-file"></i> ملاحظة</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route("unnominate", $s->id)); ?>" class="btn btn-warning btn-block btn-xs"><i class="fa fa-thumbs-up"></i> إلغاء الإستبعاد</a>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="myModal<?php echo e($s->id); ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ملاحظة ل "<?php echo e($s->firstname." ".$s->lastname); ?>"</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route("save_note", $s->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <textarea class="form-control" rows="7" name="note"><?php echo e($s->note); ?></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="width: 120px">حفظ</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <style>
        table .dropdown-menu{
            padding: 6px 8px;
            right: auto !important;
            left: 0px !important;
        }
        .dropdown-menu li{
            margin: 2px auto;
        }
        .dropdown-menu li .btn{
            color: #fff;
        }
        .btn-purple{
            background: purple;
            border-color: #770077;
            color: #fff;
        }
        .btn-purple:hover, .btn-purple:focus, .btn-purple:active{
            background: #740074;
            border-color: #670067;
            color: #fff;
        }
        .dataTables_filter{
            float: right !important;
        }
        select.form-control{
            padding: 3px;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

    <script>
        $(function () {

            $('.datepicker').datepicker({format: 'yyyy-mm-dd', rtl: true, language: 'ar'});

            //$("#dropdowndropdown").prependTo("#dataTables-example_filter");
            $(".filtermah").on("change", function () {
                var job         = $("#job").val();
                var country     = $.trim($("#country").val());
                var nominated   = $("#nominated").val()+"";
                var date1   = $("#date1").val()+"";
                var date2   = $("#date2").val()+"";
                var city   = $("#city").val()+"";
                var format = 'YYYY-MM-DD';
                console.log(city);
                console.log("---------------");
                $(".helloo").fadeOut();
                setTimeout(function () {
                    $(".helloo").filter(function( index ) {
                        var jobx = true;
                        if(job!="0")
                            if($(this).data("job")!=job)
                                jobx=false;

                        var cityx = true;
                        if(city!="0")
                            if($(this).data("city")!=city)
                                cityx=false;

                        var countryx = true;
                        if(country!="0")
                            if($(this).data("country")!=country)
                                countryx=false;

                        var nominatedx = true;
                        if(nominated!="all")
                            if($(this).data("nominated")!=nominated)
                                nominatedx=false;

                        var datex = true;
                        var date    = moment($(this).data("date")).format(format);
                        if(date1!="" && date2==""){
                            date1 = moment(date1).format(format);
                            if(date<date1)
                                datex = false;
                        }

                        if(date1=="" && date2!=""){
                            date2 = moment(date2).format(format);
                            if(date>date2)
                                datex = false;
                        }

                        if(date1!="" && date2!=""){
                            date1 = moment(date1).format(format);
                            date2 = moment(date2).format(format);
                            if(date>date2 || date<date1)
                                datex = false;
                        }

                        console.log($(this).data("city")+"---"+city+"----"+cityx+"-------");
                        return jobx && cityx && countryx && nominatedx && datex;

                    }).fadeIn();
                }, 500);
            });

        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>