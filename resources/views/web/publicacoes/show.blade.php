@extends('layouts.landing.main')

@section('css')
    <style>
        .article-content > *{
            float: none !important;
        }
        img{
            max-width: 100%;
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css">
@endsection
@section('main')

    <!--/ Intro Skew Star /-->
    <div class="intro intro-single route bg-image" style="background-image: url({{ $post->imagem_destaque }})">
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
                        <li class="breadcrumb-item active">{{ $post->titulo }}</li>
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
                    <div class="post-box">
                        <div class="post-thumb">
                            <img src="{{ $post->imagem_destaque }}" class="img-fluid" alt="">
                        </div>
                        <div class="post-meta">
                            <h1 class="article-title">{{ $post->titulo }}</h1>
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
                            {!! $post->conteudo !!}
                        </div>
                    </div>

                    <div class="box-comments">
                        <div id="disqus_thread"></div>
                    </div>
                   
                </div>
                <div class="col-md-4">
                    <x-web.blog.pesquisa/>
                    <x-web.blog.categoria/>
                    <x-web.blog.tag/>
                </div>
            </div>
        </div>
    </section>
    <!--/ Section Blog-Single End /-->
@endsection

@section('js')
    <script id="dsq-count-scr" src="//joventech.disqus.com/count.js" async></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightBlock(block);
                });
            });
    </script>

    <script>

        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        const disqus_config = function () {
            this.page.url = "{{ route('home.blog.show',['id'=>$post->id]) }}";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://{{ config('app.disqus.host') }}.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection