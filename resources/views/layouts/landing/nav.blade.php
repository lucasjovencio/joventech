<!--/ Nav Star /-->
<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll" href="{{ (Route::is('home.index')) ? '#page-top' : route('home.index')  }}">JovenTech</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll active" href="{{ (Route::is('home.index')) ? '#page-top' : route('home.index')  }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="{{ (Route::is('home.index')) ? '#about' : route('home.index')."#about"  }}">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="{{ (Route::is('home.index')) ? '#service' : route('home.index')."#service"  }}">Qualificações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="{{ (Route::is('home.index')) ? '#work' : route('home.index')."#work"  }}">Depoimentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="{{ (Route::is('home.index')) ? '#blog' : route('home.blog')  }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#contact">Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Nav End /-->

