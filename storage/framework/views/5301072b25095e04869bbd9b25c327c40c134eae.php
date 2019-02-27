<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo e(route("home")); ?>">إدارة التوظيف</a>
    </div>
    <!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-left">
    <li class="dropdown"><a href="<?php echo e(route("front")); ?>" target="_blank"><i class="fa fa-globe fa-fw"></i></a></li>
</ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo e(route("home")); ?>"><i class="fa fa-dashboard fa-fw"></i> الرئيسية</a>
                </li>
                <li>
                    <a href="<?php echo e(route("subs")); ?>"><i class="fa fa-star fa-fw"></i> قائمة المسجلین</a>
                </li>
                <li>
                    <a href="<?php echo e(route("users")); ?>"><i class="fa fa-user fa-fw"></i> المستخدمون</a>
                </li>
                <li>
                    <a href="<?php echo e(route("fields")); ?>"><i class="fa fa-leaf fa-fw"></i> النماذج</a>
                </li>
                <li>
                    <a href="<?php echo e(route("settings")); ?>"><i class="fa fa-gears"></i> الإعدادات</a>
                </li>
                <li></li>
                <li>
                    <a href="javascript:void(0)" onclick="document.getElementById('logout').submit()"><i class="fa fa-sign-out fa-fw"></i> تسجيل الخروج</a>
                    <form method="post" id="logout" action="<?php echo e(route("logout")); ?>" style="display: none"><?php echo csrf_field(); ?></form>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>