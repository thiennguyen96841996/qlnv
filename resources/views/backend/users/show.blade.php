@extends('backend.layouts.master')
@section('title', 'User Information')
@section('style')
    {!! Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') !!} 
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="container">
                <div class="well well bs-component">
                    <div class="page-header">
                        <div class="panel-heading">
                            <h2 class="header-title">{{ __('user') }}</h2>
                            <div class="header-sub-title">
                                <nav class="breadcrumb breadcrumb-dash">
                                    <a href="{{ route('manager.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                    <a class="breadcrumb-item" href="{{ route('users.index') }}">{{ __('users') }}</a>
                                    <span class="breadcrumb-item active">{{ __('Information') }}</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="avata-name">
                                        <legend class="avata text-center">{{ __('avatar') }}</legend>
                                        <hr>
                                        </div>
                                        <div class="avata text-center">
                                            <img src="{!! asset(config('app.link_avatar') . $user->avatar) !!}" class="avata-img img-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <legend class="avata text-center">{{ __('Information') }}</legend>
                                    <hr>
                                        <div class="form-group">
                                            {{ Form::label(__('name :'), null, ['class' => 'control-label']) }}
                                            {{ $user->name }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('email :'), null, ['class' => 'control-label']) }}
                                            {{ $user->email }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('phone :'), null, ['class' => 'control-label']) }}
                                            {{ $user->phone }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('birth_day :'), null, ['class' => 'control-label']) }}
                                            {{ $user->birthday }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('part :'), null, ['class' => 'control-label']) }}
                                            {{ $user->part }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('salary_day :'), null, ['class' => 'control-label']) }}
                                            {{ $user->salary_day }} {{ __('$') }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('day_in :'), null, ['class' => 'control-label']) }}
                                            {{ $user->day_in }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('sex :'), null, ['class' => 'control-label']) }}
                                            {{ ($user->sex == 0) ? 'Male' : 'Female' }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('address :'), null, ['class' => 'control-label']) }}
                                            {{ $user->address }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label(__('role :'), null, ['class' => 'control-label']) }}
                                            {{ $user->role }}
                                        </div>
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <a href="{{ route('users.index') }}" class="btn btn-default">{{ __('Back') }}</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    {{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/jquery.dataTables.js') }}
    {{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}
    {{ Html::script('assets/demo-bower/assets/js/tables/data-table.js') }}
@endsection
