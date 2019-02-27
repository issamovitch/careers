@extends("layouts.app")

@section("content")

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الإعدادات</h1>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">إدارة المحتوى</span>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">

                    <form action="{{route("save_settings1")}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>صورة الخلفية</label>
                            <input type="file" class="form-control" name="bg" accept="image/*">
                            <img src="{{asset("storage/app/". @$settings["bg"]->value)}}" style="width: 120px; border: 1px solid #eee;margin: 10px 0px">
                        </div>

                        <div class="form-group">
                            <label>العنوان الرئيسي</label>
                            <input type="text" class="form-control" name="title0" maxlength="200" required value="{{@$settings["title0"]->value}}">
                        </div>

                        <div class="form-group">
                            <label>النص الرئيسي</label>
                            <input type="text" class="form-control" name="text0" maxlength="200" required value="{{@$settings["text0"]->value}}">
                        </div>

                        <div class="form-group">
                            <label>العنوان الأول</label>
                            <input type="text" class="form-control" name="title1" maxlength="200" required value="{{@$settings["title1"]->value}}">
                        </div>

                        <div class="form-group">
                            <label>النص الأول</label>
                            <input type="text" class="form-control" name="text1" maxlength="200" required value="{{@$settings["text1"]->value}}">
                        </div>

                        <div class="form-group">
                            <label>العنوان الثاني</label>
                            <input type="text" class="form-control" name="title2" maxlength="200" required value="{{@$settings["title2"]->value}}">
                        </div>

                        <div class="form-group">
                            <label>النص الثاني</label>
                            <input type="text" class="form-control" name="text2" maxlength="200" required value="{{@$settings["text2"]->value}}">
                        </div>

                        {{--
                        <div class="form-group">
                            <label>العنوان الثالث</label>
                            <input type="text" class="form-control" name="title3" maxlength="200" required value="{{@$settings["title3"]->value}}">
                        </div>

                        <div class="form-group">
                            <label>النص الثالث</label>
                            <input type="text" class="form-control" name="text3" maxlength="200" required value="{{@$settings["text3"]->value}}">
                        </div>
                        --}}

                        <div class="form-group">
                            <label>رسالة نجاح التسجيل</label>
                            <input type="text" class="form-control" name="success_message" maxlength="200" required value="{{@$settings["success_message"]->value}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="width: 120px">حفظ</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

        <div class="col-sm-7">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">الوظائف</span>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <h4>إضافة وظيفة</h4>
                    <form action="{{route("save_job")}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>الإسم</label>
                            <input type="text" class="form-control" name="name" maxlength="200" required>
                        </div>

                        <div class="form-group">
                            <label>الأيقونة</label>
                            <div class="input-group" style="width: 300px">
                                <input name="icon" value="fa-star" type="text" class="form-control iconpicker" required>
                                <span class="input-group-addon"><i class="fa fa-star"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="width: 120px">حفظ</button>
                        </div>

                    </form>

                    <hr>

                    <h4>قائمة الوظائف</h4>


                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-sm-3">الإسم</div>
                        <div class="col-sm-5">الأيقونة</div>
                        <div class="col-sm-4">الأوامر</div>
                    </div>
                    @foreach($jobs as $job)
                        <div class="container-fluid">
                            <form action="{{route("update_job")}}" class="row" style="margin-bottom: 20px" method="post">
                                @csrf

                                <input type="hidden" name="id" value="{{$job->id}}">
                                <input class="col-sm-3 form-control" name="name" value="{{$job->name}}" required>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input name="icon" type="text" class="form-control iconpicker" value="{{$job->icon}}" required>
                                        <span class="input-group-addon"><i class="fa {{$job->icon}}"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                    <a href="{{route("delete_job", $job->id)}}" onclick="return confirm('هل أنت متأكد ؟')" class="btn btn-danger">حذف</a>
                                </div>
                            </form>
                        </div>
                     @endforeach

                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">إعدادات أخرى</span>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">

                    <form action="{{route("save_settings2")}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>اللون الرئيسي</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="color" id="color" required value="{{@$settings["color"]->value}}" autocomplete="off">
                                <span class="input-group-addon" style="background: {{@$settings["color"]->value}}"><i class="fa fa-star" style="opacity: 0"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>تفعيل صورة البروفايل عند التسجيل</label>
                            <select class="form-control" name="upload_photo" required>
                                <option value="0" @if(@$settings["upload_photo"]->value==0) selected @endif>لا</option>
                                <option value="1" @if(@$settings["upload_photo"]->value==1) selected @endif>نعم</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>صورة جار التحميل</label>
                            <input type="file" class="form-control" name="loading_image" accept="image/*">
                            <img src="{{asset("storage/app/". @$settings["loading_image"]->value)}}" style="width: 120px; border: 1px solid #eee;margin: 10px 0px">
                        </div>

                        <div class="form-group">
                            <label>صورة نجاح التسجيل</label>
                            <input type="file" class="form-control" name="success_image" accept="image/*">
                            <img src="{{asset("storage/app/". @$settings["success_image"]->value)}}" style="width: 120px; border: 1px solid #eee;margin: 10px 0px">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="width: 120px">حفظ</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

@section("scripts")

    <link rel="stylesheet" href="{{asset("public/iconpicker/fontawesome-iconpicker.min.css")}}" />
    <script src="{{asset("public/iconpicker/fontawesome-iconpicker.js")}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>

    <script>
        $(function () {

            $('.iconpicker').iconpicker({placement: 'topRight', defaultValue: 'fa-star'});

            $('#color').colorpicker();

        });
    </script>

    <style>
        .colorpicker {
            right:inherit;
        }
    </style>

@endsection