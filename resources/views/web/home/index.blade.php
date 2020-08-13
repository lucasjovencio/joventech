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
<div id="home" class="intro route bg-image">
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
						role="button">Contato</a></p>
			</div>
		</div>
	</div>
</div>
<!--/ Intro Skew End /-->

<x-web.home.section-sobre/>

<x-web.home.section-qualificacao/>

<x-web.home.section-experiencia/>

<x-web.home.section-projeto/>

<x-web.home.section-depoimento/>

<x-web.home.section-blog/>

<!--/ Section Contact-Footer Star /-->
<section class="paralax-mf footer-paralax bg-image sect-mt4 route">
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
										Contato
									</h5>
								</div>
								<div>
									<form action="{{route('home.contato.store')}}" method="post" role="form" class="contactForm">
										@csrf
										<div id="sendmessage">
											Mensagem enviada com sucesso, obrigado!
										</div>
										<div id="errormessage"></div>
										<div class="row">
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<input type="text" name="nome" class="form-control input-text" id="name"
														placeholder="Nome" data-rule="minlen:4"
														data-msg="Seu nome é obrgatório" />
													<div class="validation"></div>
												</div>
											</div>
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<input type="email" class="form-control input-text" name="email" id="email"
														placeholder="Email" data-rule="email"
														data-msg="Seu email é obrgatório" />
													<div class="validation"></div>
												</div>
											</div>
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<input type="text" class="form-control input-text" name="assunto" id="subject"
														placeholder="Assunto" data-rule="minlen:4"
														data-msg="O assunto é obrigatório" />
													<div class="validation"></div>
												</div>
											</div>
											<div class="col-md-12 mb-3">
												<div class="form-group">
													<textarea class="form-control input-text" name="mensagem" rows="5"
														data-rule="required" data-msg="A mensagem é obrigatória"
														placeholder="Mensagem"></textarea>
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