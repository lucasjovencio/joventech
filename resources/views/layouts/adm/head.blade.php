<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black-dashboard-master/assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('black-dashboard-master/assets/img/favicon.png') }}">
	<title>
		Administrativo {{ config('app.name', 'Laravel') }}
	</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<!-- Nucleo Icons -->
	<link href="{{ asset('black-dashboard-master/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="{{ asset('black-dashboard-master/assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
	
	<style>
		.nav > li > a .caret {
			top: 23px !important;
		}
		.collapse-submenu ul{
			margin-left:45px;
		}
		.btn-primary {
			background: #4ee1c1;
			background-image: -webkit-linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1);
			background-image: -o-linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1);
			background-image: -moz-linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1);
			background-image: linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1);
			background-color: #4ee1c1;
		}
		.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .btn-primary:active:focus, .btn-primary:active:hover, .btn-primary.active:focus, .btn-primary.active:hover {
			background: #4ee1c1 !important;
			background-image: -webkit-linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1) !important;
			background-image: -o-linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1) !important;
			background-image: -moz-linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1) !important;
			background-image: linear-gradient(to bottom left,  #4e72e1, #8b54f5, #4e52e1) !important;
			background-color: #4ee1c1 !important;
		}
	
		.modal-body>.form-group>input:focus,.modal-body>.form-group>select:focus {
			color: #000 !important;
		}
		.modal-body>.form-group>input,.modal-body>.form-group>select {
			color: #000 !important;
		}

		.select2-selection{
			background-color: #fff0 !important;
			border-color: #2b3553 !important;
			border-radius: 4px;
            width: 100%;
            border-radius: 4px;
            color: #66615b;
            line-height: normal;
            font-size: 14px;
            -webkit-transition: color 0.3s ease-in-out, border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
            /*padding: 7px;*/
        }
        .select2-selection:focus,.select2-selection:active {
            border: 1px solid #9A9A9A !important;
            -webkit-box-shadow: none;
            box-shadow: none;
            outline: 0 !important;
            color: #66615B;
        }
        .select2{
          width: 100% !important;
        }
        .select2-container .select2-selection--single {
            height: calc(2.25rem + 2px) !important;
            padding: 7px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem + 2px) !important;
		}
		.select2-results__options>li{
			color:#000 !important;
		}

		.table-responsive {
            overflow: hidden;
		}
		.alinhar-filtro{
            margin:10px -15px;
        }
        .dataTables_filter,.dataTables_paginate{
            float: right;
		}
		select:focus {
			color: #000 !important;
			background-color: #fff !important;
		}
		.table{
          width: 100% !important;
        }
	</style>
	@yield('css')
</head>
