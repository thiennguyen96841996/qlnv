@extends('backend.layouts.master')
@section('title', 'attend')
@section('style')
{{ Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('attend') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('attend.index') }}">{{ __('attend') }}</a>
                                <span class="breadcrumb-item active">{{ __('index') }}</span>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="button_create">
                        {!! Form::open(['method' => 'POST', 'url' => asset('/employee/attend')]) !!}
                            {{ Form::submit(__('button_attend'), ['class' => 'btn btn-gradient-warning']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-8">
                    <div class="card-body">
                        <div class="table-overflow">
                            <table id="dt-opt" class="table table-hover table-xl">
                                <thead>
                                    <tr>
                                        <th>{{ __('stt') }}</th>
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('date') }}</th>
                                        <th>{{ __('time') }}</th>
                                        <th>{{ __('status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $stt = 1;
                                    @endphp
                                    @foreach($attends as $value)
                                    <tr> 
                                        <td>{{ $stt ++ }}</td>
                                        <td>
                                            <div class="list-media">
                                                <div class="list-item">
                                                    <div class="media-img">
                                                        <img src="{{ asset(config('app.link_avatar') . Auth::user()->avatar) }}" alt=" ">
                                                    </div>
                                                    <div class="info">
                                                        <span class="title">{{ $value->user->name }}</span>
                                                        <span class="sub-title">{{ $value->user->part }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $value->date }}</td>
                                        <td>{{ $value->time }}</td>
                                        <td>
                                            @if ($value->status == 0)
                                                <div class = "badge badge-pill badge-gradient-danger">{{ __('late') }}</div>
                                            @else 
                                                <div class = "badge badge-pill badge-gradient-success">{{ __('yes') }}</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>       
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('statistic') }}</h4>
                            <div class="card-toolbar">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="text-gray card-collapse-btn" data-toggle="card-collapse">
                                            <i class="mdi mdi-chevron-down font-size-20"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-collapsible">
                            <div class="card-body">
                                <div class="table-overflow">
                                    <table class="table table-hover table-xl">
                                        <thead>
                                            <tr>
                                                <th>
                                                    {{ __('stt') }}
                                                </th>
                                                <th>{{ __('date') }}</th>
                                                <th>{{ __('status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php 
                                                $stt = 1;
                                            @endphp
                                            @foreach($stastics as $rows)
                                            <tr> 
                                                <td>{{ $stt ++ }}</td>
                                                <td>{{ $rows->date }}</td>
                                                <td>
                                                    @if ($rows->status == 0)
                                                        <div class = "badge badge-pill badge-gradient-danger">{{ __('late') }}</div>
                                                    @else 
                                                        <div class = "badge badge-pill badge-gradient-success">{{ __('yes') }}</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>{{ __('total') }}</th>
                                                <th>{{ $stt - 1 }} {{ __('day') }}</th>
                                                <th>{{ $lates->count() }} {{ __('late') }}</th>
                                            </tr>
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
</div>
@endsection

@section('script')
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/jquery.dataTables.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}
{{ Html::script('assets/demo-bower/assets/js/tables/data-table.js') }}
@endsection
