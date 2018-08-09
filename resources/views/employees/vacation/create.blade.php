@extends('backend.layouts.master')
@section('title', 'vacation')
@section('style')
{{ Html::style('assets/datetimepicker/build/jquery.datetimepicker.min.css') }}
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('vacation_form') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('vacation.index') }}">{{ __('vacation') }}</a>
                        <span class="breadcrumb-item active">{{ __('create') }}</span>
                    </nav>
                </div>
            </div> 
            <div class="card">
                <div class="card-header border bottom">
                    <h4 class="card-title">{{ __('create_form') }}</h4>
                </div>
                {!! Form::open(['method' => 'POST', 'url' => asset('/employee/vacation')]) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-h-10">
                                <div class="form-group">
                                    {{ Form::label('__employee_name', null, ['class' => 'control-label']) }}
                                    {{ Form::text(null, Auth::user()->name, ['class' => 'form-control', 'readonly' => '']) }}
                                </div>
                            </div>
                            <div class="p-h-10">
                                <div class="form-group">
                                    <div data-plugin="timepicker">
                                        <div class="row">
                                            <div class="col">
                                                {{ Form::label(__('timestart'), null, ['class' => 'control-label']) }}
                                                <div class="icon-input">
                                                    <i class="mdi mdi-clock"></i>
                                                    {{ form::text('date_start', null, ['class' => 'form-control', 'id' => 'datetimepicker_start_time']) }}
                                                </div>
                                                @if ($errors->has('date_start'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('date_start') as $date_start)
                                                        <li>{{ $date_start }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col">
                                                {{ Form::label('__time_end', null, ['class' => 'control-label']) }}
                                                <div class="icon-input">
                                                    <i class="mdi mdi-clock"></i>
                                                    {{ form::text('date_end', null, ['class' => 'form-control', 'id' => 'datetimepicker_end_time']) }}
                                                </div>
                                                @if ($errors->has('date_end'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('date_end') as $date_end)
                                                        <li>{{ $date_end }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-h-10">
                                <div class="form-group">
                                    {{ Form::label('__content', null, ['class' => 'control-label']) }}
                                    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor1']) }}
                                </div>
                                @if ($errors->has('content'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->get('content') as $content)
                                        <li>{{ $content }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="m-t-15">
                    <div class="m-t-25 text-center">
                        {{ Form::submit(__('submit'), ['class' => 'btn btn-success']) }}
                        {{ Form::reset(__('reset'), ['class' => 'btn btn-default']) }}
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
