@extends("layouts.app")

@section("content")

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">قائمة المسجلین</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-right">مشاهدة</span>
                    <div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="row">

                        <div class="col-sm-7">

                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2">
                                        @if($subscriber->image)
                                            <img src="{{asset("storage/app/".$subscriber->image)}}" style="width: 160px;height: 160px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        @else
                                            <img src="{{asset("public/noimage.jpg")}}" style="width: 160px;height: 160px; border: 1px solid #eee; border-radius: 50%; margin: 0px auto; display: block;">
                                        @endif
                                    </td>
                                </tr>
                                @foreach($subscriber->metas as $meta)
                                    @if(@$meta->field->location==0)
                                        <tr>
                                            <td><b>{{@$meta->field->name}} : </b></td>
                                            <td>
                                                @if(@$meta->field->type=="multiple")
                                                    <ul style="padding: 0px; margin: 0px; list-style: none;">
                                                        @foreach(explode(";", $meta->value) as $v)
                                                            <li>{{$v}}</li>
                                                        @endforeach
                                                    </ul>
                                                @elseif(@$meta->field->type=="file")
                                                    <a href="{{asset("storage/app/".$meta->value)}}" target="_blank">الملف المرفق</a>
                                                @else
                                                    <span>{{$meta->value}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                {{--
                                <tr><td><b>الإسم العائلي : </b> <span>{{$subscriber->lastname}}</span></td></tr>
                                <tr><td><b>البريد الإلكتروني : </b> <span>{{$subscriber->email}}</span></td></tr>
                                <tr>
                                    <td><b>الوظيفة : </b>
                                    </td>
                                    <td>
                                        <i class="fa {{@$subscriber->job->icon}}"></i>
                                        {{@$subscriber->job->name}}
                                    </td>
                                </tr>

                                <tr><td><b>الدولة : </b></td><td><span>{{$subscriber->country}}</span></td></tr>
                                <tr><td><b>المدينة : </b></td><td><span>{{$subscriber->city}}</span></td></tr>
                                <tr><td><b>اسم الشارع : </b></td><td><span>{{$subscriber->street}}</span></td></tr>
                                <tr><td><b>رقم الشارع : </b></td><td><span>{{$subscriber->nstreet}}</span></td></tr>
                                --}}
                            </table>
                            
                        </div>

                        <div class="col-sm-5">

                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2" class="text-center"><b>بيانات الوظيفة</b></td>
                                </tr>
                                @foreach($subscriber->metas as $meta)
                                    @if(@$meta->field->location==1)
                                        <tr>
                                            <td><b>{{@$meta->field->name}} : </b></td>
                                            <td>
                                                @if(@$meta->field->type=="multiple")
                                                    <ul style="padding: 0px; margin: 0px; list-style: none;">
                                                        @foreach(explode(";", $meta->value) as $v)
                                                            <li>{{$v}}</li>
                                                        @endforeach
                                                    </ul>
                                                @elseif(@$meta->field->type=="file")
                                                    <a href="{{asset("storage/app/".$meta->value)}}" target="_blank">الملف المرفق</a>
                                                @else
                                                    <span>{{$meta->value}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>

                        </div>

                        @if($subscriber->nominated==1)
                            <div class="col-sm-12">

                                <table class="table table-bordered">
                                    <tr>
                                        <td width="10%"><b>الحالة :</b></td>
                                        <td>تم ترشيحه</td>
                                    </tr>
                                    <tr>
                                        <td><b>الملاحظة :</b></td>
                                        <td>@if(!$subscriber->note or $subscriber->note=="") <span>لا توجد</span> @else {{$subscriber->note}} @endif</td>
                                    </tr>
                                </table>

                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
