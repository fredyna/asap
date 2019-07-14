
@extends('templates.master')

@section('content')

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">

        <div class="container-fluid"><!--Statistics cards Starts-->
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-info">
                                <h4 class="card-title">Detail Laporan</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-block">

                                <table id="table-ujian" class="table table-responsive-md">
                                    <tr>
                                        <th>Nama Ujian</th>
                                        <td>{{ $laporan->ujian->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori Ujian</th>
                                        <td>{{ $laporan->ujian->kategori->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Peserta</th>
                                        <td>{{ $laporan->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Waktu</th>
                                        <td>{{ $laporan->created_at->diffForHumans() }}</td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <h5>Jawaban Benar</h5>
                                        <h4 class="text-success">{{ $laporan->jawaban_benar }}</h4>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h5>Jawaban Salah</h5>
                                        <h4 class="text-danger">{{ $laporan->jawaban_salah }}</h4>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h5>Tidak Dijawab</h5>
                                        <h4 class="text-muted">{{ $laporan->jawaban_kosong }}</h4>
                                    </div>
                                </div>
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
        $("#menu-laporan").addClass('active');
    </script>
@endsection
