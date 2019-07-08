
@extends('templates.master')

@section('content')

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!--Statistics cards Starts-->
                    <section id="extended">
                        <div class="row">
                            <div class="col-sm-6 offset-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Tambah User</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('user.store') }}">
                                                @csrf

                                                <div class="form-body">

                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                                        @if ($errors->has('name'))
                                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                        @if ($errors->has('email'))
                                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password">

                                                        @if ($errors->has('password'))
                                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Ulang Password</label>
                                                        <input type="password" class="form-control" name="r_password">

                                                        @if ($errors->has('r_password'))
                                                            <p class="text-danger">{{ $errors->first('r_password') }}</p>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="form-actions right">
                                                    <a href="{{ route('tipe-soal.index') }}" class="btn btn-danger mr-1">
                                                        <i class="icon-trash"></i> Cancel
                                                    </a>
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="icon-note"></i> Save
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

@section('js')
    <script>
        $(function() {
            $("#menu-user").addClass('active');
        });
    </script>
@endsection
