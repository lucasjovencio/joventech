<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@if(config('app.google.analytics_id'))
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id={{config('app.google.analytics_id')}}"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', "{{config('app.google.analytics_id')}}");
		</script>
	@endif
	@if(config('app.google.gtm'))
		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','{{config('app.google.gtm')}}');</script>
		<!-- End Google Tag Manager -->
	@endif
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	{!! SEO::generate() !!}
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
@if(config('app.google.gtm'))
	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{config('app.google.gtm')}}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->	
@endif