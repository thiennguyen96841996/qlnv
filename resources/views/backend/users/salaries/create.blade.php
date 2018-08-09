@extends('backend.layouts.master')
@section('title', 'salarys')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('salary') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('salary.index') }}">{{ __('salary') }}</a>
                        <span class="breadcrumb-item active">{{ __('create') }}</span>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                        <legend class="text-center">{{ __('salary_form') }}</legend>
                         <hr>
                            <div class="panel-body">
                                <div class="col-lg-12 col-lg-offset-6">
                                    {!! Form::open(['method' => 'POST', 'url' => asset('manager/salary')]) !!}
                                        <div class="row">
                                             <div class="form-group col-6">
                                                {{ Form::label(__('overtime'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('overtime', str_limit($info->getOvertimeMonths($info->id), 4), ['class' => 'form-control text-center', 'readonly' => '']) }}
                                            </div>
                                            <div class="form-group col-6">
                                                <span class="ti-close"></span>
                                                {{ Form::label(__('price_overtime'), null, ['class' => 'control-label']) }}
                                                <div class="icon-input">
                                                    <i class="ti-money"></i>
                                                    {{ Form::text('overtime_price', null, ['class' => 'form-control']) }}
                                                </div>
                                                @if ($errors->has('overtime_price'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('overtime_price') as $overtime_price)
                                                        <li>{{ $overtime_price }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                {{ Form::label(__('late'), null, ['class' => 'control-label']) }} 
                                                {{ Form::text('late', $info->getWorkingMonths($info->id, $date->month, 0), ['class' => 'form-control text-center', 'readonly' => '']) }}
                                            </div>
                                            <div class="form-group col-6">
                                                <span class="ti-close"></span>
                                                {{ Form::label(__('price_late'), null, ['class' => 'control-label']) }}
                                                <div class="icon-input">
                                                    <i class="ti-money"></i>
                                                    {{ Form::text('late_price', null, ['class' => 'form-control']) }}
                                                </div>
                                                @if ($errors->has('late_price'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('late_price') as $late_price)
                                                        <li>{{ $late_price }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        {{ Form::text('working', $info->getWorkingMonths($info->id, $date->month, 1), ['class' => 'form-control', 'hidden' => 'hidden']) }}
                                        {{ Form::text('day_salary', $info->salary_day, ['class' => 'form-control', 'hidden' => 'hidden']) }}
                                        {{ Form::text('id_user', $info->id, ['class' => 'form-control', 'hidden' => 'hidden']) }}
                                        <div class="text-center">
                                            {{ Form::reset(__('Reset'), ['class' => 'btn btn-default']) }}
                                            {{ Form::submit(__('create'), ['class' => 'btn btn-success']) }}
                                          </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="tab-info">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#tab-info-1" class="nav-link active" role="tab" data-toggle="tab">{{ __('statistic') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-info-2" class="nav-link" role="tab" data-toggle="tab">{{ __('profile') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="tab-info-1">
                                    <div class="p-h-15 p-v-20">
                                        <div class="card-body">
                                            <div class="row m-v-30">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid rounded-circle d-block mx-auto m-b-30" src="{{ asset(config('app.link_avatar') . $info->avatar) }}" alt="">
                                                </div>
                                                <div class="col-sm-6 text-center text-sm-left">
                                                    <h2 class="m-b-5">{{ $info->name }}</h2>
                                                    <p class="text-opacity m-b-20 font-size-13">{{ $info->email }}</p>
                                                    <p class="text-dark">{{ $info->part }}</p>
                                                    <div class="d-flex flex-row justify-content-center justify-content-sm-start">
                                                        <div class="p-v-20 p-r-15 text-center">
                                                            <span class="font-size-18 text-info text-semibold">{{ $info->getWorkingMonths($info->id, $date->month, 0) }}</span>
                                                            <small class="d-block">{{ __('late') }}</small>
                                                        </div>
                                                        <div class="p-v-20 p-h-15 text-center">
                                                            <span class="font-size-18 text-info text-semibold">{{ str_limit($info->getOvertimeMonths($info->id), 4) }}</span>
                                                            <small class="d-block">{{ __('overtime') }}</small>
                                                        </div>
                                                        <div class="p-v-20 p-h-15 text-center">
                                                            <span class="font-size-18 text-info text-semibold">{{ $info->getWorkingMonths($info->id, $date->month, 1) }}</span>
                                                            <small class="d-block">{{ __('working') }}</small>
                                                        </div>
                                                        <div class="p-v-20 p-h-15 text-center">
                                                            <span class="font-size-18 text-info text-semibold">{{ $vacations->count() }}</span>
                                                            <small class="d-block">{{ __('vacation') }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab-info-2">
                                    <div class="p-h-15 p-v-20">
                                        <div class="card-body">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="avata text-center">
                                                            <img src="{!! asset(config('app.link_avatar') . $info->avatar) !!}" class="avata-img img-circle" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            {{ Form::label(__('name :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->name }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('email :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->email }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('phone :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->phone }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('birth_day :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->birthday }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('part :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->part }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('salary_day :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->salary_day }} {{ __('$') }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('day_in :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->day_in }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('sex :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ ($info->sex == 0) ? 'Male' : 'Female' }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('address :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->address }}</span>
                                                        </div>
                                                        <div>
                                                            {{ Form::label(__('role :'), null, ['class' => 'text-opacity m-b-20 font-size-13']) }}
                                                            <span class="text-dark">{{ $info->role }}</span>
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
            </div>
        </div>
    </div>
</div>
@endsection
