@extends('backend.layouts.master')
@section('title', 'Users')
@section('style')
{!! Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') !!} 
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('user') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('manager.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('users.index') }}">{{ __('users') }}</a>
                                <span class="breadcrumb-item active">{{ __('index') }}</span>
                            </nav>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="creat_button text-right button_create">
                        <a href="{{ route('users.create') }}" class="btn btn-success">{{ __('Add Employee') }}</a>
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('email') }}</th>
                                    <th>{{ __('salary_day') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody> 
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach($users as $value)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>
                                            <div class="list-media">
                                                <div class="list-item">
                                                    <div class="media-img">
                                                        <img src="{{ asset(config('app.link_avatar') . $value->avatar) }}" alt=" ">
                                                    </div>
                                                    <div class="info">
                                                        <span class="title"><a href="{{ route('users.show', $value->id) }}">{!! $value->name !!}</a></span>
                                                        <span class="sub-title">{{ $value->part }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <td>{!! str_limit($value->email, 20) !!}</td>
                                        <td>{!! $value->salary_day !!} {{ __('$') }}</td>
                                        <td class="font-size-18">
                                            <a href="{{ route('users.edit', $value->id) }}" class="text-gray m-r-15" data-toggle="tooltip" data-placement="top" title="{{ __('update') }}"><i class="ti-pencil"></i></a>
                                            <a data-toggle="modal" data-target="#basic-modal" data-url="{{ route('users.destroy', $value->id) }}" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                            @if (($value->salaries->where('month', date('m'))->where('year', date('Y'))->count() != 0))
                                            @else
                                            <a href="{{ route('salary.create', $value->id) }}" class="text-gray m-r-15" data-toggle="tooltip" data-placement="top" title="{{ __('salary') }}"><i class="ti-money"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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
                            <h4 class="d-flex align-items-center h-100 head">{{ __('delete_confirm') }}</h4>
                        </div>
                        <div class="container text-center">
                            <div class="text-center font-size-70">
                                <i class="mdi mdi-checkbox-marked-circle-outline icon-gradient-success"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-border">
                        <div class="modal_button">
                            <div class="row"> 
                                {{ Form::button(__('cancel'), ['class' =>'btn btn-default', 'data-dismiss' => 'modal']) }}
                                {!! Form::open(['id' => 'del-form', 'method' => 'delete']) !!}
                                    {{ Form::submit(__('delete'), ['class' =>'btn btn-danger']) }}
                                {!! Form::close() !!}
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
    <script type="text/javascript">
        $(function() {
            $('#basic-modal').on('show.bs.modal', function(e) {
                var url = $(e.relatedTarget).data('url');
                $('#del-form').attr('action', url);
            });
        });
    </script>
@endsection
