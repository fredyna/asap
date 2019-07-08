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
                <li id="menu-dashboard" class="nav-item"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
                </li>

                <li id="menu-user" class="nav-item"><a href="{{ route('user.index') }}"><i class="icon-user"></i><span data-i18n="" class="menu-title">Manajemen User</span></a>
                </li>

                <li id="menu-soal" class="has-sub nav-item"><a href="javascript:void(0)"><i class="icon-layers"></i><span data-i18n="" class="menu-title">Bank Soal</span></a>
                    <ul class="menu-content">
                        <li id="menu-soal-tipe"><a href="{{ route('tipe-soal.index') }}" class="menu-item">Tipe Soal</a>
                        <li id="menu-soal-kategori"><a href="{{ route('kategori-soal.index') }}" class="menu-item">Kategori Soal</a>
                        </li>
                        <li id="menu-soal-soal"><a href="{{ route('soal.index') }}" class="menu-item">Soal</a>
                        </li>
                    </ul>
                </li>

                <li id="menu-ujian" class="has-sub nav-item"><a href="javascript:void(0)"><i class="icon-book-open"></i><span data-i18n="" class="menu-title">Master Ujian</span></a>
                    <ul class="menu-content">
                        <li id="menu-ujian-kategori"><a href="{{ route('kategori-ujian.index') }}" class="menu-item">Kategori Ujian</a>
                        </li>
                        <li id="menu-ujian-ujian"><a href="{{ route('ujian.index') }}" class="menu-item">Ujian</a>
                        </li>
                    </ul>
                </li>

                <li id="menu-laporan" class="nav-item"><a href="{{ route('laporan.index') }}"><i class="icon-docs"></i><span data-i18n="" class="menu-title">Laporan</span></a>
                </li>

                <li id="menu-log" class="nav-item"><a href="{{ route('log.index') }}"><i class="icon-notebook"></i><span data-i18n="" class="menu-title">Logs</span></a>
                </li>

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
