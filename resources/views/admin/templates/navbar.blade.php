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
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="{{ (request()->is('category*')) ? 'active' : '' }}" >
            <a href="{{ route('category.index') }}">
                <span class="icon"><ion-icon name="location-outline"></ion-icon></span>
                <span class="title">Locations</span>
            </a>
        </li>
        <li class="{{ (request()->is('dacha*')) ? 'active' : '' }}" >
            <a href="{{ route('dacha.index') }}">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Dacha</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                <span class="title">Settings</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <span class="title">Password</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">Sign out</span>
            </a>
        </li>
    </ul>
</div>
