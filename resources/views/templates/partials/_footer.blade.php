        <footer class="footer footer-static footer-light">
            <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; 2019 <a href="https://fredynurapriyanto" target="_blank" class="text-bold-800 primary darken-2">Fredy Nur Apriyanto </a>, All rights reserved. </span></p>
        </footer>

    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/core/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/prism.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/screenfull.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pace/pace.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CONVEX JS-->
<script src="{{ asset('app-assets/js/app-sidebar.js') }}"></script>
<script src="{{ asset('app-assets/js/notification-sidebar.js') }}"></script>
<!-- END CONVEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
@include('sweetalert::alert')
@yield('js')
<!-- END PAGE LEVEL JS-->
</body>
</html>
