@extends("layouts.app")

@section("content")

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
                                            <div class="huge">{{$num1}}</div>
                                            <div>عدد المسجلين الإجمالي</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route("subs")}}">
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
                                            <div class="huge">{{$num2}}</div>
                                            <div>عدد المسجلين المرشحين</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route("subs")}}">
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
                                            <div class="huge">{{$num3}}</div>
                                            <div>عدد الغير مرشحين</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route("subs")}}">
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
                                            <div class="huge">{{$num4}}</div>
                                            <div>عدد الوظائف</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route("settings")}}">
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
                                        <a href="{{route("subs")}}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> التفاصيل</a>
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
                                                    @foreach($last as $s)
                                                        <tr class="odd gradeX">
                                                            <td>
                                                                <i class="fa {{@$s->job->icon}}"></i>
                                                                {{@$s->job->name}}
                                                            </td>
                                                            <td>
                                                                @if($s->image)
                                                                    <img src="{{asset("storage/app/".$s->image)}}" style="width: 25px;height: 25px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                                                @else
                                                                    <img src="{{asset("public/noimage.jpg")}}" style="width: 25px;height: 25px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                                                @endif
                                                            </td>
                                                            <td>{{$s->firstname}}</td>
                                                            <td>{{$s->lastname}}</td>
                                                            <td>{{$s->email}}</td>
                                                        </tr>
                                                    @endforeach
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
                                        <a href="{{route("settings")}}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> التفاصيل</a>
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
                                                    @foreach($jobs as $j)
                                                        <tr class="odd gradeX">
                                                            <td><i class="fa {{@$j->icon}}"></i> {{@$j->name}}</td>
                                                            <td>
                                                                <ul style="padding: 0px; margin: 0px; list-style: none">
                                                                    @foreach(@$j->fields as $f)
                                                                        <li>{{$f->name}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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

@endsection