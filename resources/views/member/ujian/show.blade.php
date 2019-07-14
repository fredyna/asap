
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
                                        <td style="width: 60%;">{{ $data['nama'] }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 35%;">Kategori Ujian</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">{{ $data['kategori_ujian'] }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 35%;">Jumlah Soal</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">{{ $data['jumlah_soal'] }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 35%;">Jumlah Percobaan</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">{{ $data['jumlah_coba'] }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 35%;">Waktu</th>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 60%;">10 Menit</td>
                                    </tr>
                                    @if ($data['status'] != 2)
                                        <tr>
                                            <th style="width: 35%;">Status Ujian Terakhir</th>
                                            <td style="width: 5%;">:</td>
                                            <td style="width: 60%;">
                                                @if ($data['status'] == 0 && $data['past'])
                                                    <button class="btn btn-sm btn-danger">Belum Selesai dan Sesi Habis</button>
                                                @elseif ($data['status'] == 0 && !$data['past'])
                                                    <button class="btn btn-sm btn-warning">Belum Selesai</button>
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                                @if ($data['status'] == 0 && !$data['past'])
                                    <a href="{{ route('member.ujian.start', $data['id']) }}" class="btn btn-success float-right">Lanjut Ujian</a>
                                @else
                                    <a href="{{ route('member.ujian.start', $data['id']) }}" class="btn btn-success float-right">Mulai Ujian</a>
                                @endif
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
