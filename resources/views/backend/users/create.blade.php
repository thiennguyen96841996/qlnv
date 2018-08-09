@extends('backend.layouts.master')
@section('title', 'Add User')
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
                        <legend class="text-center">{{ __('Add Employee') }}</legend>
                         <hr>
                            <div class="panel-body">
                                <div class="col-lg-12 col-lg-offset-6">
                                    {!! Form::open(['method' => 'POST', 'url' => asset('manager/users')]) !!}
                                        <div class="form-group">
                                            {{ Form::label(__('name'), null, ['class' => 'control-label']) }}
                                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name' ]) }}
                                        </div>
                                        @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('name') as $name)
                                                    <li>{{ $name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                         <div class="form-group">
                                            {{ Form::label(__('email'), null, ['class' => 'control-label']) }}
                                            {{ Form::text('email', '@gmail.com', ['class' => 'form-control']) }}
                                        </div>
                                        @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('email') as $email)
                                                    <li>{{ $email }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            {{ Form::label(__('part'), null, ['class' => 'control-label']) }}
                                            {{ Form::select('part', ['employee' => __('employee_part'), 'shipper' => __('shipper'), 'chef' => __('chef')], null, ['class' => 'form-control']) }}  
                                        </div>
                                        <div class="text-center">
                                            {{ Form::reset(__('Reset'), ['class' => 'btn btn-default']) }}
                                            {{ Form::submit(__('Add'), ['class' => 'btn btn-success']) }}
                                          </div>
                                    {!! Form::close() !!}
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
