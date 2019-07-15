@include('templates.partials._header')

<section id="register">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center" style="background: #fff;">
                <div class="card px-4 py-2 box-shadow-2 width-400">
                    <div class="card-header text-center">
                        <img src="{{ asset('app-assets/img/logo/asap-logo.png') }}" alt="company-logo" class="mb-3" width="60">
                        <h5 class="text-uppercase text-bold-400 grey darken-1">ASAP</h5>
                        <h5 class="text-uppercase text-bold-400 grey darken-1"><small>ASAH PENGETAHUAN</small></h5>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <h6 class="text-uppercase text-bold-400 grey darken-1 text-center">Register</h6>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Insert your name..." required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Insert your email..." required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center col-md-12">
                                        <button type="submit" class="btn btn-info px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">Daftar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="app-assets/vendors/js/core/popper.min.js"></script>
    <script src="app-assets/vendors/js/core/bootstrap.min.js"></script>
    <script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="app-assets/vendors/js/prism.min.js"></script>
    <script src="app-assets/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="app-assets/vendors/js/screenfull.min.js"></script>
    <script src="app-assets/vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="app-assets/js/app-sidebar.js"></script>
    <script src="app-assets/js/notification-sidebar.js"></script>
    <!-- END CONVEX JS-->
  </body>
</html>
