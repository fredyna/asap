
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description"
          content="ASAP (Asah Pengetahuan) adalah aplikasi tes online untuk mengasah pengetahuan">
        <meta name="keywords"
            content="asah, pengetahuan, tes, online">
        <meta name="author" content="Fredy Nur Apriyanto">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ASAP</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('app-assets/img/logo/asap-logo.png') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: left;
            }

            .btn {
                background-color: #17a2b8; /* blue */
                border: none;
                color: white;
                padding: 8px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
            }
            .btn-primary{
                background: #007bff;
            }
            a:-webkit-any-link{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                <img src="{{ asset('app-assets/img/logo/asap-logo.png') }}" alt="Logo ASAP" style="width:70px;">
            </div>

            <div class="message" style="padding: 10px;">
                ASAP
                <br>
                ASAH PENGETAHUAN
                <br>
                <a href="{{ route('login') }}">
                    <button class="btn btn-primary">Login</button>
                </a>
                <a href="{{ route('register') }}">
                    <button class="btn">Register</button>
                </a>
            </div>
        </div>
    </body>
</html>

