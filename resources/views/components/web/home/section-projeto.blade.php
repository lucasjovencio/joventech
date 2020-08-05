<div>
    <!-- Be present above all else. - Naval Ravikant -->
</div><!--/ Section Portfolio Star /-->
<section id="work" class="portfolio-mf sect-pt4 route">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box text-center">
					<h3 class="title-a">
						Portfolio
					</h3>
					<p class="subtitle-a">
						Projetos opensources desenvolvidos para demonstração.
					</p>
					<div class="line-mf"></div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
            @foreach($projetos as $projeto)
                <div class="col-md-4">
                    <div class="work-box">
                        <div class="work-img">
                            <img src="{{$projeto->imagem_destaque ?? ''}}" alt="" class="img-fluid">
                        </div>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">{{ $projeto->titulo ?? '' }}</h2>
                                    <div class="w-more">
                                        <span class="w-ctegory">Opensource</span> / <span class="w-date">{{$projeto->data_publicacao ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <a href="{{ route('home.projeto.show',['id'=>$projeto->id]) }}">
                                            <span class="ion-ios-plus-outline"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-md-center">
            <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="{{ route('home.projeto') }}" role="button">Mais projetos</a></p>
        </div>
    </div>
</section>
<!--/ Section Portfolio End /-->