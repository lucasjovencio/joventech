<body class="">
    <div class="wrapper">
	@guest
	  	
    @else
		<div class="sidebar"  data-color="blue" data="blue">
			<!--
			Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
			-->
			<div class="sidebar-wrapper" >
				<div class="logo">
					<a href="javascript:void(0)" class="simple-text logo-mini">
						JT
					</a>
					<a href="javascript:void(0)" class="simple-text logo-normal">
						JovenTech
					</a>
				</div>
				<ul class="nav">
					<li class="active ">
						<a href="./dashboard.html">
							<i class="tim-icons icon-chart-pie-36"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li>
						<a class="nav-link" data-toggle="collapse" href="#categorais">
							<i class="tim-icons icon-shape-star"></i> Categorias <b class="caret"></b>
						</a>
						<div class="collapse collapse-submenu" id="categorais">
							<ul class="navbar-nav" >
								<li  class="nav-item" >
									<a class="nav-link" href="{{route('tipo-categoria.index')}}">
										Tipos de categorias
									</a> 
								</li>
								<li  class="nav-item" >
									<a class="nav-link" href="{{route('categoria.index')}}">
										Categorias
									</a> 
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a href="{{ route('publicacao.index') }}">
							<i class="tim-icons icon-align-center"></i>
							<p>Publicações</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
    @endguest
      <div class="main-panel"  data="blue">
		@guest
	  	
		@else
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<div class="navbar-toggle d-inline">
							<button type="button" class="navbar-toggler">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
							</button>
						</div>
						<a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
					</button>
					<div class="collapse navbar-collapse" id="navigation">
						<ul class="navbar-nav ml-auto">
							<li class="dropdown nav-item">
								<a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
									<div class="notification d-none d-lg-block d-xl-block"></div>
									<i class="tim-icons icon-sound-wave"></i>
									<p class="d-lg-none">
										Notifications
									</p>
								</a>
								<ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
									<li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your email</a></li>
									<li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a></li>
									<li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a></li>
									<li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a></li>
									<li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a></li>
								</ul>
							</li>
							<li class="dropdown nav-item">
								<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
									<div class="photo">
										<img src="../assets/img/anime3.png" alt="Profile Photo">
									</div>
									<b class="caret d-none d-lg-block d-xl-block"></b>
									<p class="d-lg-none">
										Log out
									</p>
								</a>
								<ul class="dropdown-menu dropdown-navbar">
									<li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a></li>
									<li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
									<li class="dropdown-divider"></li>
									<li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Log out</a></li>
								</ul>
							</li>
							<li class="separator d-lg-none"></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
		@endguest