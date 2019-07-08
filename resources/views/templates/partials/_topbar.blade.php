<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="d-lg-none navbar-right navbar-collapse-toggle">
                <a class="open-navbar-container">
                    <i class="ft-more-vertical"></i>
                </a>
            </span>
        </div>

        <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav float-right">

                    <li class="dropdown nav-item mr-0">
                        <a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-user-link dropdown-toggle">
                            <span class="avatar avatar-online">
                                <img id="navbar-avatar" src="{{ asset('app-assets/img/icon/avatar.png') }}" alt="avatar"/>
                            </span>
                            <p class="d-none">User Settings</p>
                        </a>
                        <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right">
                                <a href="{{ route('setting.index') }}" class="dropdown-item py-1">
                                    <i class="ft-settings mr-2"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="ft-power mr-2"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
