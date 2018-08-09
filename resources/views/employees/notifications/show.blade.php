@extends('backend.layouts.master')
@section('title', 'Notifications')
@section('style')
    {{ Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('notification') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('overtimes.index') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('overtimes.index') }}">{{ __('notification') }}</a>
                        <span class="breadcrumb-item active">{{ __('Information') }}</span>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-overflow">
                                <div class="card-header border bottom text-center">
                                    <h4 class="card-title">{{ __('request') }} {{ __('vacation') }}</h4>
                                </div>
                                <table class="table table-hover table-xl">
                                    <thead>
                                        <tr>
                                            <th>{{ __('date_start') }}</th>
                                            <th>{{ __('date_end') }}</th>
                                            <th>{{ __('status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vacationMonth as $value)
                                            <tr>
                                                <td>{!! $value->date_start !!}</td>
                                                <td>{!! $value->date_end !!}</td>
                                                <td>
                                                    @if ($value->status == 0)
                                                        <div class = "badge badge-pill badge-warning">{{ __('wait') }}</div>
                                                    @elseif ($value->status == 1) 
                                                        <div class = "badge badge-pill badge-gradient-success">{{ __('aproved') }}</div>
                                                    @else 
                                                        <div class = "badge badge-pill badge-gradient-danger">{{ __('refused') }}</div>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-overflow">
                                <table class="table table-hover table-xl">
                                    <div class="card-header border bottom text-center">
                                        <h4 class="card-title">{{ __('request') }} {{ __('overtime') }}</h4>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>{{ __('date') }}</th>
                                            <th>{{ __('time_start') }}</th>
                                            <th>{{ __('time_end') }}</th>
                                            <th>{{ __('status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($overtimeMonth as $value)
                                            <tr>
                                                <td>{!! $value->date !!}</td>
                                                <td>{!! $value->time_start !!}</td>
                                                <td>{!! $value->time_end !!}</td>
                                                <td>
                                                    @if ($value->status == 0)
                                                        <div class = "badge badge-pill badge-warning">{{ __('wait') }}</div>
                                                    @elseif ($value->status == 1) 
                                                        <div class = "badge badge-pill badge-gradient-success">{{ __('aproved') }}</div>
                                                    @else 
                                                        <div class = "badge badge-pill badge-gradient-danger">{{ __('refused') }}</div>
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
