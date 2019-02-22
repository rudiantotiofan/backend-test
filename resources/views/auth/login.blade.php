@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">News Application</p>
    @include('flash::message')
    {!! Form::open($form) !!}
        <div class="form-group{{ Form::hasError('email') }} has-feedback">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            {!! Form::errorMsg('email') !!}
        </div>
        <div class="form-group{{ Form::hasError('password') }} has-feedback">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Kata Sandi']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            {!! Form::errorMsg('password') !!}
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        {!! Form::checkbox('remember_me') !!} Ingat Saya
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                {!! Form::submit('Masuk', ['class' => 'btn btn-primary btn-block', 'Masuk']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <a href="{!! route('reset-password') !!}">Lupa Kata Sandi</a>
</div>
@endsection
