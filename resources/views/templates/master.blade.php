@include('templates.partials._header')
@if (Auth::user()->role == 'admin')
    @include('templates.partials._sidebarAdmin')
@else
    @include('templates.partials._sidebarUser')
@endif

@include('templates.partials._topbar')
@yield('content')
@include('templates.partials._footer')
