
@extends('templates.master')

@section('content')
    <soal-create></soal-create>
@endsection

@section('js')
    <script>
        $(function() {
            $("#menu-soal").addClass('open');
            $("#menu-soal-soal").addClass('active');
        });
    </script>
@endsection
