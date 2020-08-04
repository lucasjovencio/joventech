@extends('layouts.landing.main')

@section('css')
    <style>
        .overlay-mf {
            background-color: #000000;
        }
        .article-content > *{
            float: none !important;
        }

        #loadMore {
            width: 200px;
            color: #fff;
            display: block;
            text-align: center;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid transparent;
            background-color: #0078ff;
            transition: .4s;
        }
        #loadMore:hover {
            color: #0078ff;
            background-color: #fff;
            border: 1px solid #0078ff;
            transition: .4s;
            text-decoration: none;
        }
        .noContent {
            color: #000 !important;
            background-color: transparent !important;
            pointer-events: none;
        }
        .post-box{
            display: none;
        }
    </style>
@endsection
@section('main')

    <!--/ Intro Skew Star /-->
    <div class="intro intro-single route bg-image">
        <div class="overlay-mf"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    {{-- <h2 class="intro-title mb-4">Blog</h2> --}}
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.blog') }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Categorias</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ $categoria }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--/ Intro Skew End /-->

    <!--/ Section Blog-Single Star /-->
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="intro-title mb-4">Categoria: <small>{{ $categoria }}</small></h2>
                    <div class="posts-content">
                        @foreach($posts as $post)
                            <div class="post-box">
                                <div class="post-thumb">
                                    <a href="{{ route('home.blog.show',['id'=>$post->id]) }}">
                                        <img src="{{ $post->imagem_destaque }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="post-meta">
                                    <a href="{{ route('home.blog.show',['id'=>$post->id]) }}">
                                        <h1 class="article-title">{{ $post->titulo }}</h1>
                                    </a>
                                    <ul>
                                        <li>
                                            <span class="ion-ios-person"></span>
                                            <a href="#">{{ $post->autor->name }}</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <span class="ion-ios-clock-outline"></span>
                                            Postado em {{ $post->data_publicacao }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="article-content">
                                    {!! $post->resumo !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(count((array)$posts)>1)
                        <a class="btn btn-primary" id="loadMore" role="button">Carregar mais</a>
                    @endif
                </div>
                <x-web.blog.right-sidebar/>
            </div>
        </div>
    </section>
    <!--/ Section Blog-Single End /-->
@endsection

@section('js')
   <script>
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
       $(document).ready(function() {
            let skip = 2;
            const take=5;
            let loadMore = true;
            $(".post-box").slice(0, take).show();
            $("#loadMore").on('click',function(e){
                e.preventDefault();
                if(loadMore){
                    loadMore=false
                    $.ajax({
                        url: "{{ route('home.blog.categoria',['categoria'=>$categoria]) }}",
                        type: 'GET',
                        data: {
                            '_token':'{{csrf_token()}}',
                            'skip':skip,
                            'take':take,
                        },
                        success:function(data){
                            if(data.length==0){
                                $("#loadMore").text("").addClass("noContent");
                            }else{
                                addPosts(data,function(){
                                    $(".post-box:hidden").slice(0,2).slideDown();
                                })
                            }
                            loadMore=true;
                            skip += skip;
                        },
                        error:function(data){
                            loadMore=true;
                        }
                    });
                }
            });
            
            async function addPosts(data,callback)
            {
                for(key in data){
                    const post = data[key];
                    $(".posts-content").append(`
                        <div class="post-box">
                            <div class="post-thumb">
                                <a href="{{ route('home.blog.show') }}/${post.id}">
                                    <img src="${post.imagem_destaque}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="post-meta">
                                <a href="{{ route('home.blog.show') }}/${post.id}">
                                    <h1 class="article-title">${post.titulo}</h1>
                                </a>
                                <ul>
                                    <li>
                                        <span class="ion-ios-person"></span>
                                        <a href="#">${post.autor.name}</a>
                                    </li>
                                    <li></li>
                                    <li>
                                        <span class="ion-ios-clock-outline"></span>
                                        Postado em ${post.data_publicacao}
                                    </li>
                                </ul>
                            </div>
                            <div class="article-content">
                                ${post.resumo}
                            </div>
                        </div>
                    `);
                }
                await sleep(100);
                return callback()
            }
        });
   </script>
@endsection