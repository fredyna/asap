
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
                                            <h4 class="card-title">Detail Kategori Ujian</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('kategori-ujian.store') }}">
                                                @csrf

                                                <div class="form-body">

                                                    <input type="hidden" name="id" value="{{ $kategori->id }}">

                                                    <div class="form-group {{ $errors->has('tipe') ? 'has-error':'' }}">
                                                        <label>Kategori</label>
                                                        <input type="text" class="form-control" name="kategori" value="{{ $kategori->nama }}" required>

                                                        @if ($errors->has('kategori'))
                                                            <p class="text-danger">{{ $errors->first('kategori') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <textarea type="text" class="form-control" name="deskripsi" cols="3">{{ $kategori->deskripsi }}</textarea>
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
            $("#menu-ujian-kategori").addClass('active');
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
                        $("#deleteKategori"+id).submit();
                    }
                })
        }
    </script>
@endsection
