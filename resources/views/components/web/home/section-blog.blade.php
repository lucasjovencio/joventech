<!--/ Section Blog Star /-->
    <section id="blog" class="blog-mf sect-pt4 route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Blog
                        </h3>
                        <p class="subtitle-a">
                            Compartilhando experiências e conhecimento .
                        </p>
                    <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <a href="{{ route('home.blog.show',['id'=>$post->id]) }}">
                                <div class="card-img" style="background-image: url('{{ $post->imagem_destaque ?? '' }}');height: 200px;background-position: center;background-size: cover;" >
                                </div>
                            </a>
                            <div class="card-body">
                                <div class="card-category-box">
                                    @foreach($post->categorias as $categoria)
                                        <div class="card-category">
                                            <h6 class="category">{{ $categoria->categoria->nome }}</h6>
                                        </div>
                                    @endforeach
                                </div>
                                <h3 class="card-title"><a href="{{ route('home.blog.show',['id'=>$post->id]) }}">{{ $post->titulo }}</a></h3>
                                <p class="card-description">{!! $post->resumo !!}</p>
                            </div>
                            <div class="card-footer">
                                <div class="post-author">
                                    <a href="#">
                                        <img src="img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
                                        <span class="author">{{ $post->autor->name }}</span>
                                    </a>
                                </div>
                                <div class="post-date">
                                    <span class="ion-ios-clock-outline"></span> {{ $post->data_publicacao ?? '#' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-md-center">
                <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="{{ route('home.blog') }}" role="button">Mais publicações</a></p>
            </div>
        </div>
    </section>
<!--/ Section Blog End /-->