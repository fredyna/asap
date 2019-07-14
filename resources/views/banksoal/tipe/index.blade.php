
@extends('templates.master')

@section('content')

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!--Statistics cards Starts-->
                    <section id="extended">
                        <div class="row">
                            {{-- <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Tambah Tipe Soal</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <form class="form" method="POST" action="{{ route('tipe-soal.store') }}">
                                                @csrf

                                                <div class="form-body">

                                                    <div class="form-group {{ $errors->has('tipe') ? 'has-error':'' }}">
                                                        <label for="eventRegInput1">Tipe</label>
                                                        <input type="text" class="form-control" name="tipe" required>

                                                        @if ($errors->has('tipe'))
                                                            <p class="text-danger">{{ $errors->first('tipe') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="eventRegInput2">Deskripsi</label>
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
                            </div> --}}

                            <div class="col-sm-8 offset-sm-2">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-info">
                                            <h4 class="card-title">Data Tipe Soal</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">

                                            <table class="table table-responsive-md text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th style="text-align: left">Tipe</th>
                                                        <th style="text-align: left">Deskripsi</th>
                                                        <th>actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @if (!empty($tipes))
                                                        @foreach ($tipes as $tipe)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td style="text-align: left">{{ $tipe->tipe }}</td>
                                                                <td style="text-align: left">{{ $tipe->deskripsi ? $tipe->deskripsi:'-' }}</td>
                                                                <td>
                                                                    <a href="{{ route('tipe-soal.show', $tipe->id) }}" class="success p-0">
                                                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                                                    </a>
                                                                    {{-- <a href="javascript:void(0)" class="danger p-0">
                                                                        <i onclick="deleted('{{ $tipe->id }}')" class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                                    </a>

                                                                    <form method="POST" id="deleteTipe{{ $tipe->id }}" action="{{ route('tipe-soal.destroy', $tipe->id) }}" style="display:none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form> --}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
            $("#menu-soal").addClass('open');
            $("#menu-soal-tipe").addClass('active');
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
