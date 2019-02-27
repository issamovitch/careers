@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert-msg alert alert-danger">{{$error}}</div>
    @endforeach
@endif

@if(session()->has('error'))
    <div class="alert-msg alert alert-danger">{{session('error')}}</div>
@endif

@if(session()->has('success'))
    <div class="alert-msg alert alert-success">{!! session('success') !!}</div>
@endif

@if(session()->has('status'))
    <div class="alert-msg alert alert-success">{{session('status')}}</div>
@endif