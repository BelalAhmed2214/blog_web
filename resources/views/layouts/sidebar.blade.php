<div class="sidebar">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Dashboard
            </a>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @auth

                            @can('view posts')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                            </li>
                            @endcan
                            @can('view comments')
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('comments.index') }}">Comments</a>
                            </li>
                            @endcan

                            @can('view users')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                            </li>
                            @endcan
                            @can('view roles')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                            </li>
                            @endcan
                            @can('view permissions')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('permissions.index') }}">Permissions</a>
                            </li>
                            @endcan
                            
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('LoginForm') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-primary" href="#">
                                {{ Auth::user()->name }} - {{ Auth::user()->roles->pluck('name')->first() }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
