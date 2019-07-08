
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
                                <h4 class="card-title">Data User</h4>
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
                                <a href="{{ route('user.create') }}">
                                    <button class="btn btn-sm btn-success mr-1 shadow-z-2" style="font-weight: bold">Tambah</button>
                                </a>

                                <table id="table-ujian" class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: left">Nama</th>
                                            <th style="text-align: left">Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @if (!empty($users) && count($users))
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        <a href="{{ route('user.edit', $user->id) }}" class="success p-0">
                                                            <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="danger p-0" onclick="deleted('{{$user->id}}')">
                                                            <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                        </a>

                                                        <form method="POST" id="deleteUser{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" style="display:none;">
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
                                {{ $users->links() }}
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
        $("#menu-user").addClass('active');

        function search()
        {
            let key = $("#input-search").val();
            let url = "{{ route('user.index') }}" + "?search=" + key;

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
                        $("#deleteUser"+id).submit();
                    }
                })
        }
    </script>
@endsection
