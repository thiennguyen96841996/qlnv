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
                <h2 class="header-title">{{ __('vacation') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('vacations.index') }}">{{ __('vacation') }}</a>
                        <span class="breadcrumb-item active">{{ __('handling') }}</span>
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
                                    <th>{{ __('content') }}</th>
                                    <th>{{ __('date_start') }}</th>
                                    <th>{{ __('date_end') }}</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notis as $value)
                                <tr>
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
                                    <td>{!! str_limit($value->content, 20) !!}</td>
                                    <td>{{ $value->date_start }}</td>
                                    <td>{{ $value->date_end }}</td>
                                    <td class="text-center font-size-18">
                                        {!! Form::model($notis, ['route' => ['vacations.update', $value->id]]) !!}
                                            {{ method_field('PUT') }}
                                            {!! Form::submit('approve', ['class' => 'btn btn-success', 'name' => 'approve']) !!}
                                            {!! Form::submit('refuse', ['class' => 'btn btn-default', 'name' => 'refuse']) !!}
                                        {!! Form::close() !!}
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
