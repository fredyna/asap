
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
                                        <td>Soal Dasar Pemrograman Web Statis</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori Ujian</th>
                                        <td>Pemrograman Web</td>
                                    </tr>
                                    <tr>
                                        <th>Peserta</th>
                                        <td>Fredy Nur Apriyanto</td>
                                    </tr>
                                    <tr>
                                        <th>Progress</th>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <th>Jawaban Benar</th>
                                        <td>17</td>
                                    </tr>
                                    <tr>
                                        <th>Jawaban Salah</th>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <th>Tidak Dijawab</th>
                                        <td>1</td>
                                    </tr>
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
        $("#menu-laporan").addClass('active');
    </script>
@endsection
