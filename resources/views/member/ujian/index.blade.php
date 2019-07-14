
@extends('templates.master')

@section('content')

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">

        <div class="container-fluid"><!--Statistics cards Starts-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-info">
                                <h4 class="card-title">List Ujian</h4>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-block">

                                <table id="table-ujian" class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Ujian</th>
                                            <th>Kategori</th>
                                            <th>Jumlah Soal</th>
                                            <th>Jumlah Percobaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @if (!empty($data) && count($data))
                                            @foreach ($data as $ujian)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $ujian['nama'] }}</td>
                                                    <td>{{ $ujian['kategori_ujian'] }}</td>
                                                    <td class="text-center">{{ $ujian['jumlah_soal'] }}</td>
                                                    <td class="text-center">{{ $ujian['jumlah_coba'] }}</td>
                                                    <td>
                                                        <a href="{{ route('member.ujian.enroll', $ujian['id']) }}" class="btn btn-success btn-sm">Pilih</a>
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
            <!--Statistics cards Ends-->

        </div>

        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        $("#menu-ujian").addClass('active');
    </script>
@endsection
