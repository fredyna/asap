<div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix">
            <a href="index.html" class="logo-text">
                <img src="{{ asset('app-assets/img/logo/asap-logo.png') }}" alt="Logo ASAP" style="width:25px;margin-left: 7px;">
                <span class="text align-middle"
                style="font-size: 20px;font-weight: 600; color: #131edc">
                    ASAP
                </span>
                <span class="text align-middle"></span>
            </a>
            <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
                <i data-toggle="expanded" class="ft-disc toggle-icon"></i>
            </a>
            <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
                <i class="ft-circle"></i>
            </a>
        </div>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li id="menu-ujian" class="nav-item"><a href="{{ route('member.index') }}"><i class="icon-book-open"></i><span data-i18n="" class="menu-title">Ujian</span></a>
                </li>

                <li id="menu-pengumuman" class="nav-item"><a href="{{ route('pengumuman.index') }}"><i class="icon-volume-2"></i><span data-i18n="" class="menu-title">Pengumuman</span></a>
                </li>

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
