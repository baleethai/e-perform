@php use App\Settings\GeneralSettings; @endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html dir="ltr" lang="th-TH">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="author" content="">
	<meta name="description" content="">

	<!-- Font Imports -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<title>{{ (new GeneralSettings())->site_name }}</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper">

		<!-- Top Bar
		============================================= -->
        {{-- @include('partials.topbar')

		@include('partials.header') --}}

		@yield('content')

		{{-- @include('partials.footer') --}}

	</div>

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="uil uil-angle-up"></div>

	<script src="{{ asset('assets/js/functions.js') }}"></script>

</body>
</html>
