
@extends('templates.master')

@section('content')

    <soal></soal>

@endsection

@section('js')
    <script>
        $(function() {
            $("#menu-soal").addClass('open');
            $("#menu-soal-soal").addClass('active');
        });

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
                        $("#deleteTipe"+id).submit();
                    }
                })
        }
    </script>
@endsection
