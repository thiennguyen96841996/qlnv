@extends('backend.layouts.master')
@section('title', 'Login')
@section('content')
<div class="app">
    <div class="layout bg-gradient-info">
        <div class="container">
            <div class="row full-height align-items-center">
                <div class="col-md-7 d-none d-md-block">
                    <img class="img-fluid" src="{{ asset(config('app.link_logo')) }}" alt="">
                    <div class="m-t-15 m-l-20">
                        <h1 class="font-weight-light font-size-35 text-white">{{ __('title_login') }}</h1>
                        <p class="text-white width-70 text-opacity m-t-25 font-size-16">{{ __('describe_login') }}</p>
                        <div class="m-t-60">
                            <a href= "https://www.facebook.com/nguyenthien.hy" class="text-white text-link m-r-15">{{ __('term_p1') }} &amp; {{ __('term_p2') }}</a>
                            <a href="https://www.facebook.com/nguyenthien.hy" class="text-white text-link">{{ __('privacy_p1') }} &amp; {{ __('privacy_p2') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-15">
                                <div class="m-b-30">
                                    <img class="img-responsive inline-block" src="{{ asset(config('app.link_logo')) }}" alt="">
                                    <h2 class="inline-block pull-right m-v-0 p-t-15">{{ __('login') }}</h2>
                                </div>
                                <p class="m-t-15 font-size-13">{{ __('login_get') }}</p>
                                {{ Form::open(['method' => 'POST', 'url' => 'login' ]) }}
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'true', 'autofocus' => 'autofocus', 'placeholder' => __('email')]) }}
                                        @if ($errors->has('email'))
                                        <span class="help-block error">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'true', 'placeholder' => __('password')]) }}
                                        @if ($errors->has('password')) 
                                        <span class="help-block error">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="checkbox font-size-13 d-inline-block p-v-0 m-v-0">
                                        {{ Form::checkbox('remember', null, false, ['id' => 'remember']) }}
                                        {{ Form::label('remember', __('Remember me')) }}
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('password.request') }}">{{ __('Forgot password') }}</a>
                                    </div>
                                    <div class="m-t-20 text-right">
                                        {{ Form::submit(__('Login'), ['class' => 'btn btn-gradient-success']) }}
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
