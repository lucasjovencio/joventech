<li class="dropdown nav-item">
    <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
        @if(count($contatos))
            <div class="notification d-lg-block d-xl-block"></div>
        @endif
        <i class="tim-icons icon-sound-wave"></i>
        <p class="d-lg-none">
            Notificações
        </p>
    </a>
    @if(count($contatos))
        <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
            @forelse ($contatos as $contato)
                <li class="nav-link"><a href="{{route('contato.show',['contato'=>$contato->id])}}" class="nav-item dropdown-item">{{$contato->nome ?? ''}} - {{$contato->assunto ?? ''}}</a></li>
            @empty
            @endforelse
        </ul>
    @endif
</li>