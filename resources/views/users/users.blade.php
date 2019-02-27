@extends("layouts.app")

@section("content")

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">المستخدمون</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">قائمة المستخدمين</span>
                    <a href="{{route("add_user")}}" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-plus"></i> إضافة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsiveeee">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الإسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="center">
                                            <a href="{{route("edit_user", $user->id)}}" class="btn btn-success btn-xs btn-block"><i class="fa fa-edit"></i> تعدل</a>
                                        </td>
                                        <td class="center">
                                            <a href="{{route("delete_user", $user->id)}}" onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash"></i> حذف</a>
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