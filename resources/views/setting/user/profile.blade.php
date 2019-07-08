
@extends('templates.master')

@section('content')

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!--Statistics cards Starts-->
                    <section id="extended">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Edit Profile User</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('setting.store') }}">
                                                @csrf

                                                <div class="form-body">

                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                                                        @if ($errors->has('name'))
                                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">

                                                        @if ($errors->has('email'))
                                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="form-actions right">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="icon-note"></i> Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Ganti Password</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('setting.password') }}">
                                                @csrf

                                                <div class="form-body">

                                                    <div class="form-group">
                                                        <label>Password Baru</label>
                                                        <input type="password" class="form-control" name="password" placeholder="password baru">

                                                        @if ($errors->has('password'))
                                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Ulang Password</label>
                                                        <input type="password" class="form-control" name="r_password" placeholder="ulangi password baru">

                                                        @if ($errors->has('r_password'))
                                                            <p class="text-danger">{{ $errors->first('r_password') }}</p>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="form-actions right">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="icon-note"></i> Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection
