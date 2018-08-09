@extends('backend.layouts.master')
@section('title', 'vacation')
@section('style')
{{ Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('statistic') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('vacations.index') }}">{{ __('work_month') }}</a>
                        <span class="breadcrumb-item active">{{ __('statistic') }}</span>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header border bottom text-center">
                            <h4 class="card-title">{{ __('working') }} {{ $date->toDateString() }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row m-v-15">
                                <div class="col-md-6">
                                    <h5 class="m-b-20 text-center">Working</h5>
                                    <div class="list-group">
                                        <ul class="list-media">
                                            @foreach($works as $work)
                                            <a href="#">
                                                <li class="list-item">
                                                    <div class="p-v-15 p-h-20">
                                                        <div class="media-img">
                                                            <img src="{{ asset(config('app.link_avatar') . $work->user->avatar) }}" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <span class="title">{{ $work->user->name }}</span>
                                                            <span class="sub-title">{{ $work->user->part }}</span>
                                                            @if ($work->status == 0)
                                                            <span class="badge badge-warning badge-pill">{{ __('late') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="m-b-20 text-center">{{ __('vacation') }}</h5>
                                    <div class="list-group">
                                        <ul class="list-media">
                                            @foreach($vacations as $vacation)
                                            <a href="{{ route('vacations.show', $vacation->user_id) }}">
                                                <li class="list-item">
                                                    <div class="p-v-15 p-h-20">
                                                        <div class="media-img">
                                                            <img src="{{ asset(config('app.link_avatar') . $vacation->user->avatar) }}" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <span class="title">{{ $vacation->user->name }}</span>
                                                            <span class="sub-title">{{ $vacation->user->part }}</span>
                                                            <span class="badge badge-danger badge-pill">{{ __('vacation') }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"><strong>{{ __('Today') }}</strong></div>
                                <div class="col-md-3"><span class="badge badge-success badge-pill">{{ $works->count() }} {{ __('working') }}</span></div>
                                <div class="col-md-3"><span class="badge badge-warning badge-pill">{{ $lates->count() }} {{ __('late') }}</span></div>
                                <div class="col-md-3"><span class="badge badge-danger badge-pill">{{ $vacations->count() }} {{ __('vacation') }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-overflow">
                                <table id="dt-opt" class="table table-hover table-xl">
                                    <thead>
                                        <tr>
                                            <th>{{ __('name') }}</th>
                                            <th class="text-center">{{ __('work_month') }} {{ $date->month }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($statics as $value)
                                        <tr>
                                            <td>
                                                <div class="list-media">
                                                    <div class="list-item">
                                                        <div class="media-img">
                                                            <img src="{{ asset(config('app.link_avatar') . $value->user->avatar) }}" alt=" ">
                                                        </div>
                                                        <div class="info">
                                                            <span class="title">{{ $value->user->name }}</span>
                                                            <span class="sub-title">{{ $value->user->part }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $value->getWorkingMonths($value->user->id, $date->month, 1) }} {{ __('work') }}
                                                {{ $value->getWorkingMonths($value->user->id, $date->month, 0) }} {{ __('late') }}
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
