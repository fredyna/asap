
@extends('templates.master')

@section('content')

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!--Statistics cards Starts-->
                    <section id="extended">
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Tambah Ujian</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('ujian.store') }}">
                                                @csrf

                                                <div class="form-body">

                                                    <div class="form-group {{ $errors->has('kategori') ? 'has-error':'' }}">
                                                        <label>Kategori</label>
                                                        <select name="kategori" class="form-control" required>
                                                            <option value="">-- Pilih kategori --</option>
                                                            @foreach ($kategories as $kategori)
                                                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('kategori'))
                                                            <p class="text-danger">{{ $errors->first('kategori') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{ $errors->has('nama') ? 'has-error':'' }}">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>

                                                        @if ($errors->has('nama'))
                                                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="form-actions right">
                                                    <button type="reset" class="btn btn-danger mr-1">
                                                        <i class="icon-trash"></i> Cancel
                                                    </button>
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
            $("#menu-ujian").addClass('open');
            $("#menu-ujian-ujian").addClass('active');
        });

        function deleted(id){
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $("#deleteUjian"+id).submit();
                    }
                })
        }
    </script>
@endsection
