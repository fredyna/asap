
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
                                <h4 class="card-title">Detail Ujian</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-block table-responsive">
                                <table style="width: 100%;">
                                    <tr>
                                        <th style="width: 35%;">Nama Ujian</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">{{ $pengumuman->ujian->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 35%;">Kategori Ujian</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">{{ $pengumuman->ujian->kategori->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 35%;">Jumlah Soal</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">{{ $pengumuman->ujian->soals()->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 35%;">Waktu</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">{{ $pengumuman->updated_at->diffForHumans() }}</td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <h4>Jawaban Benar</h4>
                                    <h2 class="text-success">{{ $pengumuman->jawaban_benar }}</h2>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h4>Jawaban Salah</h4>
                                    <h2 class="text-danger">{{ $pengumuman->jawaban_salah }}</h2>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h4>Tidak Dijawab</h4>
                                    <h2 class="text-muted">{{ $pengumuman->jawaban_kosong }}</h2>
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
        $("#menu-pengumuman").addClass('active');
    </script>
@endsection
