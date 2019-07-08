
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
                                            <th style="text-align: left">Nama Ujian</th>
                                            <th style="text-align: left">Kategori</th>
                                            <th>Jumlah Soal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Soal Dasar Pemrograman Web Statis</td>
                                            <td>Pemrograman Web</td>
                                            <td>50</td>
                                            <td>
                                                <button class="btn btn-info btn-sm">Enrolled</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Soal Dasar Pemrograman Web Dinamis</td>
                                            <td>Pemrograman Web</td>
                                            <td>50</td>
                                            <td>
                                                <button class="btn btn-success btn-sm">Enroll</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Soal Dasar Pemrograman Web Responsive</td>
                                            <td>Pemrograman Web</td>
                                            <td>50</td>
                                            <td>
                                                <button class="btn btn-success btn-sm">Enroll</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Soal Dasar Pemrograman OOP PHP</td>
                                            <td>Pemrograman Web</td>
                                            <td>50</td>
                                            <td>
                                                <button class="btn btn-success btn-sm">Enroll</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Soal Dasar Pemrograman PHP & MySQL</td>
                                            <td>Pemrograman Web</td>
                                            <td>50</td>
                                            <td>
                                                <button class="btn btn-success btn-sm">Enroll</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>

                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
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
