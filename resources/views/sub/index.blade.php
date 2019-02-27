@extends("layouts.app")

@section("content")

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
                    <a href="#" id="btn-export-pdf" class="btn btn-success btn-xs pull-left" style="margin-right: 10px"><i class="fa fa-file-o"></i> <span>تصدير لملف PDF</span></a>
                    <a href="#" id="btn-export" class="btn btn-success btn-xs pull-left"><i class="fa fa-file"></i> <span>تصدير لملف إكسل</span></a>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body" style="min-height: 600px;">
                    <div class="table-responsiveeee">

                        <form action="{{route("export")}}" class="col-sm-6" id="formm" method="post">
                            @csrf
                            <ul style="padding: 0px; margin: 0px; list-style: none;">
                                <li>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">الوظيفة : </div>
                                    <div class="col-sm-7">
                                        <select id="job" class="form-control filtermah" name="job">
                                            <option value="0">الكل</option>
                                            @foreach($jobs as $j)<option value="{{$j->id}}">{{$j->name}}</option>@endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">الدولة : </div>
                                    <div class="col-sm-7">
                                        <select id="country" class="form-control filtermah" name="country">
                                            <option value="0">الكل</option>
                                            @foreach($registered_cities as $c)
                                                <option value="{{$c->value}}">@if($c->value){{$c->value}}@else لا توجد @endif</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">المدينة : </div>
                                    <div class="col-sm-7">
                                        <select id="city" class="form-control filtermah">
                                            <option value="0">الكل</option>
                                            @foreach($cities as $city)
                                                @if($city->city)
                                                    <option value="{{$city->city}}">{{$city->city}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    --}}
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">الحالة : </div>
                                    <div class="col-sm-7">
                                        <select id="nominated" name="nominated" class="form-control filtermah">
                                            <option value="all">الكل</option>
                                            <option value="0">جديد</option>
                                            <option value="1">مرشح</option>
                                            <option value="2">مستبعد</option>
                                        </select>
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">التاريخ من : </div>
                                    <div class="col-sm-7">
                                        <input type="text" id="date1" name="date1" class="form-control datepicker filtermah" style="text-align: right;">
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                    <div class="col-sm-5" style="height: 34px;font-weight: bold;line-height: 34px;">التاريخ إلى : </div>
                                    <div class="col-sm-7">
                                        <input type="text" id="date2" name="date2" class="form-control datepicker filtermah" style="text-align: right;">
                                    </div>
                                    <div class="clearfix" style="margin-bottom: 15px"></div>
                                </li>
                            </ul>
                        </form>
                        <div class="clearfix" style="margin-bottom: 15px"></div>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الوظيفة</th>
                                <th>الصورة</th>
                                <th>الإسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>الدولة</th>
                                {{--<th>الإسم الشخصي</th>
                                <th>الإسم العائلي</th>
                                --}}
                                <th>التاريخ</th>
                                <th>الأوامر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $s)
                                <tr class="odd gradeX helloo visible" data-id="{{$s->id}}" @if($s->nominated==1) style="background: #c2f5ff;" @endif @if($s->nominated==2) style="background: rgba(255,132,107,0.52);" @endif
                                data-job="{{$s->job_id}}" data-country="{{$s->country}}" data-nominated="{{$s->nominated}}" data-date="{{$s->created_at->format("Y-m-d")}}" data-city="{{$s->city}}">
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>
                                        <i class="fa {{@$s->job->icon}}"></i>
                                        {{@$s->job->name}}
                                    </td>
                                    <td>
                                        @if($s->image)
                                            <img src="{{asset("storage/app/".$s->image)}}" style="width: 50px;height: 50px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        @else
                                            <img src="{{asset("public/noimage.jpg")}}" style="width: 50px;height: 50px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        @endif
                                    </td>
                                    <td>{{@$s->name}}</td>
                                    <td>{{@$s->email}}</td>
                                    <td>{{@$s->country}}</td>
                                    {{--
                                    <td>{{$s->firstname}}</td>
                                    <td>{{$s->lastname}}</td>
                                    <td>{{$s->email}}</td>
                                    --}}
                                    <td>{{$s->created_at->format("Y-m-d")}}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-default btn-block btn-xs dropdown-toggle" type="button" data-toggle="dropdown">الأوامر <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route("show_sub", $s->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> عرض</a></li>
                                                {{--<li><a href="{{route("edit_sub", $s->id)}}" class="btn btn-purple btn-xs"><i class="fa fa-edit"></i> تعديل</a></li>--}}
                                                <li><a href="{{route("delete_sub", $s->id)}}" onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a></li>
                                                <li><hr style="margin: 10px auto;"></li>
                                                @if($s->nominated==0)
                                                    <a href="{{route("nominate", $s->id)}}" class="btn btn-success btn-block btn-xs"><i class="fa fa-thumbs-up"></i> ترشيح</a>
                                                    <a href="{{route("denominate", $s->id)}}" class="btn btn-danger btn-block btn-xs"><i class="fa fa-thumbs-down"></i> إستبعاد</a>
                                                @elseif($s->nominated==1)
                                                    <a href="{{route("unnominate", $s->id)}}" class="btn btn-warning btn-block btn-xs"><i class="fa fa-thumbs-down"></i> إلغاء الترشيح</a>
                                                    <a href="#" data-toggle="modal" data-target="#myModal{{$s->id}}" class="btn btn-primary btn-block btn-xs"><i class="fa fa-file"></i> ملاحظة</a>
                                                @else
                                                    <a href="{{route("unnominate", $s->id)}}" class="btn btn-warning btn-block btn-xs"><i class="fa fa-thumbs-up"></i> إلغاء الإستبعاد</a>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>

    @foreach($subscribers as $s)
        <div id="myModal{{$s->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ملاحظة ل "{{$s->firstname." ".$s->lastname}}"</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route("save_note", $s->id)}}" method="post">
                            @csrf

                            <div class="form-group">
                                <textarea class="form-control" rows="7" name="note">{{$s->note}}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="width: 120px">حفظ</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

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
        #dataTables-example tbody tr{
            display: none;
        }
        #dataTables-example tbody tr.visible{
            display: table-row !important;
        }
    </style>

@endsection

@section("scripts")

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

    <script>
        $(function () {

            $(document).on("click", "#btn-export", function (e) {
                e.preventDefault();
                var arr = $("#dataTables-example tbody tr.visible");
                var tablee = $('#dataTables-example').DataTable();
                tablee.context["0"]._iDisplayLength = "1000000";
                tablee.draw();
                console.clear();
                if(arr.length<=0)
                    alert("لا يوجد مسجلون لتصديرهم لملف الإكسل");
                else{
                    var ids = [];
                    tablee.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                        if($(this.node()).hasClass("visible"))
                            ids.push($(this.node()).data("id"));
                    } );
                    $("#formm").attr("action", "{{route("export")}}");
                    $("#formm").submit();
                }
            });

            $(document).on("click", "#btn-export-pdf", function (e) {
                e.preventDefault();
                var arr = $("#dataTables-example tbody tr.visible");
                var tablee = $('#dataTables-example').DataTable();
                tablee.context["0"]._iDisplayLength = "1000000";
                tablee.draw();
                console.clear();
                if(arr.length<=0)
                    alert("لا يوجد مسجلون لتصديرهم لملف ال PDF");
                else{
                    var ids = [];
                    tablee.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                        if($(this.node()).hasClass("visible"))
                            ids.push($(this.node()).data("id"));
                    } );
                    $("#formm").attr("action", "{{route("export2")}}");
                    $("#formm").submit();
                }
            });

            $('.datepicker').datepicker({format: 'yyyy-mm-dd', rtl: true, language: 'ar'});

            //$("#dropdowndropdown").prependTo("#dataTables-example_filter");
            $(".filtermah").on("change", function () {
                var job         = $("#job").val();
                var country     = $.trim($("#country").val());
                var nominated   = $("#nominated").val()+"";
                var date1   = $("#date1").val()+"";
                var date2   = $("#date2").val()+"";
                //var city   = $("#city").val()+"";
                var format = 'YYYY-MM-DD';
                console.log("---------------");
                $(".helloo").removeClass("visible");
                setTimeout(function () {
                    $(".helloo").filter(function( index ) {
                        var jobx = true;
                        if(job!="0")
                            if($(this).data("job")!=job)
                                jobx=false;

                        /*var cityx = true;
                        if(city!="0")
                            if($(this).data("city")!=city)
                                cityx=false;
                                */
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

                        //console.log($(this).data("city")+"---"+city+"----"+cityx+"-------");
                        return jobx && countryx && nominatedx && datex;

                    }).addClass("visible");
                }, 500);
            });

        });
    </script>

@endsection
