<li class="dropdown nav-item">
    <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
        @if(count($leads))
            <div class="notification d-lg-block d-xl-block"></div>
        @endif
        <i class="tim-icons icon-sound-wave"></i>
        <p class="d-lg-none">
            Notificações
        </p>
    </a>
    @if(count($leads))
        <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
            @forelse ($leads as $lead)
                <li class="nav-link"><a href="{{route('lead.show',['lead'=>$lead->id])}}" class="nav-item dropdown-item">{{$lead->nome ?? ''}} - {{$lead->assunto ?? ''}}</a></li>
            @empty
            @endforelse
        </ul>
    @endif
</li>