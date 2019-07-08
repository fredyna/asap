
@extends('templates.master')

@section('content')

    <ujian></ujian>

@endsection

@section('js')
    <script>
        $(function() {
            $("#menu-ujian").addClass('open');
            $("#menu-ujian-ujian").addClass('active');
        });
    </script>
@endsection
