<div class="widget-sidebar">
    <h5 class="sidebar-title">Categorias</h5>
    <div class="sidebar-content">
        <ul class="list-sidebar">
            @foreach ( ($categorias ?? []) as $categoria)
                <li><a href="{{ route('home.blog.categoria',['categoria'=>$categoria->nome]) }}">{{ $categoria->nome }}</a></li>
                <ul class="list-sidebar ml-4">
                    @foreach ( ($categoria->subcategoria ?? []) as $sub)
                        <li><a href="{{ route('home.blog.categoria',['categoria'=>$sub->nome]) }}">{{ $sub->nome }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
</div>