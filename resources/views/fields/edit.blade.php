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
                    <span class="pull-right">تعديل النموذج </span>
                    <a href="{{route("fields")}}" class="btn btn-primary btn-xs pull-left" style="width: 160px"><i class="fa fa-reply"></i> عودة للقائمة</a>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body row">

                    <form class="col-sm-offset-3 col-sm-6" role="form" action="{{route("fields_update")}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$field->id}}">
                        
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">إسم الحقل</label>
                                <input type="text" class="form-control" id="name" name="name" required value="{{$field->name}}">
                            </div>
                            <div class="form-group">
                                <label for="job_id">الوظيفة</label>
                                <select class="form-control" id="job_id" name="job_id" required>
                                    <option value="">إختر</option>
                                    @foreach($jobs as $job)
                                        <option value="{{$job->id}}" @if($field->job_id==$job->id) selected @endif>{{$job->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="job_id">المكان</label>
                                <select class="form-control" id="location" name="location" required>
                                    <option value="">إختر</option>
                                    <option value="0" @if($field->location==0) selected @endif>المرحلة الأولى</option>
                                    <option value="1" @if($field->location==1) selected @endif>المرحلة الثانية</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">نوع الحقل</label>
                                <select type="text" class="form-control" id="type" name="type" required>
                                    <option value="text" @if($field->type=="text") selected @endif>نص</option>
                                    <option value="name" @if($field->type=="name") selected @endif>الإسم</option>
                                    <option value="email" @if($field->type=="email") selected @endif>البريد الإلكتروني</option>
                                    <option value="country" @if($field->type=="country") selected @endif>الدولة</option>
                                    <option value="textarea" @if($field->type=="textarea") selected @endif>حقل نصي</option>
                                    <option value="date" @if($field->type=="date") selected @endif>حقل تاريخ</option>
                                    <option value="time" @if($field->type=="time") selected @endif>حقل وقت</option>
                                    <option value="select" @if($field->type=="select") selected @endif>قائمة</option>
                                    <option value="multiple" @if($field->type=="multiple") selected @endif>قائمة متعددة</option>
                                    <option value="file" @if($field->type=="file") selected @endif>ملف مرفق</option>
                                </select>
                            </div>
                            <div class="form-group" id="options_wrapper">
                                <label for="options">الخيارات</label>
                                @if($field->options)
                                    @foreach(explode(",", $field->options) as $o)
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-sm-11"><input type="text" class="form-control" id="options" name="options[]"  value="{{$o}}"></div>
                                            <div class="col-sm-1"><a class="btn-delete btn btn-danger btn-xs">حذف</a></div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="col-sm-11"><input type="text" class="form-control" id="options" name="options[]" ></div>
                                        <div class="col-sm-1"><a class="btn-delete btn btn-danger btn-xs">حذف</a></div>
                                    </div>
                                @endif

                                <div class="put_here"></div>
                                <div class="clearfix" style="margin-top: 10px"></div>
                                <a class="btn-add btn btn-primary btn-xs">إضافة خيار</a>
                                <div class="clearfix" style="margin-top: 10px"></div>
                            </div>
                            <div class="form-group">
                                <label for="placeholder">نص المساعدة</label>
                                <input type="text" class="form-control" id="placeholder" name="placeholder" value="{{$field->placeholder}}">
                            </div>
                            <div class="form-group">
                                <label for="required">إجباري</label>
                                <select type="text" class="form-control" id="required" name="required" required>
                                    <option value="0" @if($field->required=="0") selected @endif>لا</option>
                                    <option value="1" @if($field->required=="1") selected @endif>نعم</option>
                                </select>
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

    <style>
        select.form-control{
            padding: 3px !important;
        }
        #options_wrapper{
            display: @if($field->type=="select" or $field->type=="multiple") block @else none @endif;
        }
    </style>

@endsection

@section("scripts")

    <script>
        $(function () {

            $("#type").on("change", function () {
                var val = $(this).val();
                if(val=="select" || val=="multiple"){
                    $("#options_wrapper").slideDown();
                    $("#options").prop("required", true);
                }else{
                    $("#options_wrapper").slideUp();
                    $("#options").prop("required", false);
                }
            });

            $(document).on("click", ".btn-delete", function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                console.log($(this).parent().parent());
            });

            $(document).on("click", ".btn-add", function (e) {
                e.preventDefault();
                $(".put_here").append('<div class="row" style="margin-bottom: 15px;">\n' +
                    '                                    <div class="col-sm-11"><input type="text" class="form-control" id="options" name="options[]" ></div>\n' +
                    '                                    <div class="col-sm-1"><a class="btn-delete btn btn-danger btn-xs">حذف</a></div>\n' +
                    '                                </div>');
            });
        });
    </script>

@endsection