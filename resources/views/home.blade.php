
@extends('templates.master')

@section('content')

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">

        <div class="container-fluid"><!--Statistics cards Starts-->
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3 py-3">
                                <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="icon-layers info font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ $count_soal }}</h3>
                                    <span>SOAL</span>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3 py-3">
                                <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="icon-book-open warning font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ $count_ujian }}</h3>
                                    <span>UJIAN</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3 py-3">
                                <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="icon-user success font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ $count_peserta }}</h3>
                                    <span>PESERTA</span>
                                </div>
                            </div>
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
        $("#menu-dashboard").addClass('active');
    </script>
@endsection
