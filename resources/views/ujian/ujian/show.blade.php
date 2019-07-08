
@extends('templates.master')

@section('content')

    <ujian-show></ujian-show>

@endsection

@section('js')
    <script>
        $(function() {
            $("#menu-ujian").addClass('open');
            $("#menu-ujian-ujian").addClass('active');
        });
    </script>
@endsection
