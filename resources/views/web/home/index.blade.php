@extends('layouts.landing.main')

@section('css')
<style>
	.card-blog .card-description {
		max-height: 100px;
		overflow: hidden;
		word-break: break-word;
	}

	.card-blog .card-category-box {
		position: initial;
	}
</style>
@endsection

@section('main')
<!--/ Intro Skew Star /-->
<div id="home" class="intro route bg-image" style="background-image: url(img/intro-bg.jpg)">
	<div class="overlay-itro"></div>
	<div class="intro-content display-table">
		<div class="table-cell">
			<div class="container">
				<!--<p class="display-6 color-d">Hello, world!</p>-->
				<h1 class="intro-title mb-4">Lucas Jovencio</h1>
				<p class="intro-subtitle"><span class="text-slider-items">Backend Developer,Web Developer</span><strong
						class="text-slider"></strong></p>
				<!--  -->
				<p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#contact"
						role="button">Orçamento</a></p>
			</div>
		</div>
	</div>
</div>
<!--/ Intro Skew End /-->

<section id="about" class="about-mf sect-pt4 route">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="box-shadow-full">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-sm-6 col-md-5">
									<div class="about-img">
										<img src="{{ asset('imgs/lucas.jpg') }}" class="img-fluid rounded b-shadow-a"
											alt="">
									</div>
								</div>
								<div class="col-sm-6 col-md-7">
									<div class="about-info">
										<p><span class="title-s">Nome: </span> <span>Lucas Jovencio</span></p>
										<p><span class="title-s">Perfil: </span> <span>Backend developer</span></p>
										<p><span class="title-s">Email: </span> <span>contato@joventech.com.br</span>
										</p>
										<p><span class="title-s">Linkedin: </span> <span><a
													href="https://www.linkedin.com/in/lucas-jovencio-684404114/"
													target="_blank">linkedin/lucasjovencio</a></span></p>
									</div>
								</div>
							</div>
							<div class="skill-mf">
								<p class="title-s">Soft skills</p>

								<span>Laravel</span> <span class="pull-right">95%</span>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95"
										aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span>Angular </span> <span class="pull-right">75%</span>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
										aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span>AWS</span> <span class="pull-right">60%</span>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
										aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span>SCRUM</span> <span class="pull-right">90%</span>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90"
										aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="about-me pt-4 pt-md-0">
								<div class="title-box-2">
									<h5 class="title-left">
										Sobre mim
									</h5>
								</div>
								<p class="lead">
									Desenvolvedor backend em PHP com laravel, que adota as melhores praticas do mercado
									de
									desenvolvimento como Scrum, DDD, DRY, RESTful e DevOps.
								</p>
								<p class="lead">
									Atuei no mercado de desenvolvimento de sistemas para startup, Participando nos
									requisitos e viabilidades
									para termos MVP, arquitetura do projeto, desenvolvimento de app e desenvolvimento de
									web.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--/ Section Services Star /-->
<section id="service" class="services-mf route">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box text-center">
					<h3 class="title-a">
						Qualificações
					</h3>
					<p class="subtitle-a">
						Qualidades no desenvolvimento do projeto
					</p>
					<div class="line-mf"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="service-box">
					<div class="service-ico">
						<span class="ico-circle"><i class="ion-monitor"></i></span>
					</div>
					<div class="service-content">
						<h2 class="s-title">Scrum</h2>
						<p class="s-description text-center">
							Desenvolvimento com metodologia scrum.
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-box">
					<div class="service-ico">
						<span class="ico-circle"><i class="ion-code-working"></i></span>
					</div>
					<div class="service-content">
						<h2 class="s-title">Laravel</h2>
						<p class="s-description text-center">
							Desenvolvimento com framework Laravel, que é um framework php utilizado no mercado para
							desenvolvimento focado na produtividade e agilidade.
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-box">
					<div class="service-ico">
						<span class="ico-circle"><i class="ion-stats-bars"></i></span>
					</div>
					<div class="service-content">
						<h2 class="s-title">Dashboard</h2>
						<p class="s-description text-center">
							Desenvolvimento de dashboard voltado para as necessidades do projeto.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ Section Services End /-->

<div class="section-counter paralax-mf bg-image" style="background-image: url(img/counters-bg.jpg)">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-sm-3 col-lg-3">
				<div class="counter-box pt-4 pt-md-0">
					<div class="counter-ico">
						<span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
					</div>
					<div class="counter-num">
						<p class="counter">6</p>
						<span class="counter-text">Anos de experiencia</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<x-web.home.section-projeto/>


<!--/ Section Testimonials Star /-->
<div class="testimonials paralax-mf bg-image" style="background-image: url(img/overlay-bg.jpg)">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="testimonial-mf" class="owl-carousel owl-theme">
					@foreach ($depoimentos as $depoimento)
						<div class="testimonial-box">
							<div class="author-test">
								
								<img width="150" height="150" src="{{ $depoimento->imagem_destaque ?? '' }}" alt="" class="rounded-circle b-shadow-a">
								<span class="author">{{$depoimento->titulo ?? ''}}</span>
							</div>
							<div class="content-test">
								<p class="description lead">
									{{$depoimento->resumo ?? ''}}
								</p>
								<span class="comit"><i class="fa fa-quote-right"></i></span>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</div>
</div>

<x-web.home.section-blog/>

<!--/ Section Contact-Footer Star /-->
<section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg);">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="contact-mf">
					<div id="contact" class="box-shadow-full">
						<div class="row">
							<div class="col-md-6">
								<div class="title-box-2">
									<h5 class="title-left">
										Vamos criar algo?
									</h5>
								</div>
								<div>
									<form action="" method="post" role="form" class="contactForm">
										<div id="sendmessage">
											Mensagem enviada com sucesso, obrigado!
										</div>
										<div id="errormessage"></div>
										<div class="row">
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<input type="text" name="name" class="form-control" id="name"
														placeholder="Seu nome" data-rule="minlen:4"
														data-msg="Please enter at least 4 chars" />
													<div class="validation"></div>
												</div>
											</div>
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email"
														placeholder="Seu email" data-rule="email"
														data-msg="Please enter a valid email" />
													<div class="validation"></div>
												</div>
											</div>
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject"
														placeholder="Nome do projeto" data-rule="minlen:4"
														data-msg="Please enter at least 8 chars of subject" />
													<div class="validation"></div>
												</div>
											</div>
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<textarea class="form-control" name="message" rows="5"
														data-rule="required" data-msg="Please write something for us"
														placeholder="Descreva sua ideia"></textarea>
													<div class="validation"></div>
												</div>
											</div>
											<div class="col-md-12">
												<button type="submit" class="button button-a button-big button-rouded">
													Enviar
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6">
								<div class="title-box-2 pt-4 pt-md-0">
									<h5 class="title-left">
										Entre em contato
									</h5>
								</div>
								<div class="more-info">
									<p class="lead">
										<iframe
											src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d207331.1899586551!2d-40.25395154414254!3d-20.26618772873413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1596026877293!5m2!1spt-BR!2sbr"
											width="100%" height="310" frameborder="0" style="border:0;"
											allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									</p>
									<ul class="list-ico">
										<li>
											<span class="ion-ios-location"></span> Vitória, Espírito Santo
										</li>
										<li><span class="ion-email"></span> contato@joventech.com.br</li>
									</ul>
								</div>
								<div class="socials">
									<ul>
										<li>
											<a target="_blank"
												href="https://www.linkedin.com/in/lucas-jovencio-684404114/"><span
													class="ico-circle"><i class="ion-social-linkedin"></i></span></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="copyright-box">
						<p class="copyright">
							&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved
						</p>
						<div class="credits">
							<!--
									All the links in the footer should remain intact.
									You can delete the links only if you purchased the pro version.
									Licensing information: https://bootstrapmade.com/license/
									Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
								-->
							Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</section>
<!--/ Section Contact-footer End /-->
@endsection

@section('js')
@endsection