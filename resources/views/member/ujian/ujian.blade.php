@extends('templates.masterUjian')
@section('content')
    <div class="main-content">
        <div class="container exam-page" style="margin-top: 85px;">
            <div class="row">
                <div class="col-8">
                    <h4>Soal Dasar Pemrograman Web Statis</h4>
                </div>
                <div class="col-4">
                    <p class="float-right"><b>Time Left:</b> 00:50:00</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-info">
                                <h4 class="card-title">Question 2 of 10</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-block">
                                <p>Apa kepanjangan dari HTML ? </p>
                                <br />
                                <div class="card" style="border: 1px solid rgba(0, 0, 0, 0.125);">
                                    <div class="card-header" style="padding: 0.75rem 1.25rem">
                                        <h6>Answer Options :</h6>
                                    </div>
                                    <div class="card-body" style="padding-left: 15px; padding-bottom: 15px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" value="option1" checked>
                                                <label class="form-check-label">
                                                    HyperText Markup Language
                                                </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" value="option2">
                                            <label class="form-check-label">
                                                HyperTook Markup Language
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" value="option1">
                                                <label class="form-check-label">
                                                    HyperText Marked Language
                                                </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" value="option2">
                                            <label class="form-check-label">
                                                HyperTook Marked Language
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-info">
                                <h5 class="card-title">Number of Questions</h5>
                            </div>
                        </div>

                        <div class="card-body" style="padding-bottom: 15px;">
                            <div class="card-block">
                                <div class="row justify-content-center">
                                    <div class="col-2 text-center" style="background-color: #28a745; color: #fff;">1</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">2</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">3</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">4</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">5</div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">6</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">7</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">8</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">9</div>
                                    <div class="col-2 text-center" style="background-color: #6c757d; color: #fff;">10</div>
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
                    <button class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Previous</button>
                    <button class="btn btn-info btn-sm">Next <i class="fa fa-arrow-right"></i></button>
                    <button class="btn btn-success btn-sm float-right">End Test</button>
                </div>
            </div>

        </div>
    </div>
    <br/><br/>
@endsection
