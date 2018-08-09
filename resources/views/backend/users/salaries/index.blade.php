@extends('backend.layouts.master')
@section('title', 'salary')
@section('style')
{{ Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}
@endsection
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
                        <span class="breadcrumb-item active">{{ __('statistic') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('month') }}</th>
                                    <th>{{ __('working') }}</th>
                                    <th>{{ __('overtime') }}</th>
                                    <th>{{ __('salary_day') }}</th>
                                    <th>{{ __('total') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($salaries as $value)
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="{{ asset(config('app.link_avatar') . $value->user->avatar) }}" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">{{ $value->user->name }}</span>
                                                    <span class="sub-title">{{ $value->user->part }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $value->setDateAttribute($value->month, $value->year) }}</td>
                                    <td>{{ $value->day_working }}</td>
                                    <td>{{ $value->overtime_hour }}</td>
                                    <td>{{ $value->user->salary_day }}</td>
                                    <td>{{ $value->total }}</td>
                                    <td class="font-size-18">
                                        <a data-toggle="modal" data-target="#basic-modal" data-url="{{ route('salary.update', $value->id) }}" data-value="{{ $value }}" class="text-gray m-r-15"><i class="ti-email"></i></a>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div>       
            </div> 
        </div>
        <div class="modal fade" id="basic-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                            <h4 class="d-flex align-items-center h-100">{{ __('mail') }} {{ date('m-Y') }}</h4>
                        </div>
                    </div>
                    {!! Form::open(['id' => 'del-form', 'method' => 'POST']) !!}
                        {{ method_field('PUT') }}
                        <div class="form-group"> 
                            <div class="col-12">
                                <div class="row">
                                    {{ Form::label(__('name'), null, ['class' => 'col-lg-2 control-label']) }}
                                    <div class="col-lg-10">
                                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'readonly' => '']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="row">
                                <div class="col-6">
                                    <div class="row"> 
                                        {{ Form::label(__('overtime'), null, ['class' => 'col-3 form_label control-label']) }}
                                        <div class="col-7 form_text">
                                        {{ Form::text('overtime', null, ['id' => 'overtime', 'class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        {{ Form::label(__('working'), null, ['class' => 'col-3 control-label']) }}
                                        <div class="col-7">
                                        {{ Form::text('working', null, ['id' => 'working', 'class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-12">
                                <div class="row">
                                    {{ Form::label(__('total'), null, ['class' => 'col-lg-2 control-label']) }}
                                    <div class="col-lg-10">
                                    {{ Form::text('total', null, ['id' => 'total', 'class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-border">
                            <div>
                                {{ Form::button(__('cancel'), ['class' =>'btn btn-default', 'data-dismiss' => 'modal']) }}
                                {{ Form::submit(__('send'), ['class' =>'btn btn-success']) }}
                            </div>
                        </div> 
                    {!! Form::close() !!}
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
<script type="text/javascript">
    $(function() {
        $('#basic-modal').on('show.bs.modal', function(e) {
            var url = $(e.relatedTarget).data('url');
            var value = $(e.relatedTarget).data('value');
            $('#del-form').attr('action', url);
            $('#name').attr('value', value.user.name);
            $('#overtime').attr('value', value.overtime_hour);
            $('#working').attr('value', value.day_working);
            $('#total').attr('value', value.total);
        });
    });
</script>
@endsection
