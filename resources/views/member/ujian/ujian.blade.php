@extends('templates.masterUjian')
@section('content')
    <div class="main-content">
        <div class="container exam-page" style="margin-top: 85px;">
            <div class="row">
                <div class="col-8">
                    <h4>{{ $ujian_now->nama }}</h4>
                </div>
                <div class="col-4">
                    <p class="float-right"><b>Time Left:</b> <span id="waktu-mundur">00:00:00</span></p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-info">
                                <h4 class="card-title">Pertanyaan {{ $ujians->currentPage() }} of {{ $ujians->total() }}</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            @foreach ($ujians as $ujian)
                            <input id="id_ujian" type="hidden" value="{{ $ujian->id }}">
                                <div class="card-block">
                                    <p>{{ $ujian->soal->soal }}</p>
                                    <br />
                                    <div class="card" style="border: 1px solid rgba(0, 0, 0, 0.125);">
                                        <div class="card-header" style="padding: 0.75rem 1.25rem">
                                            <h6>Pilihan Jawaban :</h6>
                                        </div>
                                        <div class="card-body" style="padding-left: 15px; padding-bottom: 15px;">
                                            <div class="form-check">
                                                <input name="jawaban" class="form-check-input" type="radio" name="exampleRadios" value="{{ $ujian->soal->jawaban_1 }}" {{ $ujian->soal->jawaban_1 == $ujian->jawaban ? 'checked':''}}>
                                                    <label class="form-check-label">
                                                        {{ $ujian->soal->jawaban_1 }}
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="jawaban" class="form-check-input" type="radio" name="exampleRadios" value="{{ $ujian->soal->jawaban_2 }}" {{ $ujian->soal->jawaban_2 == $ujian->jawaban ? 'checked':''}}>
                                                    <label class="form-check-label">
                                                    {{ $ujian->soal->jawaban_2 }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="jawaban" class="form-check-input" type="radio" name="exampleRadios" value="{{ $ujian->soal->jawaban_3 }}" {{ $ujian->soal->jawaban_3 == $ujian->jawaban ? 'checked':''}}>
                                                    <label class="form-check-label">
                                                        {{ $ujian->soal->jawaban_3 }}
                                                    </label>
                                            </div>
                                            @if (!empty($ujian->soal->jawaban_4))
                                                <div class="form-check">
                                                    <input name="jawaban" class="form-check-input" type="radio" name="exampleRadios" value="{{ $ujian->soal->jawaban_4 }}" {{ $ujian->soal->jawaban_4 == $ujian->jawaban ? 'checked':''}}>
                                                    <label class="form-check-label">
                                                        {{ $ujian->soal->jawaban_4 }}
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-info">
                                <h5 class="card-title">Jumlah Pertanyaan</h5>
                            </div>
                        </div>

                        <div class="card-body" style="padding-bottom: 15px;">
                            <div class="card-block">
                                <div class="row">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($ujian_all as $ujian)
                                        @if ($ujian->jawaban)
                                            <div class="col-2 text-center" style="background-color: #28a745; color: #fff;">{{ $no++ }}</div>
                                        @else
                                            <div class="col-2 text-center" style="background-color: rgb(108, 117, 125); color: #fff;">{{ $no++ }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px;">
                                <div class="col-6">
                                    <div class="attempted" style="width: 20px; height: 15px; background-color: #28a745; display: inline-block;"></div>
                                    <span style="font-size: 12px;">Attempted</span>
                                </div>
                                <div class="col-6">
                                    <div class="attempted" style="width: 20px; height: 15px; background-color: #6c757d; display: inline-block;"></div>
                                    <span style="font-size: 12px;">Unattempted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    @if ($ujians->currentPage() > 1)
                        <a href="javascript:void(0)" onclick="previous()" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Previous</a>
                    @endif

                    @if ($ujians->currentPage() <= 1 && $ujians->currentPage() < $ujians->total())
                        <a href="javascript:void(0)" onclick="next()" class="btn btn-info btn-sm">Next <i class="fa fa-arrow-right"></i></a>
                    @endif
                    <button onclick="save()" class="btn btn-success btn-sm float-right">End Test</button>
                </div>
            </div>

        </div>
    </div>
    <br/><br/>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            let detik = "{{ 60 - $seconds }}";
            let menit = "{{ 10 - $minute }}";
            let myTime;

            function waktuMundur() {
                myTime = setTimeout(waktuMundur,1000);
                    $('#waktu-mundur').text('00:' + menit + ':' + detik);
                        detik --;
                    if(detik < 0) {
                        detik = 59;
                        menit --;
                    if(menit < 0) {
                        menit = 0;
                        detik = 0;
                    }
                }

                if(menit == 0 && detik == 0){
                    alert('hai');
                    $('#waktu-mundur').text('00:00:00');
                    clearTimeout(myTime);
                }
            }
            if(menit >= 0){
                waktuMundur();
            }
        });

        function previous(){
            let url = "{{ route('member.ujian', $ujian_now->id) }}" + "?page=" +  "{{($ujians->currentPage() - 1) }}";
            let jawaban = $('input[name=jawaban]:checked').val();
            if(!jawaban)
                jawaban = '';
            let id_ujian = $("#id_ujian").val();
            location.href = url + '&jawaban=' + jawaban + "&id_ujian=" + id_ujian;
        }

        function next(){
            let url = "{{ route('member.ujian', $ujian_now->id) }}" + "?page=" +  "{{($ujians->currentPage() + 1) }}";
            let jawaban = $('input[name=jawaban]:checked').val();
            if(!jawaban)
                jawaban = '';
            let id_ujian = $("#id_ujian").val();
            location.href = url + '&jawaban=' + jawaban + "&id_ujian=" + id_ujian;
        }

        function save(){
            let id_ujian = $("#id_ujian").val();
            let jawaban = $('input[name=jawaban]:checked').val();
            if(!jawaban)
                jawaban = '';
            let url = "{{ route('member.ujian.save', $ujian_now->id) }}" + "?jawaban=" + jawaban + "&id_ujian=" + id_ujian;

            location.href = url;
        }
    </script>
@endsection
