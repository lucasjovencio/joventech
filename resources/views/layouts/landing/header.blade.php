<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<title>{{ config('app.name', 'JovenTech') }} Tecnologia</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-icon-180x180.png"')}}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favicon/android-icon-192x192.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">


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
		.intro .overlay-itro,.overlay-mf {
			background-color: rgb(0 0 0);
			opacity: .9;
		}
		.intro-single .overlay-mf{
			background-color: rgb(0 0 0) !important;
			opacity: 0.9;
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