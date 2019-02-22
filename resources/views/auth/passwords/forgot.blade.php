@extends('layouts.auth')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">{{ trans('title.forgot_password') }}</p>
    @include('flash::message')
    {!! Form::open($form) !!}
        <input type="hidden" name="code" value="{{$code}}">
        <input type="hidden" name="id" value="{{$id}}">
        <div class="form-group {!! Form::hasError('password') !!}">
            <input id="password" name="password" type="password" class="form-control" placeholder="{{ trans('label.password') }}">
            {!! Form::errorMsg('password') !!}
        </div>
        <div class="form-group {!! Form::hasError('password_confirmation') !!}">
            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="{{ trans('label.password_confirmation') }}">
            {!! Form::errorMsg('password_confirmation') !!}
        </div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-4">
                {!! Form::submit('Kirim', ['class' => 'btn btn-primary btn-block', 'Submit']) !!}
            </div>
            <!-- /.col -->
        </div>
    {!! Form::close() !!}
</div>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Auth\ForgotRequest', '#form-forgot') !!}
@endsection
