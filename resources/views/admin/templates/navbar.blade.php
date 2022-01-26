<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                <span class="title">Brand Name</span>
            </a>
        </li>
        <li class="{{ (request()->is('admin-panel')) ? 'active' : '' }}">
            <a href="{{ route('adminPanel') }}">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="{{ (request()->is('category*')) ? 'active' : '' }}" >
            <a href="{{ route('category.index') }}">
                <span class="icon"><ion-icon name="bookmarks-outline"></ion-icon></span>
                <span class="title">Categories</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
                <span class="title">Message</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span>
                <span class="title">Help</span>
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
