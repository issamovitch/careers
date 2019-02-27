@extends("layouts.app")

@section("content")

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">النماذج</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">قائمة النماذج</span>
                    <a href="{{route("fields_add")}}" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-plus"></i> إضافة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsiveeee">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>الوظيفة</th>
                                    <th>المكان</th>
                                    <th>الإسم</th>
                                    <th>النوع</th>
                                    <th>النص المساعد</th>
                                    <th>إجباري</th>
                                    <th>الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fields as $field)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>
                                            <i class="fa {{@$field->job->icon}}"></i>
                                            {{@$field->job->name}}
                                        </td>
                                        <td>
                                            @if($field->location==0)
                                                <span>المرحلة الأولى</span>
                                            @else
                                                <span>المرحلة الثانية</span>
                                            @endif
                                        </td>
                                        <td>{{$field->name}}</td>
                                        <td>
                                            @switch($field->type)
                                                @case("text")<span>نص</span>@break
                                                @case("name")<span>الإسم</span>@break
                                                @case("email")<span>البريد الإلكتروني</span>@break
                                                @case("country")<span>الدولة</span>@break
                                                @case("textarea")<span>حقل نصي</span>@break
                                                @case("date")<span>حقل تاريخ</span>@break
                                                @case("time")<span>حقل وقت</span>@break
                                                @case("select")<span>قائمة</span>@break
                                                @case("multiple")<span>قائمة متعددة</span>@break
                                                @case("file")<span>ملف مرفق</span>@break
                                            @endswitch
                                        </td>
                                        <td>{{$field->placeholder}}</td>
                                        <td class="text-center">
                                            @if($field->required==0)
                                                <span>لا</span>
                                            @else
                                                <span>نعم</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-success" href="{{route("fields_edit", $field->id)}}"><i class="fa fa-edit"></i> <span>تعديل</span></a>
                                            <a onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-xs btn-danger" href="{{route("fields_delete", $field->id)}}"><i class="fa fa-trash"></i> <span>حذف</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection