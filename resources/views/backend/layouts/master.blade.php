<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield('title') </title>
    <link rel="apple-touch-icon" href="{{ asset('assets/demo-bower/assets/images/logo/apple-touch-icon.html') }}">
    <link rel="shortcut icon" href="{{ asset('assets/demo-bower/assets/images/logo/favicon.png') }}">
    {{ Html::style('assets/bootstrap/dist/css/bootstrap.css') }}
    {{ Html::style('assets/demo-bower/assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}
    {{ Html::style('assets/perfect-scrollbar/css/perfect-scrollbar.min.css') }}
    @yield('style')
    {{ Html::style('assets/demo-bower/assets/css/font-awesome.min.css') }}
    {{ Html::style('assets/demo-bower/assets/css/themify-icons.css') }}
    {{ Html::style('assets/mdi/css/materialdesignicons.min.css') }}
    {{ Html::style('assets/demo-bower/assets/css/animate.min.css') }}
    {{ Html::style('assets/demo-bower/assets/css/app.css') }}
    {{ Html::style('css/mystyle.css') }}
</head>

<body>

    <div class="app header-default side-nav-dark">
        <div class="layout">
            @guest
            @else
                @include('backend.layouts.header')
                @if (Auth::user()->role == config('app.manager'))
                    @include('backend.layouts.navbar')
                @else
                    @include('employees.layouts.navbar')
                @endif
                @include('backend.layouts.config')
            @endguest
            @yield('content')
         </div>
    </div>

    {{ Html::script('assets/ckeditor/ckeditor.js') }}
    <script> CKEDITOR.replace('editor1'); </script>
    {{ Html::script('assets/demo-bower/assets/js/vendor.js') }}
    {{ Html::script('assets/demo-bower/assets/js/app.min.js') }}
    {{ Html::script('assets/demo-bower/assets/vendor/chart.js/dist/Chart.min.js') }}
    {{ Html::script('assets/demo-bower/assets/vendor/jquery.sparkline/jquery.sparkline.min.js') }}
    {{ Html::script('assets/demo-bower/assets/js/dashboard/bank.js') }}
    @yield('script')
    {{ Html::script('assets/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (Session::has('success'))
                $.notify(
                {
                    icon: 'mdi mdi-check-circle-outline',
                    message: '{{ Session('success') }}'
                }, {
                    type: 'success',
                    timer: 1000,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    }
                });
            @elseif (Session::has('error'))
                $.notify(
                {
                    icon: 'mdi mdi-close-circle-outline',
                    message: '{{ Session('error') }}'
                }, {
                    type: 'danger',
                    timer: 1000,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    }
                });
            @endif
        });
    </script>
</body>
</html>
