<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
          content="CBT Online International Office Politeknik Harapan Bersama">
    <meta name="keywords"
          content="CBT, Test, Tes, Online, International, Office, Class, Kelas, Internasional, Politeknik Harapan Bersama, Poltek Tegal, Politeknik Tegal">
    <meta name="author" content="Fredy Nur Apriyanto">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="{{ asset('app-assets/img/logo/logo_phb.png') }}">

	<title>Access Denied</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One:900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('app-assets/css/error-style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>:(</h1>
			</div>
			<h2>403 - Forbidden</h2>
			<p>You don't have permission to access that page!</p>
			<a href="{{ url('/') }}">home page</a>
		</div>
	</div>

</body>

</html>
