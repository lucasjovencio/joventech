<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<title>{{ config('app.name', 'JovenTech') }} Tecnologia</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicons -->
	<link href="{{ asset('dev-folio/img/favicon.png')}} " rel="icon">
	<link href="{{ asset('dev-folio/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<!-- Bootstrap CSS File -->
	<link href="{{ asset('dev-folio/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="{{ asset('dev-folio/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('dev-folio/lib/animate/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('dev-folio/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('dev-folio/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('dev-folio/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
	<!-- Main Stylesheet File -->
	<link href="{{ asset('dev-folio/css/style.css') }}" rel="stylesheet">
	<style>
		.intro .overlay-itro {
			background-color: rgb(0 0 0);
		}
		.navbar-b.navbar-reduce .show > .nav-link, .navbar-b.navbar-reduce .active > .nav-link, .navbar-b.navbar-reduce .nav-link.show, .navbar-b.navbar-reduce .nav-link.active {
			color: rgb(0 0 0);
		}
		.navbar-b.navbar-reduce .navbar-brand {
			color: rgb(0 0 0);
		}
		.navbar-b.navbar-reduce .nav-link {
			color: rgb(0 0 0);
		}
		.navbar-b.navbar-reduce .nav-link:before {
		background-color: rgb(0 0 0);
		}
		.title-left:before {
		background-color: rgb(0 0 0);
		}
		.line-mf {
		background-color: rgb(0 0 0);
		}
	</style>
	<!-- =======================================================
		Theme Name: DevFolio
		Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
		Author: BootstrapMade.com
		License: https://bootstrapmade.com/license/
	======================================================= -->
  	@yield('css')
</head>

<body id="page-top">