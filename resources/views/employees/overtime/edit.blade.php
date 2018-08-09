@extends('backend.layouts.master')
@section('title', 'overtime')
@section('style')
{{ Html::style('assets/datetimepicker/build/jquery.datetimepicker.min.css') }}
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('overtime_form') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('overtime.index') }}">{{ __('overtime') }}</a>
                        <span class="breadcrumb-item active">{{ __('edit') }}</span>
                    </nav>
                </div>
            </div> 
            <div class="card">
                <div class="card-header border bottom">
                    <h4 class="card-title">{{ __('create_form') }}</h4>
                </div>
                {!! Form::model($overtime, ['route' => ['overtime.update', $overtime->id]]) !!}
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-h-10">
                                    <div class="form-group">
                                        {{ Form::label('__employee_name', null, ['class' => 'control-label']) }}
                                        {{ Form::text(null, Auth::user()->name, ['class' => 'form-control', 'readonly' => '']) }}
                                    </div>
                                </div>
                                <div class="p-h-10 col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        {{ Form::label('__date', null, ['class' => 'control-label']) }}
                                        <div class="icon-input">
                                            <i class="mdi mdi-calendar"></i>
                                            {{ Form::date('date', $overtime->date, ['class' => 'form-control']) }}
                                        </div>
                                        @if ($errors->has('time_end'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('date') as $date)
                                                <li>{{ $date }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="p-h-10">
                                    <div class="form-group">
                                        <div data-plugin="datepicker">
                                            <div class="row">
                                                <div class="col">
                                                    {{ Form::label(__('timestart'), null, ['class' => 'control-label']) }}
                                                    <div class="icon-input">
                                                        <i class="mdi mdi-clock"></i>
                                                        {{ form::time('time_start', $overtime->time_start, ['class' => 'form-control']) }}
                                                    </div>
                                                    @if ($errors->has('time_start'))
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->get('time_start') as $time_start)
                                                            <li>{{ $time_start }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    {{ Form::label('__time_end', null, ['class' => 'control-label']) }}
                                                    <div class="icon-input">
                                                        <i class="mdi mdi-clock"></i>
                                                        {{ form::time('time_end', $overtime->time_end, ['class' => 'form-control']) }}
                                                    </div>
                                                    @if ($errors->has('time_end'))
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->get('time_end') as $time_end)
                                                            <li>{{ $time_end }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="m-t-15">
                        <div class="m-t-25 text-center">
                            {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
                            {{ Form::reset('Reset', ['class' => 'btn btn-default']) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{ Html::script('assets/demo-bower/assets/vendor/moment/min/moment.min.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/selectize/dist/js/standalone/selectize.min.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/summernote/dist/summernote-bs4.min.js') }}
{{ Html::script('assets/datetimepicker/build/jquery.datetimepicker.full.min.js') }}
{{ Html::script('assets/demo-bower/assets/js/forms/form-elements.js') }}
{{ Html::script('js/myscript.js') }}
@endsection
