
@extends('templates.master')

@section('content')

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!--Statistics cards Starts-->
                    <section id="extended">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Tambah Kategori Ujian</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('kategori-ujian.store') }}">
                                                @csrf

                                                <div class="form-body">

                                                    <div class="form-group {{ $errors->has('kategori') ? 'has-error':'' }}">
                                                        <label>Kategori</label>
                                                        <input type="text" class="form-control" name="kategori" value="{{ old('kategori') }}" required>

                                                        @if ($errors->has('kategori'))
                                                            <p class="text-danger">{{ $errors->first('kategori') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <textarea type="text" class="form-control" name="deskripsi" cols="3">{{ old('deskripsi') }}</textarea>
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

                            <div class="col-sm-7">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Data Kategori Ujian</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">

                                            <table class="table table-responsive-md text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th style="text-align: left">Kategori</th>
                                                        <th style="text-align: left">Deskripsi</th>
                                                        <th>actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @if (!empty($kategories))
                                                        @foreach ($kategories as $kategori)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td style="text-align: left">{{ $kategori->nama }}</td>
                                                                <td style="text-align: left">{{ $kategori->deskripsi ? $kategori->deskripsi:'-' }}</td>
                                                                <td>
                                                                    <a href="{{ route('kategori-ujian.show', $kategori->id) }}" class="success p-0">
                                                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="danger p-0">
                                                                        <i onclick="deleted('{{ $kategori->id }}')" class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                                    </a>

                                                                    <form method="POST" id="deleteKategori{{ $kategori->id }}" action="{{ route('kategori-ujian.destroy', $kategori->id) }}" style="display:none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4"><i>Tidak ada data</i></td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
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
