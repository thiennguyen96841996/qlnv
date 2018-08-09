@extends('backend.layouts.master')
@section('title', 'overtime')
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
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('overtime.index') }}">{{ __('overtime') }}</a>
                        <span class="breadcrumb-item active">{{ __('index') }}</span>
                    </nav>
                </div>
            </div>  
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox p-0">
                                            {{ Form::checkbox('checkAll', null, false, ['class' => 'checkAll', 'id' => 'selectable1']) }}
                                            {{ Form::label(null, null, ['for' => 'selectable1']) }}
                                        </div>
                                    </th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th>{{ __('date') }}</th>
                                    <th>{{ __('date_start') }}</th>
                                    <th>{{ __('date_end') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($overtimes as $value)
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <input id="selectable2" type="checkbox">
                                            <label for="selectable2"></label>
                                        </div> 
                                    </td>
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
                                    <td>
                                        @if ($value->status == 0)
                                            <div class = "badge badge-pill badge-warning">{{ __('wait') }}</div>
                                        @elseif ($value->status == 1) 
                                            <div class = "badge badge-pill badge-gradient-success">{{ __('aprove') }}</div>
                                        @else 
                                            <div class = "badge badge-pill badge-gradient-danger">{{ __('refuse') }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $value->date }}</td>
                                    <td>{{ $value->time_start }}</td>
                                    <td>{{ $value->time_end }}</td>
                                    <td class="text-center font-size-18">
                                        @if ($value->status == 0)
                                        <a href="{{ route('overtime.edit', $value->id) }}" class="text-gray ">{{ __('update') }}</a>
                                        {!! Form::model($overtimes, ['route' => ['overtime.destroy', $value->id]]) !!}
                                        {{ method_field('DELETE') }}
                                        {{ Form::submit(__('delete'), ['class' => 'text-gray']) }}
                                        {!! Form::close() !!}
                                        @else
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
@endsection

@section('script')
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/jquery.dataTables.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}
{{ Html::script('assets/demo-bower/assets/js/tables/data-table.js') }}
@endsection
