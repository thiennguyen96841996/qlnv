<div class="header navbar">
    <div class="header-container">
        <div class="nav-logo">
            <a href="{{ route('manager.home') }}">
                <div class="logo logo-dark"></div>
                <div class="logo logo-white"></div>
            </a>
        </div>
        <ul class="nav-left">
            <li>
                <a class="sidenav-fold-toggler" href="javascript:void(0);">
                    <i class="mdi mdi-menu"></i>
                </a>
                <a class="sidenav-expand-toggler" href="javascript:void(0);">
                    <i class="mdi mdi-menu"></i>
                </a>
            </li>
            <li class="search-box">
                <a class="search-toggle" href="javascript:void(0);">
                    <i class="search-icon mdi mdi-magnify"></i>
                    <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                </a>
            </li>
            <li class="search-input">
                {{ Form::text('search', null, ['class' => 'form-group'], ['placeholder' => __('search')]) }}
                <div class="search-predict">
                    <div class="search-footer">
                        <span>{{ __('search') }} '<b class="text-dark"><span class="serach-text-bind"></span></b>'</span>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="nav-right">
            @guest
            <li><a href="#">{{ __('login') }}</a></li>
            @else
            <li class="dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi mdi-apps"></i>
                </a>
                <ul class="dropdown-menu dropdown-grid col-3 dropdown-lg">
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-email-outline font-size-30 icon-gradient-success"></i>
                                <p class="m-b-0">{{ __('email') }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-folder-outline font-size-30 icon-gradient-success"></i>
                                <p class="m-b-0">{{ __('file') }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi mdi-gauge font-size-30 icon-gradient-success"></i>
                                <p class="m-b-0">{{ __('dashboard') }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-play-circle-outline font-size-30 icon-gradient-success"></i>
                                <p class="m-b-0">{{ __('video') }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-image-filter font-size-30 icon-gradient-success"></i>
                                <p class="m-b-0">{{ __('image') }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-image-filter-drama font-size-30 icon-gradient-success"></i>
                                <p class="m-b-0">{{ __('cloud') }}</p>
                            </div>
                        </a>
                    </li>
                </ul>    
            </li>
            <li class="notifications dropdown dropdown-animated scale-left">
                <span class="counter">2</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi mdi-bell-ring-outline"></i>
                </a>
                <ul class="dropdown-menu dropdown-lg p-v-0">
                    <li class="p-v-15 p-h-20 border bottom text-dark">
                        <h5 class="m-b-0">
                            <i class="mdi mdi-bell-ring-outline p-r-10"></i>
                            <span>{{ __('notification') }}</span>
                        </h5>
                    </li>
                    <li>
                        <ul class="list-media overflow-y-auto relative scrollable">
                            <li class="list-item border bottom">
                                @if (Auth::user()->role == config('app.manager'))
                                <a href="{{ route('vacations.create') }}" class="media-hover p-15">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-success">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            {{ __('vacation_notification') }}
                                        </span>
                                        <span class="sub-title"></span>
                                    </div>
                                </a>
                                <a href="{{ route('overtimes.create') }}" class="media-hover p-15">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-success">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            {{ __('overtime_notification') }}
                                        </span>
                                        <span class="sub-title"></span>
                                    </div>
                                </a>
                                @else
                                <a href="{{ route('notifications.show', Auth::user()->id) }}" class="media-hover p-15">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-success">
                                            <i class="ti-comments-smiley"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            {{ __('vacation_request') }}
                                        </span>
                                        <span class="sub-title"></span>
                                    </div>
                                </a>
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li class="p-v-15 p-h-20 text-center">
                        <span>
                            <a href="#" class="text-gray">{{ __('check_notification') }} <i class="ei-right-chevron p-l-5 font-size-10"></i></a>
                        </span>
                    </li>
                </ul>
            </li>
            <li class="user-profile dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src="{{ asset(config('app.link_avatar') . Auth::user()->avatar) }}" alt=" ">
                </a>
                <ul class="dropdown-menu dropdown-md p-v-0">
                    <li>
                        <ul class="list-media">
                            <li class="list-item p-15">
                                <div class="media-img">
                                    <img src="{{ asset(config('app.link_avatar') . Auth::user()->avatar) }}" alt=" ">
                                </div>
                                <div class="info">
                                    <span class="title text-semibold">{{ Auth::user()->name }}</span>
                                    <span class="sub-title">{{ Auth::user()->part }}</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="ti-settings p-r-10"></i>
                            <span>{{ __('setting') }}</span>
                        </a>
                    </li>
                    @if (Auth::user()->role == config('app.employee'))
                    <li>
                        <a href="{{ route('profile.index') }}">
                            <i class="ti-user p-r-10"></i>
                            <span>{{ __('profile') }}</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="#">
                            <i class="ti-email p-r-10"></i>
                            <span>{{ __('inbox') }}</span>
                            <span class="badge badge-pill badge-success pull-right">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off p-r-10"></i>
                            <span>{{ __('logout') }}</span>
                        </a>
                        {!! Form::open(['method' => 'POST', 'url' => 'logout', 'id' => 'logout-form']) !!} 
                        {!! Form::close() !!}
                    </li>
                </ul>
            </li>
            @endguest
            <li class="m-r-10">
                <a class="quick-view-toggler" href="javascript:void(0);">
                    <i class="mdi mdi-format-indent-decrease"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
