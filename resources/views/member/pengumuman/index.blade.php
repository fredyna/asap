
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

                        {{-- <div class="col-12">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div> --}}

                        <div class="card-body">
                            <div class="card-block">

                                <table id="table-pengumuman" class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: left">Nama Ujian</th>
                                            <th style="text-align: left">Kategori</th>
                                            <th class="text-center">Waktu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1
                                        @endphp
                                        @if (count($pengumumans) > 0)
                                            @foreach ($pengumumans as $pengumuman)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $pengumuman->ujian->nama }}</td>
                                                    <td>{{ $pengumuman->ujian->kategori->nama }}</td>
                                                    <td class="text-center">
                                                        {{
                                                            $pengumuman->updated_at->diffForHumans()
                                                        }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('pengumuman.show', $pengumuman->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                                {{-- {{ $pengumumans->links() }} --}}
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

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('app-assets/vendors/js/datatable/datatables.min.js')}}"></script>
    <script>
        $("#menu-pengumuman").addClass('active');
        $("#table-pengumuman").dataTable();
    </script>
@endsection
