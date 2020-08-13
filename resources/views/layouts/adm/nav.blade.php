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
					<li class="">
						<a href="{{route('dashboard')}}">
							<i class="tim-icons icon-chart-pie-36"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="@if(Route::is('categoria.*')) active @endif">
						<a  href="{{ route('categoria.index') }}">
							<i class="tim-icons icon-shape-star"></i>
							<p>Categorias</p>
						</a>
					</li>
					<li class="@if(Route::is('publicacao.*')) active @endif">
						<a href="{{ route('publicacao.index') }}">
							<i class="tim-icons icon-align-center"></i>
							<p>Publicações</p>
						</a>
					</li>
					<li class="@if(Route::is('depoimento.*')) active @endif">
						<a href="{{ route('depoimento.index') }}">
							<i class="tim-icons icon-align-center"></i>
							<p>Depoimentos</p>
						</a>
					</li>
					<li class="@if(Route::is('projeto.*')) active @endif">
						<a href="{{ route('projeto.index') }}">
							<i class="tim-icons icon-align-center"></i>
							<p>Projetos</p>
						</a>
					</li>
					<li class="@if(Route::is('contato.*')) active @endif">
						<a href="{{ route('contato.index') }}">
							<i class="tim-icons icon-align-center"></i>
							<p>Mensagens</p>
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
							<x-admin.dashboard.notificacao/>
							<li class="dropdown nav-item">
								<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
									<div class="photo">
										<img src="{{Auth::user()->foto ?? asset('black-dashboard-master/assets/img/default-avatar.png')}}" alt="Profile Photo">
									</div>
									<b class="caret d-none d-lg-block d-xl-block"></b>
									<p class="d-lg-none">
										Log out
									</p>
								</a>
								<ul class="dropdown-menu dropdown-navbar">
									<li class="nav-link"><a href="{{ route('perfil') }}" class="nav-item dropdown-item">Perfil</a></li>
									<li class="dropdown-divider"></li>
									<li class="nav-link"><a href="#" onclick="document.getElementById('logout-form').submit()" class="nav-item dropdown-item">Sair</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
								</ul>
							</li>
							<li class="separator d-lg-none"></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
		@endguest