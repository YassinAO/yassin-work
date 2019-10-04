<div id="sidenav">
        <div class="sidenav-header">
            <img src="{{URL::asset('/images/logo.png')}}" alt="" width="75%">
        </div>
    <div id="sidenav-container">
        <ul>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('/') }}" target="_blank"><i class="fas fa-satellite-dish"></i> Live</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('dashboard') }}"><i class="fas fa-home"></i> Main</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('dashboard/projects') }}"><i class="fas fa-pencil-ruler"></i> Projects</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('dashboard/services') }}"><i class="fas fa-concierge-bell"></i> Services</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('dashboard/careers') }}"><i class="fas fa-building"></i> Careers</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('dashboard/posts') }}"><i class="fas fa-blog"></i> Blog</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('dashboard/categories') }}"><i class="fas fa-layer-group"></i> Categories</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ url('dashboard/tags') }}"><i class="fas fa-tags"></i> Tags</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                {{ __('Logout') }}</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>