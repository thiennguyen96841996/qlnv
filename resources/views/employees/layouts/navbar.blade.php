<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
                <span>{{ __('employee') }}</span>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="{{ route('profile.index') }}">
                    <span class="icon-holder"><i class="fa fa-intersex"></i></span>
                    <span class="title">{{ __('profile') }}</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="{{ route('attend.index') }}">
                    <span class="icon-holder"><i class="fa fa-linux"></i></span>
                    <span class="title">{{ __('attend') }}</span>
                </a>
            </li> 
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="{{ route('overtime.create') }}">
                    <span class="icon-holder"><i class="fa fa-paypal"></i></span>
                    <span class="title">{{ __('overtime') }}</span>
                </a>
            </li>   
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="{{ route('vacation.create') }}">
                    <span class="icon-holder"><i class="fa fa-medkit"></i></span>
                    <span class="title">{{ __('vacation') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
