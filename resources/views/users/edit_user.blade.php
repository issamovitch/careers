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
                    <span class="pull-right">إضافة مستخدم</span>
                    <a href="{{route("users")}}" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-reply"></i> عودة للقائمة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form role="form" action="{{route("update_user")}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="id">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">الإسم</label>
                                <input type="text" class="form-control" id="name" name="name" required value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة المرور</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small>اترك هذا الحقل فارغا إذا كنت لا تريد تغيير كلمة المرور</small>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection