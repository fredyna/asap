
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
                                <h4 class="card-title">Pengumuman</h4>
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
                                            <th style="text-align: left">Nama Ujian</th>
                                            <th style="text-align: left">Kategori</th>
                                            <th>Progress</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Soal Dasar Pemrograman Web Statis</td>
                                            <td>Pemrograman Web</td>
                                            <td class="text-center">Completed</td>
                                            <td>
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</button>
                                            </td>
                                        </tr>
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
        $("#menu-pengumuman").addClass('active');
    </script>
@endsection
