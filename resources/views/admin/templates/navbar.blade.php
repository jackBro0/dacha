<div class="navigation">
    <ul>
        <li>
            <a href="#">
{{--                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>--}}
                <span class="title">Dacha Bor</span>
            </a>
        </li>
        <li class="{{ (request()->is('admin-panel')) ? 'active' : '' }}">
            <a href="{{ route('adminPanel') }}">
                <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                <span class="title">@lang('main.dashboard')</span>
            </a>
        </li>
        <li class="{{ (request()->is('category*')) ? 'active' : '' }}" >
            <a href="{{ route('category.index') }}">
                <span class="icon"><ion-icon name="location-outline"></ion-icon></span>
                <span class="title">@lang('main.locations')</span>
            </a>
        </li>
        <li class="{{ (request()->is('dacha*')) ? 'active' : '' }}" >
            <a href="{{ route('dacha.index') }}">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">@lang('main.dacha')</span>
            </a>
        </li>
        <li class="{{ (request()->is('order*')) ? 'active' : '' }}" >
            <a href="{{ route('order.index') }}">
                <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                <span class="title">@lang('main.orders')</span>
            </a>
        </li>
{{--        <li>--}}
{{--            <a href="#">--}}
{{--                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>--}}
{{--                <span class="title">Settings</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="{{ (request()->is('password*')) ? 'active' : '' }}" >
            <a href="{{ route('password') }}">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <span class="title">@lang('main.security')</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">@lang('main.sign_out')</span>
            </a>
        </li>
    </ul>
</div>
