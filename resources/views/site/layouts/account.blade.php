<div class="login-header">
    @if($user_id > 0)
    <div class="dropdown">
        <a class="btn-xs btn-main btn-blue" href="#" data-toggle="dropdown">
            {{ $user_name }}
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('profile.index') }}">Profile</a></li>
            @if($admin_panel > 0)
            <li><a href="{{ route('admin.index') }}">Admin Panel</a></li>
            @endif
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            
        </ul>
    </div>
    @else
    <a class="btn-xs btn-main btn-blue" href="{{ route('register') }}">
        New Account
    </a>
    @endif
</div>

