@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    {{ Form::open(['method' => 'POST', 'url' => 'password.request' ]) }}
                        {{ Form::hidden('token', '{{ $token }}') }}
                        <div class="form-group row">
                            {{ Form::label('email', {{ __('E-Mail Address') }}, ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'true', 'autofocus' => 'autofocus']) }}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', {{ __('E-Mail Address') }}, ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control{{ $errors->has('email') ? ' is-invalid' : '' }}', 'id' => 'password', 'required' => 'true']) }}
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', {{ __('Confirm Password') }}, ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('email', ['class' => 'form-control', 'id' => 'password-confirm', 'required' => 'true', 'autofocus' => 'autofocus']) }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit({{ __('Reset Password') }}, ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
