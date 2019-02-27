<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>إدارة التوظيف</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset("public/css/rtl/bootstrap.min.css")}}" rel="stylesheet">

    <!-- not use this in ltr -->
    <link href="{{asset("public/css/rtl/bootstrap.rtl.css")}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset("public/css/plugins/metisMenu/metisMenu.min.css")}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset("public/css/plugins/timeline.css")}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset("public/css/rtl/sb-admin-2.css")}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset("public/css/plugins/morris.css")}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset("public/css/font-awesome/font-awesome.min.css")}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"><b>تسجيل الدخول</b></h3>
                </div>
                <div class="panel-body">

                    <form role="form" method="POST" action="{{ route('login') }}">

                        @csrf

                        <fieldset>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">تذكرني</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success btn-block">دخول</button>
                            {{--<a class="btn btn-link" href="{{ route('password.request') }}">نسيت كلمة المرور ؟</a>--}}
                        </div>

                        </fieldset>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .invalid-feedback{
        color: crimson;
    }
    .form-control.is-invalid{
        border-color: crimson;
    }
</style>

<!-- jQuery Version 1.11.0 -->
<script src="{{asset("public/js/jquery-1.11.0.js")}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset("public/js/bootstrap.min.js")}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset("public/js/metisMenu/metisMenu.min.js")}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset("public/js/sb-admin-2.js")}}></script>

</body>

</html>


