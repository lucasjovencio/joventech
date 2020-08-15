<div class="testimonials paralax-mf bg-image" id="testimonials">
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