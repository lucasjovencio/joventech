@extends('layouts.landing.main')

@section('css')
    <style>
        .overlay-mf {
            background-color: #000000;
        }
        .article-content > *{
            float: none !important;
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
                        <li class="breadcrumb-item active">
                            Pesquisa
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
                    <h2 class="intro-title mb-4">Resultados para: <small>{{ $termo }}</small></h2>

                    @forelse ($posts as $post)
                        <div class="post-box">
                            <div class="post-thumb">
                                <a href="{{ route('home.blog.show',['id'=>$post->id,'slug'=>$post->slug]) }}">
                                    <img src="{{ $post->imagem_destaque }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="post-meta">
                                <a href="{{ route('home.blog.show',['id'=>$post->id,'slug'=>$post->slug]) }}">
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
                    @empty
                        <div class="post-box">
                            <div class="post-meta">
                                <p>Sem resultados para o termo pesquisado.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
                <x-web.blog.right-sidebar/>
            </div>
        </div>
    </section>
    <!--/ Section Blog-Single End /-->
@endsection

@section('js')
   
@endsection