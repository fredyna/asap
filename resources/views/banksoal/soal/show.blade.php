
@extends('templates.master')

@section('content')
    <soal-show></soal-show>
@endsection

@section('js')
    <script>
        $(function() {
            $("#menu-soal").addClass('open');
            $("#menu-soal-soal").addClass('active');
        });
    </script>
@endsection
