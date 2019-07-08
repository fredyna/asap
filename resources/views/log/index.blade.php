
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
                                <h4 class="card-title">Data Log</h4>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                                <input id="input-search" type="text" class="form-control" placeholder="Search..." value="{{ !empty($search) ? $search:'' }}">
                                &nbsp;&nbsp;
                                <button onclick="search()" class="btn btn-info">Cari <i class="fa fa-search"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-block">

                                <table id="table-ujian" class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Aktivitas</th>
                                            <th>User</th>
                                            <th>Deskripsi</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @if (!empty($logs) && count($logs))
                                            @foreach ($logs as $log)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $log->name }}</td>
                                                    <td>{{ $log->user->name }}</td>
                                                    <td>{{ str_limit($log->description, 50) }}</td>
                                                    <td>{{ $log->created_at->format('d M Y h:i:s') }}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="danger p-0" onclick="deleted('{{$log->id}}')">
                                                            <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                        </a>

                                                        <form method="POST" id="deleteLog{{ $log->id }}" action="{{ route('user.destroy', $log->id) }}" style="display:none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center"><i>Tidak ada data</i></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ $logs->links() }}
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
        $("#menu-log").addClass('active');

        function search()
        {
            let key = $("#input-search").val();
            let url = "{{ route('log.index') }}" + "?search=" + key;

            location.href = url;
        }

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
                        $("#deleteLog"+id).submit();
                    }
                })
        }
    </script>
@endsection
