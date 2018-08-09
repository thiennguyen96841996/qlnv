@extends('backend.layouts.master')
@section('title', 'Overtime')
@section('style')
    {{ Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('overtime') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('overtimes.index') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('overtimes.index') }}">{{ __('overtime') }}</a>
                        <span class="breadcrumb-item active">{{ __('index') }}</span>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-overflow">
                                <div class="card-header border bottom text-center">
                                    <h4 class="card-title">{{ __('today') }} {{ $date->toDateString() }}</h4>
                                </div>
                                    <table class="table table-hover table-xl">
                                    <thead>
                                        <tr>
                                            <th>{{ __('STT') }}</th>
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('time_start') }}</th>
                                            <th>{{ __('time_end') }}</th>
                                            <th>{{ __('hours') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @php
                                            $stt = 1;
                                        @endphp
                                        @foreach($overtimes as $value)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>
                                                    <div class="list-media">
                                                        <div class="list-item">
                                                            <div class="media-img">
                                                                <img src="{{ asset(config('app.link_avatar') . $value->user->avatar) }}" alt=" ">
                                                            </div>
                                                            <div class="info">
                                                                <span class="title"><a href="{{ route('overtimes.show', $value->user->id) }}">{!! $value->user->name !!}</a></span>
                                                                <span class="sub-title">{{ $value->user->part }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{!! $value->time_start !!}</td>
                                                <td>{!! $value->time_end !!}</td>
                                                <td>{!! str_limit($value->hours, 4) !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-overflow">
                                <table class="table table-hover table-xl">
                                    <div class="card-header border bottom text-center">
                                        <h4 class="card-title">{{ __('Month') }} {{ $date->month }}</h4>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>{{ __('STT') }}</th>
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('hours') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $stt = 1;
                                        @endphp
                                        @foreach($overtimeMonth as $value)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>
                                                    <div class="list-media">
                                                        <div class="list-item">
                                                            <div class="media-img">
                                                                <img src="{{ asset(config('app.link_avatar') . $value->user->avatar) }}" alt=" ">
                                                            </div>
                                                            <div class="info">
                                                                <span class="title"><a href="{{ route('overtimes.show', $value->user->id) }}">{!! $value->user->name !!}</a></span>
                                                                <span class="sub-title">{{ $value->user->part }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{!! str_limit($value->getOvertimeMonths($value->user->id), 4) !!}</td>
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
