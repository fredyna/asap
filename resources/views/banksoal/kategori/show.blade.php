
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
                                            <h4 class="card-title">Edit Kategori Soal</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('kategori-soal.update', $kategori->id) }}">
                                                @csrf
                                                @method('PATCH')

                                                <div class="form-body">

                                                    <div class="form-group {{ $errors->has('kategori') ? 'has-error':'' }}">
                                                        <label>Kategori</label>
                                                        <input type="text" class="form-control" name="kategori" value="{{ $kategori->kategori }}">

                                                        @if ($errors->has('kategori'))
                                                            <p class="text-danger">{{ $errors->first('kategori') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="eventRegInput2">Deskripsi</label>
                                                        <textarea type="text" class="form-control" name="deskripsi" cols="3">{{ $kategori->deskripsi }}</textarea>

                                                        @if ($errors->has('deskripsi'))
                                                            <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="form-actions right">
                                                    <a href="{{ route('kategori-soal.index') }}" class="btn btn-danger mr-1">
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
            $("#menu-soal").addClass('open');
            $("#menu-soal-kategori").addClass('active');
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
                        $("#deleteTipe"+id).submit();
                    }
                })
        }
    </script>
@endsection
