<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
                <span>{{ __('manager') }}</span>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-odnoklassniki"></i>
                    </span>
                    <span class="title">{{ __('employees') }}</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a href="{{ url('/manager/users') }}">{{ __('all_user') }}</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('vacations.index') }}">{{ __('work_month')}}</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('overtimes.index') }}">{{ __('overtime') }}</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('salary.index') }}">{{ __('salary') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
