@extends('backend.layouts.master')
@section('title', 'vacation')
@section('style')
{{ Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="row">
            @foreach ($reasons as $noti)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-media">
                            <li class="list-item">
                                <div class="media-img">
                                    <img src="{{ asset(config('app.link_avatar') . $noti->user->avatar) }}" alt="">
                                </div>
                                <div class="info">
                                    <a href="#" class="title text-semibold">{{ $noti->user->name }}</a>
                                    <span class="sub-title">{{ (new \Carbon\Carbon($noti->date_start))->format('d/m/Y') }}</span>
                                    <span class="sub-title">{{ (new \Carbon\Carbon($noti->date_end))->format('d/m/Y') }}</span>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <p class="font-size-16 opacity-08 m-t-30">{!! $noti->content !!}</p>                                   
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/jquery.dataTables.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}
{{ Html::script('assets/demo-bower/assets/js/tables/data-table.js') }}
@endsection
